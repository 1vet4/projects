<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label>
    <input type="text" id="password" name="password"><br><br>
    <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the login credentials are correct
    if ($username === 'aaaa' && $password === 'bbbb') {
        // Redirect to afterlogin.php
        header('Location: afterlogin.php');
    } else {
        echo 'Invalid username or password';
    }
    }
    ?>

</body>
</html>