<?
session_start();
if (isset($_SESSION['user'])) { echo "User: " . $_SESSION['user'];
?>
<a href="pag1.php?logout=1">logout</a>
<? } ?>

<br><br>
<h1>Index</h1>
<a href="pag1.php">page 1</a><br>
<a href="pag2.php">page 2</a><br>
<a href="pag0.php">page with no autentication</a>