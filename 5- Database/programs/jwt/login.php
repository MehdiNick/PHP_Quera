<?php

require __DIR__ . "/autoload.php";

if(isset($_COOKIE["authorization"])){
$payload= JWT::decode($_COOKIE["authorization"]);	
if($payload){

if(!is_null($payload["user"]) && !is_null($payload["exp"])){
	if(time()<=$payload["exp"]){
header("Location: ./index.php");
die();
}else{setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();}
}else{
	//wrong JWT
	
setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();
}

}else{ //wrong JWT
	
	setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();
}
}else{

if(isset($_POST["username"]) && isset($_POST["password"])){
	$pass =$_POST["password"];
	$username = $_POST["username"];
//---------- connecting to database---------	
$host="localhost";
$dbusername="root";
$dbpas= "";
$dbname="digikala";

$db = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpas);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql= "Select password from users where username=:user";
$stmt = $db->prepare($sql);
$stmt->bindParam(":user",$username);
$stmt->execute();

       if($stmt->rowCount()>0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
if(password_verify($pass, $result["password"])){
echo "Sd";
$exp=0;
if(isset($_POST["remember"])){
	$exp = Config::getInstance()->get("extended_exp");
	echo "checked";
}else{
	$exp = Config::getInstance()->get("default_exp");
	echo "Not checked";
}
$payload= ["user"=>$username,"exp"=>time()+$exp];
$jwtToken = JWT::encode($payload);
setcookie("authorization",$jwtToken,time()+$exp);

header("Location: ./index.php");
die();

}else{

	setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();
}

}else{

setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();
}
}else{

setcookie("authorization", "", time() - 3600);header("Location: ./login.html");
die();
}
}

?>
