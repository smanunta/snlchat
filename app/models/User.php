<?php 
class User
{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;
	
	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();
		
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');
		
		if(!$user)  //if user is = to null
		{
			if(Session::exists($this->_sessionName))
			{
				$user = Session::get($this->_sessionName);
				
				if($this->find($user))
				{
					$this->_isLoggedIn = true;
				}else
				{
					//logout
				}
			}
		}else
		{
			$this->find($user);
		}
	}
	
	public function create($fields)
	{	
		if(!$this->_db->insert('users', $fields))
		{
			throw new Exception('There was a problem creating the acct');
		}
	}
	
	public function update($fields = array(), $id = array())
	{
		if(!$id && $this->isLoggedIn())
		{
			$id['user_id']= $this->data()->user_id;//this is the "where" field for the sql statement
		}
		
		if (!$this->_db->update('users', $id, $fields))
		{
			throw new Exception('there was a problem updating');
		}
	}
	
	public function find($user = null)
	{
		if($user)
		{
			$field = (is_numeric($user)) ? 'user_id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));
			
			if($data->count())
			{
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}
	public function login($username = null, $password = null, $remember = false)
	{
		
		//print_r($this->_data);
		if(!$username && !$password && $this->exists())  //if username = null and password = null and _data is true
		{
			Session::put($this->_sessionName, $this->data()->user_id);
		}else
		{	
			$user = $this->find($username); //returns true if user found or false if not found
			if($user)                       // runs if line above -> $user is = true    
			{
				if($this->data()->password === Hash::make($password, $this->data()->salt))
				{
					Session::put($this->_sessionName, $this->data()->user_id);
					
					if($remember)
					{
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('user_session', array('user_id', '=', $this->data()->user_id));
						
						if(!$hashCheck->count())
						{
							$this->_db->insert('user_session', array(
								'user_id' => $this->data()->user_id,
								'hash' => $hash
							));
						}else
						{
							$hash = $hashCheck->first()->hash;
						}
						
						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry') );
					}
					
					return true;
				}
			}
		}
		return false;
	}
	
	public function logout()
	{
		$this->_db->delete('user_session', array('user_id','=',$this->data()->user_id));
		
		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}
	
	public function exists()
	{
		return (!empty($this->_data)) ? true : false;
	}
	
	public function data()
	{
		return $this->_data;
	}
	
	public function isLoggedIn()
	{
		return $this->_isLoggedIn;
	}
}
?>