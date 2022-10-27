<?php
function repeatInString($string,$needle){
	$n=0;
if(!is_null($string) && !is_null($needle)){
	if($string!="" && $needle!=""){
		$offset = strlen($string)-1;
		$length = strlen($needle);
		for($i=0;$i<=$offset;$i++){
			if(stripos(substr($string, $i,$length), $needle)!== False)
				$n++;
		}

	}
}
return $n;	
}






echo repeatInString('salam', 'sal'); // 1
echo repeatInString('golgoli', 'gol'); // 2
echo repeatInString('sasasas', 'sas'); // 3
echo repeatInString("","");
echo repeatInString(Null,Null);


?>