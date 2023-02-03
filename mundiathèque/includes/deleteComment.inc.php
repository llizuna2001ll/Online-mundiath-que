<?php
include_once "dbh.inc.php";


$idComment = $_GET['idComment'];
$idBook = $_GET['idBook'];
$result = mysqli_query($conn, "DELETE FROM comment WHERE idComment=$idComment");

header("Location:../bookPage.php?delete=success&idBook=$idBook");


