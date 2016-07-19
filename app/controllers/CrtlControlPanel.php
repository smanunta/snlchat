<?php 

class CrtlControlPanel extends Controller
{
	public $user;
	
	public function index()
	{
		if(Session::exists('home'))
		{
			echo Session::flash('home');
		}
		
		$user = $this->model('User'); //returns a instantiated class ..in this ex its class User
		$menuData = $this->model('Menus');
		$this->options = new LoadOptions;
		
		//echo $user->data()->username;
		if($user->isLoggedIn())
		{ 
			//load the widget data for the user
			$this->view('crtlPanelViews/topMenu'  , array("allMenuData" =>$menuData, "user" =>$user ));
			$this->view('crtlPanelViews/index'  , array("user" =>$user));	
		}else
		{
			Redirect::to('CrtlLogin');
		}
			// we need to check if logged in  ...if not return to login screen
			// $this->view('home/index'  , array("user" =>$user , "openWidgets" => $open_widgets));	
	}
	
	public function controlPanel()
	{
		if(Session::exists('home'))
		{
			echo Session::flash('home');
		}
		$user = $this->model('User'); //returns a instantiated class ..in this ex its class User
		$menuData = $this->model('Menus');
		//echo $user->data()->username;
		if($user->isLoggedIn())
		{ 
			//load the widget data for the user
			$this->view('crtlPanelViews/topMenu'  , array("allMenuData" =>$menuData, "user" =>$user ));
			$this->view('crtlPanelViews/index'  , array("user" =>$user));	
		}else
		{
			Redirect::to('login');
		}
			// we need to check if logged in  ...if not return to login screen
			// $this->view('home/index'  , array("user" =>$user , "openWidgets" => $open_widgets));	
	}
	
}
?>