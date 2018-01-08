<?php 
if(!isSet($_COOKIE['licznik']) && !isSet($_POST['licznik'])){
	include("header.html");
	echo ("Odwiedziles strone 1 raz");
	include("footer.html");
}
else if(isSet($_POST['nazwa'])){
	setCookie("nazwa", $_POST['nazwa'], time() + 60*60*24*365);
	include("header.html");
	echo("<p>Dziękujemy za podanie danych.</p>");
	include("footer.html");
}
else{
include("header.html");
echo("Witamy, zostałeś rozpoznany jako {$_COOKIE['nazwa']}.");
include("footer.html");
}
?>
