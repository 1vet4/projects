<!DOCTYPE html>
<html>
<head>
  <title>Search Page</title>
  <link href="../css/browse.css?<?=filemtime("../css/browse.css")?>" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>
 
 <?php
      include_once("../headers/alt_header.php");
      include_once("../connection.php");
  ?>


  <main id="main">
  <div class="container">
          <?php
            $sql="SELECT * FROM review WHERE approved=1";
            $result=mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($result)){
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
              }
             
              ?>
             
             <div class="review-box">
        <div class="box">
            <!-- Modify the anchor tag to wrap the image and set its href to the review page -->
            <a href="../pages/review_page.php?id=<?php echo $row['id']; ?>">
                <img src="../uploads/<?php echo $row['filename'] ?>" width="200px" height="200px">
            </a>
        </div>
        <div class="info">
            <p class="small-info"><?php echo $row['type'] ?></p><br>
            <!-- Modify the anchor tag to wrap the review title and set its href to the review page -->
            <a href="../pages/review_page.php?id=<?php echo $row['id']; ?>" class="big-info">
                <?php echo $row['title'] ?>
            </a><br>
            <p class="small-info"><?php echo $authorName['name'] ?></p><br>
            <p class="small-info"><?php echo $ratio ?> % Rating</p><br>
        </div>
    </div>
            
              
         <?php } ?>
          </div>
        
       
        


  </main>
</body>
</html>
