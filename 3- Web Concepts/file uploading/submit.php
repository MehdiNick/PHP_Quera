<?php
if(isset($_POST["sub"])){
	if(isset($_FILES["userFile"])){
$uploadDirectory = "./Files/";
$filename = basename($_FILES["userFile"]["name"]);
$destinationFile = $uploadDirectory . $filename;
echo $destinationFile;
if(move_uploaded_file($_FILES["userFile"]["tmp_name"], $destinationFile)){

	echo " ✅ File Uploaded Successfully ";
}else{
	echo " ❌ File Upload Failed ";
	echo "<br> Error: " .$_FILES["userFile"]["error"];
}

	}



}

?>