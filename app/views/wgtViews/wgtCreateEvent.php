<?php 
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

      $thisEventWgtClass = $data['wgtdata']; //intantiated object for this wgt
      
      
    
?>

  <form role="form" method="post" enctype="multipart/form-data" id="newEventEntryForm">
  <div class="form-group">
    <label for="event_title">Event Title:</label>
    <input type="text" class="form-control" id="event_title">
  </div>
  <div class="form-group">
    <label for="event_description">Event Description:</label>
    <textarea class="form-control" rows="5" id="event_description"></textarea>
  </div>
    <div class="form-group">
    <label for="event_location">Event Location:</label>
    <input type="text" class="form-control" id="event_location">
  </div>
      <div class="form-group">
    <label for="event_contact">Event Contact:</label>
    <input type="text" class="form-control" id="event_contact">
  </div>
    <div class="form-group">
    <label for="event_url">Event Url:</label>
    <input type="text" class="form-control" id="event_url">
  </div>
     <div class="form-group">
    <label for="event_start">Event Start(this has to be entered in the format YYYY-mm-dd hh:mm:ss and its absolutely necessary):</label>
    <input type="text" class="form-control" id="event_start">
  </div> 
    <div class="form-group">
    <label for="event_end">Event End (this has to be entered in the format YYYY-mm-dd hh:mm:ss and its absolutely necessary):</label>
    <input type="text" class="form-control" id="event_end">
  </div>
  </div>
  <button type="button" class="btn btn-primary" id="submitNewEvent">Submit</button>
</form>