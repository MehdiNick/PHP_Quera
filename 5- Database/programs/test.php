<?php
$database="queratest";
$host = "localhost";
$username="root";
$password="";

try{
$pdoConn = new PDO("mysql:host=$host;dbname=$database",$username,$password);
$pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
die("ERROR : Could not connect".$e->getMessage());

}
?>