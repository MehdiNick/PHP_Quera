<?php
function getMark($mark){
	if($mark<0){
		throw new Exception("the mark can't be nagative");
		
	}

	return $mark;
}

echo getMark(5);
//echo getMark(-10);

try{
	echo getMark(-10);
	echo getMark(20);// this won't be excuted since we have already got an error in this try block
	echo "<br>there is no problem<br>"; // only will be executed when there is NO ERROR
}
catch(Exception $e){
echo $e->getMessage();
}


try{
	echo getMark(-10);
	echo getMark(-20);
	echo "<br>there is no problem<br>";
}
catch(Exception $e){
echo "<br>".$e->getMessage();
}

// when not using catch, the error will stop the whole programm and the codes below it won't run


?>