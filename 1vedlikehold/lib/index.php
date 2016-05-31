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
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($ValutaID));
		$valuta_navn = connectDB()->real_escape_string(utf8_decode($valuta_navn));
		$forkortelse = connectDB()->real_escape_string(utf8_decode($forkortelse));

		if ($id == '') {

			$sql = "INSERT INTO valuta (id, valuta_navn, forkortelse)
			VALUES ('$id', '$valuta_navn', '$forkortelse');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE valuta SET valuta_navn='$valuta_navn', forkortelse='$forkortelse' WHERE id='$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
			
		connectDB()->close();
	}

	/*$ValutaID = '4';
	$valuta_navn = 'Noe testgreier';
	$forkortelse = 'ERA';

	if(oppdaterValuta($ValutaID, $valuta_navn, $forkortelse)) {
		echo "Noe ble satt inn!";
	}
	else {
		echo "Noe galt skjedde";
	}*/
?>