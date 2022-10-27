<?php

function isPrime($n)
{
    $Isit = TRUE;
    $half=(int)($n/2);
 echo abs($n)."|";
    if(!(abs($n)<=1)){
for($i=2;$i<=$half;$i++){

if($n%$i==0){
  $Isit= FALSE;
    break;
}    
}
}else{
	$Isit= FALSE;
}
return $Isit;
}


echo isPrime(56)?"Prime":"Not Prime";
echo "<br>";

echo isPrime(53)?"Prime":"Not Prime";
echo "<br>";


echo isPrime(37)?"Prime":"Not Prime";
echo "<br>";

echo isPrime(63)?"Prime":"Not Prime";
echo "<br>";
echo isPrime(1)?"Prime":"Not Prime";
echo "<br>";
echo isPrime(0)?"Prime":"Not Prime";
echo "<br>";
echo isPrime(2)?"Prime":"Not Prime";
echo "<hr>";
echo isPrime(0)?"Prime":"Not Prime";
?>
