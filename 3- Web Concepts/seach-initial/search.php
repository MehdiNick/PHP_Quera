<?php

//TODO: write your code here
if(isset($_POST["keyword"]) && !empty($_POST["keyword"])){
	if(isset($_FILES["file"])){
		$destinationFile = "./".basename($_FILES["file"]["name"]);
		move_uploaded_file($_FILES["file"]["tmp_name"], $destinationFile);
		$content = file_get_contents($destinationFile);
if(!empty($content)){

$line = explode("\n",$content);
///print_r($line);
$toFind = $_POST["keyword"];

$matchedLines=[];
for($i=0; $i<count($line);$i++){
$start = 0;
if(strpos($line[$i],$toFind,$start)!== false){
$matchedLines[]=$i+1;
}


}
$jsonMatchedLine = json_encode($matchedLines);
echo $jsonMatchedLine;
}

	}
}

?>