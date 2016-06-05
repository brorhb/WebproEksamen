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

	echo 'Info: ' . HentValutaIDFraLandID('2') . '<br><br>';

	//validerEksempel();

	/*$BrukerID = "2";
	$brukernavn = "hei";
	$epost = "jkkjdf@dd.no";
	$ukryptert_passord = "jksdd4";
	$land_id = "160";
	$mobilnummer = "94939394";
	$person_id = "1";

	if(validerBruker($BrukerID, $brukernavn, $epost, $ukryptert_passord, $land_id, $mobilnummer, $person_id)) {
		// Oppfaterfunksjonen kjøres
	}*/

	echo "<br><br>";

	$IDen = "1";

	echo ruteListe($IDen) . '<br>';

	$mobilnummer = "87654321";
	$landID = "160";
	$brukerID = "2";

	if (sjekkOmMobilnummerEksisterer($mobilnummer, $landID, $brukerID)) {
		echo "Mobilnummeret <strong>" . landskodeListe($landID) . $mobilnummer . "</strong> <u>eksisterer</u> for anoen brukere unntatt BrukerID (" . $brukerID . ").";
	}
	else {
		echo "Mobilnummeret <strong>" . landskodeListe($landID) . $mobilnummer . "</strong> <u>eksisterer ikke</u> for anoen brukere unntatt BrukerID (" . $brukerID . ").";
	}

	echo "<br><br>";

	$objektID = "";
	$fraTid = "";
	$tilTil = "";

	echo "<ol>";
		echo "<li>Klasse" . klasseListe($objektID) . "</li>";
		echo "<li>Type_luftfartoy" . type_luftfartoyListe($objektID) . "</li>";
		echo "<li>Passasjertype" . passasjertypeListe($objektID) . "</li>";
		echo "<li>Valuta" . valutaListe($objektID) . "</li>";
		echo "<li>Land" . landListe($objektID) . landskodeListe($objektID) . "</li>";
		echo "<li>Flyplass" . flyplassListe($objektID) . "</li>";
		echo "<li>Bruker (og person)</li>" . brukerListe($objektID) . personListe($objektID);
		echo "<li>Luftfartøy modellspesifikt (modell og <strong>seteoppsett</strong>)" . modellListe($objektID) . "</li>";
		echo "<li>Luftfartoy" . luftfartoyListe($objektID) . "</li>";
		echo "<li>Søkegrupper (gruppe og <strong>flyplass_gruppe</strong>)" . gruppeListe($objektID) . "</li>";
		echo "<li>Tilgang (tilgang og <strong>bruker_tilgang</strong>)" . tilgangListe($objektID) . "</li>";
		echo "<li>Ruter (rute og rute_kombinasjon)" . ruteListe($objektID) . rute_kombinasjonListe($objektID) . "</li>";
		echo "<li>Flighter (flyvning og <strong>pris</strong>)" . flyvningListe($objektID, $fraTid, $tilTid) . "</li>";
		echo "<li>Bestillinger (person, bestilling, <strong>bestilling_flyvning, passasjer_flyvning</strong>)" . bestillingListe($objektID) . "</li>";
	echo "</ol>";


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

	echo "<br>";

	$valutaID = '1';

	if (sjekkOmValutaIDeksisterer($valutaID)) {
		echo '<p>Valuta ID <strong>' . $valutaID . '</strong> eksisterer</p>';
	}
	else {
		echo '<p>Valuta ID <strong>' . $valutaID . '</strong> eksisterer <strong>IKKE</strong></p>';
	}
	

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

<button onclick="myFunction()">Skriv ut feilmeldinger</button>

<script type="text/javascript">

/*function myFunction() {
	var maaFyllesUt = [];
	var kommentar = [];
	var output = "";
	var resultat = false;

	if (true) {
		maaFyllesUt.push("brukernavn");
		resultat = false;
	}
	if (true) {
		maaFyllesUt.push("klasseListe");
		resultat = false;
	}
	if (true) {
		maaFyllesUt.push("klassenavn");
		resultat = false;
	}
	

	//alert(maaFyllesUt);
	//document.getElementById("demo").innerHTML = maaFyllesUt;

	for (var i = 0; i < maaFyllesUt.length; i++) {
		output += maaFyllesUt[i];
		if (i = maaFyllesUt.length - 2) {
			output += "og ";
		}
		else {
			output += ", ";
		}
	}
	if (maaFyllesUt.length > 0) {
		output += " må fylles ut.";
	}
	else {
		output += "Ingen output";
	}

	document.getElementById("demo").innerHTML = output;
}*/

</script>
<p id="demo"></p>