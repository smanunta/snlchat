<?php
/***********************************************************************
*
*THIS CLASS WILL BE LOADED ON INIT AND WILL LOAD ALL THE OPTIONS LISTED IN THE 
*DB TABLE CALLED OPTIONS
*
*************************************************************************/
class LoadOptions
{
  
 public static $options;
        public $_db;
  
  
  public function __construct()
  {
    $this->_db = DB::getInstance();
    
    $sql = "SELECT * FROM options";
    
    self::$options = $this->_db->query($sql);
		self::$options = self::$options->results();
		//var_dump(self::$options);
  }
  
  public static function searchResultsForSpecificOption($option_name)
		 {
		//var_dump(self::$options);
			 foreach(self::$options as $resultObj)
			 {
				 //var_dump($resultObj);
				 if($resultObj->option_name == $option_name)
         {
            return $resultObj->option_value;
         }
			 }
		 }
  
}

?>