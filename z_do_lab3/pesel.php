<h2>PESEL</h2>

<form action="" method="POST">
<input type="text" name="text">
<input type="submit" value="zatwierdz" name="submit">

</form>

<?

if (isset($_POST['submit'])) {
    $pesel = $_POST['text'];
    podziel($pesel);
}

function podziel($pesel){

	$rok = substr($pesel,0,2);
	$miesiac = substr($pesel,2,2);
	$dzien = substr($pesel,4,2);
    $plec = $pesel[9];


    if($miesiac > 12){
    $rok = "20".$rok;
    $miesiac-=21;
    } else {
    	$rok = "19".$rok;
    	$miesiac-=1;
    }
    $nazwy_miesiecy=array("Styczen", "Luty","Marzec","Kwiecien","Maj","Czerwiec","Lipiec","Sierpien","Wrzesien","Pazdziernik","Listopad","Grudzien");

    if ($plec % 2 == 0) {
    		echo "Urodzilas sie $dzien.$nazwy_miesiecy[$miesiac].$rok. I jestes kobieta.";
    } else {
    		echo "Urodziles sie $dzien.".$nazwy_miesiecy[$miesiac].".$rok. I jestes mezczyzna.";
    }

}

?>
