<?php
class MyError extends Exception{
	function errorMsg(){
		$errorMessage = "Unfortunately there is an error in".$this->getFile().", on line".$this->getLine().".The email ".$this->getMessage()." is not valid";
		return $errorMessage;
	}
}

function checkMail($email){
	if(strpos($email, "@")===false){
		throw new MyError($email);
	}
	echo "Registered!";
}


try{
	checkMail("mhd.nickzgmail.com");
}
catch(MyError $mE){
	echo $mE->errorMsg();
}
?>