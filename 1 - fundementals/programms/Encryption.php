<?php


function encrypt($text,$n){
$n = ($n>=0 && $n<=26)?$n:abs($n%26);
//echo "n is $n <BR>";
$ExplodedText = str_split($text);
$EncryptedExplodedArray = [];
foreach ($ExplodedText as $letter) {
$letterASCII = ord($letter);
	$LowTreshold = ($letterASCII<=90)? 65:97;
	$HighTreshold = ($letterASCII<=90)? 90:122;
//echo "the ASCII CODE is : $letterASCII | LowTreshold: $LowTreshold  | HighTreshold: $HighTreshold | letterASCII + n : ".($letterASCII + $n)."  | The difference:".(($letterASCII + $n)-$HighTreshold);
//echo "<BR>";
	$newLetterASCII = (($letterASCII + $n)<=$HighTreshold) ? ($letterASCII + $n) : ($LowTreshold +(($letterASCII + $n-1)-$HighTreshold));
    $EncryptedExplodedArray[] = chr($newLetterASCII);

}

return Implode($EncryptedExplodedArray);
}

function decrypt($text,$n){
$n = ($n>=0 && $n<=26)?$n:abs($n%26);
//echo "n is $n <BR>";
$ExplodedText = str_split($text);
$EncryptedExplodedArray = [];
foreach ($ExplodedText as $letter) {
$letterASCII = ord($letter);
	$LowTreshold = ($letterASCII<=90)? 65:97;
	$HighTreshold = ($letterASCII<=90)? 90:122;
//echo "the ASCII CODE is : $letterASCII | LowTreshold: $LowTreshold  | HighTreshold: $HighTreshold | letterASCII + n : ".($letterASCII + $n)."  | The difference:".(($letterASCII + $n)-$HighTreshold);
//echo "<BR>";
	$newLetterASCII = (($letterASCII - $n)>=$LowTreshold) ? ($letterASCII - $n) : ($HighTreshold -($LowTreshold-($letterASCII - $n+1)));
    $EncryptedExplodedArray[] = chr($newLetterASCII);

}

return Implode($EncryptedExplodedArray);
}

echo "ZDKhdflgsdhfos";
echo "<BR>";
echo encrypt("ZDKhdflgsdhfos", 3);
echo "<BR>";
echo "CGNkgiojvgkirv";
echo "<BR>Decrypt:<BR>";
echo decrypt("CGNkgiojvgkirv",3);
echo "<HR>";


echo "lxfjgnskudfsgSDYFDLGJBGSDFGBSFLJGBSFgblsglsdfbgslfdgbslkgbsdlgksdbg";
echo "<BR>";
echo encrypt("lxfjgnskudfsgSDYFDLGJBGSDFGBSFLJGBSFgblsglsdfbgslfdgbslkgbsdlgksdbg", 44);
echo "<BR>";
echo "dpxbyfkcmvxkyKVQXVDYBTYKVXYTKXDBYTKXytdkydkvxtykdxvytkdcytkvdyckvty";
echo "<BR>Decrypt:<BR>";
echo decrypt("dpxbyfkcmvxkyKVQXVDYBTYKVXYTKXDBYTKXytdkydkvxtykdxvytkdcytkvdyckvty",44);
echo "<HR>";

echo "HelloWorld";
echo "<BR>";
echo encrypt("HelloWorld", 20);
echo "<BR>";
echo "ByffiQilfx";
echo "<BR>Decrypt:<BR>";
echo decrypt("ByffiQilfx",20);
echo "<HR>";
echo "<HR>";



?>