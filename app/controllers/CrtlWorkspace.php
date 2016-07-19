<?php 

class CrtlWorkspace extends Controller
{
	public $user;
	public static $_WorkspaceData = array();
	private $configContents, $_db;
	public function __construct()
	{
		/**********************************************************************************
		*
		*LOAD all necessary user data here to use in the workspace into a JSON file
		*include: user model, open chats, user notes
		*if user is looged in use createJsonDataForUserLoggedIn() to load rest of needed data into JSON file
		*
		*********************************************************************************/
		$this->_db = DB::getInstance();
		
		$queryForChatRooms = "SELECT * FROM chat_rooms";
		self::$_WorkspaceData['chatRooms'] = $this->_db->query($queryForChatRooms)->results();
		
		//check if a user is logged in. if one is redirect to workspace else show splash page
		$this->user = $this->model('User'); //returns a instantiated class ..in this ex its class User
		//$menuData = $this->model('Menus');
		//echo $user->data()->username;
		if($this->user->isLoggedIn())
		{ 
			
			if($this->queryDataForLoggedInUser())
			{
				
				//this returns an obj
				$themeInUse =  HelperClass::findObjInArrayByObjVal(self::$_WorkspaceData,"appOptions",  "option_name", "workspaceTheme");
				//now we can load the open chats menu and notes menu so basically the menu
				// load the page since user is logged in
				//get the THEME currently active from the LoadOptions class  
				//var_dump($this->options->options->results());
				if($configFile = file_get_contents("../app/views/workspaceViews/themes/" . $themeInUse->option_value ."/config.json"))
					{
						/*******************************************************************************
						* $configContents will be an array that will include the JSON data which 
						* we can use to target specific parts of it based on what is needed 
						*
						*****************************************************************************/
						$this->configContents = json_decode($configFile, true);
					}
			}else{
				echo "neccessary data was unable to load";
			}
		}else
			{
				Redirect::to('CrtlLogin');
			}
	}
	
	public function index($theme = '')
	{
		$this->loadPageStructure("INDEX_STRUCTURE");
		//get theme JSON data from the theme folder if not config.json is found
		// it will TRY to load the header index footer files
	}
	
	public function loadPage($pageToLoad)
	{
		//if there is a model needed call it here
		$pageData = $this->pageModels($pageToLoad);  
		
		$this->view('publicViews/pages/header4Pages', array('postData' => "postData"));
		
		$this->view('publicViews/pages/'. $pageToLoad, array('postData' => "postData"));
		
		$this->view('publicViews/pages/footer4Pages', array('postData' => "postData"));
	}
	
	
	/*********************************************************************
	* getdataforajax will refresh data using ajax 
	* this will return JSON data
	*FOR PAGES ONLY
	***********************************************************************/
	public function getDataForAjax($modelName, $modelFunction)
	{
			$pageData = $this->pageModels($modelName)->$modelFunction();  
	}
	
	public function loadPageStructure($structureFromJSON)
	{
		//var_dump($this->configContents["MODELS_NEEDED"]["pubModels"]);
		foreach($this->configContents["MODELS_NEEDED"] as $modelCategory => $modelToLoad)
		{
			switch($modelCategory)
			{
				case "pubModels":
					$data = $this->pubModels($modelToLoad);  
				break;
				case "wgtModels":
					$data = $this->wgtModels($modelToLoad);  
				break;
				case "modModels":
					$data = $this->modModels($modelToLoad);  
				break;
				case "model":
					$data = $this->model($modelToLoad);  
				break;
			}
		}
		foreach($this->configContents[$structureFromJSON] as $structure)
		{
			$this->view($structure['file'], array('postData' => $data));	
		}
	}
	
	public function queryDataForLoggedInUser()
	{
		//do a query to get all info, we have $user avail
		//$this->_db = DB::getInstance();
		
		//enter the open chats info first, then notes
		$queryForOpen_Chats = "SELECT open_chats.*, chat_rooms.* FROM open_chats, chat_rooms WHERE open_chats.user_id = ". $this->user->data()->user_id ." AND open_chats.chat_id = chat_rooms.chat_id";
		$queryForNotes = "SELECT * FROM notes WHERE user_id = '" . $this->user->data()->user_id . "'";
		
				if(self::$_WorkspaceData['userData'] = $this->user->data())
				{
					//Load the LoadOptions class  
					if(self::$_WorkspaceData['appOptions'] = new LoadOptions)
					{
						self::$_WorkspaceData['appOptions'] = LoadOptions::$options;
						if(self::$_WorkspaceData['open_chat'] = $this->_db->query($queryForOpen_Chats)->results())
						{}else
								self::$_WorkspaceData['open_chat'] = "no currently Opened chats";							
						return true;
					}
					
				}else{
			return false;
		}
		
		
		
	}
	
