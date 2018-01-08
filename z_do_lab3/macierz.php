<form action="" method="POST">
<input type="text" name="liczba1" maxlength="2" size="2" value="1">
<input type="text" name="liczba2" maxlength="2" size="2" value="2">
<input type="text" name="liczba3" maxlength="2" size="2" value="3">
<br>
<input type="text" name="liczba4" maxlength="2" size="2" value="4">
<input type="text" name="liczba5" maxlength="2" size="2" value="5">
<input type="text" name="liczba6" maxlength="2" size="2" value="6">
<br>
<input type="text" name="liczba7" maxlength="2" size="2" value="7">
<input type="text" name="liczba8" maxlength="2" size="2" value="8">
<input type="text" name="liczba9" maxlength="2" size="2" value="9">
<input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])) {
$tablica = array([$_POST['liczba1'],$_POST['liczba2'],$_POST['liczba3']],[$_POST['liczba4'],$_POST['liczba5'],$_POST['liczba6']],[$_POST['liczba7'],$_POST['liczba8'],$_POST['liczba9']]);
/*
00 01 02
10 11 12
20 21 22
*/

$wyznacznik = 	$tablica[0][0]*$tablica[1][1]*$tablica[2][2]+
				$tablica[0][1]*$tablica[1][2]*$tablica[2][0]+
				$tablica[0][2]*$tablica[1][0]*$tablica[2][1]-
				$tablica[0][2]*$tablica[1][1]*$tablica[2][0]-
				$tablica[0][1]*$tablica[1][0]*$tablica[2][2]-
				$tablica[0][0]*$tablica[1][2]*$tablica[2][1];


echo"<br> wyznacznik podaj macierzy to: ".$wyznacznik.".<br>";

}
?>