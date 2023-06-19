<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Tripvice</title>
  <link href="../css/title.css?<?=filemtime("../css/title.css")?>" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>

  <?php include_once("../headers/alt_header.php");
        include_once("../connection.php");
  ?>
  

  <main id="main">
    <h1 class="slogan">Start Your travel odyssey</h1>
    <h3>Lastest reviews:</h3>
    <div class="container">
  <?php
            /* Selecting the last 3 rows */
            $sql="SELECT * FROM review WHERE approved=1 ORDER BY id DESC";
            $result=mysqli_query($link,$sql);
            $k=0;
            while($k<3){
              $row=mysqli_fetch_assoc($result);
              /* Get review information */
              $userid=$row['user_id'];
              $authorSQL="SELECT user.name FROM user WHERE user.id='$userid'";
              $authorNameResult=mysqli_query($link,$authorSQL);
              $authorName=mysqli_fetch_assoc($authorNameResult);
              $likes=$row['likes'];
              $dislikes=$row['dislikes'];
              if($dislikes!=0 && $likes!=0){
                $ratio=$likes/($likes+$dislikes)*100;
              }else if($dislikes==0 && $likes!=0){
                $ratio=100;
              }
              else{
                $ratio=0;
              }?>
               <!--Display review logo  -->  
              <div class="review-box">
              <div class="box">
              <a href="../pages/review_page.php?id=<?php echo $row['id'];?>"><img src="../uploads/<?php echo $row['filename']?>" width=200px height="200px"></a>
              </div>
              <div class="info">
             
                <p class="small-info"><?php echo $row['type']?> </p><br>
                <a href="review_page.php" class="big-info"><?php echo $row['title']?></a><br>
                <p class="small-info"><?php echo $authorName['name']?></p><br>
                <p class="small-info"><?php echo $ratio ?> % Rating</p><br>
              </div>
              </div>
            
             
          <?php  $k++; }?> 
        </div>
    <p id="more-reviews">
      <a href="./browse.php">More Reviews</a>
    </p>
    </div>
  </main>
</body>
</html>
