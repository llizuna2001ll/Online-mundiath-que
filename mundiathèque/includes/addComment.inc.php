<?php

if(isset($_POST['submit-comment'])) {


    $idBook = $_GET['idBook'];
    $idUser = $_GET['idUser'];
    $comment = $_POST['comment'];
    include_once "dbh.inc.php";

    if (empty($comment)) {
        header("location: ../bookPage.php?error=empty&idBook=$idBook");
    }

    else {
        $sql = "INSERT INTO comment (textComment, idUser, idBook) VALUES ( ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../bookPage.php?error=stmtfailed&idBook=$idBook");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "sii", $comment, $idUser, $idBook);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../bookPage.php?error=none&idBook=$idBook");
    }
    exit();
}
