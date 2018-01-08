<html>
<head>
<title>Odczyt dany bazy</title>
</head>
<body>
<?php
if (!$db_lnk = mysqli_connect("localhost", "s16222", "Mat.Podl"))
{
echo '1blad podczas próby policzenia z serwerem MySQL...<br />';
echo '</body></html>';
exit;
}
if (!mysqli_select_db($db_lnk,'s16222'))
{
mysqli_close($db_lnk);
echo 'blad podczas wyboru bazy danych: s16xxx <br />';
echo '</body></html>';
exit;
}
$query = 'SELECT * FROM osoba';
if(!$result = mysqli_query($db_lnk,$query))
{
mysqli_close($db_lnk);
echo 'blad nieprawidlowe zapytanie... <br />';
echo '</body></html>';
exit;
}
?>
<form action="" method="post">
  Imie:<br>
  <input type="text" name="imie" value=""><br>
  Nazwisko:<br>
  <input type="text" name="nazwisko" value=""><br>
  Rok Urodzenia:<br>
  <input type="number" name="rok" min="1900" max="2018"><br>
  Miejsce Urodzenia:<br>
  <input type="text" name="miejsce" value=""><br>

  <br>
  <input type="submit" value="Submit" name="przycisk"><br><br>
  USUŃ OSOBE O NUMERZE:
  <input type="number" name="numer" min="1" max="100"><br>
  <input type="submit" value="usuń" name="usun">
</form>
<?php
if(isset($_POST['przycisk'])){

$dodaj = "INSERT INTO osoba (Imie, Nazwisko, Rok_urodzenia, Miejsce_urodzenia) VALUES (";
$dodaj .= "'".$_POST['imie']."', '".$_POST['nazwisko']."', ".$_POST['rok'].", '".$_POST['miejsce']."'";
$dodaj .= ") ";

if(!$check = mysqli_query($db_lnk,$dodaj)){
	echo "NIE UDALO SIE DODAC";
} else {
	header('Location: readList.php');
	exit;
}
}
if(isset($_POST['usun'])){
	$usun = "DELETE FROM osoba WHERE Id=".$_POST['numer'];

	if(!$check = mysqli_query($db_lnk,$usun)){
		echo "NIE UDALO SIE USUNAC";
	} else {
		header('Location: readList.php');
		exit;
	}
}

?>
<table>
<tr>
<td>Id</td>
<td>Imie</td>
<td>Nazwisko</td>
<td>Rok urodzenia</td>
<td>Miejsce urodzenia</td>
</tr>
<?php
while($row = mysqli_fetch_row($result))
{ echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "</tr>";
}
?>
</table>
<?php
if(!mysqli_close($db_lnk))
{
echo  'blad podczas zamykania policzenia z serwerem MySQL...<br />';
}
?>
</body>
</html>
