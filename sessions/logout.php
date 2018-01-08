<?php
session_start();
if(isSet($_SESSION['zalogowany'])){
  unset($_SESSION['zalogowany']);
}
else{
  header("Location: index.php");
}
if(isset($_COOKIE[session_name()])){
  setcookie(session_name(), '', time());
}
session_destroy();
header("Location: index.php");
?>

<html>
<body>
<h3>wylogowales sie</h3>
</body>
</html>


