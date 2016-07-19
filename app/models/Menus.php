<?php 
class Menus
{
	private $_db;
	
	public function __construct()
	{
		$this->_db = DB::getInstance();
	}
 
  public function createAllWgtMenu() //called on the footer.php
  {	
    return $this->_db->query("SELECT * FROM widgets_settings", array());
		
  }
}
?>