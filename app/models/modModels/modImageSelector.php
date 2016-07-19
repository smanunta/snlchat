<?php 

class modImageSelector{
  
  public $images; //this will be used by the img selector
  
  public function __construct()
  {
      $directory = "../app/models/images/";
      $this->images = glob($directory . "*");
     
    
      //HELPER IF FUNCITON TO FIND THE DIRECTORY PATHS
      /*if ($handle = opendir('../app/models/images')) {
          while (false !== ($entry = readdir($handle))) {
              if ($entry != "." && $entry != "..") {
                  echo "$entry\n";
              }
          }
          closedir($handle);
      }*/
  }
  
  
} 
?>