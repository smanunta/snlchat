<?php
	//$data[]  includes the data passed here
$note = $data['wgtdata'];
//echo $note->_wgtID;  //hold the id ...pased here by the controller
$noteData = $note->findUsersNotes();
//print_r($noteData);
?>
<div class="jumbotron">
	<h2><?=$noteData[0]->note_title?></h2>
	<p>
		<?=$noteData[0]->note_content?>
	</p>
</div>


