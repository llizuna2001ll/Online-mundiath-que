<?php
session_start();
include_once "dbh.inc.php";


$idUser = $_GET['idUser'];
$idBook = $_GET['idBook'];
$username = $_GET['username'];


$result = mysqli_query($conn, "DELETE FROM reservation WHERE idUser=$idUser AND idBook=$idBook");

$sql = "SELECT * FROM book WHERE idBook=$idBook";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $quantity = $row['quantity'];
        $title = $row['title'];
    }
}

$quantity = $quantity + 1;

mysqli_query($conn, "UPDATE book SET quantity= $quantity WHERE idBook= $idBook");
mysqli_stmt_execute($stmt);

if($_SESSION['typeUser'] == 'student' || $_SESSION['typeUser'] == 'professor') {

    header("Location:../myReservations.php?delete=success");
}
else {

    header("Location:../allReservations.php?delete=success");
}
exit();

