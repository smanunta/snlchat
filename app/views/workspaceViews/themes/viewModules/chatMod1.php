<?php
//var_dump($data);
//var_dump($postData->latestPost->results(0)->ID);
 $imgDirectory = "";
//example
//echo $postData->latestPost->results(0)->ID;
?>

	<div id="chatView" class="col-md-12">
		<div class="row">
			<!-- this will be handled by php code through the control panel-->
			<h1 class="ChatHeading">Featured Chat</h1>
		</div>
		<div class="row">
			<div id="chatText" class="col-md-12">

			</div>
		</div>
		<div class="row">
			<form id="chatEntry" class="col-md-12">
				
				<div class="form-group">
					
					<!-- Textarea -->

<div class="form-group">
  <label for="newChatLine"></label>
  <input type="text" class="form-control" rows="5" name="newChatLine" id="newChatLine" placeholder="Enter text here">
</div>
				
				<button type="button" id="sendChatLine" class="btn btn-primary">
							send!
						</button>
			</form>
		</div>
	</div>