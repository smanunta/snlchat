<?php 

class CtrlPublic extends Controller
{
	public $user;
	private $configContents, $themeInUse;
	
	public function __construct()
	{
		//check if a user is logged in. if one is redirect to workspace else show splash page
		$user = $this->model('User'); //returns a instantiated class ..in this ex its class User
		$menuData = $this->model('Menus');
		//echo $user->data()->username;
		
		$this->options = new LoadOptions;
		
		
		if($user->isLoggedIn()) //posibly do something here if the user is logged in ...right now nothing special
		{ 
			//Redirect::to('CrtlWorkspace/index');
				//get the THEME currently active from the LoadOptions class  
			//var_dump($this->options->options->results());
				$this->themeInUse = LoadOptions::searchResultsForSpecificOption("themeInUse"); 
				if($configFile = @file_get_contents("../app/views/publicViews/themes/" . $this->themeInUse ."/config.json"))
				{
					/*******************************************************************************
					* $configContents will be an array that will include the JSON data which 
					* we can use to target specific parts of it based on what is needed 
					*
					*****************************************************************************/
					$this->configContents = json_decode($configFile, true);
				}
		}else
		{
				//get the THEME currently active from the LoadOptions class  
			
			//var_dump($this->options->options->results());
			$this->themeInUse = LoadOptions::searchResultsForSpecificOption("themeInUse"); 
			if($configFile = @file_get_contents("../app/views/publicViews/themes/" . $this->themeInUse ."/config.json"))
			{
				/*******************************************************************************
				* $configContents will be an array that will include the JSON data which 
				* we can use to target specific parts of it based on what is needed 
				*
				*****************************************************************************/
				$this->configContents = json_decode($configFile, true);
			}
		}
		
		
	}
	
	public function index($theme = '')
	{
    if($this->configContents != NULL)
		$this->loadPageStructure("INDEX_STRUCTURE");
		else{
			$this->view("publicViews/themes/" . $this->themeInUse ."/index", array());	
		}
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
}
?>