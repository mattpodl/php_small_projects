<?php

if(!$db_lnk = mysqli_connect("localhost", "s16222", "Mat.Podl")) {
exit('wystapil blad podczas proby polaczenia z serwerem mySQL!');
}
else{
echo 'polaczenie z baza danych zostalo nawiazne... <br />';
}

if(!mysqli_select_db($db_lnk, 's16222')) {
echo 'wystapil blad podczas wyboru bazy danych <br />';
}
else {
echo 'zostala wybrana baza danych <br /> ';
}

if(!mysqli_close($db_lnk)) {
echo 'wystapil blad podczas zamykania polaczenia z serwerem MySQL <br />';
}
else {
echo 'Polaczenie z serwerem MySQL zostalo zamkniete... <br />';
}

?>
