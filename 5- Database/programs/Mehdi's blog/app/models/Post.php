<?php

class Post
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPage($page_number, $per_page)
    {
       $offset=($page_number-1)*$per_page; 
       $sql = "SELECT * FROM posts ORDER BY posted_at DESC LIMIT :ofset,:lim ;";
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam(":ofset",$offset,PDO::PARAM_INT);
       $stmt->bindParam(":lim",$per_page,PDO::PARAM_INT);
       $stmt->execute();
       if($stmt->rowCount()>0)
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        $sql = "SELECT * FROM posts";
        $result = $this->db->query($sql);
        
       $rowNumbers= $result->rowCount();
        return $rowNumbers;
    }

    public function get($id)
    {

       $sql = "SELECT * FROM posts WHERE id=:post_id";
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam("post_id",$id,PDO::PARAM_INT);
       $stmt->execute();
       if($stmt->rowCount()>0)
        return $stmt->fetch(PDO::FETCH_ASSOC);    
    else
        return NULL;
}


}
?>