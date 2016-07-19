<?php 
/***************************************************************************************
*
* to create post we need to have:
*   *id is auto increment
*   *post_title
*   *post_content
*   *post_date
*   *
*   *
*
****************************************************************************************/

      $thisPostWgt = $data['wgtdata']; //intantiated object for this wgt
      
     

?>

  <form role="form" method="post" enctype="multipart/form-data" id="newPostEntryForm">
  <div class="form-group">
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

  <!--<div class="form-group">  
    <label for="post_date">Post Date:</label>
    <input type="datetime" class="form-control" placeholder="<?php //echo date("Y-m-d h:i:sa"); ?>" id="post_date">-->
  </div>
  <button type="button" class="btn btn-primary" id="submitNewPost">Submit</button>
</form>