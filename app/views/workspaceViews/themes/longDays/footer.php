<?php
		
		 $workSpaceData = CrtlWorkspace::$_WorkspaceData;
		$appName = HelperClass::findObjInArrayByObjVal($workSpaceData,"appOptions",  "option_name", "appName");
		$themeInUse =  HelperClass::findObjInArrayByObjVal($workSpaceData,"appOptions",  "option_name", "workspaceTheme");
?>
	</div>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create Chat Room</h4>
				</div>
				<div class="modal-body">
					
					<div class="row">
						<form id="createChat" class="col-md-12">
							<!-- Textarea -->

							<div class="form-group">
								<label for="newChatRoomName"></label>
								<input type="text" class="form-control" rows="5" name="newChatRoomName" id="newChatRoomName" placeholder="Enter Chat Room Name">
							</div>
							<div class="form-group">
								<label for="newChatBgimg"></label>
								<input type="text" class="form-control" rows="5" name="newChatBgimg" id="newChatBgimg" placeholder="Enter bgimg name here">
								<p class="help-block">there are only a few imgs avail, enter the exact name of img which are : snl , land1 , land2</p>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="createChatRoomBtn" class="btn btn-primary">
							Create!
							</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

<!-- Modal -->
	<div id="enterChatRoomModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Enter Chat Rooms</h4>
				</div>
				<div class="modal-body">
					
					<?php 
					foreach($workSpaceData['chatRooms'] as $chatRoom)
					{
					 //var_dump($chatRoom);
						echo "<li class='menuOption'><a class='enterNewChatRoom sideNavLink' data-chat-id='" .  $chatRoom->chat_id . "' data-chat-name='" .  $chatRoom->chat_name . "'>" .  $chatRoom->chat_name . "</a></li>";
					}
					?>
					
					
				</div>
				<div class="modal-footer">
				
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="/<?php echo $appName->option_value; ?>/public/css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	<script src="/<?php echo $appName->option_value; ?>/app/models/loadChats.js"></script>
	<script src="/<?php echo $appName->option_value; ?>/app/views/workspaceViews/themes/<?php echo $themeInUse->option_value; ?>/js/jsOnLoad.js"></script>
	</div>
	</body>

	</html>