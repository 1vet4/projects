<!DOCTYPE html>
<html>
<head>
    <title>Page 2</title>
</head>
<body>
    <h1 style="color:
        <?php
        // Check if the cookie is set
        if (isset($_COOKIE['selected_color'])) {
            $selectedColor = $_COOKIE['selected_color'];
            echo $selectedColor;
        } else {
            echo 'black'; // Default color if the cookie is not set
        }
        ?>
        ">
        Title
    </h1>
</body>
</html>
