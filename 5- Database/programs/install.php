<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "queratest";

try{
    $pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL)";
    $pdo->exec($sql);
    echo "users table created.";
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>

CREATE TABLE books(
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author_name VARCHAR(255) NOT NULL,
    publisher_name VARCHAR(255) NOT NULL,
    demo Text NOT NULL)