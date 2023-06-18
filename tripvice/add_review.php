<?php
print_r($_REQUEST);

require_once 'session.php';
include_once("connection.php");
// Escape user inputs for security

 
    $title = mysqli_real_escape_string($link, $_REQUEST['title']);
    $type = mysqli_real_escape_string($link, $_REQUEST['type']);
    $address = mysqli_real_escape_string($link, $_REQUEST['address']);
    $description = mysqli_real_escape_string($link, $_REQUEST['description']);
    $user_id = $_SESSION['user_id'];
    //getting the image and uploading it to a separate folder
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./uploads/" . $filename;
    move_uploaded_file($tempname, $folder);
    //inserting the review
    $sql = "INSERT INTO review (title, type, address, description,filename,user_id) VALUES ('$title', '$type', '$address', '$description','$filename', '$user_id')";
        
        if (mysqli_query($link, $sql)) {
            echo "Record added successfully.";
            header("Location:review_test.php");
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }
        

mysqli_close($link);
?>
