

<meta charset="utf-8">
<html>
<head>
<title>Kalkulator finansowy</title>
</head>
<body>

<form method="POST" action="">
<h2>Kalkulator kredytowy</h2>
<table>
<tr>
<td>Kwota kredytu</td>
<td><input type="number" name="kwota" min = "0" max="10000000" value="100000" size="10"></td>
</tr>
<tr>
<td>Okres w miesiącach</td>
<td><input type="number" name="miesiac" min = "1" max = "420" value="12" size="4" ></td>
</tr>
<tr>
<td>Oprocentowanie</td>
<td><input type="text" name="oprocentowanie" value="3.5" size="4"></td>
</tr>
<tr>
<td>Rodzaj rat</td>
<td><select name="rodzaj_rat">
<option>Równe</option>
<option>Malejące</option>
</select></td>
</tr>
</table>
<br />
<input type="submit" name="oblicz" value="Oblicz">
<br /><br>
<h2>Kalkulator lokat</h2>
<table>
<tr>
<td>Kwota lokaty</td>
<td><input type="number" name="kwota_lokaty" min = "0" max="10000000" value="100000" size="10"></td>
</tr>
<tr>
<td>Okres w miesiącach</td>
<td><input type="number" name="miesiac_lokaty" min = "1" max = "420" value="12" size="4" ></td>
</tr>
<tr>
<td>Oprocentowanie</td>
<td><input type="text" name="oprocentowaniel_lokaty" value="3.5" size="4"></td>
</tr>
<tr>
<td>Rodzaj kapitalizacji</td>
<td><select name="rodzaj_kapitalizacji">
<option value="1D" selected="selected">1 dzień</option>
<option value="1M" >1 miesiąc</option>
<option value="1Y" >1 rok</option>
<option value="0" >na koniec lokaty</option>
</select></td>
</tr>
</table>
<br />
<input type="submit" name="oblicz_lokate" value="Oblicz">

</form>
<?php

if(isset($_POST['oblicz'])){

	$kwota = $_POST["kwota"];
	$miesiac = $_POST["miesiac"];
	$oprocentowanie = (float)$_POST["oprocentowanie"];
	$rodzaj_rat = $_POST["rodzaj_rat"];

	print ("kwota $kwota , liczba miesiecy $miesiac , oprocentowanie $oprocentowanie , rodzaj rat $rodzaj_rat<br /><br />");

	if ($rodzaj_rat == "Równe"){
		$wspolczynnik = 1 + ($oprocentowanie/1200);
		$potega = pow($wspolczynnik, $miesiac);
		 $rata = $kwota * $potega * $wspolczynnik * ($wspolczynnik-1) / ($potega-1);
		$rata = round($rata,2);
		$suma = $rata * $miesiac;
		print ("rata wyniesie $rata<br /> <br />całkowity koszt kredytu: $suma");

	} else {
		$rata_kapitałowa = round($kwota/$miesiac,2);
		$kwota_pozostala_do_splaty = $kwota;
		$suma = 0;

		for ($i=1;$i<$miesiac;$i++){
			$rata_odsetkowa = $kwota_pozostala_do_splaty * $oprocentowanie / 1200;
			$rata_odsetkowa = round ($rata_odsetkowa, 2 , PHP_ROUND_HALF_UP);
			$rata = $rata_kapitałowa + $rata_odsetkowa;
			print("rata $i. wynosi: $rata<br />");
			$kwota_pozostala_do_splaty -= $rata_kapitałowa;
			$suma += $rata;
		}
		$suma += $kwota_pozostala_do_splaty;
		print("rata $miesiac. wynosi: $kwota_pozostala_do_splaty  <br /> całkowity koszt kredytu: $suma");
	}

}

if(isset($_POST['oblicz_lokate'])){

	$kwota_lok = $_POST["kwota_lokaty"];
	$miesiac_lok = $_POST["miesiac_lokaty"];
	$oprocentowanie_lok = (float)$_POST["oprocentowaniel_lokaty"];
	$rodzaj_kap = $_POST["rodzaj_kapitalizacji"];
	switch ($rodzaj_kap){
		case "1D":
			$wyswietl_kap = "dzienna";
			break;
		case "1M":
			$wyswietl_kap = "miesięczna";
			break;
		case "1Y":
			$wyswietl_kap = "roczna";
			break;
		case "0":
			$wyswietl_kap = "na koniec lokaty";
			break;
		default:
			$wyswietl_kap = "nie podano";
			break;
	}
	print ("kwota $kwota_lok , liczba miesiecy $miesiac_lok , oprocentowanie $oprocentowanie_lok % , rodzaj kapitalizacji $wyswietl_kap<br /><br />");
	$dni_w_miesiacu = [31,28,31,30,31,30,31,31,30,31,30,31];
	$dzis_dzien = date(d);
	$dzis_miesiac = date(m) - 1;
	$suma_lokaty = $kwota_lok;
	$niepelnny_cykl = 0;
	$oprocentowanie_lok /= 100;
	$ilosc_cykli = 0;


	switch ($rodzaj_kap){
		case "1D":
			while($miesiac_lok--){
				$ilosc_cykli+=$dni_w_miesiacu[$dzis_miesiac];
				$dzis_miesiac++;
				$dzis_miesiac %= 12;
			}
			$oprocentowanie_lok /= 365;
			break;
		case "1M":
			$ilosc_cykli = $miesiac_lok;
			$oprocentowanie_lok /= 12;
			break;
		case "1Y":
			$ilosc_cykli = $miesiac_lok/12;
			if(!is_int($ilosc_cykli)){
				echo 'podaj liczbę miesięcy pokrywającą się z cyklem (wielokrotność 12) <br />';
				echo '</body></html>';
				exit;
			}


			break;
		case "0":
			$ilosc_cykli = 0;
			$niepelnny_cykl = $miesiac_lok/12;
			break;
	}

	for( $i=0; $i<$ilosc_cykli ; $i++){
		$suma_lokaty *= 1 + $oprocentowanie_lok;
		$suma_lokaty = round($suma_lokaty,2);
	}

	if($niepelnny_cykl > 0){
		$suma_lokaty *= 1 + ($oprocentowanie_lok * $niepelnny_cykl);
		$suma_lokaty = round($suma_lokaty,2);
	}
	$kwota_lok = $suma_lokaty - $kwota_lok;


	print ("Otrzymasz: $suma_lokaty, czyli zarobiłeś $kwota_lok");





}

?>

</body>
</html>