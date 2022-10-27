<?php

class Books
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add($id, $title, $author_name, $publisher_name, $demo)
    {
$sql = "INSERT INTO books VALUES ($id,\"$title\",\"$author_name\",\"$publisher_name\",\"$demo\")";
$this->db->exec($sql); 

    }
}

$host = "localhost";
$username = "root";
$password = "";
$dbname = "queratest";

$pdo = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$books = new Books($pdo);
$books->add(
    6532196,
    "Grokking Algorithms",
    "Aditya Y. Bhargava", "Manning",
    "Grokking Algorithms is a fully illustrated,
    friendly guide that teaches you how to apply
    common algorithms to the practical problems
    you face every day as a programmer."
);