<?php
	session_start();

	include_once("funksjoner.php");
	krevInnlogging('0');

	if (!erLoggetInn()) {
		echo '<a href="logg-inn.php"<h2>Logg inn</h2></a>';
	}
	else {
		echo '<a href="logg-ut.php"<h2>Logg ut</h2></a>';
	}

	//echo "Navn: " . HentFulltNavnFraBrukerID(@$_SESSION['brukerID']);

	echo "<br>BrukerID: " . @$_SESSION['brukerID'] . " slutt<br>";

	echo 'Info: ' . HentValutaIDFraLandID('2');

	

	/*$KlasseID = '6';
	$type = 'En kategori';
	$beskrivelse = '26+ år';

	if(oppdaterKlasse($KlasseID, $type, $beskrivelse)) {
		echo "Noe ble satt inn!";
	}
	else {
		echo "Noe galt skjedde";
	}*/
?>