<?php

class Book extends Model
{


    public function all()
    {
        $db = Base::getInstance()->get('DB');
$sql = "Select * FROM books;";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql2 = "SELECT authors.id, authors.name,COUNT(books.id) AS number_of_books from authors INNER JOIN books ON authors.id=books.author_id GROUP BY authors.id";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();
$authors = $stmt2->fetchAll();

        $sql3 = "SELECT publishers.id, publishers.name,COUNT(books.id) AS number_of_books from publishers INNER JOIN books ON publishers.id=books.publisher_id GROUP BY publishers.id";
        $stmt3 = $db->prepare($sql3);
        $stmt3->execute();
        $publishers = $stmt3->fetchAll();


        if($stmt->rowCount()>0){
while($row=$stmt->fetch()){
    $author = null;
    foreach ($authors as $val){
        if($val[0]==$row[2]){
            $author = new Author(["id"=>$val[0],"name"=>$val[1],"books_count"=>$val[2]]);
            break;
        }
    }
    $publisher = null;
    foreach ($publishers as $val){
        if($val[0]==$row[3]){
            $publisher = new Publisher(["id"=>$val[0],"name"=>$val[1],"books_count"=>$val[2]]);
            break;
        }
    }

    $result[]= new Book(['id'=>(int)$row[0],"name"=>$row[1],"author"=>$author,"publisher"=>$publisher,"quantity"=>(int)$row[4]]);
}
        }
        return $result;

    }




    public function count()
    {
        $db = Base::getInstance()->get('DB');
        $sql = "SELECT COUNT(id) AS number FROM books;";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row=$stmt->fetch();
        return $row[0];

    }



    public function find($id)
    {
        $db = Base::getInstance()->get('DB');
        $sql = "Select * FROM books where id=:id;";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $sql2 = "SELECT authors.id, authors.name,COUNT(books.id) AS number_of_books from authors INNER JOIN books ON authors.id=books.author_id GROUP BY authors.id";
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();
        $authors = $stmt2->fetchAll();

        $sql3 = "SELECT publishers.id, publishers.name,COUNT(books.id) AS number_of_books from publishers INNER JOIN books ON publishers.id=books.publisher_id GROUP BY publishers.id";
        $stmt3 = $db->prepare($sql3);
        $stmt3->execute();
        $publishers = $stmt3->fetchAll();


        if($stmt->rowCount()>0){
          $row=$stmt->fetch();
                $author = null;
                foreach ($authors as $val){
                    if($val[0]==$row[2]){
                        $author = new Author(["id"=>$val[0],"name"=>$val[1],"books_count"=>$val[2]]);
                        break;
                    }
                }
                $publisher = null;
                foreach ($publishers as $val){
                    if($val[0]==$row[3]){
                        $publisher = new Publisher(["id"=>$val[0],"name"=>$val[1],"books_count"=>$val[2]]);
                        break;
                    }
                }

                return new Book(['id'=>(int)$row[0],"name"=>$row[1],"author"=>$author,"publisher"=>$publisher,"quantity"=>(int)$row[4]]);

        }else{
            Throw new Exception("Book not found");
        }

    }



    public function save()
    {
        $db = Base::getInstance()->get('DB');
            $sql = "UPDATE books SET name=:nam, author_id =:author, publisher_id=:publisher,quantity =:quantity WHERE id=:id;";
            $stmt = $db->prepare($sql);
            $id = $this->attributes['id'];
            $name = $this->attributes['name'];
            $author = $this->attributes['author']->id;
            $publisher = $this->attributes['publisher']->id;
            $quantity = $this->attributes['quantity'];
            $stmt->bindParam(':nam', $name);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':publisher', $publisher);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        $book = $this->find($this->id);
        $this->author = $book->author;
        $this->publisher = $book->publisher;


    }



    public function delete()
    {
        $db = Base::getInstance()->get('DB');
        $sql = "Select * FROM books where id=:id;";
        $stmt = $db->prepare($sql);
        $id= $this->attributes["id"];
        $stmt->bindParam(':id',$id);
        $stmt->execute();





        if($stmt->rowCount()>0){

            $sql2 = "Delete From books Where id=:id;";
            $stmt2 = $db->prepare($sql2);
            $stmt2->bindParam(':id',$id);
            $stmt2->execute();



        }
    }
}

