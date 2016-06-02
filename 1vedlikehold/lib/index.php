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

	$IDen = "1";

	echo rute_kombinasjonListe($IDen) . '<br>';

	if (sjekkOmRute_kombinasjonIDeksisterer($IDen)) {
		echo "eksisterer";
	}
	else {
		echo "eksisterer ikke";
	}

	echo "<br><br>";

	$objektID = "";
	echo klasseListe($objektID) . "<br>";
	echo type_luftfartoyListe($objektID) . "<br>";
	echo passasjertypeListe($objektID) . "<br>";
	echo valutaListe($objektID) . "<br>";
	echo landListe($objektID) . "<br>";
	echo flyplassListe($objektID) . "<br>";
	echo modellListe($objektID) . "<br>";
	echo luftfartoyListe($objektID) . "<br>";
	echo gruppeListe($objektID) . "<br>";
	echo tilgangListe($objektID) . "<br>";
	echo rute_kombinasjonListe($objektID) . "<br>";

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

<ol>
	<li>Klasse</li>
	<li>Type_luftfartoy</li>
	<li>Passasjertype</li>
	<li>Valuta</li>
	<li>Land</li>
	<li>Flyplass</li>
	<li>Bruker (og person)</li>
	<li>Luftfartøy modellspesifikt (modell og seteoppsett)</li>
	<li>Luftfartoy</li>
	<li>Søkegrupper (gruppe og flyplass_gruppe)</li>
	<li>Tilgang (tilgang og bruker_tilgang)</li>
	<li>Ruter (rute og rute_kombinasjon)</li>
	<li>Flighter (flyvning og pris)</li>
	<li>Bestillinger (person, bestilling, bestilling_flyvning, passasjer_flyvning)</li>
</ol>