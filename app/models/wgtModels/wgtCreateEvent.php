<?php 
class wgtCreateEvent
{
  /***************************************************************************************
*
* to create EVENTS we need to have:
*   *id is auto increment
*   *title
*   *description
*   *location
*   *contact
*   *url
*   *start
*   *end
*
****************************************************************************************/
  
  private $_db;
  
  
  public function __construct()
  {
     
  }
   
  
  public function createEvent($newEventTitle, $newEventDescription, $newEventLocation, $newEventContact, $newEventUrl,$newEventStart, $newEventEnd)
  {   
    
    $rightNow = date("Y-m-d h:i:sa");
    
    $this->_db = DB::getInstance();
    $table= "calendarEvents";
    if($this->_db->insert($table , array("title" => $newEventTitle ,  "description" => $newEventDescription, "location" => $newEventLocation, "contact" => $newEventContact, "url" => $newEventUrl, "start" => $newEventStart, "end" => $newEventEnd)))
    {
      echo "succesfully Submited Event";
    }else
    {
      echo "failed";
    }
    
  }
} 
?>