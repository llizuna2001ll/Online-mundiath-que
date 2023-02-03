<?php
include_once "header.php";
include_once "navbar.php";
?>
<h3 style="margin-left:80px; margin-top: 70px; font-weight: 700; color: #0F728C">RESERVATIONS:</h3>
<table>
    <tr>
        <th>USER</th>
        <th>BOOK IMAGE</th>
        <th>BOOK TITLE</th>
        <th style="width: 100px"></th>
    </tr>
    <?php
    include_once 'includes/dbh.inc.php';

    $sql = "SELECT reservation.idBook, book.imgFullNameBook, book.title, users.idUser, users.username FROM reservation INNER JOIN book INNER JOIN users
            ON reservation.idBook=book.idBook AND reservation.idUser=users.idUser";


    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
        <td><a style="color: black"> ' . $row['username'] . '</a></td>
        <td><a href="bookPage.php?idBook='.$row['idBook'].'"><img src="images/books-covers/' . $row["imgFullNameBook"] . '"></a></td>
        <td><a style="color: black; text-decoration: underline" href="bookPage.php?idBook='.$row['idBook'].'"> ' . $row['title'] . '</a></td>
        <td><a href="includes/deleteReservation.inc.php?idUser='.$row['idUser'].'&idBook='.$row['idBook'].'&username='.$row['username'].'"><button style="background-color: transparent; box-shadow: none;" class="reserve-button reserve-button-delete "><i class="lni lni-trash-can"></i></button></a></td>
    </tr>';
        }
    }
        ?>
</table>


<?php
include_once 'footer.php';
?>
