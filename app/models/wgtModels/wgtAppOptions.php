<?php
class wgtAppOptions
{
    public $_options, 
            $_db,
            $_publicThemes= array(),
            $_workspaceThemes = array();
    
  
    public function __construct()
    {  
      $this->_db = DB::getInstance();
      
      new LoadOptions;
      
      $this->_options = LoadOptions::$options;
      
    }
  
    public function availablePublicThemes()
    {
      $directory = "../app/views/publicViews/themes/";
      $fullDirPaths = glob($directory . "*");
      foreach($fullDirPaths as $path) //path is a string ../../../whatINeed
      {
        $path = explode("/", $path);
        $this->_publicThemes[] = end($path); 
      }
      //var_dump($this->_publicThemes);
    }
  
    public function availableWorkspaceThemes()
    {
      $directory = "../app/views/workspaceViews/themes/";
      $fullDirPaths = glob($directory . "*");
      foreach($fullDirPaths as $path) //path is a string ../../../whatINeed
      {
        $path = explode("/", $path);
        $this->_workspaceThemes[] = end($path); 
      }
    }
  
  public function updateOptions($publicTheme, $workspaceTheme, $appName ="")
  {
    $updatePublicThemeQuery = "UPDATE options SET option_value = '{$publicTheme}' WHERE option_name = 'themeInUse'";
    $updateWorkspaceThemeQuery = "UPDATE options SET option_value = '{$workspaceTheme}' WHERE option_name = 'workspaceTheme'";

    if($appName != "")
    {
      $updateAppNameQuery =  "UPDATE options SET option_value = '{$appName}' WHERE option_name = 'appName'";
      $this->_db->query($updateAppNameQuery);
    }
    
    if($this->_db->query($updatePublicThemeQuery) && $this->_db->query($updateWorkspaceThemeQuery))
    {
      //var_dump($this->_db);
      return true;
    }else{
      return false;
      //var_dump($this->_db);
    }
      
  }
  
}

?>