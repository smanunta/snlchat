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
		<link rel="stylesheet" href="/<?php echo $appName->option_value; ?>/public/css/font-awesome-4.6.3/css/font-awesome.min.css">
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
                      <i class="fa fa-tachometer" aria-hidden="true"></i> SNLChatApp
                    </a>
                </li>


								<h2 class="text-center">By <span class="jsmSignature">JSM</span></h2>

               <ul id="activeChats" class="nav nav-stacked">

			<li class="sideMenuTitle"><a><i class="fa fa-comment" aria-hidden="true"></i> Active Chats</a></li>

			<?php
				foreach($workSpaceData["open_chat"] as $chatObj)
				{
					echo "<li class='menuOption'><a data-chat-id='" .  $chatObj->chat_id . "' data-chat-name='" .  $chatObj->chat_name . "' class='sideNavLink'><i class='fa fa-plus-square-o' aria-hidden='true'></i> " .  $chatObj->chat_name . "</a></li>";
				}
			?>


		</ul>

                <ul class="nav nav-stacked">
			<li class="sideMenuTitle"><a><i class="fa fa-folder-open" aria-hidden="true"></i> Tools</a></li>
			<li class='menuOption'><a href="#" data-toggle="modal" data-target="#myModal" id="createChatRoom"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Create Chat Room</a></li>
			<li class='menuOption'><a href="#" data-toggle="modal" data-target="#enterChatRoomModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Enter a Room</a></li>
		</ul>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
