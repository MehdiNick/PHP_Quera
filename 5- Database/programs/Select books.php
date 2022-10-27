<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "queratest";

$pdo = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql= "SELECT * FROM posts";
$result = $pdo->query($sql);
print_r($result->rowCount());
//print_r($result->fetchAll(PDO::FETCH_ASSOC));


 $sql2 = "SELECT * FROM books WHERE id=:post_id";
       $stmt = $pdo->prepare($sql2);
       $id=123;
       $stmt->bindParam("post_id",$id,PDO::PARAM_INT);
       $stmt->execute();
       if($stmt->rowCount()>0)
        print_r($stmt->fetch(PDO::FETCH_ASSOC));    
    else
        return NULL;



?>