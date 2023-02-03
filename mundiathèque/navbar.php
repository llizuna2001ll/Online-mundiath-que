<?php
session_start();
include_once 'header.php';
?>
<nav class="navbar">
    <a><i class="lni lni-menu mobile-menu "></i></a>
    <div class="nav-logo">
        <a href="home.php"><img src="images/mundiapolis.png"></a>
    </div>
    <div class="nav-list">
        <ul>
            <a href="home.php"><li>HOME</li></a>
            <a href="books.php"><li>BOOKS</li></a>
            <a href="newsPage.php"><li>NEWS</li></a>
            <a href="#"><li>CONTACT US</li></a>
            <a href="#"style="margin-left: 540px;" " ><label style="cursor: pointer" for="search"><li><i style="color: #4F94A6;font-size: 30px" class="lni lni-search-alt"></i></li></label></a>
            <input style="display: none" type="checkbox" id="search">
            <div class="search-container"
                <form action="search.inc.php" method="post">
                    <input name="search" type="text" placeholder="Search">
                    <button type="submit" name="submit-search"><i style="font-size: 30px" class="lni lni-search-alt"></i></button>
                </form>
            </div>
            <a href="#"><li><label for="user" style="cursor: pointer"><i style="color: #4F94A6;font-size: 30px" class="lni lni-user"></i></label></li></a>
            <input type="checkbox" id="user" style="display: none">
            <div class="nav-list_drop">

                <?php
                if($_SESSION['typeUser'] == 'student' || $_SESSION['typeUser'] == 'professor' ){
                    echo ' <a href="myReservations.php"><li>MY RESERVATIONS</li></a>
                           <a href="notificationPage.php"><li>NOTIFICATIONS</li></a>
                           <a href="myFavourites.php"><li>MY FAVOURITES</li></a>';
                }
                else{
                    echo ' <a href="allReservations.php"><li>RESERVATIONS</li></a>
                           <a href="notificationPage.php"><li>NOTIFICATIONS</li></a>
                           <a href="signupAdmin.php"><li>ADD ADMIN</li></a>';
                }
                ?>
                <a href="includes/logout.inc.php"><li>LOG OUT</li></a>
            </div>
        </ul>
    </div>
</nav>
<div class="mobile-nav">
    <i class="lni lni-chevron-left close-nav close"></i>
    <div class="mobile-logout">
        <a href="#"><li>LOG OUT</li></a>
    </div>
    <form action="search.inc.php" method="post">
        <input type="text" name="submit-search" placeholder="Search.."><i class="lni lni-search-alt"></i>
    </form>
    <a href="#"><li>HOME</li></a>
    <a href="#"><li>BOOKS</li></a>
    <a href="#"><li>HISTORIQUE</li></a>
    <a href="#"><li>CONTACT US</li></a>

</div>







<script>
    /*
    ===============
    MOBILE-NAV
    ===============
    */
    const toggleButton = document.getElementsByClassName('mobile-menu')[0]
    const navbarLinks = document.getElementsByClassName('mobile-nav')[0]
    const hideButton = document.getElementsByClassName('close')[0]
    toggleButton.addEventListener('click', () => {
        let b = navbarLinks.classList.toggle('active');
    })

    hideButton.addEventListener('click', () => {
        let b = navbarLinks.classList.remove('active');
    })



</script>
