<?php
include_once 'navbar.php';
?>
<section class="accodrion-container-container">
    <?php

    include_once 'includes/dbh.inc.php';
    $idUser = $_SESSION['idUser'];
    $sql = "SELECT last_seen.seenDate, last_seen.idBook, book.imgFullNameBook, book.title  FROM last_seen INNER JOIN book
            ON last_seen.idBook=book.idBook WHERE idUser=$idUser 
            ORDER BY last_seen.seenDate DESC LIMIT 9";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";

    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        echo '<section class="accodrion-container">
        <div class="title"><h2>LAST SEEN</h2></div>
        <div class="books-container">
            <div class="books">';
        while ($row = mysqli_fetch_assoc($result)) {
            if ($_SESSION['typeUser'] == 'student' || $_SESSION['typeUser'] == 'professor') {
                echo '
                <div class="book lastSeen">
                    <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
                    <div class="books-hover"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] . '&idBook=' . $row["idBook"] . '"><p>' . $row['title'] . '</p></a>
                            <a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] . '"><p>Add to favorite</p></a></div>
                </div>
            ';
            } else {
                echo '
                <div class="book lastSeen">
                    <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
                    <div class="books-hover"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] . '&idBook=' . $row["idBook"] . '"><p>' . $row['title'] . '</p></a>
                            <a href="includes/deleteBook.inc.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=accordion"><p>Delete</p></a>
                            <a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=accordion"><p>Edit</p></a></div>
                </div>
            ';
            }
        }
        echo '</div>
        </div>
        <div class="slide-button-container">
            <i class="lni lni-chevron-left slideButton leftSlide leftSlide-last-seen"></i>
            <i class="lni lni-chevron-right slideButton rightSlide rightSlide-last-seen"></i>
        </div>
    </section>';
    }
    ?>


    <?php
    $sql = "SELECT * FROM book ORDER BY idBook DESC LIMIT 9";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        echo '<section class="accodrion-container">
        <div class="title"><h2>NEW BOOKS</h2></div>
        <div class="books-container">
            <div class="books">';
        while ($row = mysqli_fetch_assoc($result)) {
            if ($_SESSION['typeUser'] == 'student' || $_SESSION['typeUser'] == 'professor') {
                echo '
                <div class="book newBooks">
                    <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
                    <div class="books-hover"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] . '&idBook=' . $row["idBook"] . '"><p>' . $row['title'] . '</p></a>
                            <a href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] . '"><p>Add to favorite</p></a></div>
                </div>
            ';
            } else {
                echo '
                <div class="book newBooks">
                    <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
                    <div class="books-hover"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] . '&idBook=' . $row["idBook"] . '"><p>' . $row['title'] . '</p></a>
                            <a href="includes/deleteBook.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] . '&page=accordion"><p>Delete</p></a>
                            <a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=accordion"><p>Edit</p></a></div>
                </div>';
            }
        }
        echo '</div>
        </div>
        <div class="slide-button-container">
            <i class="lni lni-chevron-left slideButton leftSlide leftSlide-new"></i>
            <i class="lni lni-chevron-right slideButton rightSlide rightSlide-new"></i>
        </div>
    </section>';

    }
    ?>
    <section class="accodrion-container">
        <div class="title"><h2>RECOMMENDATIONS</h2></div>
        <div class="books-container">
            <div class="books">
                <?php
                $sql = "SELECT * FROM book INNER JOIN rating 
                ON rating.idBook = book.idBook  
                WHERE rating.bookRating > 3 LIMIT 9 ";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($_SESSION['typeUser'] == 'student' || $_SESSION['typeUser'] == 'professor') {
                            echo '<div class="book recommendations">
                                <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
                                <div class="books-hover"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] . '&idBook=' . $row["idBook"] . '"><p>' . $row['title'] . '</p></a>
                                <a  href="includes/addFavorite.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] . '"><p>Add to favorite</p></a></div>
                                </div>';
                        } else{
                            echo '<div class="book recommendations">
                                <img src="images/books-covers/' . $row["imgFullNameBook"] . '">
                              <div class="books-hover"><a href="includes/lastSeen.inc.php?idUser=' . $_SESSION["idUser"] . '&idBook=' . $row["idBook"] . '"><p>' . $row['title'] . '</p></a>
                            <a href="includes/deleteBook.inc.php?idBook=' . $row["idBook"] . '&idUser=' . $_SESSION["idUser"] . '&page=accordion"><p>Delete</p></a>
                            <a href="editBook.php?idBook=' . $row["idBook"] . '&bookimage=' . $row["imgFullNameBook"] . '&page=accordion"><p>Edit</p></a></div>
                    </div>';
                        }
                    }
                }
                ?>


            </div>
        </div>


        </div>
        </div>
        <div class="slide-button-container">
            <i class="lni lni-chevron-left slideButton leftSlide leftSlide-recommendations"></i>
            <i class="lni lni-chevron-right slideButton rightSlide rightSlide-recommendations"></i>
        </div>
    </section>

