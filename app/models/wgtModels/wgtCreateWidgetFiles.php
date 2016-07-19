<?php
class wgtCreateWidgetFiles
{
  /********************************************************************************************
  *  i need to create php file in models/wgtModels
  *  i need to create php file in views/widgets
  *  i need to create DB entry including:
  *    *classes
  *    *button objs
  *  Get data from the user to run this
  *********************************************************************************************
  **/
  private $_db;
  
/*  
***********************************************************************************************
*
*this function CREATES the MODEL file for the new widget in the wgtModels folder
*This function is called via ajax from the functions.js model function *wgtCreateWidgetFiles()
*
***********************************************************************************************
*/
  
    public function createWgtModelFile($newWgtName)
  {
    $newFile = fopen("../app/models/wgtModels/". $newWgtName . ".php", "w") or die("Unable to open file!");
    $txt = "<?php class " . $newWgtName . "{} ?>";
    fwrite($newFile, $txt);
    fclose($newFile);
    echo "<br>ModelFile has been created!!!<br>"  ;
  }
/*  
***********************************************************************************************
*
*this function CREATES the VIEW file for the new widget in the views/widgets folder
*This function is called via ajax from the functions.js model function wgtCreateWidgetFiles()
*It is controlled by the CtrlWidget controller method wgtCreateWidgetFiles
***********************************************************************************************
*/
  
  
   public function createWgtViewFile($newWgtName)
  {
    $newFile = fopen("../app/views/wgtViews/". $newWgtName . ".php", "w") or die("Unable to open file!");
    $txt = "<?php echo 'this is a new file that has not been modified yet...go to the views folder for wgts to edit this file'?>";
    fwrite($newFile, $txt);
    fclose($newFile);
     echo "<br>ViewFile has been created!!!<br>"  ;
  }
  
  
/*  
***********************************************************************************************
*
*this function CREATES the DB entry for the new entry
*This function is called via ajax from the functions.js model function wgtCreateWidgetFiles()
*
***********************************************************************************************
*/
  
  
  public function createWgtDBEntry($newWgtName, $newWgtBtns, $newWgtClasses)
  {
    $this->_db   = DB::getInstance();
    $table = "widgets_settings";
    $newWgtClasses = str_replace("--"," ",$newWgtClasses);
    $newWgtBtns = str_replace("--"," ",$newWgtBtns);
    if($this->_db->insert($table, $data= array("name" => $newWgtName, "wgtBtnObjs" => $newWgtBtns, "classes" => $newWgtClasses)))
    {
      echo "DB entry success";
    }else{echo " this failed";}
      
  }
}

?>