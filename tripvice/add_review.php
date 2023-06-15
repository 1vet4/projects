<?php
print_r($_REQUEST);

require_once 'session.php';

// Connect to the database
$link = mysqli_connect("localhost", "root", "", "tripvice");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security

 
    $title = mysqli_real_escape_string($link, $_REQUEST['title']);
    $type = mysqli_real_escape_string($link, $_REQUEST['type']);
    $address = mysqli_real_escape_string($link, $_REQUEST['address']);
    $description = mysqli_real_escape_string($link, $_REQUEST['description']);
    $user_id = $_SESSION['user_id'];
    //getting the image and uploading it to a separate folder
    $uid = uniqid();
    $image = $uid . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],'uploads/' . $uid . $_FILES['image']['name']);
    //inserting the review
    $sql = "INSERT INTO review (title, type, address, description,image, user_id) VALUES ('$title', '$type', '$address', '$description', '$image', '$user_id')";
        
        if (mysqli_query($link, $sql)) {
            echo "Record added successfully.";
            header("Location:review_test.php");
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }
        

mysqli_close($link);
?>
