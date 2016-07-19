<?php
class CrtlWidget extends Controller
{
	public $user,
				 $_widgets = null;  //hold the widgets class

	
	/*  
***********************************************************************************************
*
*
*
*
***********************************************************************************************
*/
	
	public function getJSON()
	{
		$user = $this->model('User');
		if($user->isLoggedIn())
		{ 
			$this->_widgets = $this->model('Widgets');                //load the widget data for the user
			$open_widgets = $this->_widgets->findOpenWidgets($user);  //passing the user object ..retuns JSON file
			echo $open_widgets;   //passes JSON data to javascript
		}
	}
	
	/*  
***********************************************************************************************
*
*
*
*
***********************************************************************************************
*/
	
	public function wgtRunModelNView($wgtData = "") //RUNS FOR EVERY INSTANCE OF A WIDGET
	{
		$wgtData = self::parseWgtData($wgtData);            //returns array of data
     // working var_dump($wgtData);
    $user = $this->model('User');                 // this calls the widget VIEW from the views ...so if error occurs here its prob cause the widget being called dont exist
    $widget_data = $this->wgtModels($wgtData[0]); //returns an instantiated object for wgtdata
		/*--------------------------------------------
		------THE _WGTID VAR WILL NEED TO BE IN EVERY-
		------WIDGET CLASS or IT WILL NOT WORK--------
		--------------------------------------------*/
		//$widget_data->_wgtID = $wgtID;     NOT USED at the MOMENT
		$this->view('wgtViews/'. $wgtData[0]  , array("user" => $user, "wgtdata" => $widget_data));	
	}
	
	
	/*  
***********************************************************************************************
*
*
*
*
***********************************************************************************************
*/
	
	public function parseWgtData($wgtData)
	{
		return explode("/" , $wgtData);
	}
	
	
	/*  
***********************************************************************************************
*
*
* 
*
***********************************************************************************************
*/
	
	public function getJsonForSingleWgt($wgtName = "")
	{
		$this->_widgets = $this->model('Widgets');   
		$wgt = $this->_widgets->findSingleWgt($wgtName);
		echo $wgt;
		
	}
	
/*  
***********************************************************************************************
*
*this controller function  is used to call the methods to create the new wgt files and DB *entry
* 
*
***********************************************************************************************
*/
	
	
	public function wgtCreateWidgetFiles($newWgtName, $newWgtBtns, $newWgtClasses) 
	{
		//echo $newWgtName . " " . $newWgtBtns . " bob " . $newWgtClasses;
		$createClassInstance = $this->wgtModels('wgtCreateWidgetFiles'); 
		$createClassInstance->createWgtModelFile($newWgtName);
		$createClassInstance->createWgtViewFile($newWgtName);
		$createClassInstance->createWgtDBEntry($newWgtName, $newWgtBtns, $newWgtClasses);
	}
	
	/*  
***********************************************************************************************
*
*this controller function  is used to call the methods to create the new POSTS by users
* 
*
***********************************************************************************************
*/
	
	public function wgtCreatePosts()
	{
		if($_POST){
      
			//var_dump($_POST);
			$createPostsInstance = $this->wgtModels('wgtPosts'); 
			$createPostsInstance->createPostEntry($_POST['newPostTitle'], $_POST['newPostContent'], $_POST['newPostImg'],$_POST['newPostType']);
			
    }else{
			echo "there is no POST data passd to the controller file -> failed";
			var_dump($_POST);
		}
		
		
	}
	
	/*  
***********************************************************************************************
*
*this controller function  is used to call the methods to create the new EVENTS by users
* 
*
***********************************************************************************************
*/

	public function wgtCreateEvent()
	{
		if($_POST){
      
			//var_dump($_POST);
			$createEvent= $this->wgtModels('wgtCreateEvent'); 
			$createEvent->createEvent($_POST['newEventTitle'], $_POST['newEventDescription'], $_POST['newEventLocation'],$_POST['newEventContact'],$_POST['newEventUrl'], $_POST['newEventStart'], $_POST['newEventEnd']);
			
    }else{
			echo "there is no POST data passd to the controller file -> failed";
			var_dump($_POST);
		}
		
		
	}
	
	public function wgtUpdateAppOptions()
	{
		if(Input::exists())
		{
      $appOptions = $this->wgtModels('wgtAppOptions');
			
			if($appOptions->updateOptions(Input::get("themeInUse"), Input::get("workspaceTheme"), Input::get("appName")))
			{
				echo "successfully updated options";
			}else{
				echo "Did not update options: error occured: " . var_dump($_POST);
			}
		}
	}
	
	
}
?>