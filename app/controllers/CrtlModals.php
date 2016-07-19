<?php
class CrtlModals extends Controller
{
	public $user,
         $_modal = null,  //hold the modal class
				 $_widgets = null;  //hold the widgets class
	
	
	/*  
***********************************************************************************************
*
*
*
*
***********************************************************************************************
*/
	
	public function modRunModelNView($modData = "") //RUNS FOR EVERY INSTANCE OF A WIDGET
	{
		$modData = self::parseModData($modData);            //returns array of data
     // working var_dump($modData);
    $user = $this->model('User');                 // this calls the widget VIEW from the views ...so if error occurs here its prob cause the widget being called dont exist
    $modal_data = $this->modModels($modData[0]); //returns an instantiated object for wgtdata
		/*--------------------------------------------
		------THE _WGTID VAR WILL NEED TO BE IN EVERY-
		------WIDGET CLASS or IT WILL NOT WORK--------
		--------------------------------------------*/
		//$widget_data->_wgtID = $wgtID;     NOT USED at the MOMENT
		$this->view('modViews/'. $modData[0]  , array("user" => $user, "moddata" => $modal_data));	
	}
	
	
	/*  
***********************************************************************************************
*
*
*
*
***********************************************************************************************
*/
	
	public function parseModData($modData)
	{
		return explode("/" , $modData);
	}
	
	
	/*  
***********************************************************************************************
*
*
* 
*
***********************************************************************************************
*/
	
	public function getJsonForSingleMod($modName = "")
	{
		$this->_modal = $this->model('Modals');   
		$mod = $this->_modal->findSingleMod($modName);
		echo $mod;
		
	}
	

}
?>