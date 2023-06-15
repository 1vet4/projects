<div>
    <p> Welcome, </p>
    <?php
    
    $link = mysqli_connect("localhost", "root", "", "tripvice");

    if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

     $sql="SELECT name FROM user WHERE user_id=$userid";
    $result=mysqli_query($link,$sql);

     echo '<p>'.$result.' </p>'
    ?>
</div>