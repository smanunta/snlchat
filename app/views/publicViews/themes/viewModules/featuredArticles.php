<?php
//var_dump($data);
$articleData = $data["postData"]->loadLatestArticles();

$imgDirectory = "";
    
//example
?>

<div id="featuredArticles" class="container"> 
        <div class="row"><!-- this will be handled by php code through the control panel-->
           <h1 class="featuredHeading">featured articles</h1>
        </div>
        <div class="row"> 
          
          <div class="col-md-3">
            <div class="col-md-12">
              <img class="img-responsive" src="<?php echo $imgDirectory . $articleData->results(0)->post_image;?>"/>
              <span class="label label-default featuredCategory">Buffalo</span>
                <h2 class="featuredTitle"><?php echo $articleData->results(0)->post_title; ?></h2> <!-- show title -->
                <p class="featuredDescription"> <!--deswcription-->
                  <?php echo $articleData->results(0)->post_excerpt; ?>
                </p>
            </div>
              
          </div>
            <div class="col-md-3 ">
              <div class="col-md-12">
              <img class="img-responsive" src="<?php echo $imgDirectory . $articleData->results(1)->post_image;?>"/>
              <span class="label label-default featuredCategory">Buffalo</span>
                <h2 class="featuredTitle"><?php echo $articleData->results(1)->post_title; ?></h2> <!-- show title -->
                <p class="featuredDescription"> <!--deswcription-->
                  <?php echo $articleData->results(1)->post_excerpt; ?>
                </p>
            </div>
          </div>
              <div class="col-md-3 ">
              <div class="col-md-12">
              <img class="img-responsive" src="<?php echo $imgDirectory .$articleData->results(2)->post_image;?>"/>
              <span class="label label-default featuredCategory">Buffalo</span>
                <h2 class="featuredTitle"><?php echo $articleData->results(2)->post_title; ?></h2> <!-- show title -->
                <p class="featuredDescription"> <!--deswcription-->
                  <?php echo $articleData->results(2)->post_excerpt; ?>
                </p>
            </div>
          </div>
                <div class="col-md-3 ">
              <div class="col-md-12">
              <img class="img-responsive" src="<?php echo $imgDirectory . $articleData->results(3)->post_image;?>"/>
              <span class="label label-default featuredCategory">Buffalo</span>
                <h2 class="featuredTitle"><?php echo $articleData->results(3)->post_title; ?></h2> <!-- show title -->
                <p class="featuredDescription"> <!--deswcription-->
                  <?php echo $articleData->results(3)->post_excerpt; ?>
                </p>
            </div>
                  </div>
          
          
          
        </div>
      </div>