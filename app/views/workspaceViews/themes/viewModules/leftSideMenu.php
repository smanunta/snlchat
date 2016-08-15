<?php
	$workSpaceData = CrtlWorkspace::$_WorkspaceData;
	$appName = HelperClass::findObjInArrayByObjVal($workSpaceData,"appOptions",  "option_name", "appName");
	$themeInUse =  HelperClass::findObjInArrayByObjVal($workSpaceData,"appOptions",  "option_name", "workspaceTheme");
	//open chats, notes, create room, acct mangemnt, title for menu =workspace
?>
<!-- Side Menu--->
	<div id="sideMenu" class="sideMenu closed">
		<div class="container-fluid">
			<a id="openCloseSideMenuBtn"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
		
		
		<ul id="activeChats" class="nav nav-stacked">
			<li><a><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><h1>Active Chats</h1></a></li>
				
			<?php
				foreach($workSpaceData["open_chat"] as $chatObj)
				{
					echo "<li class='menuOption'><a data-chat-id='" .  $chatObj->chat_id . "' data-chat-name='" .  $chatObj->chat_name . "' class='sideNavLink'>" .  $chatObj->chat_name . "</a></li>";
				}
			?>
			
			
		</ul>
		 
		<ul class="nav nav-stacked">
			<li><a><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span><h1>Tools</h1></a></li>
			<li class='menuOption'><a href="#" class="helperLink" data-toggle="modal" data-target="#myModal" id="createChatRoom">Create Chat Room</a></li>
			<li class='menuOption'><a href="#" class="helperLink" data-toggle="modal" data-target="#enterChatRoomModal">Enter a Room</a></li>
		</ul>
		
	</div>