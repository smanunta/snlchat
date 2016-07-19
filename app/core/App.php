<?php
class App
{
	protected $controller = 'CtrlPublic';
	
	protected $method = 'index'; //this is the default method
	
	protected $params = array();
	
	public function __construct()
	{
		$url = $this->parseUrl();
		
		if(file_exists('../app/controllers/' . $url[0] . '.php'))
		{
			
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once "../app/controllers/" . $this->controller .".php";
		$this->controller = new $this->controller;  //new instance of the controller plus the extension  -> default = CrtlPublic
		
		if(isset($url[1]))  // if the method for the called controller exist  -> call the method -> default = index
		{
			if(method_exists($this->controller, $url[1]))  //checking if the method exists in the object controller 
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		$this->params = $url ? array_values($url) : array(); //since we are unsetting the controller and methods from the $url ...by the time we get here the only parts of $url left are the $params
		
		call_user_func_array(array($this->controller,$this->method), $this->params);
	}
	
	public function parseUrl()
	{
		if(isset($_GET['url']))	
		{
			return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}
?>