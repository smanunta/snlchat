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
        
        <!-- Custom CSS -->
    <link href="/<?php echo $appName->option_value; ?>/app/views/workspaceViews/themes/NovaDays/css/simple-sidebar.css" rel="stylesheet">
         <link href="/<?php echo $appName->option_value; ?>/app/views/workspaceViews/themes/NovaDays/css/design.css" rel="stylesheet">
	</head>
        
        <body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                
                
               <ul id="activeChats" class="nav nav-stacked">
                   
			<li><a><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><h1 class="sideMenuTitle">Active Chats</h1></a></li>
				
			<?php
				foreach($workSpaceData["open_chat"] as $chatObj)
				{
					echo "<li class='menuOption'><a data-chat-id='" .  $chatObj->chat_id . "' data-chat-name='" .  $chatObj->chat_name . "' class='sideNavLink'>" .  $chatObj->chat_name . "</a></li>";
				}
			?>
			
			
		</ul>
                
                <ul class="nav nav-stacked">
			<li><a><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span><h1 class="sideMenuTitle">Tools</h1></a></li>
			<li class='menuOption'><a href="#" class="helperLink" data-toggle="modal" data-target="#myModal" id="createChatRoom">Create Chat Room</a></li>
			<li class='menuOption'><a href="#" class="helperLink" data-toggle="modal" data-target="#enterChatRoomModal">Enter a Room</a></li>
		</ul>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->