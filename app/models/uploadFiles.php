<?php
var_dump($_FILES);
echo $_FILES["file"]["tmp_name"];
if(isset($_FILES["newImageToSubmit"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["newImageToSubmit"]["name"]);
  
$file_extension = end($temporary);
  
if ((($_FILES["newImageToSubmit"]["type"] == "image/png") || ($_FILES["newImageToSubmit"]["type"] == "image/jpg") || ($_FILES["newImageToSubmit"]["type"] == "image/jpeg")
) && ($_FILES["newImageToSubmit"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {  
if ($_FILES["newImageToSubmit"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("images/" . $_FILES["newImageToSubmit"]["name"])) {
echo $_FILES["newImageToSubmit"]["name"] . " <spnewImageToSubmitan id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['newImageToSubmit']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "images/".$_FILES['newImageToSubmit']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["newImageToSubmit"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["newImageToSubmit"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["newImageToSubmit"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["newImageToSubmit"]["tmp_name"] . "<br>";
}
}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}else{echo "note working";}
?>