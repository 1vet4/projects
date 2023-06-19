<!DOCTYPE html>
<html>
    <head>
  
  <title>Profile</title>
  <link href="../css/profile.css?<?=filemtime("../css/profile.css")?>" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">

    </head>
    <body>
            <?php 
                  include("../session.php");
                  include("../connection.php");
                  include("../headers/alt_header.php");
            ?>
            <main id="main">
            <h2>My reviews</h2><br>
            <h4>Waiting for approval:</h4>
            
            <div class="container">
          <?php
            $userid=$_SESSION['user_id'];
            $sql = "SELECT *, review.id AS review_id, review.user_id AS author_id FROM review JOIN user ON review.user_id = user.id WHERE review.approved = 0 AND user.id = $userid";
            $result=mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($result)){
              $reviewId = $row['review_id'];
              $authorId = $row['author_id'];
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
              if($userid == $authorId && $row['approved']==0){
                
              ?>
             
             <div class="review-box">
              <div class="box">
              <a href="../pages/review_page.php?id=<?php echo $reviewId;?>"><img src="../uploads/<?php echo $row['filename']?>" width=200px height="200px"></a>
              </div>
              <div class="info">
                <p class="small-info"><?php echo $row['type']?> </p><br>
                <a href="review_page.php" class="big-info"><?php echo $row['title']?></a><br>
                <p class="small-info"><?php echo $ratio ?> % Rating</p><br>
              </div>
              </div>
            
              
         <?php }} ?>
          </div>
          <h4>Approved:</h4><br>
            <div class="container">
            
            <?php
                 $userid=$_SESSION['user_id'];
                 $sql = "SELECT *, review.id AS review_id, review.user_id AS author_id FROM review JOIN user ON review.user_id = user.id WHERE review.approved = 1 AND user.id = $userid";
                 $result=mysqli_query($link,$sql);
                 while($row=mysqli_fetch_assoc($result)){
                  $reviewId = $row['review_id'];
                  $authorId = $row['author_id'];
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
                   if($userid == $authorId && $row['approved']==1){

                   ?>
                  
                  <div class="review-box">
                   <div class="box">
                   <a href="../pages/review_page.php?id=<?php echo $reviewId;?>"><img src="../uploads/<?php echo $row['filename']?>" width=200px height="200px"></a>
                   </div>
                   <div class="info">
                     <p class="small-info"><?php echo $row['type']?> </p><br>
                     <a href="review_page.php" class="big-info"><?php echo $row['title']?></a><br>
                     <p class="small-info"><?php echo $ratio ?> % Rating</p><br>
                   </div>
                   </div>
                 
           <?php }} ?>
            </div>
    </body>
</html>