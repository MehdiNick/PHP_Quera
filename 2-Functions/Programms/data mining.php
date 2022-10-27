<?php

function findPhoneNumbers($string){
$foundedItems = preg_match_all("/(?: |^)(?:09\d{9}|\+9891\d{8})(?: |$)/",$string,$matches);
if($foundedItems!=0){
foreach ($matches[0] as &$value) {
	$value=trim($value);	
};
return $matches[0];
}else{
	return array();
}
}

function findHashtags($string){
$foundedItems = preg_match_all("/(?: |^)#[A-Za-z0-9]{3,}(?: |$)/",$string,$matches);
if($foundedItems!=0){
foreach ($matches[0] as &$value) {
	$value=trim($value);
};
return $matches[0];
}else{
	return array();
}
}

function boldEmails($string){
$foundedItems =preg_match_all("/(?: |^)[\w.]+@\w+[.][a-z]{3}(?: |$)/i",$string,$matches);
if($foundedItems!=0){
$bolded=[];
foreach($matches[0] as &$value){
$value=trim($value);	
$bolded[]="<b>$value</b>";

}
 return str_replace($matches[0],$bolded,$string);
 }else{
	return array();
}
}

/*
print_r(findPhoneNumbers("In shomareye mane: 09101007567 09568 vali behtare +989101007567 ro save koni. In 9111231234 va0914513 kar nemikonan. 09305667042$"));

echo"<hr>";
print_r(findHashtags("hello babe esm shoma #hji56 jki"));
boldEmails("Soalatono az info_test@Quera.ir ya info@Quera123.com ya test_#23@alaki.core beporsid");
echo"<hr>";
var_dump(boldEmails("Soalatono az info_test@Quera.ir ya info@Quera123.com ya test_#23@alaki.core beporsid"));
echo "<br>";
*/

var_dump(findPhoneNumbers("In shomareye mane: 09101007567 vali behtare +989101007567 ro save koni. In 9111231234 va0914513 kar nemikonan."));
echo "1<br>";
var_dump(findPhoneNumbers("dajsfhskdjfhksjh"));echo "2<br>";
var_dump(findPhoneNumbers(" "));echo "<br>";
var_dump(findPhoneNumbers("09305667042 09383291054"));echo "both <br>";
var_dump(findPhoneNumbers("09305667042 09383291054dd"));echo "first<br>";
var_dump(findPhoneNumbers("09305667042 d09383291054"));echo "first<br>";
var_dump(findPhoneNumbers("s09305667042 09383291054"));echo "second<br>";
var_dump(findPhoneNumbers("09305667042s s09383291054"));echo "none <br>";
var_dump(findPhoneNumbers("09305667042, s09383291054"));echo "none<br>";
?>