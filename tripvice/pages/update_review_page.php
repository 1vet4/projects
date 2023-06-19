<!DOCTYPE html>
<html>

<head>
  <title>Update Review</title>
  <link href="../css/add_review.css?<?= filemtime("../css/add_review.css") ?>" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>

<body>
  <?php

  include_once("../headers/alt_header.php");
  include_once("../connection.php");
  include_once("../session.php");


  // Check if the review ID is provided
  if (isset($_GET['id'])) {
    $review_id = $_GET['id'];

    // Fetch the existing review data from the database
    $sql = "SELECT * FROM review WHERE id = '$review_id' AND user_id = '{$_SESSION['user_id']}'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if the review exists
    if ($row) {
      // Populate the form with the existing review data
      $title = $row['title'];
      $type = $row['type'];
      $address = $row['address'];
      $description = $row['description'];
      $filename = $row['filename'];
    } else {
      // If the review doesn't exist or doesn't belong to the current user, redirect to an error page or handle it as desired
      header("Location: error.php");
      exit;
    }
  } else {
    // If the review ID is not provided, redirect to an error page or handle it as desired
    header("Location: error.php");
    exit;
  }
  ?>

  <div class="container">
    <h2>Update Review</h2>
    <form action="../update_review.php" method="post" enctype="multipart/form-data" class="add">
      <input type="hidden" name="review_id" value="<?= $review_id ?>">

      <label for="title">Title:</label>
      <input type="text" id="title" name="title" value="<?= $title ?>" required><br><br>

      <label for="type">Type:</label>
      <select name="type" id="type">
        <option value="Restaurant" <?= $type == 'Restaurant' ? 'selected' : '' ?>>Restaurant</option>
        <option value="Hotel" <?= $type == 'Hotel' ? 'selected' : '' ?>>Hotel</option>
        <option value="Museum" <?= $type == 'Museum' ? 'selected' : '' ?>>Museum</option>
        <option value="Activity" <?= $type == 'Activity' ? 'selected' : '' ?>>Activity</option>
      </select>
      <br>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" value="<?= $address ?>" required><br><br>

      <label for="description">Description:</label><br>
      <textarea id="description" name="description" rows="6" cols="70" required><?= $description ?></textarea><br><br>

      <label for="image">Add Photo:</label>
      <input type="file" name="image" required><br>
      <small>You MUST upload an image</small><br>

      <div class="btn-center">
        <input type="submit" value="Update" id="submit-btn">
      </div>
    </form>
  </div>
</body>

</html>