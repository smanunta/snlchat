<?php 
	class DB
	{
		private static $_instance = null;
		private $_pdo = null,
				$_query = null,
				$_error = false,
				$_results = null,
				$_count = 0;
				
		private function __construct()
		{
			try
			{
				$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db').'', Config::get('mysql/username'), Config::get('mysql/password'));
				//echo 'connected'; use this to see if its working
			}
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
		}
		
		
		//------------used to query data-----------------------
		public static function getInstance()
		{
			if(!isset(self::$_instance))
			{
				self::$_instance = new DB();
			}
			return self::$_instance;
		}
		
		 public function query($sql, $params= array())  
		 {
			$this->_error = false;
			if($this->_query = $this->_pdo->prepare($sql))
			{
				$x=1;
				if(count($params))
				{
					foreach($params as $param)
					{
						$this->_query->bindValue($x, $param);
						$x++;
					}
				}
			}
			
			if($this->_query->execute())
			{
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			}else
			{
				$this->_error = true;
			}
			
			return $this;
		 }
		
		 public function action($action,$table, $where = array())
		 {
			if(count($where) == 3)
			{
				$operators = array('=','<','>','>=','<=');
				
				$field = $where[0];
				$operator = $where[1];
				$val = $where[2]; 
				
				if(in_array($operator, $operators))
				{
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					
					if(!$this->query($sql,array($val))->error())
					{
						return $this;
					}
				}
				
			}
			
			return false;
		 }
		 
		 public function get($table, $where)
		 {
			 return $this->action('SELECT *', $table, $where);
		 }
		 
		 public function insert($table, $data= array())
		 {
			if(count($data))
			{
				$keys = array_keys($data);
				$values ='';
				$x = 1;
				$val_place_holder = array();
				foreach($data as $field)
				{
					$values .= '?';
					if($x < count($data))
					{
						$values .= ', ';
					}
					$x++;
				}
				$sql = "INSERT INTO {$table} (`".implode('`,`', $keys)."`) VALUES ({$values})";
				//echo $sql;
                //var_dump($data);
				if(!$this->query($sql, $data)->error())
				{
					return true;
				}

			}
			return false;
		 }
		 
		 public function update($table, $where = array(), $fields = array())
		 {
			 $set ='';
			 $x = 1;
			 
			 foreach($fields as $name => $value)
			 {
				 $set .= "{$name} = ?";
				 if($x < count($fields))
				 {
					 $set .= ", ";
				 }
				 $x++;
			 }
			 foreach($where as $value => $equals)
			 {
				 $where_values = $value . " = " . $equals;
			 }
			 
			 $sql = "UPDATE {$table} SET {$set} WHERE {$where_values}";
			 //echo $sql;
			 if(!$this->query($sql, $fields)->error())
			 {
				 return true;
			 }
			 
			 return false;
		 }
		 
		 
		 public function delete($table, $where)
		 {
			 return $this->action('DELETE', $table, $where);
		 }
		 
		 public function results($ind= "")
		 {
			 if($ind != "" || $ind == 0 && is_numeric($ind))
			 {
				 return $this->_results[$ind];
			 }else{
				 return $this->_results;
			 }
			
		 }
		 
		 public function first()
		 {
			return $this->_results[0];
		 }
		 
		 public function error()
		 {
			 return $this->_error;
		 }
		 
		 public function count()
		 {
			return $this->_count;
		 }
		 
	}
?>