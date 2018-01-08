<h3>Lotto</h3>

<form action="" method="POST">
<input type="text" name="liczba1" maxlength="2" size="2" value="1">
<input type="text" name="liczba2" maxlength="2" size="2" value="2">
<input type="text" name="liczba3" maxlength="2" size="2" value="3">
<input type="text" name="liczba4" maxlength="2" size="2" value="4">
<input type="text" name="liczba5" maxlength="2" size="2" value="5">
<input type="text" name="liczba6" maxlength="2" size="2" value="6">
<input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])) {
	$liczby_uzytkownika = array($_POST['liczba1'],$_POST['liczba2'],$_POST['liczba3'],$_POST['liczba4'],$_POST['liczba5'],$_POST['liczba6']);
	$lotto = [];
    $ile_trafionych = 0;

    do {
        $losuj = rand(1,49);
        if (!(in_array($losuj,$lotto))) {
                $lotto[] = $losuj;
	              if(in_array($losuj,$liczby_uzytkownika)){
                		$ile_trafionych++;
                }
            }

    } while (sizeOf($lotto) < 6);

    echo "Wylosowane liczby:<br><br>";
    echo "<img src=lotto/p".$lotto[0].".png width=50>";
    echo "<img src=lotto/p".$lotto[1].".png width=50>";
    echo "<img src=lotto/p".$lotto[2].".png width=50>";
    echo "<img src=lotto/p".$lotto[3].".png width=50>";
    echo "<img src=lotto/p".$lotto[4].".png width=50>";
    echo "<img src=lotto/p".$lotto[5].".png width=50>";
	echo "<br><br>";



    echo "<br>Trafiles ".$ile_trafionych." liczb<br><br>";
    if ($ile_trafionych > 2){
    	 	echo "!!!!!!  gratulacje  !!!!!!";
    }
}


?>
