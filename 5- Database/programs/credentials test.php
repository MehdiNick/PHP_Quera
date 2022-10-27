<?php

function isValidCredentials($host, $username, $password, $db_name)
{
	try{
    $Conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return true;
}
catch(PDOException $e){
	return false;
}
}


?>