</section>


<section class="accodrion-container-container-mobile">
    <label for="newBooks">
        <div class="accodrion-container-mobile"
        ">
        <h2>NEW BOOKS</h2>
        </div></label>
    <div class="books-container-mobile">
        <input type="checkbox" id="newBooks" style="display: none">
        <div class="books-mobile">
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="accodrion-container-container-mobile">
    <label for="lastSeen">
        <div class="accodrion-container-mobile" style="background: rgba(86, 154, 172, 0.7);">
            <h2>LAST SEEN</h2>
        </div>
    </label>
    <div class="books-container-mobile">
        <input type="checkbox" id="lastSeen" style="display: none">
        <div class="books-mobile">
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>

        </div>
    </div>
</section>

<section class="accodrion-container-container-mobile">
    <label for="recommend">
        <div class="accodrion-container-mobile">
            <h2>RECOMMENDATIONS</h2>
        </div>
    </label>
    <div class="books-container-mobile">
        <input type="checkbox" id="recommend" style="display: none">
        <div class="books-mobile">
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
            <div class="book-mobile">
                <img src="images/cover.jpg">
                <div class="books-hover-mobile"><a href="#"><p>TITRE</p>
                        <p>AUTEUR</p></a></div>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    /*
       ===============
       BOOKS-SLIDER
       ===============
   */


    const leftSlide = document.getElementsByClassName('leftSlide-new')[0]
    const rightSlide = document.getElementsByClassName('rightSlide-new')[0]
    const book = document.getElementsByClassName('newBooks')
    console.log(book.length);

    if (book.length < 8) {
        leftSlide.style.display = "none";
        rightSlide.style.display = "none";
    }

    leftSlide.addEventListener('click', () => {
        for (let i = 0; i < book.length; i++) {
            if (book.length == 9) {
                let b = book[i].style.transform = 'translateX(235px)';
            } else if (book.length == 8) {
                let b = book[i].style.transform = 'translateX(128px)';
            }
        }
    })

    rightSlide.addEventListener('click', () => {
        for (let i = 0; i < book.length; i++) {
            if (book.length == 9) {
                let b = book[i].style.transform = 'translateX(-238px)';
            } else if (book.length == 8) {
                let b = book[i].style.transform = 'translateX(-128px)';
            }
        }
    })

    const leftSlideLastSeen = document.getElementsByClassName('leftSlide-last-seen')[0]
    const rightSlideLastSeen = document.getElementsByClassName('rightSlide-last-seen')[0]
    const bookLastSeen = document.getElementsByClassName('lastSeen')
    console.log(bookLastSeen.length);

    if (bookLastSeen.length < 8) {
        leftSlideLastSeen.style.display = "none";
        rightSlideLastSeen.style.display = "none";
    }

    leftSlideLastSeen.addEventListener('click', () => {
        for (let i = 0; i < bookLastSeen.length; i++) {
            if (bookLastSeen.length == 9) {
                let b = bookLastSeen[i].style.transform = 'translateX(235px)';
            } else if (bookLastSeen.length == 8) {
                let b = bookLastSeen[i].style.transform = 'translateX(128px)';
            }
        }
    })

    rightSlideLastSeen.addEventListener('click', () => {
        for (let i = 0; i < bookLastSeen.length; i++) {
            if (bookLastSeen.length == 9) {
                let b = bookLastSeen[i].style.transform = 'translateX(-235px)';
            } else if (bookLastSeen.length == 8) {
                let b = bookLastSeen[i].style.transform = 'translateX(-128px)';
            }
        }
    })

    const leftSlideRecomm = document.getElementsByClassName('leftSlide-recommendations')[0]
    const rightSlideRecomm = document.getElementsByClassName('rightSlide-recommendations')[0]
    const bookRecomm = document.getElementsByClassName('recommendations')

    console.log(bookRecomm.length)
    if (bookRecomm.length < 8) {
        leftSlideRecomm.style.display = "none";
        rightSlideRecomm.style.display = "none";
    }

    leftSlideRecomm.addEventListener('click', () => {
        for (let i = 0; i < bookRecomm.length; i++) {
            if (bookRecomm.length == 9) {
                let b = bookRecomm[i].style.transform = 'translateX(235px)';
            } else if (bookRecomm.length == 8) {
                let b = bookRecomm[i].style.transform = 'translateX(128px)';
            }
        }
    })

    rightSlideRecomm.addEventListener('click', () => {
        for (let i = 0; i < bookRecomm.length; i++) {
            if (bookRecomm.length == 9) {
                let b = bookRecomm[i].style.transform = 'translateX(-235px)';
            } else if (bookRecomm.length == 8) {
                let b = bookRecomm[i].style.transform = 'translateX(-128px)';
            }
        }
    })


</script>
