<?php
class Token
{
	public static function generate()
	{
		return Session::put(Config::get('session/token_name'), md5(uniqid()));
	}
	
	public static function check($token)  // check if token exists in the session and that it matches 
	{
		$tokenName = Config::get('session/token_name'); // =token
		
		if(Session::exists($tokenName) && $token === Session::get($tokenName))
		{
			Session::delete($tokenName);
			return true;
		}
		
		return false;
	}
}
?>