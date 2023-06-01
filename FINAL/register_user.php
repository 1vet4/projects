<?php
$link = mysqli_connect("localhost", "root", "", "tripvice");
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_SESSION['user_id'])) {
    $_SESSION = array();
    session_destroy();
}

$name = mysqli_real_escape_string($link, $_POST['name']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$confirmPassword = mysqli_real_escape_string($link, $_POST['confirm_password']);

if ($password !== $confirmPassword) {
    die("ERROR: Passwords do not match.");
}

// IDK IF WE NEED TO HASH THE PASSWORD
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (name, email, password, admin) VALUES ('$name', '$email', '$hashedPassword', 0)";
if (mysqli_query($link, $sql)) {
    echo "Registration successful.";
    header("Location: login.html");
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>