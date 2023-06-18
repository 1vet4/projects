<?php

include_once("connection.php");
if (isset($_SESSION['user_id'])) {
    $_SESSION = array();
    session_destroy();
}

$name = mysqli_real_escape_string($link, $_POST['name']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$confirmPassword = mysqli_real_escape_string($link, $_POST['confirm_password']);

//Function to check if an email already exists
function checkEmail($email,$link) {
    $sql="SELECT * FROM user WHERE email='$email'";
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $rows= mysqli_query($link,$sql);

    if (mysqli_num_rows($rows) == 0) {
        return true;
    }

    return false;
}

//Add user
if (checkEmail($_POST['email'],$link)) {
    if ($password !== $confirmPassword) {
        //Need to add append a message in the page in div id=error-msg
        die("ERROR: Passwords do not match.");
    }
    else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (name, email, password, admin) VALUES ('$name', '$email', '$hashedPassword', 0)";
             if (mysqli_query($link, $sql)) {
                  echo "Registration successful.";
                     header("Location: pages/login.php");
            }
            else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
    }
}
else {
   echo "Email already exists";
}



?>