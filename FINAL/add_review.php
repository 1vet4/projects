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

// Attempt insert query execution
$sql = "INSERT INTO review (title, type, address, description, user_id) VALUES ('$title', '$type', '$address', '$description', '$user_id')";
$sql = "INSERT INTO review (title, type, address, description, user_id) VALUES ('$title', '$type', '$address', '$description', '$user_id')";
if (mysqli_query($link, $sql)) {
    echo "Record added successfully.";
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
