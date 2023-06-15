<!-- Alternating a header depending on if a user or a guest is on the page -->

<header>
    <?php
            /* Still need to check if a user is logged in and then display a different header */
           if (isset($_SESSION['user_id'])){
            include_once("user_header.php");
            include_once("user_greeting.php");
           }
           else{
            include_once("guest_header.php");
           }

    
    ?>
</header>