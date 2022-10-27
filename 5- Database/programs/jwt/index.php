<?php

require __DIR__ . "/autoload.php";

if(isset($_COOKIE["authorization"])){
$payload= JWT::decode($_COOKIE["authorization"]);	
if($payload){

if(!is_null($payload["user"]) && !is_null($payload["exp"])  ){
	if(time()<=$payload["exp"]){
echo "Welcome ".$payload["user"]."!";
}else{setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();}

}else{
	//wrong JWT
	

setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();
}

}else{ //wrong JWT

	setcookie("authorization", "", time() - 3600);
}
}else{
header("Location: ./login.html");
die();
}