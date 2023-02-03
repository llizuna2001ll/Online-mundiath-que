<?php

$idBook = $_GET['idBook'];
$idUser = $_GET['idUser'];

include_once "dbh.inc.php";

    $sql = "INSERT INTO favourites ( idUser, idBook) VALUES ( ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../bookPage.php?error=stmtfailed&idBook=$idBook");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ii",$idUser, $idBook);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../books.php?error=none");

exit();
