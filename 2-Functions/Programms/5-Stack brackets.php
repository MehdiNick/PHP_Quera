<?php
$string = readline();
$Correct=true;
if($string!="" && $string!=Null){
    $OpenedBrackets = [];
$stringArray = str_split($string);

foreach($stringArray as $letter){
if($letter=="{" || $letter=="(" || $letter=="["){
    array_push($OpenedBrackets,$letter);
}
elseif ($letter=="}" || $letter==")" || $letter=="]") {
   
	if(end($OpenedBrackets)==OpeningBracketSpecifier($letter)){
		array_pop($OpenedBrackets);
	}
	else{
	    $Correct=false;
		break;
	}
	
}
}
}
if(empty($OpenedBrackets) && $Correct)
    echo "YES";
else
    echo "NO";
    
//print_r($OpenedBrackets);





//-----------------------------------------------------------


function OpeningBracketSpecifier($b){
	switch ($b) {
		case ')':
			return "(";
			break;
		case '}':
			return "{";
			break;
		default:
			return "[";
			break;
	}
}


?>