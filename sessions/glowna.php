<?php
session_start();
if(!isSet($_SESSION['zalogowany'])){
  header("Location: index.php");
}
?>
<html>
<body>
<h1>
ZNASZ LOGIN I HASLO :D
</h1>
<a href="logout.php">LOG OUT</a>
</body>
</html>

