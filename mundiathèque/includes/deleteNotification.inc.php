<?php
include_once "dbh.inc.php";


$idNotification = $_GET['idNotification'];

$sql = "DELETE FROM notification WHERE idNotification=$idNotification";
$nom = 'issam';
$periode = '12';
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_execute($stmt);
    header("Location:../notificationPage.php?delete=success");

}

echo 'issam '.$idNotification.'issam';

