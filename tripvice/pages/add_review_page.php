<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
    <link href="../css/add_review.css?<?=filemtime("../css/add_review.css")?>" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("../session.php");?>
    <?php include_once("../headers/alt_header.php")?>
    <div class="container">
    <h2>Add Review</h2>
    <form action="../add_review.php" method="post" enctype="multipart/form-data" class="add">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="type">Type:</label>
        <select name="type" id="type">
          <option value="Restaurant">Restaurant</option>
          <option value="Hotel">Hotel</option>
          <option value="Museum">Museum</option>
          <option value="Activity">Activity</option>
        </select>
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="6" cols="70" required></textarea><br><br>
        <label for="image">Add Photo:</label>
        <input type="file" name="image">


        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
