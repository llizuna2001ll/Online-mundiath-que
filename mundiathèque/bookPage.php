<?php
include_once "header.php";
include_once "navbar.php";
?>

<?php
date_default_timezone_set('Africa/Casablanca');
include_once "includes/dbh.inc.php";
$idBook = $_GET['idBook'];
?>
<?php
include_once 'includes/dbh.inc.php';

$sql = "SELECT book.idBook, book.title, book.genre, book.imgFullNameBook, book.description,book.author, book.quantity, ROUND(AVG(rating.bookRating), 2) AS bookRating FROM book INNER JOIN rating 
        ON book.idBook= rating.idBook
       WHERE book.idBook=$idBook";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "alreadyreserved") {
            echo "<p class='form-alert' style='margin-left: 50px'>You have already reserved this book!</p>";
        } else if ($_GET["error"] == "maxreserve") {
            echo "<p class='form-alert' style='margin-left: 50px'>You have reached the max of reservations! (3 books)</p>";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "<p class='form-alert' style='margin-left: 50px'>Soemthing went wrong! try again</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p class='form-alert' style='margin-left: 50px'>Book added to your reservations! Please check your notifications</p>";
        }else if ($_GET["error"] == "rating") {
            echo "<p class='form-alert' style='margin-left: 50px'>Thanks for rating</p>";
        }
    }
    while ($row = mysqli_fetch_assoc($result)) {

             $quantity = $row['quantity'];

        echo '<section style="margin: 0px 50px 50px;line-height: 1.5">
    <div class="book-detail">
        <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
        <div>
            <h2>' . $row["title"] . '</h2>
            <h4>Description:</h4>
            <p style="margin-top: -10px">' . $row["description"] . '</p>
            <h4>Genre:</h4>
            <p style="margin-top: -10px;text-transform: uppercase">' . $row["genre"] . '</p>
            <h4>Author:</h4>
            <p style="margin-top: -10px">' . $row["author"] . '</p>
            <h4>Rating:</h4>
            <p style="margin-top: -10px">' . $row["bookRating"] . '</p>
            <h4>Quantity:</h4>
            <p style="margin-top: -10px">' . $row["quantity"] . '/3</p>
            
    ';
        if($quantity > 0){
           echo'<a href="includes/reserve.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'"><button class="reserve-button">Reserve</button></a>
                <a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'"><button>Add to favorite &nbsp;<i class="lni lni-heart-filled"></i></button></a>
                <div style=" width: 200px; margin-left: 300px;margin-top: -50px" class="row">

        <form action="includes/rating.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'" method="post">

            <div style="margin-left: -100px" class="rateyo" id= "rating"
                 data-rateyo-rating="4"
                 data-rateyo-num-stars="5"
                 data-rateyo-score="3">
            </div>

            <span class="result">rating: 0</span>
            <input type="hidden" name="rating">

    </div>

    <div><button style="margin-left: 480px;transform: translateY(-60px)" type="submit" name="submit-rating">Add rating</button> </div>

    </form>
</div>
</div>';



            echo'</div>
    </div>
</section>';
    }
        else{
            echo'<button style="cursor: default;." class="reserve-button out-of-stock">OUT OF STOCK</button>
                <a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'"><button>Add to favorite &nbsp;<i class="lni lni-heart-filled"></i></button></a>
        </div>
    </div>
</section>
<div style=" width: 200px; margin-left: 300px;margin-top: -50px" class="row">

        <form action="includes/rating.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'" method="post">

            <div style="margin-left: -100px" class="rateyo" id= "rating"
                 data-rateyo-rating="4"
                 data-rateyo-num-stars="5"
                 data-rateyo-score="3">
            </div>

            <span class="result">rating: 0</span>
            <input type="hidden" name="rating">

    </div>

    <div><button style="margin-left: 480px;transform: translateY(-60px)" type="submit" name="submit-rating">Add rating</button> </div>

    </form>
</div>
</div>';
        }
    }
}
?>


<section style="margin: 50px">
    <?php

    if (isset($_SESSION['username'])) {
        echo '<form action="includes/addComment.inc.php?idBook='.$idBook.'&idUser='.$_SESSION['idUser'].'" method="post">
    <label for="comment" class="form-label">Give a feedback</label>
        <textarea style=" resize:none; width: 600px" class="form-control" name="comment" id="comment"
                  placeholder="Comment..." rows="3"></textarea>
    <br>
    <button style="margin-bottom: 50px" class="reserve-button" type="submit" name="submit-comment">Comment</button>
</form>';

    }
    include_once 'includes/dbh.inc.php';

    $sql = "SELECT  comment.idComment, comment.dateComment, comment.idBook, comment.textComment, users.username, users.typeUser FROM comment 
    INNER JOIN users    
    ON comment.idUser=users.idUser 
    WHERE idBook=$idBook";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {

            echo '<section>
        <div style="margin-left: -10px;" class="container">
            <div style="line-height: 7px" class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <div class="comment mt-4 text-justify float-left">';
                        if($row['username']===$_SESSION['username']  || $_SESSION['typeUser'] == 'admin'){
                            echo'<p><a href="includes/deleteComment.inc.php?idComment=' .$row['idComment'].'&idBook='.$row['idBook'].'">delete</a></p>';
                        }
                        echo'<h4>' . $row['username'] . '</h4> <h5>' . $row['dateComment']  . '</h5> <br>
                        <p>' . $row['textComment'] . '</p>
                    </div><br>
                </div>
            </div>
        </div>
        <hr>
    </section>';
        }
    }
    ?>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
<?php
include_once 'footer.php';
?>
