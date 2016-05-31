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

	function oppdaterValuta($ValutaID, $valuta_navn, $forkortelse) {
		// Først sjekker man om det eksisterer, hvis det ikke eksisterer med den IDen så lager man en ny. Eksisterer det, oppdaterer man infoen.

		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($id));
		$valuta_navn = connectDB()->real_escape_string(utf8_decode($valuta_navn));
		$forkortelse = connectDB()->real_escape_string(utf8_decode($forkortelse));

		$sql = "INSERT INTO valuta (id, valuta_navn, forkortelse)
		VALUES ('$id', '$valuta_navn', '$forkortelse');";

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
		} else {
			return FALSE;
		}

		connectDB()->close();
	}
?>