<?php
print_r($_REQUEST);

require_once 'session.php';
include_once("connection.php");

// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$type = mysqli_real_escape_string($link, $_REQUEST['type']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$review_id = $_REQUEST['review_id'];
$user_id = $_SESSION['user_id'];

// If no new image was uploaded, use the existing filename
if ($_FILES['image']['error'] == 4) {
    $filename = $_REQUEST['filename'];
} else {
    // Otherwise, upload the new image and use its filename
    $filename = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
// Updating the review
$sql = "UPDATE review SET title = '$title', type = '$type', address = '$address', description = '$description', filename = '$filename' WHERE id = '$review_id' AND user_id = '$user_id'";

if (mysqli_query($link, $sql)) {
    echo "Record updated successfully.";
    header("Location: pages/review_page.php?id=$review_id");
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
