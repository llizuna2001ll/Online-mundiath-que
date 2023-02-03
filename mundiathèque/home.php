<?php
include_once "header.php";
include_once 'navbar.php';
?>

<body class="home-body">
<?php
if(isset($_SESSION['username'])){
    echo "<p class='welcome'>Welcome, " . $_SESSION['username'] ."</p>";
}
?>

<?php
include_once "newsPage.php";
include_once 'accordion.php';
include_once 'footer.php';
?>

