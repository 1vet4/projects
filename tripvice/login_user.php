<?php

if (isset($_SESSION['user_id'])) {
    $_SESSION = array();
    session_destroy();
}

// Start a session
//require_once 'session.php';
include_once("connection.php");

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
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            //check if an admin is logging in, redirect to approving page
            if($user['admin']==1){
                header("Location: approve.php");
                exit();
            }
            // If user, redirect to a logged-in page 
           else{ header("Location: pages/main.php");
            exit();
           }
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