	public function dataInJsonFormatForJs()
	{
		self::$_WorkspaceData['userData']->salt = utf8_encode(self::$_WorkspaceData['userData']->salt);
		$json  = json_encode(self::$_WorkspaceData); //json_encode(self::$_WorkspaceData);
		
/*  ERROR CHECKING IF JSON DOES NOT WORK 
***************************************
if ($error = json_last_error_msg()) {
   echo "the last json msg was, error: ". $error;
} else{var_dump($json);}*/

		echo $json;
		//var_dump($json);
		//echo json_last_error();
	}
	
/**********************************************************************************************
*
*
*
*
***********************************************************************************************/
	
	public function loadTheChatView($wgtData = "") //RUNS FOR EVERY INSTANCE OF A WIDGET
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
	
	
	/**********************************************************************************************
*
*
*
*
***********************************************************************************************/
	
	public function getChatLines()
	{
		if(Input::exists())
		{
			//echo"post set test";
			
			//$query = "SELECT * FROM chat_msgs WHERE ". $_POST['timestamp']." > UNIX_TIMESTAMP()"
			$query = "SELECT chats_msgs.*, users.first, users.last FROM chats_msgs, users WHERE chats_msgs.user_id = users.user_id AND chat_id = ". $_POST['chatId'] . " ORDER BY timestamp ASC";
			$resultObj = $this->_db->query($query);
			
			echo json_encode($resultObj->results());
			
		  //var_dump($resultObj->results());
		}else{
			echo"post not set";
		}
	}
	
	public function sendChatLine()
	{
		if(Input::exists())
		{
			$rightNow = date("Y-m-d H:i:sa");
			//echo"post set test";
			$data['chat_id'] = $_POST['chatId'];
			$data['timestamp'] =$rightNow;
			$data['msg'] = $_POST['msg'];
			$data['user_id'] = $_POST['user_id'];
			
			//echo $data['chat_id'] . ", " . $data['timestamp']. ", " .$data['msg']. ", " .$data['user_id'];
			$insert = $this->_db->insert("chats_msgs", $data);
			
		  var_dump($insert);// will be true or false depending on wheter it workinked or not
		}else{
			echo"post not set";
		}
	}
	
	public function getRestChatLines()
  {
		if(Input::exists())
		{
			//echo"post set test";
			
			$query = "SELECT chats_msgs.*, users.first, users.last FROM chats_msgs, users WHERE chats_msgs.user_id = users.user_id AND chat_id = ". $_POST['chatId'] . " AND chats_msgs.msg_id > ". $_POST['lastChatContactId'] . " ORDER BY timestamp ASC";
			
			$resultObj = $this->_db->query($query);
			
			echo json_encode($resultObj->results());
			
		  //var_dump($resultObj->results());
		}else{
			echo"post not set";
		}
	}
	
	public function createNewChatRoom()
	{
			if(Input::exists())
		{
			$rightNow = date("Y-m-d H:i:sa");
			//echo"post set test";
			
			$data['created'] = $rightNow;
			$data['bgimg'] = $_POST['newChatBgimg'];
			$data['chat_name'] = $_POST['newChatRoomName'];
			$data['creator_user_id'] = $this->user->data()->user_id;
			
			//echo $data['chat_id'] . ", " . $data['timestamp']. ", " .$data['msg']. ", " .$data['user_id'];
			$insert = $this->_db->insert("chat_rooms", $data);
			
		  echo $insert;// will be true or false depending on wheter it workinked or not
		}else{
			echo"post not set";
		}
	}
	
	public function enterChatRoom()
	{
		if(Input::exists())
		{
			$rightNow = date("Y-m-d H:i:sa");
			//echo"post set test";
			$data['chat_id'] = $_POST['chatId'];
			$data['opened_date'] =$rightNow;
			$data['user_id'] = $this->user->data()->user_id;
			
			//echo $data['chat_id'] . ", " . $data['timestamp']. ", " .$data['msg']. ", " .$data['user_id'];
			$insert = $this->_db->insert("open_chats", $data);
			
		  echo($insert);// will be true or false depending on wheter it workinked or not
		}else{
			echo"post not set";
		}
	}
}
?>