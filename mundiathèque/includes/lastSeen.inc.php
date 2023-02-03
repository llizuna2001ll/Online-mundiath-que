<?php

$idBook = $_GET['idBook'];
$idUser = $_GET['idUser'];
$seenDate = date("Y-m-d h:i:sa", strtotime("now"));
include_once "dbh.inc.php";

$result = mysqli_query($conn, "DELETE FROM last_seen WHERE idUser=$idUser AND idBook=$idBook");

$result = mysqli_query($conn, "INSERT INTO last_seen ( idUser, idBook,seenDate) VALUES ( '$idUser', '$idBook','$seenDate')");


header("location: ../bookPage.php?last_seen&idBook=$idBook");
exit();


