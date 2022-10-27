<?php
function scientific_notation($number){
	$i=0;
	if(abs($number)>=1){

$intnumber=(int)abs($number);
while ($intnumber>=10){
	$i++;
$intnumber = $intnumber/10;
}
$number *= pow(10,-$i);
echo $number."e$i";

}
else if($number<1 && $number!=0){
while (abs($number)<1 ){
	$i--;
$number = $number*10;
}

echo $number."e$i";
}else{
	echo "0";
}

}
$number = readline();
scientific_notation($number);
 scientific_notation(0.56);echo"<BR>";
scientific_notation(9.45);echo"<BR>";
scientific_notation(-134.56);echo"<BR>";
scientific_notation(325);echo"<BR>";
scientific_notation(0);echo"<BR>";
scientific_notation(-0);echo"<BR>";
scientific_notation(+0);echo"<BR>";
scientific_notation(500.0);echo"<BR>";
?>