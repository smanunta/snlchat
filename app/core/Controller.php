<?php
class Controller
	{
	 
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model();
	} 
	
	public function wgtModels($model)
	{
		require_once '../app/models/wgtModels/' . $model . '.php';
		return new $model();
	} 
    
    public function modModels($model)
	{
		require_once '../app/models/modModels/' . $model . '.php';
		return new $model();
	} 
	
	 public function pubModels($model)
	{
		require_once '../app/models/pubModels/' . $model . '.php';
		return new $model();
	} 
	
	 public function pageModels($model)
	{
		require_once '../app/models/pageModels/' . $model . '.php';
		return new $model();
	} 
	
	public function view($view, $data = array())
	{
		require_once '../app/views/'. $view .'.php';
	}
}
?>