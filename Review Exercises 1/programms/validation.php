<?php
function validateEmail($email){
$result = preg_match("/^[\w.]*@(\d|[A-Z])*\.[A-Z]{3}$/i", $email);
return preg_check($result);
}

function validatePhone($phoneNumber){
$result = preg_match("/^(09\d{9})$/i", $phoneNumber);
return preg_check($result);
}

function validateNationalCode ($IDNumber){
	if(preg_match("/^(\d{10})$/i",$IDNumber)!==0){
	$A= $IDNumber%10; // the right most digit
	$i1=($IDNumber/1000000000)%10*10;
	$i2=($IDNumber/100000000)%10*9;
	$i3=($IDNumber/10000000)%10*8;
	$i4=($IDNumber/1000000)%10*7;	
	$i5=($IDNumber/100000)%10*6;
	$i6=($IDNumber/10000)%10*5;
	$i7=($IDNumber/1000)%10*4;
	$i8=($IDNumber/100)%10*3;
	$i9=($IDNumber/10)%10*2;
	$ii=[$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9];
	if(count($ii)!==count(array_unique($ii))){
		$B= $i1+$i2+$i3+$i4+$i5+$i6+$i7+$i8+$i9;
	$C= $B%11;
if(($A<2 && $C<2 && $A===$C)|| ($A==11-$C)){
return true;
}else{
	return false;
}
}else{
	return false;
}
	
}else{
	return false;
}

}

function validateCreditCard($CardNumber){
if(preg_match("/^(\d{16})$/i",$CardNumber)!==0){	
$splittedCardNumber = str_split($CardNumber);
$sum=0;
for($i=0;$i<=14;$i+=2){
$p=$splittedCardNumber[$i]*2;
$sum+= ($p<=9) ? $p:($p-9);
}
for($i=1;$i<=15;$i+=2){
$p=$splittedCardNumber[$i];
$sum+= $p;	
}
if(($sum%10)==0)
	return true;
else{
	return false;
}
}else{
	return false;
}
}


function preg_check($result){
	if($result===0)
	return false;
else
	return true;
}
//echo preg_match("/(\s|^)[\w.]*@(\d|[A-Z])*\.[A-Z]{3}(\s|$)/i", "kjsdfhkjsdh@sdfsfdsd5.lkdd");
//echo preg_match("/(\s|^)(09\d{9})(\s|$)/i", " 09305667042");
//echo (8234567895/1000000000)%10;
/*
var_dump(validateEmail('sample@school.edu')); // true
var_dump(validateEmail('invalud@invalid')); // false
*/
/*
var_dump(validatePhone('09215546321')); // true
var_dump(validatePhone('093311111111')); // false
*/

var_dump(validateNationalCode('0023652411')); // true
var_dump(validateNationalCode('1111111111')); // false

/*
var_dump(validateCreditCard('6274129005473742')); // true
var_dump(validateCreditCard('5455332211112235')); // false
*/


?>