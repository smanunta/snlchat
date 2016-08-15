<?php
//var_dump($data);
$postData = $data["postData"]->loadLatestPost();
//var_dump($postData->latestPost->results(0)->ID);
 $imgDirectory = "";
//example
//echo $postData->latestPost->results(0)->ID;
?>

<div id="featured" class="container"> 
        <div class="row"><!-- this will be handled by php code through the control panel-->
           <h1 class="featuredHeading">featured</h1>
        </div>
        <div class="row"> 
          <div class="col-md-4">
            <div class="col-md-12 featuredContainer">
              <img class="img-circle img-responsive featuredImg" src="<?php echo $imgDirectory .  $postData->results(0)->post_image;?>"/>
							
							<span class="label label-default featuredCategory">Buffalo</span>
                <h2 class="featuredTitle"><?php echo $postData->results(0)->post_title; ?></h2> <!-- show title -->
                <p class="featuredDescription"> <!--deswcription-->
                  <?php echo $postData->results(0)->post_excerpt; ?>
                </p>
            </div>
              
          </div>
            <div class="col-md-4 ">
              <div class="col-md-12 featuredContainer">
              <img class="img-circle img-responsive featuredImg" src="<?php echo $imgDirectory . $postData->results(1)->post_image; ?>"/>
              
								<span class="label label-default featuredCategory">Buffalo</span>
                <h2 class="featuredTitle"><?php echo $postData->results(1)->post_title; ?></h2> <!-- show title -->
                <p class="featuredDescription"> <!--deswcription-->
                  <?php echo $postData->results(1)->post_excerpt; ?>
                </p>
            </div>
          </div>
              <div class="col-md-4 ">
              <div class="col-md-12 featuredContainer">
              <img class="img-circle img-responsive featuredImg" src="<?php echo $imgDirectory . $postData->results(2)->post_image; ?>"/>
              
								<span class="label label-default featuredCategory">Buffalo</span>
                <h2 class="featuredTitle"><?php echo $postData->results(2)->post_title; ?></h2> <!-- show title -->
                <p class="featuredDescription"> <!--deswcription-->
                  <?php echo $postData->results(2)->post_excerpt; ?>
                </p>
            </div>
          </div>
        </div>
      </div>