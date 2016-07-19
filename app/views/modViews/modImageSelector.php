<?php 
  $imgData = $data['moddata'];
?>

  <!-- Modal -->
  <div class="modal fade" id="myImageSelectorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Image Selector</h4>
        </div>
        <div class="modal-body">

          <!--display all images in the images folder-->
          <?php
              // this is constructed in the contructor for the class for this wgt
              foreach($imgData->images as $image)
              {
                echo '<img src="./'.$image.'" class="ImageChoice" width="100" height="100" data-imgToUse="'. $image. '"/><br />';
              }
            ?>
            <form role="form" method="post" enctype="multipart/form-data" id="newPostEntryForm">
              <div class="form-group">
                <label for="newImageToSubmit">Select image to upload:</label>
                <input type="file" name="newImageToSubmit" id="newImageToSubmit">
              </div>
              <button type="button" class="btn btn-primary" id="submitNewImage">Upload</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="submitImageChoice">Select</button>
        </div>
      </div>
    </div>
  </div>