<?php

?>

	<div id="createChatView" class="col-md-12">
		<div class="row">
			<!-- this will be handled by php code through the control panel-->
			<h1 class="ChatHeading">Create Chat Room</h1>
		</div>

		<div class="row">
			<form id="createChat" class="col-md-12">


				<!-- Textarea -->

				<div class="form-group">
					<label for="chatName"></label>
					<input type="text" class="form-control" rows="5" name="chatName" id="chatName" placeholder="Enter chatName">
				</div>
				<div class="form-group">
					<label for="bgimg"></label>
					<input type="text" class="form-control" rows="5" name="bgimg" id="bgimg" placeholder="Enter bgimg here">
				</div>

				<button type="button" id="createChatRoom" class="btn btn-primary">
							Create!
						</button>
			</form>
		</div>
	</div>