<?php
session_start();
if(isset($_COOKIE["token"])){
	if(hash_equals($_SESSION["ts"],$_COOKIE["token"])){

echo "Hello from Quera!";

}else{
header("Location: login.html");	
}

}else if(isset($_SESSION["reg"])){

echo "Hello from Quera!";
}else{

//echo "redirecting to login...";

header("Location: login.html");
}


?>
