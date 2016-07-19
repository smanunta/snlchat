<?php 

//form with all the options and ability to change
  
  $appOptionsObj = $data['wgtdata'];  //object including the instantiated class for wgtAppOtpions
  $appOptionsObj->availablePublicThemes();  //this sets the _publicThemes array
  $appOptionsObj->availableWorkspaceThemes() //this sets the _workspaceThemes array

?>
<h3>
  use this widget to look at the currently set options and ALSO make changes if necessary
</h3>

<form role="form" method="post" enctype="multipart/form-data" id="newPostEntryForm">
  
  <?php
   //var_dump($appOptionsObj);
  foreach($appOptionsObj->_options as $option)
  {
    //var_dump($option);
    echo "<div class='form-group'>";
    echo "<label for='". $option->option_name . "'>Option Name: ". $option->option_name . " and the current value is: ". $option->option_value . "</label>";
    
    if($option->option_name == "themeInUse" ) //themeinuse refers to the theme for the public theme
    {
      echo "<select class='form-control' id='". $option->option_name . "'>";
       foreach($appOptionsObj->_publicThemes as $theme)
        {
         echo "<option value='". $theme  ."'>". $theme  ."</option>";
       }
    echo "</select>";
    }else if($option->option_name == "workspaceTheme" ) //themeinuse refers to the theme for the public theme
    {
      echo "<select class='form-control' id='". $option->option_name . "'>";
       foreach($appOptionsObj->_workspaceThemes as $theme)
        {
         echo "<option value='". $theme  ."'>". $theme  ."</option>";
       }
    echo "</select>";
    }else if($option->option_name == "appName" ) //themeinuse refers to the theme for the public theme
    {
      echo "<input type='text' class='form-control' id='". $option->option_name ."' placeholder='". $option->option_value."'>";
    }
    
    echo "</div>";
  }
  ?>
  <button type="button" class="btn btn-primary" id="updateAppOptions">Submit Changes</button>
</form>
  <!--<div class="form-group">
    <label for="post_type">Select Content Type:</label>
    <select class="form-control" id="post_type">
      <option value="post">post</option>
      <option value="article">article</option>
    </select>
  </div>
  <div class="form-group">
    <label for="post_title">Post Title:</label>
    <input type="text" class="form-control" id="post_title">
  </div>
  <div class="form-group">
    <label for="post_content">Post Content:</label>
    <textarea class="form-control" rows="5" id="post_content"></textarea>
  </div>
  <div class="form-group">
    <label for="postImgUpload">Select image to use for post:</label>
    <button type="button" class="btn btn-primary btn-lg imageSelector" data-toggle="modal" data-target="#myImageSelectorModal">
      Image Selector
    </button>
  </div>
  <div class="form-group">
    <label for="imgSelected">Image Selected:</label>
    <input type="text" class="form-control" id="imgSelected" readonly>
  </div>

  
  </div>
  <button type="button" class="btn btn-primary" id="submitNewPost">Submit</button>
</form>-->