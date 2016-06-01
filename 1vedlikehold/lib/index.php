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

	echo 'Info: ' . HentValutaIDFraLandID('2') . '<br>';

	echo landListe('800') . '<br>';

	/* Eksempel på valider bruker */

	/*$BrukerID = '9';
	$brukernavn = '5j';
	$epost = 't.ramm@hotm.comd';
	$ukryptert_passord = '8988h';
	$land_id = '8';
	$mobilnr = '12228234';
	$person_id = '2';*/

	$BrukerID = '43';
	$brukernavn = 'jh';
	$epost = 'klfd.df@fd.fd.dd.dd';
	$ukryptert_passord = 'jjssj';
	$land_id = '3';
	$mobilnr = '393939333';
	$person_id = '3';

	$tilbakemelding = validerBruker($BrukerID, $brukernavn, $epost, $ukryptert_passord, $land_id, $mobilnr, $person_id);

	for ($i=0; $i < count($tilbakemelding); $i++) { 
		echo '<span style="color:red;">' . $tilbakemelding[$i] . '</span><br>';
	}

	/* Slutt eksempel på valider bruker */
	

	/*$FlyplassID = '';
	$navn = 'Bjkjkjkdfjkdjkfror og';
	$flyplasskode = 'OSL';
	$latitude = '123';
	$lontitude = '123';
	$tidssone_gmt = '1';
	$land_id = '1';

	echo oppdaterFlyplass($FlyplassID, $navn, $flyplasskode, $latitude, $lontitude, $tidssone_gmt, $land_id);*/

	/*$LuftfartoyID = '4';
	$modell_id = '1';
	$tailnr = 'LN3846';

	if(oppdaterLuftfartoy($LuftfartoyID, $modell_id, $tailnr)) {
		echo "Noe ble satt inn!";
	}
	else {
		echo "Noe galt skjedde";
	}*/

	/*$PersonID = '';
	$fornavn = 'Fornavn åøæ';
	$etternavn = 'Etternavn då';
	$fodselsdato = '478276237235';

	if (oppdaterPerson($PersonID, $fornavn, $etternavn, $fodselsdato)) {
		echo "Noe ble satt inn!";
	}
	else {
		echo "Noe galt skjedde";
	}*/

	//connectDB();

	/*$sql = "INSERT INTO flyplass (id, navn, flyplasskode, latitude, longitude, tidssone_gmt, land_id)
			VALUES ('', 'Testnavn', 'ABC', '123', '123', '1', '1');";*/
	/*$sql = "UPDATE flyplass SET navn='Navnet', flyplasskode='KOD', latitude='123', longitude='123', tidssone_gmt='1', land_id='1' WHERE id='1';";
	connectDB()->query($sql);
	echo 'Rader berørt: ' . connectDB()->affected_rows;*/
?>