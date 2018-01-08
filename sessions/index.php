<?php
session_start();
if(isSet($_SESSION['zalogowany'])){
  header("Location: glowna.php");
}
else if(isSet($_POST['login']) && isSet($_POST['haslo'])){
  if($_POST['login'] == 'admin' && $_POST['haslo'] == '12345'){
    $_SESSION['zalogowany'] = 'login';
    header("Location: glowna.php");
  }
  else{
    echo ("Niepoprawne dane logowania.");
  }
}
?>
<html>
<head>
<title>Wprowadz dane logowania</title>
</head>
<body>
<div>
<form action = ""
      method = "POST"
>

<table border="1"><tr>
<td>LOGIN:</td>
<td>
  <input type="text" name="login" />
</td>
</tr><tr>
<td>haslo:</td>
<td>
  <input type="password" name="haslo" />
</td>
</tr><tr>
<td colspan="2" align="center">
  <input type="submit" value="potwierdz" />
</td>
</tr></table>

</form>
</div>


