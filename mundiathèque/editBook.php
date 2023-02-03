<?php
include_once 'header.php';
include_once 'navbar.php';
include_once 'includes/dbh.inc.php';

$idBook = $_GET['idBook'];
$sql = "SELECT * FROM book WHERE book.idBook=$idBook";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<section style="display: flex">
      <div id="add-book" class="mb-3 add-book">
    <form action="includes/editBook.inc.php?idBook='.$idBook.'" method="post" enctype="multipart/form-data">
        <h3>ADD BOOK:</h3>
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" value="'.$row['title'].'" class="form-control" id="title" placeholder="Title...">
        <br>
        <label for="author" class="form-label">Author</label>
        <input type="text" value="'.$row['author'].'" name="author" class="form-control" id="author" placeholder="Author...">
        <br>
        <label for="genre" class="form-label">Select genre</label>
        <select name="genre" id="genre" role="button" style="width: auto; font-size: 15px; height: 40px"
                class=" form-select form-select-lg mb-3"
                aria-label=".form-select-lg example">
            <option selected value="genre">Genre</option>
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
        <textarea style=" resize:none" class="form-control"  name="description" id="description"
                  placeholder="Description..." rows="3">'.$row['description'].'</textarea>
        <br>
        <label for="quantity" class="form-label">Select quantity</label>
        <select name="quantity" id="quantity" role="button" style="width: auto; font-size: 15px; height: 40px"
                class="form-select form-select-lg mb-3"
                aria-label=".form-select-lg example">
            <option selected value="quantity">Quantity</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <label for="keywords" class="form-label">Keywords</label>
        <textarea style=" resize:none"  class="form-control" name="keywords" id="keywords"
                  placeholder="Keywords..." rows="3">'.$row['keywords'].'</textarea>
        <br>
        <button name="submit-edit-book" class="reserve-button">Add book</button>
    </form>
</div>
</section>
';
    }
}







