<?php
function formatPhoneNumber($number){

$firstTwoDigits = substr($number,0,2);

if ($firstTwoDigits=="09"){
	$CorrectNumberFormat = "+98" . substr($number, 1,11);
	return $CorrectNumberFormat;
}else{return Null;}


}

?>