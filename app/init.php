<?php
//session_save_path("/home/users/web/b966/ipg.josesebastianmanunta/cgi-bin/tmp");
session_start();

require_once 'core/App.php';  //includes the App class
require_once 'core/Controller.php'; //includses the Controller class

$GLOBALS['config']= array (
	'mysql' => array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'db' => 'snlchat1'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => '604800'
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	),
);

spl_autoload_register(function($class){   //loads a bunch of classes ...might not want to load all(future thoughts)
	require_once 'models/' . $class . '.php';
});
?>