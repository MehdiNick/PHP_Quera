<?php

session_start();
if(!isset($_POST["submit"])){

if(empty($_POST["email"]) || !isset($_POST["email"])){
    echo  "No email!";
}else if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==false){
    echo "Invalid email!";
}else if(empty($_POST["csrf_token"]) || !isset($_SESSION['csrf_token'])|| !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])){
    echo "Invalid token!";

}else{
    echo "Email changed successfully!";
}



}else{
    echo "xxx";
}
?>