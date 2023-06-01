<?php

if (isset($_SESSION['user_id'])) {
    $_SESSION = array();
    session_destroy();
}

// Start a session
require_once 'session.php';

$link = mysqli_connect("localhost", "root", "", "tripvice");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($link, $sql);

if ($result) {
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            echo("password is verified <br>");
            // Password is correct, start a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            // Redirect to a logged-in page or perform any other necessary actions
            header("Location: main.html");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
