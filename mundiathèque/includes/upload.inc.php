<?php

if (isset($_POST['submit-add-book'])) {

    $newFileName = $_POST['filename'];
    if (empty($newFileName)) {
        $newFileName = "book";
        }
    else {
        $newFileName = strtolower(str_replace(" ","-",$newFileName));
    }

    $bookTitle = $_POST['title'];
    $bookDesc = $_POST['description'];
    $bookKeywords = $_POST['keywords'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];


    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){
                $bookFullName = $newFileName.".".uniqid('', true).".".$fileActualExt;
                $fileDestination = '../images/books-covers/'.$bookFullName;
                move_uploaded_file($fileTmpName, $fileDestination);

                include_once "dbh.inc.php";

                if(empty($bookTitle) || empty($bookDesc) || empty($author) || empty($bookKeywords) || $genre == 'genre' || $quantity == 'quantity'){
                    header("Location: ../upload.php?upload=empty");
                    exit();
                }
                else{
                    $sql = "SELECT * FROM book;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "SQL statement failed!";
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);


                        $sql = "INSERT INTO book(title, description, author, genre, quantity, imgFullNameBook, keywords) VALUES(?,?,?,?,?,?,?);";
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed!2";
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "ssssiss",$bookTitle,$bookDesc, $author , $genre, $quantity, $bookFullName, $bookKeywords );
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTmpName,$fileDestination);
                            header("Location: ../books.php?upload=success");
                        }
                    }
                }
            }
            else{
                echo 'Your file is too big!';
                exit();
            }
        }
        else{
            echo 'There was an error uploading your file!';
            exit();
        }
    }
    else{
        echo 'you cannot upload files of this type! Only jpg,png files allowed';
        exit();
    }


}
















/*
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("location: ../index.php?uploadsuccess");
            }
            else{
                echo 'Your file is too big!';
            }
        }
        else{
            echo 'There was an error uploading your file!';
        }
    }
    else{
        echo 'you cannot upload files of this type!';
    }
}
}
*/
