<?php
 // Connect to the database
$link = mysqli_connect("localhost", "root", "", "tripvice");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>