<?php
include_once "dbh.inc.php";


$idUser = $_GET['idUser'];
$idBook = $_GET['idBook'];
$result = mysqli_query($conn, "DELETE FROM favourites WHERE idUser=$idUser AND idBook=$idBook");

header("Location:../myFavourites.php?delete=success");


