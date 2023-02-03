<?php
include_once "includes/dbh.inc.php";
include_once 'header.php';
include_once 'navbar.php';

if(isset($_POST['submit-search'])){
    echo '<h4 style="font-size: 45px;margin-left: 30px; margin-top: 50px">Search result:<h2>';
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM book WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR keywords LIKE '%$search%' OR genre LIKE '%$search%';";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0){
        echo '<div class="books-page-container">';
        while ($row = mysqli_fetch_assoc($result)){
            echo '
        <a href="#">
            <div class="book-page">
                <div class="cover">
                    <p style="margin-top: 80px"><a href="bookPage.php?idBook=' . $row["idBook"] . '">' . $row["title"] . '</a></p>
                 <p><a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] .'">Add to favorite</a></p>
             </div>
            <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
            </div>
        
    ';
        }
        echo '</div>
                </div>';
        include_once 'footer.php';
    }


    else{
        echo '<h4 style="color:red; font-size: 18px">There are no results matching your search</h4>';
    }
}

