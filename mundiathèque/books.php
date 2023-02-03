<?php
include_once "header.php";
include_once "navbar.php"
?>

<div class="bar">
    <form action="books.php" method=post>
        <div class=" bar__types">
            <label for="available">
                <input type="checkbox" name="available" value="available" id="available">
                Available</label>
            <label for="math">
                <input type="checkbox" name="genre[]" value="math" id="math">
                Math</label>
            <label for="physics">
                <input type="checkbox" name="genre[]" value="physics" id="physics">
                Physics</label>
            <label for="informatique">
                <input type="checkbox" name="genre[]" value="computer_science" id="informatique">
                Computer Science</label>
            <label for="mechanics">
                <input type="checkbox" name="genre[]" value="mechanics" id="mechanics">
                Mechanics</label>
            <label for="chemistry">
                <input type="checkbox" name="genre[]" value="chemistry" id="chemistry">
                Chemistry</label>
            <label for="english">
                <input type="checkbox" name="genre[]" value="english" id="english">
                English</label>
            <label for="french">
                <input type="checkbox" name="genre[]" value="french" id="french">
                French</label>
            <label for="management">
                <input type="checkbox" name="genre[]" value="management" id="management">
                Management</label>
            <label for="finance">
                <input type="checkbox" name="genre[]" value="finance" id="finance">
                Finance</label>
            <label for="law">
                <input type="checkbox" name="genre[]" value="law" id="law">
                Law</label>
            <label for="medical">
                <input type="checkbox" name="genre[]" value="medical" id="medical">
                Medical</label>
            <button type="submit" name="submit-filter">Filter</button>
        </div>
    </form>
    <?php
    if($_SESSION['typeUser']=='admin'){
        echo'<a href="#add-book"><h4 style="transform:translateX(1000px) translateY(-70px);color:white;text-decoration:underline;">ADD NEW BOOK</h4></a>';
    }
    ?>

</div>
<?php

include_once 'includes/dbh.inc.php';
if (isset($_POST['submit-filter'])) {
    error_reporting(E_ERROR | E_PARSE);
    if ($_POST['available']=='available'){
        $sql = "SELECT * FROM book WHERE quantity > 0";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            echo '<h3 style="margin-left:110px;margin-top: 50px;text-transform: uppercase; font-weight: 700;">AVAILABLE BOOKS:</h3>
              <div class="books-page-container">';
            while ($row = mysqli_fetch_assoc($result)) {
                if($_SESSION['typeUser']=='student' || $_SESSION['typeUser']=='professor'){
                    echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'">Add to favorite</a></p>
                 <p><a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=books"><p>Edit</p></a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
                }else{
                    echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/deleteBook.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $row["imgFullNameBook"] .'&page=books">Delete</a></p>
                 <p><a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=books"><p>Edit</p></a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
                }
            }
            echo '</div>
                </div>';
        }
    }
    elseif ($_POST['genre'] == NULL) {
        echo '<p style="transform: translateY(-50px) translateX(300px)" class="form-alert">please select a category before filtering</p>';

        $sql = "SELECT * FROM book ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            echo '<h3 style="margin-left:110px;margin-top: 50px;text-transform: uppercase; font-weight: 700;">all books :</h3>
              <div class="books-page-container">';
            while ($row = mysqli_fetch_assoc($result)) {
                if($_SESSION['typeUser']=='student' || $_SESSION['typeUser']=='professor'){
                    echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'">Add to favorite</a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
                }else{
                    echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/deleteBook.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $row["imgFullNameBook"] .'&page=books">Delete</a></p>
                <p><a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=books"><p>Edit</p></a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
                }
            }
            echo '</div>';
        }
    }
    else {
        $genre = $_POST['genre'];
        foreach ($genre as $filter) {
            $sql = "SELECT * FROM book WHERE genre = '$filter'";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                echo '<h3 style="margin-left:110px;margin-top: 50px;text-transform: uppercase; font-weight: 700;">' . $filter . ':</h3>
              <div class="books-page-container">';
                while ($row = mysqli_fetch_assoc($result)) {
                    if($_SESSION['typeUser']=='student' || $_SESSION['typeUser']=='professor'){
                        echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'">Add to favorite</a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
                    }else{
                        echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/deleteBook.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $row["imgFullNameBook"] .'&page=books">Delete</a></p>
                <p><a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=books"><p>Edit</p></a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
                    }
                }
                echo '</div>';
            }

        }

    }
}
 else {
     $sql = "SELECT * FROM book ";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "SQL statement failed";
     } else {
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
        echo '<h3 style="margin-left:110px;margin-top: 50px;text-transform: uppercase; font-weight: 700;">all books :</h3>
              <div class="books-page-container">';
         while ($row = mysqli_fetch_assoc($result)) {
             if($_SESSION['typeUser']=='student' || $_SESSION['typeUser']=='professor'){
                 echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'">Add to favorite</a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
             }else{
                 echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] .'&idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 
                 <p><a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=books"><p>Edit</p></a></p><p><a href="includes/deleteBook.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $row["imgFullNameBook"] .'&page=books">Delete</a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        </a>
    ';
             }
         }
         echo '</div>';
     }
 }
?>


<?php
if ($_SESSION["typeUser"] == 'admin') {
    echo '
      <div id="add-book" class="mb-3 add-book">
    <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
        <h3>ADD BOOK:</h3>
        <label for="filename" class="form-label">Filename</label>
        <input type="text" name="filename" class="form-control" id="title" placeholder="Filename...">
        <br>
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title...">
        <br>
        <label for="author" class="form-label">Author</label>
        <input type="text" name="author" class="form-control" id="author" placeholder="Author...">
        <br>
        <label for="genre" class="form-label">Select genre</label>
        <select name="genre" id="genre" role="button" style="width: auto; font-size: 15px; height: 40px"
                class=" form-select form-select-lg mb-3"
                aria-label=".form-select-lg example">
            <option selected>Genre</option>
            <option value="math">Math</option>
            <option value="physics">Physics</option>
            <option value="computer_science">Computer Science</option>
            <option value="mechanics">Mechanics</option>
            <option value="chemistry">Chemistry</option>
            <option value="english">English</option>
            <option value="french">French</option>
            <option value="management">Management</option>
            <option value="finance">Finance</option>
            <option value="law">Law</option>
            <option value="medical">Medical</option>
        </select>
        <label for="description" class="form-label">Description</label>
        <textarea style=" resize:none" class="form-control" name="description" id="description"
                  placeholder="Description..." rows="3"></textarea>
        <br>
        <label for="quantity" class="form-label">Select quantity</label>
        <select name="quantity" id="quantity" role="button" style="width: auto; font-size: 15px; height: 40px"
                class="form-select form-select-lg mb-3"
                aria-label=".form-select-lg example">
            <option selected>Quantity</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <br>
        <label for="file" class="form-label">Select image</label>
        <input name="file" class="form-control" type="file" id="file">
        <br>
        <label for="keywords" class="form-label">Keywords</label>
        <textarea style=" resize:none" class="form-control" name="keywords" id="keywords"
                  placeholder="Keywords..." rows="3"></textarea>
        <br>
        <button name="submit-add-book" class="reserve-button">Add book</button>
    </form>
</div>
    ';
}
?>

<?php
include_once 'footer.php';
?>
