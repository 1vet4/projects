<?php

include_once("connection.php");

?>
<!DOCTYPE html>
<head>
    <title>Approve Reviews</title>
    <meta charset="utf-8">
    <link href="css/approve.css?<?=filemtime("css/approve.css")?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">

</head>
<body>

   
<header>
    
   
  <ul class="navbar">
   <li class=logo> Approve Reviews</li>
    <li class="log-out"><a href="./logout.php" >Log out</a>

  </ul>
</header>
        <table id="reviews">
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Title</th>
                <th>Type</th>
                <th>Address</th>
                <th>Review</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            $query="SELECT * FROM review WHERE approved=0 ORDER BY id ASC";
            $result=mysqli_query($link,$query);
            while($row=mysqli_fetch_array($result)){
?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['user_id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['type']?></td>
            <td><?php echo $row['address']?></td>
            <td><?php echo $row['description']?></td>
            <td><img src="./uploads/<?php echo $row['filename']?>" width=150px height="150px"></td>
            <td>
                <form action="approve.php" method="POST">
                    <input type="hidden" name="id" value=<?php echo $row['id']?>>
                    <input type="submit" name="approve" value="Approve">
                    <input type="submit" name="deny" value="Deny">

                </form>
            </td>
        </tr>
        <?php
            }
            ?>
        </table>
       
    </div>
    <?php 
    if(isset($_POST["approve"])){
        $id=$_POST['id'];
        $select="UPDATE review SET approved = 1 WHERE id='$id'";
        $result=mysqli_query($link,$select);
        header("Location: approve.php");

    };
    if(isset($_POST["deny"])){
        $id=$_POST['id'];
        $select="DELETE FROM review WHERE id='$id'";
        $result=mysqli_query($link,$select);
        header("Location: approve.php");
    };

?>
</body>