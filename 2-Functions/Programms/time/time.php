<?php

function DaysUntil($string){
$Date1=strtotime("2018-10-12");
$Date2 = strtotime($string);
if($Date2<$Date1)
	echo "gone";
else
	echo ($Date2-$Date1)/86400;
}

DaysUntil("2018-10-13");
?>