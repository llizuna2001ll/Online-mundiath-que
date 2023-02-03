<?php

if (isset($_POST['submit-edit-book'])) {
    include_once "dbh.inc.php";
    $idBook = $bookTitle = $_GET['idBook'];
    $bookTitle = $_POST['title'];
    $bookDesc = $_POST['description'];
    $bookKeywords = $_POST['keywords'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];
    $stmt = mysqli_stmt_init($conn);



    if(empty($bookTitle) || empty($bookDesc) || empty($author) || empty($bookKeywords) || $genre == 'genre' || $quantity == 'quantity'){
        header("Location: ../edit.php?upload=empty");
        exit();
    }
    else{
        $result=mysqli_query($conn, "UPDATE book SET title='$bookTitle', description='$bookDesc', keywords='$bookKeywords', author='$author', genre='$genre', quantity='$quantity'  WHERE idBook='$idBook'");

        header("Location: ../books.php?edit=success");
        exit();
    }
}
