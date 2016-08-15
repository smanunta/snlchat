<?php
//echo $data['template'];
//var_dump($data['user']);  making sure the user data gets passed
//$data['openWidgets']

$appName = LoadOptions::searchResultsForSpecificOption("appName"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ticket Handler</title>
	<link rel="stylesheet" href="/snlchat/public/css/design.css">
		<link rel="stylesheet" href="/snlchat/public/css/bootstrap-3.3.5-dist/css/bootstrap.min.css">
	
  <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <meta charset="utf-8">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
    
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>
		tinymce.init({
		selector: "div.new_note",
		theme: "modern",
		plugins: [
			["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"],
			["searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking"],
			["save table contextmenu directionality emoticons template paste"]
		],
		add_unload_trigger: false,
		schema: "html5",
		inline: true,
		toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image     | print preview media",
		statusbar: false
	});

	tinymce.init({
		selector: "h1.edit",
		theme: "modern",
		add_unload_trigger: false,
		schema: "html5",
		inline: true,
		toolbar: "undo redo",
		statusbar: false
	});
	</script> 

		<!--main content-->
	<div id="main_content">
		
	</div>
		
	<!-- Modals -->
	<div id="modals_content">
		
	</div>
		
	
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="/<?=$appName?>/public/css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	<script src="/<?=$appName?>/app/models/wgtBtnObjs.js"></script>
	<script src="/<?=$appName?>/app/models/modFuncs.js"></script>
	<script src="/<?=$appName?>/app/models/wgtFuncs.js"></script>
	<script src="/<?=$appName?>/app/models/jsOnLoad.js"></script>
	
	</body>
</html>