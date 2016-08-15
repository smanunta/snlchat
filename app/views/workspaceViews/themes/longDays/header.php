<?php
		$workSpaceData = CrtlWorkspace::$_WorkspaceData;
		$appName = HelperClass::findObjInArrayByObjVal($workSpaceData,"appOptions",  "option_name", "appName");
		$themeInUse =  HelperClass::findObjInArrayByObjVal($workSpaceData,"appOptions",  "option_name", "workspaceTheme");
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title><?php echo $appName->option_value; ?></title>
		<link rel="stylesheet" href="/<?php echo $appName->option_value; ?>/public/css/publicIndexDesign.css">
		<link rel="stylesheet" href="/<?php echo $appName->option_value; ?>/public/css/bootstrap-3.3.5-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="/<?php echo $appName->option_value; ?>/app/views/workspaceViews/themes/<?php echo $themeInUse->option_value; ?>/css/design.css">
		<link rel="stylesheet" href="/<?php echo $appName->option_value; ?>/app/views/workspaceViews/themes/viewModules/viewModules.css">
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
		<meta charset="utf-8">
		<meta name='viewport' content='width=device-width, initial-scale=1'>
	</head>

		
		
	<div id="wrapper">
		<!--<nav class="navbar publicNav navbar-static-top">
			<div class="container">
				<!-- Title or logo --
				<div class='navbar-header'>
					<a href='/<?php echo $appName->option_value; ?>/public/' class='navbar-brand'><h1 id="topOfLogo">Workspace</h1><h2 id="bottomOfLogo">chat App</h2></a>
				</div> 

				<!-- Side Menu BTN---
				<ul class="nav navbar-nav navbar-right">
					<li class="px20TopPadd"><a href="#sideMenu" id="sideMenuBtn"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a></li>
				</ul>

			</div>

		</nav>-->
		
		