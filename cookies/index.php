<?php 
if(!isSet($_COOKIE['nazwa']) && !isSet($_POST['nazwa'])){
	include("header.html");
	include("Form.html");
	include("footer.html");
}
else if(isSet($_POST['nazwa'])){
	setCookie("nazwa", $_POST['nazwa'], time() + 60);
	setCookie("licznik", 2);
	include("header.html");
	echo("<p>Dziękujemy za podanie danych.</p>");
	include("footer.html");
}
else{

include("header.html");
echo("Witamy, zostałeś rozpoznany jako {$_COOKIE['nazwa']}. odwiedziles nas {$_COOKIE['licznik']} raz w tym roku");
include("footer.html");
setCookie("licznik", $_COOKIE['licznik']+1);

}
?>
