<?php

session_start();
$startDate = date("Y-m-d h:i:sa", strtotime("now"));
$endDate = date("Y-m-d h:i:sa", strtotime(" 7 days"));
$idBook = $_GET['idBook'];
$idUser = $_GET['idUser'];
$username = $_SESSION['username'];

include_once "dbh.inc.php";

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

$sql = "SELECT count(*) AS count FROM reservation WHERE idBook=$idBook AND idUser=$idUser";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $reserveCount = $row['count'];
    }
    if ($reserveCount >= 1) {

        header("location: ../bookPage.php?error=alreadyreserved&idBook=$idBook");
        exit();
    } else {

        $sql = "SELECT count(*) AS count FROM reservation WHERE  idUser=$idUser";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                $totalreserve = $row['count'];
            }

            if ($totalreserve >= 3) {

                header("location: ../bookPage.php?error=maxreserve&idBook=$idBook");
                exit();
            }

            else {

                if ($quantity > 0) {

                    $quantity = $quantity - 1;

                    mysqli_query($conn, "UPDATE book SET quantity= $quantity WHERE idBook= $idBook");

                    mysqli_stmt_execute($stmt);

                    $sql = "INSERT INTO reservation ( idUser, idBook, startDate, endDate) VALUES ( ?, ?, ?, ?);";

                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../bookPage.php?error=stmtfailed&idBook=$idBook");
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt, "iiss", $idUser, $idBook, $startDate, $endDate);
                    mysqli_stmt_execute($stmt);

                    $textNotificaion = "You have reserved: <strong>$title</strong> on <strong>$startDate</strong>, please visit the library to claim your book. And dont forget to return it before <strong>$endDate</strong>";
                    $AdmintextNotificaion = "$username have reserved: <strong>$title</strong> on <strong>$startDate</strong>, and should be returned before <strong>$endDate</strong>";

                    $sql = "INSERT INTO notification( idUser, textNotification) VALUES ('$idUser', '$textNotificaion');";

                    mysqli_query($conn, $sql);
                    mysqli_stmt_execute($stmt);

                    $sql = "INSERT INTO notification( SELECT users.idUser FROM users WHERE typeUser='admin', textNotification)  VALUES ('$idUser', '$textNotificaion');";

                    mysqli_query($conn, $sql);
                    mysqli_stmt_execute($stmt);


                    $sql = "SELECT idUser  FROM users WHERE  typeUser='admin'";
                    include_once "dbh.inc.php";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['idUser'];

                            $sql = "INSERT INTO notification(idUser, textNotification) VALUES('$id','$AdmintextNotificaion');";
                            mysqli_query($conn, $sql);


                        }
                    }

                            header("location: ../bookPage.php?error=none&idBook=$idBook");
                            exit();



                }

                else {
                    header("location: ../bookPage.php?error=quantity&idBook=$idBook");
                    exit();
                }
            }
        }

    }
}




