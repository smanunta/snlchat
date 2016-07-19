<?php 
class wgtPosts
{
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
  
  private $_db;
  
  
  public function __construct()
  {
     
  }
   
  
  public function createPostEntry($newPostTitle, $newPostContent, $newImgForPost, $newPostType)
  {   
    
    $rightNow = date("Y-m-d h:i:sa");
    
    $this->_db = DB::getInstance();
    $table= "posts";
    if($this->_db->insert($table , array("post_title" => $newPostTitle ,  "post_content" => $newPostContent, "post_date" => $rightNow, "post_image" => $newImgForPost, "post_excerpt" => $newPostContent, "post_type" => $newPostType)))
    {
      echo "succesfully Submited Post";
    }else
    {
      echo "failed";
    }
    
  }
 
  
} 
?>