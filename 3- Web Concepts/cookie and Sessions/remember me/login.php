<?php

// TODO: Implement login page handler


if(isset($_POST["username"]) && isset($_POST["password"])){

$username= $_POST["username"];
$correctPassword = '$2y$10$iySI6h4XZgCHw3FxXYb97Oa/8qQOSQkD.U8XgXSDt9RW5Ph.8m6IS';
$correctUsername = "admin";
$key = 'acslgjwhrtt#$%&@@FDHN0.648d6a523';
$hash = hash_hmac('sha256', $username, $key);

if(isset($_COOKIE["token"])){
	if(hash_equals($hash,$_COOKIE["token"])){
header("Location: index.php");
	}}else{



if($username===$correctUsername && password_verify($_POST["password"],$correctPassword)){
 // probably ro prevent timing attack




if(isset($_POST["remember"])){
//cookie
setcookie("token",$hash,time()+604800);
//session_name("ts");
session_set_cookie_params(time()+604800);
session_start();
$_SESSION["ts"] = $hash;


	
}else{
	//session
//session_name("login"); // sets the name of the cookie which contains the related session_id
session_start();
$_SESSION["reg"] = $username;
	
//echo "session strated";
}

header("Location: index.php");







}else{//if the pasword is incorrect
//echo "password or username is incorrect";
//sleep(2);
header("Location: login.html");
}




}

}else{
	header("Location: login.html");
}





?>