<?php
class PubFeatured
{
  //load featured items to the page
 private $_db;
 public $latestPost,
				$latestArticles;
  
  public function __construct()
  {
    $this->_db = DB::getInstance();
    
  }
  
  public function loadLatestPost()
  {
    $sql = "SELECT * FROM posts WHERE post_type = 'post' ORDER BY id DESC LIMIT 10";
    try
    {
      $posts = $this->_db->query($sql);
       return $this->latestPost = $posts;
    }catch(Exception $e) {
     echo 'Message: ' .$e->getMessage();
    }
    
  }
	
	public function loadLatestArticles()
  {
    $sql = "SELECT * FROM posts WHERE post_type = 'article' ORDER BY id DESC LIMIT 10";
    try
    {
      $articles = $this->_db->query($sql);
       return $this->latestArticles = $articles;
    }catch(Exception $e) {
     echo 'Message: ' .$e->getMessage();
    }
    
  }
  
}
?>