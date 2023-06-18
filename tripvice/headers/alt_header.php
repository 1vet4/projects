<!-- Alternating a header depending on if a user or a guest is on the page -->

<header>
    <?php

           if (isset($_SESSION['user_id'])){
            include("user_header.php");
            
           }
           else{
            include("guest_header.php");
           }

    
    ?>
</header>