<?php
class wgtNotes
{
  private $_db = null,
				$_query = null,
				$_error = false,
				$_results = null, 
				$_count = 0,
        $_user = NULL ; 
  public $_wgtID;
  
  public function __construct()
  {
    $this->_db = DB::getInstance();
    $this->_user = new User();
  }
  
  public function findUsersNotes() //finds one note max.
  {
   
      $noteObj = $this->_db->query("SELECT widget_id, note_title, note_content FROM temp_notes WHERE user_id = ". Session::get('user') . "");
      if($noteObj->count())
      {
        return $noteObj->results();
      }else
      {
        echo  "No Note found";
      }
      
  }
	
	public function saveNote()
	{
		
	}
	
	public function newNote()
	{
		
		DB:insert("widget_settings", array("name"=>"wgtNotes","value"=>"0","type"=>"0","user_id" =>  $this->_user->user_id ,"classes"=>"col-xs-12 col-md-4","wgtBtnObjs"=>"wgtResize wgtExit"));
		$this->_wgtID = $this->_pdo->lastInsertId();
		
		$query= $this->_db->query('SELECT * FROM widgets_settings WHERE user_id = '. $user->data()->user_id . ' AND widget_id = '. $this->_wgtID .' ORDER BY widget_id DESC');
     //echo $query->count(); use to check if anything is returned
     if($query->count())
     {
       return json_encode($query->results());
     }else
     {
       return false;
     }
	}
}

?>