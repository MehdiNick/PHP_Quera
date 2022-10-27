<?php

class Author extends Model
{
    public function all()
    {
$sql="SELECT jj.id,jj.name , COUNT(jj.book_id) FROM (SELECT authors.id,authors.name,books.id as book_id FROM authors INNER JOIN books On authors.id=books.author_id) jj GROUP By(jj.id);";
        $result = Base::getInstance()->get('DB')->prepare($sql);
        $result->execute();
       $results=[];
        if($result->rowCount()>0) {
            while ($row = $result->fetch()) {
            $results[]= new Author(["id"=>$row[0],"name"=>$row[1],"books_count"=>$row[2]]);
            }
        }
    return $results;
    }

    public function count()
    {

        $sql = 'SELECT COUNT(DISTINCT author_id) AS authors_count FROM books';
        $result = Base::getInstance()->get('DB')->prepare($sql);
        $result->execute();
        $count = $result->fetchColumn();

        return $count;

    }
}
