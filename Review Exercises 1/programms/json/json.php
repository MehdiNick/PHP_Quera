<?php
$filename=$_GET["path"];
$handle=fopen($filename,"r");
$date=strtotime(fgets($handle));
$JsonFormatted=[];
while(!feof($handle)){
$line= fgets($handle);
if(!empty(trim($line))){
	
$colon=strpos($line,":");
$time = date("Y-m-d",strtotime(substr($line,$colon+1),$date));
$JsonFormatted[]=array("user"=>substr($line,0,$colon),"time"=>$time);

}

}
fclose($handle);
file_put_contents("INFO.json", json_encode($JsonFormatted));
?>