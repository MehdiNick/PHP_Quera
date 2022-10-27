<?php
$CardNumber = "5892101011106123";
//it's garaunteed that our input card number is 16 character long



function formatCardNumber($CardNumber){
	if(ctype_digit($CardNumber)){
	$FormattedCardNumber="";
for($i=0;$i<16;$i=$i+4){
	
	$FormattedCardNumber.=substr($CardNumber, $i,4)." ";
}
$FormattedCardNumber = chop($FormattedCardNumber," ");
return $FormattedCardNumber;
} else{return NULL;}
}


var_dump(formatCardNumber('5892101011106123'));
var_dump(formatCardNumber('5047061044046678'));
var_dump(formatCardNumber('not_a_cardnumber'));
?>