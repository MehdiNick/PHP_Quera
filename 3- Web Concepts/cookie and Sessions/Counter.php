<?php
session_start();

		
$counter=isset($_SESSION["counter"])?$_SESSION["counter"]:0;
$_SESSION["counter"] = ++$counter;
$suffix;
if($counter<4){
if($counter==3){
$suffix="rd";	
}else if($counter==2){
	$suffix="nd";
}else if($counter==1){
	$suffix="st";
}
}else{
$suffix="th";
}


echo "This is your $counter$suffix visit in this session.";


?>