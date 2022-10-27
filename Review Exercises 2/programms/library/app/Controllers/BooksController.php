<?php

class BooksController
{
    public function list()
    {
        render('books', ['books' => (new Book())->all()]);
    }

    public function add()
    {
if(!empty($_POST["name"]) && !empty($_POST["publisher"]) && !empty($_POST["author"])){

    $publisherID=null;
$authorID=null;
$quantity = 1;

    $db = Base::getInstance()->get('DB');
    $sql1 = "Select id FROM publishers where name=:name";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bindParam(':name',$_POST["publisher"]);
    $stmt1->execute();
    if($stmt1->rowCount()==0) {
        $sql2 = "INSERT INTO publishers (name) VALUES(:name)";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':name',$_POST["publisher"]);
        $stmt2->execute();
    }
    $stmt1->execute();
    $publisherID=$stmt1->fetchColumn();

    $sql1 = "Select id FROM authors where name=:name";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bindParam(':name',$_POST["author"]);
    $stmt1->execute();
    if($stmt1->rowCount()==0) {
        $sql2 = "INSERT INTO authors (name) VALUES(:name)";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':name',$_POST["author"]);
        $stmt2->execute();
    }
    $stmt1->execute();
    $authorID=$stmt1->fetchColumn();

    $sql1 = "Select id FROM books where name=:name AND author_id=:author AND publisher_id=:publisher; ";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bindParam(':name',$_POST["name"]);
    $stmt1->bindParam(':author',$authorID);
    $stmt1->bindParam(':publisher',$publisherID);
    $stmt1->execute();
    if($stmt1->rowCount()==0) {
        $sql2 = "INSERT INTO books (name,author_id,publisher_id,quantity) VALUES(:name,:author,:publisher,:quantity);";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':name',$_POST["name"]);
        $stmt2->bindParam(':author',$authorID);
        $stmt2->bindParam(':publisher',$publisherID);
        $stmt2->bindParam(':quantity',$quantity);
        $stmt2->execute();
        Flash::set('success', 'کتاب با موفقیت افزوده شد!');
        redirect('/books');
    }





}else{
    Flash::set('danger', 'همه‌ی اطلاعات باید وارد شوند.');
    redirect('/books/add');
}

    }

    public function addForm()
    {
        render('books_add');
    }

    public function reserve($id)
    {
        $book = (new Book())->find($id);
        if ($book->quantity > 0) {
            $book->quantity--;
        } else {
            Flash::set('danger', 'کتاب موردنظر در حال حاضر موجود نیست.');
            redirect('/books');
            return;
        }
        $book->save();
        Flash::set('success', 'کتاب با موفقیت رزرو شد!');
        redirect('/books');
    }

    public function unreserve($id)
    {
        $book = (new Book())->find($id);
        $book->quantity++;
        $book->save();
        Flash::set('success', 'موجودی کتاب با موفقیت افزایش یافت!');
        redirect('/books');
    }

    public function delete($id)
    {
        (new Book())->find($id)->delete();
        Flash::set('success', 'کتاب با موفقیت حذف شد!');
        redirect('/books');
    }
}
