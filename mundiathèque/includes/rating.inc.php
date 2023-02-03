<?php
include_once 'dbh.inc.php';

if (isset($_POST['submit-rating'])) {
    $idUser = $_GET['idUser'];
    $idBook = $_GET['idBook'];
    $rating = $_POST["rating"];
    $result = mysqli_query($conn, "DELETE FROM rating WHERE idUser=$idUser AND idBook=$idBook");

    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO rating (idUser,idBook,bookRating) VALUES (?,?,?)";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed!";
    } else {
        mysqli_stmt_bind_param($stmt, "iid", $idUser, $idBook, $rating);
        mysqli_stmt_execute($stmt);
        header("location: ../bookPage.php?rating=added&idBook=$idBook");
    }
}
