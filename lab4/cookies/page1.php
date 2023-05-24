<!DOCTYPE html>
<html>
<head>
    <title>Color Selection Form</title>
</head>
<body>
    <h2>Color Selection Form</h2>
    <form method="post" action="">
        <label for="color">Select a color:</label>
        <select name="color" id="color">
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="yellow">Yellow</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $color = $_POST['color'];

        // Set the cookie
        setcookie('selected_color', $color, time() + 3600, '/');

        echo '<p>Selected color: ' . $color . '</p>';
        echo '<p><a href="page2.php">Go to Page 2</a></p>';
    }
    ?>
</body>
</html>
