<?php
	session_start();

	include_once("funksjoner.php");
	//krevInnlogging('0');

	if (!erLoggetInn()) {
		echo '<a href="../login.php"<h2>Logg inn</h2></a>';
	}
	else {
		echo '<a href="logg-ut.php"<h2>Logg ut</h2></a>';
	}

	//echo "Navn: " . HentFulltNavnFraBrukerID(@$_SESSION['brukerID']);

	echo "<br>BrukerID: " . @$_SESSION['brukerID'] . " slutt<br>";

	echo 'Info: ' . HentValutaIDFraLandID('2') . '<br><br>';

	
	echo "<br><br>";

	
	$test = sjekkOmPerson_idEksistereriPassasjer_flyvning("1");

	if ($test) {
		echo "Returnerer true (" . $test . ")";
	}
	else {
		echo "Returnerer false (" . $test . ")";
	}