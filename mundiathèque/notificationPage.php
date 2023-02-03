<?php
include_once "header.php";
include_once "navbar.php";
?>


<?php
include_once 'includes/dbh.inc.php';
$idUser = $_SESSION['idUser'];

if($_SESSION['typeUser']=='admin'){
    $sql = "SELECT DISTINCT notification.textNotification FROM notification
            WHERE idUser IN(SELECT idUser FROM users WHERE typeUser='admin') ORDER BY `notification`.`idNotification` DESC LIMIT 7;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {

            echo '<section>
       <div class="notification-container">
        <div class="container">
            <div class="row">
                <div style="width: 100%" class="col-sm-5 col-md-6 col-12 pb-4">
                    <div style="width: 100%" class="comment mt-4 text-justify float-left">
                     <p><a href="includes/deleteNotification.inc.php?idNotification=' .$row['idNotification']. '">delete</a></p>
                        <h4>Mundiatheque Library</h4><br>
                        <p>' . $row['textNotification'] . '</p>
                    </div><br>
                </div>
               </div>
         </div>      
    </section>';
        }
    }
}
else {
    $sql = "SELECT DISTINCT notification.idNotification,  notification.textNotification FROM notification
            WHERE notification.idUser=$idUser ORDER BY `notification`.`idNotification` DESC LIMIT 7";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        echo'
             <h1 style="margin-left: 60px;margin-top: 50px; color: #0F728C"><strong>NOTIFICATIONS:</strong></h1>';
        while ($row = mysqli_fetch_assoc($result)) {

            echo '<section>
       <div class="notification-container">
        <div class="container">
            <div class="row">
                <div style="width: 100%" class="col-sm-5 col-md-6 col-12 pb-4">
                    <div style="width: 100%" class="comment mt-4 text-justify float-left">
                    <p><a href="includes/deleteNotification.inc.php?idNotification=' .$row['idNotification']. '">delete</a></p>
                        <h3><strong>FROM: Mundiatheque Library</strong></h3><br>
                        <p>' . $row['textNotification'] . '</p>
                    </div><br>
                </div>
               </div>
         </div>      
    </section>';
        }

    }
}
?>






<?php
include_once "footer.php";
?>



