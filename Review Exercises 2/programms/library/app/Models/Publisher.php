<?php

class Publisher extends Model
{
    public function all()
    {
        $sql="SELECT jj.id,jj.name , COUNT(jj.book_id) FROM (SELECT publishers.id,publishers.name,books.id as book_id FROM publishers INNER JOIN books On publishers.id=books.publisher_id) jj GROUP By(jj.id);";
        $result = Base::getInstance()->get('DB')->prepare($sql);
        $result->execute();
        $results=[];
        if($result->rowCount()>0) {
            while ($row = $result->fetch()) {
                $results[]= new Publisher(["id"=>$row[0],"name"=>$row[1],"books_count"=>$row[2]]);
            }
        }
        return $results;
    }

    public function count()
    {

        $sql = 'SELECT COUNT(DISTINCT publisher_id) AS publishers_count FROM books';
        $result = Base::getInstance()->get('DB')->prepare($sql);
        $result->execute();
        $count = $result->fetchColumn();
        return $count;

    }
}
