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
//$sql = "INSERT INTO books(id,title,author_name, publisher_name, demo) Values(?,?,?,?,?);"
$sql = "INSERT INTO books(id,title,author_name, publisher_name, demo) Values(:id,:title,:author,:publisher,:demotext);";
$stmt = $this->db->prepare($sql);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":title",$title);
$stmt->bindParam(":author",$author_name);
$stmt->bindParam(":publisher",$publisher_name);
$stmt->bindParam(":demotext",$demo);

$stmt->execute();
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
    123,
    "Man's Search for meaning",
    "Victor Frankl", "Verlag für Jugend und Volk",
    "eveyrthing"
);