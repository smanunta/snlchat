<?php 
	if(isset($_POST))
  {
    
  }
?>

<form role="form">
  <div class="form-group">
    <label for="newWgtName">New Widget Name:</label>
    <input type="text" class="form-control" id="newWgtName">
  </div>
  <div class="form-group">
    <label for="newWgtClasses">classes to apply:</label>
    <input type="text" class="form-control" id="newWgtClasses">
  </div>
   <div class="form-group">
    <label for="newWgtBtns">button objects:</label>
    <input type="text" class="form-control" id="newWgtBtns">
  </div>
  <button id="submitNewWidget" type="button" class="btn btn-default">Create</button>
</form>
