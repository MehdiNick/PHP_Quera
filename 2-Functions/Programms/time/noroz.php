<?php

function DaysUntilNoroz($string){
    
    	$days=0;
    if($string!=Null && $string!=""){
	$exploded_Dates = explode("/", $string);
	if($exploded_Dates[1]<=6){
		$days = ((7-$exploded_Dates[1])*31 + 180)-$exploded_Dates[2];
	}else if($exploded_Dates[1]<=11){
		
		$days = ((12-$exploded_Dates[1])*30)-$exploded_Dates[2]+30;
	}else if ($exploded_Dates[1]=12){
		$days = 30-$exploded_Dates[2];
	}
    }
	echo $days;
	
}

DaysUntilNoroz("1396/12/01");
?>