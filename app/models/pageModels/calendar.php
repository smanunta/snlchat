<?php 
class Calendar
{
  private $_db,
          $results;
  
  public function __construct()
  {
    $this->_db = DB::getInstance();
    
  } 
   
  public function loadEventsForCalendar()//this will return JSON data
  {
     
    if($_GET)
     {
       //var_dump($_GET);
       
       //$table = "calendarEvents";
       //$this->results = $this->_db->get($table, array("id", ">", "0"));
       $sql = "SELECT * FROM calendarEvents WHERE start >= ? AND end < ? ORDER BY start ASC";
       
        try
        {
          $events = $this->_db->query($sql, array($_GET['start'], $_GET['end']));
          // var_dump($events->results());
          $events = json_encode($events->results());
        }catch(Exception $e) {
         echo 'Message: ' .$e->getMessage();
        }
       echo $events;
     }
    
  }
}
//rray(4) { ["url"]=> string(56) "ctrlPublic/getDataForAjax/calendar/loadEventsForCalendar" ["start"]=> string(10) "2015-12-27" ["end"]=> string(10) "2016-02-07" ["_"]=> string(13) "1453917051159" } 
?>