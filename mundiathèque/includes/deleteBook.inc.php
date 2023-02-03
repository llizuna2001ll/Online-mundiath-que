<?php
include_once "dbh.inc.php";

$page = $_GET['page'];
$idBook = $_GET['idBook'];
$imgFullNameBook = $_GET['bookimage'];
$result = mysqli_query($conn, "DELETE FROM book WHERE idBook=$idBook");
unlink('../images/books-covers/' . $imgFullNameBook);

if($page == 'books') {
    header("Location:../books.php?delete=success");
}
elseif ($page == 'accordion'){
    header("Location:../accordion.php?delete=success");
}

