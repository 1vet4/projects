<!DOCTYPE html>
<html>
<head>
  <title>Main Page</title>
  <link href="../css/main.css?<?=filemtime("../css/main.css")?>" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>
  
<?php
 include("../session.php");
?>

 <!-- Include a different header once logged in -->
 <?php include("../headers/alt_header.php")?> 
<main id="main">
  <h1 class="slogan">Start your travel odyssey</h1>
  
          
  <p id="more-reviews">
    <a href="./browse_user.php" class="more-reviews">More Reviews</a>
  </p>
</main>
</body>
</html>

</body>
</html>
