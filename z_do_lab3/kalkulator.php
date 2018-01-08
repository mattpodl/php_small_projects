<h1>Kalkulator</h1>

<h2>Prosty</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="text" name="liczba1">

<select name="dzialanie">

    <option value="dodawanie">dodawanie</option>
    <option value="odejmowanie">odejmowanie</option>
    <option value="mnozenie">mnozenie</option>
    <option value="dzielenie">dzielenie</option>

</select>

<input type="text" name="liczba2">
<br><br>
<input type="submit" value="oblicz" name="oblicz">


<hr>

<h2>Zaawansowany</h2>
<input name="liczba">
<select name="dzialanie2">
<option value="sin">sin</option>
<option value="cos">cos</option>
<option value="tg">tg</option>
<option value="decbin">dziesietne na binarne</option>
<option value="bindec">binarne na dziesietne</option>
<option value="dechex">dziesietne na szesnastkowe</option>
<option value="hexdec">szesnastkowe na dziesietne</option>
<option value="deg2rad">stopnie na radiany</option>
<option value="rad2deg">radiany na stopnie</option>
</select>
<input type="submit" value="oblicz" name="oblicz2">
</form>


<?php
if(isset($_POST['oblicz'])) {
	if (isset ($_POST['liczba1']) && isset($_POST['liczba2'])) {

	if(is_numeric($_POST['liczba1']) && is_numeric($_POST['liczba2'])){
		switch ($_POST['dzialanie']) {
			case 'dodawanie':
				$wynik = $_POST['liczba1'] + $_POST['liczba2'];
				break;
			case 'odejmowanie':
				$wynik = $_POST['liczba1'] - $_POST['liczba2'];
				break;
			case 'mnozenie':
				$wynik = $_POST['liczba1'] * $_POST['liczba2'];
				break;
			case 'dzielenie':
				if ($_POST['liczba2'] === 0){
					$wynik = 'nie mozna wykonać dzielenia przez 0';
					break;
				} else {
					$wynik = $_POST['liczba1'] / $_POST['liczba2'];
					break;
				}
		}
		echo 'Wynik dzialania to: ' .$wynik;
	}

}

}

if(isset($_POST['oblicz2'])) {
	$liczba = $_POST['liczba'];
	$wynik2 = $_POST['dzialanie2'];
	echo "wynik dzialania to : ";

	switch($wynik2) {
		case "sin": echo sin($liczba);
		case "cos": echo cos($liczba);
		case "tg": echo tan($liczba);
		case "decbin": echo decbin($liczba);
		case "bindec": echo bindec($liczba);
		case "dechex": echo dechex($liczba);
		case "hexdec": echo hexdec($liczba);
		case "deg2rad": echo deg2rad($liczba);
		case "rad2deg": echo rad2deg($liczba);
		break;
	}
}

?>



