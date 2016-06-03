<?php

	function erLoggetInn() {
		@session_start();
		if (is_numeric(@$_SESSION['brukerID'])) {
			return true;
		}
		else {
			return false;
		}
	}

	function krevInnlogging($tilgangID) {
		if (!erLoggetInn())
		{
			$innhold = include 'logg-inn.php';
			die($innhold);
		}
	}

	/*function krevTilgang($tilgangID) {
		krevInnlogging();
		// Gjøre sånn at tilgangID kan være et array med flere tilganger som kreves
		@session_start();
		if (!is_numeric(@$_SESSION['brukerID']))
		{
			$innhold = include 'logg-inn.php';
			//die($innhold);
			die($innhold);
		}
	}/*

	/*if (erLoggetInn()) {
		$BrukerID = $_SESSION['brukerID'];
	}*/

	function connectDB() {
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "web-is-gr02w";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		//echo "Connected successfully";

		return $conn;
	}

	function oppdaterKlasse($KlasseID, $type, $beskrivelse) {
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($KlasseID));
		$type = connectDB()->real_escape_string(utf8_decode($type));
		$beskrivelse = connectDB()->real_escape_string(utf8_decode($beskrivelse));

		if ($id == '') {

			$sql = "INSERT INTO klasse (id, type, beskrivelse)
			VALUES ('$id', '$type', '$beskrivelse');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE klasse SET type='$type', beskrivelse='$beskrivelse' WHERE id='$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
			
		connectDB()->close();
	}

	function slettKlasse($KlasseID) {
		connectDB();

		$sql = "DELETE FROM klasse WHERE id = '$KlasseID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function oppdaterType_luftfartoy($TypeID, $type) {
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($TypeID));
		$type = connectDB()->real_escape_string(utf8_decode($type));

		if ($id == '') {

			$sql = "INSERT INTO type_luftfartoy (id, type)
			VALUES ('$id', '$type');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE type_luftfartoy SET type='$type' WHERE id='$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
			
		connectDB()->close();
	}

	function slettType_luftfartoy($TypeID) {
		connectDB();

		$sql = "DELETE FROM type_luftfartoy WHERE id = '$TypeID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function oppdaterPassasjertype($PassasjertypeID, $type, $beskrivelse) {
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($PassasjertypeID));
		$type = connectDB()->real_escape_string(utf8_decode($type));
		$beskrivelse = connectDB()->real_escape_string(utf8_decode($beskrivelse));

		if ($id == '') {

			$sql = "INSERT INTO passasjertype (id, type, beskrivelse)
			VALUES ('$id', '$type', '$beskrivelse');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE passasjertype SET type='$type', beskrivelse='$beskrivelse' WHERE id='$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
			
		connectDB()->close();
	}

	function slettPassasjertype($PassasjertypeID) {
		connectDB();

		$sql = "DELETE FROM passasjertype WHERE id = '$PassasjertypeID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

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

	function slettValuta($ValutaID) {
		connectDB();

		$sql = "DELETE FROM valuta WHERE id = '$ValutaID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function oppdaterLand($LandID, $navn, $landskode, $valuta_id, $iso, $iso3) {
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($LandID));
		$navn = connectDB()->real_escape_string(utf8_decode($navn));
		$landskode = connectDB()->real_escape_string(utf8_decode($landskode));
		$valuta_id = connectDB()->real_escape_string(utf8_decode($valuta_id));
		$iso = connectDB()->real_escape_string(utf8_decode($iso));
		$iso3 = connectDB()->real_escape_string(utf8_decode($iso3));

		if ($id == '') {

			$sql = "INSERT INTO land (id, navn, landskode, valuta_id, iso, iso3)
			VALUES ('$id', '$navn', '$landskode', '$valuta_id', '$iso', '$iso3');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE land SET navn='$navn', landskode='$landskode', valuta_id='$valuta_id', iso='$iso', iso3='$iso3' WHERE id='$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
			
		connectDB()->close();
	}

	function slettLand($LandID) {
		connectDB();

		$sql = "DELETE FROM land WHERE id = '$LandID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function oppdaterFlyplass($FlyplassID, $navn, $flyplasskode, $latitude, $longitude, $tidssone_gmt, $land_id) {
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($FlyplassID));
		$navn = connectDB()->real_escape_string(utf8_decode($navn));
		$flyplasskode = connectDB()->real_escape_string(utf8_decode($flyplasskode));
		$latitude = connectDB()->real_escape_string(utf8_decode($latitude));
		$longitude = connectDB()->real_escape_string(utf8_decode($longitude));
		$tidssone_gmt = connectDB()->real_escape_string(utf8_decode($tidssone_gmt));
		$land_id = connectDB()->real_escape_string(utf8_decode($land_id));

		if ($id == '') {
			$sql = "INSERT INTO flyplass (id, navn, flyplasskode, latitude, longitude, tidssone_gmt, land_id)
			VALUES ('$id', '$navn', '$flyplasskode', '$latitude', '$longitude', '$tidssone_gmt', '$land_id');";
			$tilbalemelding = 'Satt inn:;';
		}
		else {
			$sql = "UPDATE flyplass SET navn='$navn', flyplasskode='$flyplasskode', latitude='$latitude', longitude='$longitude', tidssone_gmt='$tidssone_gmt', land_id='$land_id' WHERE id='$id';";
			$tilbalemelding = 'Oppdatert:;';
		}

		if (connectDB()->query($sql) === TRUE AND connectDB()->affected_rows != 0) {
			$tilbalemelding .= " Kult! Rader berørt: " . connectDB()->affected_rows;
		}
		else {
			$tilbalemelding .= " Falsk... Rader berørt: " . connectDB()->affected_rows;
		}

		connectDB()->close();

		return $tilbalemelding;
	}

	function slettFlyplass($FlyplassID) {
		connectDB();

		$sql = "DELETE FROM flyplass WHERE id = '$FlyplassID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	/* bruker, person, modell og seteoppsett kommer her */

	function oppdaterPersonBruker($brukerID, $personID, $brukernavn, $ukryptertPassord, $fornavn, $etternavn, $fodselsdato, $landID, $epost, $mobilnr) {
		
		connectDB();

		$brukerID = connectDB()->real_escape_string(utf8_decode($brukerID));
        $personID = connectDB()->real_escape_string(utf8_decode($personID));
        $brukernavn = connectDB()->real_escape_string(utf8_decode($brukernavn));
        $ukryptertPassord = connectDB()->real_escape_string(utf8_decode($ukryptertPassord));
        $kryptertPassord = md5($ukryptertPassord);
		$fornavn = connectDB()->real_escape_string(utf8_decode($fornavn));
		$etternavn = connectDB()->real_escape_string(utf8_decode($etternavn));
		$fodselsdato = connectDB()->real_escape_string(utf8_decode($fodselsdato));
        $landID = connectDB()->real_escape_string(utf8_decode($landID));
        $epost = connectDB()->real_escape_string(utf8_decode($epost));
        $mobilnr = connectDB()->real_escape_string(utf8_decode($mobilnr));

		if ($id == '') {

			$sql = "START TRANSACTION;
                    INSERT INTO person (id, fornavn, etternavn, fodselsdato) VALUES ('', '$fornavn', '$etternavn', '$fodselsdato');
                    INSERT INTO bruker (id, brukernavn, epost, passord, land_id, mobilnr, person_id) VALUES ('', '$brukernavn', '$epost', '$kryptertPassord', '$landID', '$mobilnr', (SELECT MAX(id) FROM person));
                    COMMIT;";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "START TRANSACTION;
                    UPDATE person SET fornavn='$fornavn', etternavn='$etternavn', fodselsdato='$fodselsdato' WHERE id='$personID';
                    UPDATE bruker SET brukernavn='$brukernavn', epost='$epost', passord='$kryptertPassord', land_id='$landID', mobilnr='$mobilnr' WHERE person_id='$personID';
                    COMMIT;";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		connectDB()->close();
	}

    function slettPersonBruker() {
        connectDB();

		$sql = "DELETE FROM valuta WHERE id = '$ValutaID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
    }

    function oppdaterPerson($PersonID, $fornavn, $etternavn, $fodselsdato) {
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($PersonID));
		$fornavn = connectDB()->real_escape_string(utf8_decode($fornavn));
		$etternavn = connectDB()->real_escape_string(utf8_decode($etternavn));
		$fodselsdato = connectDB()->real_escape_string(utf8_decode($fodselsdato));

		if ($id == '') {

			$sql = "INSERT INTO person (id, fornavn, etternavn, fodselsdato)
			VALUES ('$id', '$fornavn', '$etternavn', '$fodselsdato');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE person SET fornavn='$fornavn', etternavn='$etternavn', fodselsdato='$fodselsdato' WHERE id='$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		connectDB()->close();
	}

	function slettPerson($PersonID) {
		connectDB();

		$sql = "DELETE FROM person WHERE id = '$PersonID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function oppdaterLuftfartoy($LuftfartoyID, $modell_id, $tailnr) {
		
		connectDB();

		$id = connectDB()->real_escape_string(utf8_decode($LuftfartoyID));
		$modell_id = connectDB()->real_escape_string(utf8_decode($modell_id));
		$tailnr = connectDB()->real_escape_string(utf8_decode($tailnr));

		if ($id == '') {

			$sql = "INSERT INTO luftfartoy (id, modell_id, tailnr)
			VALUES ('$id', '$modell_id', '$tailnr');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE luftfartoy SET modell_id='$modell_id', tailnr='$tailnr' WHERE id='$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		connectDB()->close();
	}

	function slettLuftfartoy($LuftfartoyID) {
		connectDB();

		$sql = "DELETE FROM luftfartoy WHERE id = '$LuftfartoyID';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function HentValutaIDFraLandID($LandID) {
		connectDB();

		$sql = "SELECT valuta_id FROM land WHERE id = '$LandID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["valuta_id"]);
			}
		}
		connectDB()->close();
	}

	function HentAntallSvaralternativerFraSporsmaalID($sporsmaalID) {
		/*connectDB();

		$sql = "SELECT COUNT(*) AS antall FROM qz_svar WHERE sporsmaalID = '$sporsmaalID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["antall"]);
			}
		}
		connectDB()->close();*/
	}

	function sjekkOmSvaralternativErKorrekt($svarID) {
		/*connectDB();

		$sql = "SELECT svar FROM qz_svar WHERE id = '$svarID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["svar"] == 1) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
		}
		connectDB()->close();*/
	}

	function validerTelefonnummer($telefonnummer)
	{
		$result = true;

		if (!is_numeric($telefonnummer)) {
			$result = false;
		}

		return $result;
	}


	function HentLand_IDFraFlyplass_ID($flyplass_id) {
		connectDB();

		$sql = "SELECT land_id FROM flyplass WHERE id = '$flyplass_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["land_id"]);
			}
		}
		connectDB()->close();
	}

	function HentGruppe_IDFraFlyplass_Gruppe_ID($flyplass_gruppe_id) {
		connectDB();

		$sql = "SELECT gruppe_id FROM flyplass_gruppe WHERE id = '$flyplass_gruppe_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["gruppe_id"]);
			}
		}
		connectDB()->close();
	}

	function HentFlyplass_IDFraFlyplass_Gruppe_ID($flyplass_gruppe_id) {
		connectDB();

		$sql = "SELECT flyplass_id FROM flyplass_gruppe WHERE id = '$flyplass_gruppe_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["flyplass_id"]);
			}
		}
		connectDB()->close();
	}

	function HentValuta_IDFraRute_ID($rute_id) {
		connectDB();

		$sql = "SELECT valuta_id FROM rute WHERE id = '$rute_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["valuta_id"]);
			}
		}
		connectDB()->close();
	}

	function HentRute_IDFraRute_kombinasjon_ID($rute_kombinasjon_id) {
		connectDB();

		$sql = "SELECT rute_id FROM rute_kombinasjon WHERE id = '$rute_kombinasjon_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["rute_id"]);
			}
		}
		connectDB()->close();
	}

	function HentFra_Flyplass_IDFraRute_kombinasjon_ID($rute_kombinasjon_id) {
		connectDB();

		$sql = "SELECT flyplass_id_fra FROM rute_kombinasjon WHERE id = '$rute_kombinasjon_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["flyplass_id_fra"]);
			}
		}
		connectDB()->close();
	}

	function HentTil_Flyplass_IDFraRute_Kombinasjon_ID($rute_kombinasjon_id) {
		connectDB();

		$sql = "SELECT flyplass_id_til FROM rute_kombinasjon WHERE id = '$rute_kombinasjon_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["flyplass_id_til"]);
			}
		}
		connectDB()->close();
	}

	function HentLuftfartoy_IDFraFlyvning_ID($flyvning_id) {
		connectDB();

		$sql = "SELECT luftfartoy_id FROM flyvning WHERE id = '$flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["luftfartoy_id"]);
			}
		}
		connectDB()->close();
	}

	function HentRute_Kombinasjon_IDFraFlyvning_ID($flyvning_id) {
		connectDB();

		$sql = "SELECT rute_kombinasjon_id FROM flyvning WHERE id = '$flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["rute_kombinasjon_id"]);
			}
		}
		connectDB()->close();
	}

	function HentFlyvning_IDFraPris_ID($pris_id) {
		connectDB();

		$sql = "SELECT flyvning_id FROM pris WHERE id = '$pris_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["flyvning_id"]);
			}
		}
		connectDB()->close();
	}

	function HentKlasse_IDFraPris_ID($pris_id) {
		connectDB();

		$sql = "SELECT klasse_id FROM pris WHERE id = '$pris_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["klasse_id"]);
			}
		}
		connectDB()->close();
	}

	function HentPassasjertype_IDFraPris_ID($pris_id) {
		connectDB();

		$sql = "SELECT passasjertype_id FROM pris WHERE id = '$pris_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["passasjertype_id"]);
			}
		}
		connectDB()->close();
	}

	function HentBruker_IDFraBruker_Tilgang_ID($bruker_tilgang_id) {
		connectDB();

		$sql = "SELECT bruker_id FROM bruker_tilgang WHERE id = '$bruker_tilgang_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["bruker_id"]);
			}
		}
		connectDB()->close();
	}

	function HentTilgang_IDFraBruker_Tilgang_ID($bruker_tilgang_id) {
		connectDB();

		$sql = "SELECT tilgang_id FROM bruker_tilgang WHERE id = '$bruker_tilgang_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["tilgang_id"]);
			}
		}
		connectDB()->close();
	}

	function HentBruker_IDFraBestilling_ID($bestilling_id) {
		connectDB();

		$sql = "SELECT bruker_id FROM bestilling WHERE id = '$bestilling_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["bruker_id"]);
			}
		}
		connectDB()->close();
	}

	function HentBestilling_IDFraBestilling_Flyvning_ID($bestilling_flyvning_id) {
		connectDB();

		$sql = "SELECT bestilling_id FROM bestilling_flyvning WHERE id = '$bestilling_flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["bestilling_id"]);
			}
		}
		connectDB()->close();
	}

	function HentFlyvning_IDFraBestilling_Flyvning_ID($bestilling_flyvning_id) {
		connectDB();

		$sql = "SELECT flyvning_id FROM bestilling_flyvning WHERE id = '$bestilling_flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["flyvning_id"]);
			}
		}
		connectDB()->close();
	}

	function HentBestilling_Flyvning_IDFraPassasjer_Flyvning_ID($passasjer_flyvning_id) {
		connectDB();

		$sql = "SELECT bestilling_flyvning_id FROM passasjer_flyvning WHERE id = '$passasjer_flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["bestilling_flyvning_id"]);
			}
		}
		connectDB()->close();
	}

	function HentPerson_IDFraPassasjer_Flyvning_ID($passasjer_flyvning_id) {
		connectDB();

		$sql = "SELECT person_id FROM passasjer_flyvning WHERE id = '$passasjer_flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["person_id"]);
			}
		}
		connectDB()->close();
	}

	function HentPris_IDFraPassasjer_Flyvning_ID($passasjer_flyvning_id) {
		connectDB();

		$sql = "SELECT pris_id FROM passasjer_flyvning WHERE id = '$passasjer_flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["pris_id"]);
			}
		}
		connectDB()->close();
	}

	function HentSeteoppsett_IDFraPassasjer_Flyvning_ID($passasjer_flyvning_id) {
		connectDB();

		$sql = "SELECT seteoppsett_id FROM passasjer_flyvning WHERE id = '$passasjer_flyvning_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["seteoppsett_id"]);
			}
		}
		connectDB()->close();
	}

	function HentModell_IDFraLuftfartoy_ID($luftfartoy_id) {
		connectDB();

		$sql = "SELECT modell_id FROM luftfartoy WHERE id = '$luftfartoy_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["modell_id"]);
			}
		}
		connectDB()->close();
	}

	function HentType_Luftfartoy_IDFraModell_ID($modell_id) {
		connectDB();

		$sql = "SELECT type_luftfartoy_id FROM modell WHERE id = '$modell_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["type_luftfartoy_id"]);
			}
		}
		connectDB()->close();
	}

	function HentModell_IDFraSeteoppsett_ID($seteoppsett_id) {
		connectDB();

		$sql = "SELECT modell_id FROM seteoppsett WHERE id = '$seteoppsett_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["modell_id"]);
			}
		}
		connectDB()->close();
	}

	function HentKlasse_IDFraSeteoppsett_ID($seteoppsett_id) {
		connectDB();

		$sql = "SELECT klasse_id FROM seteoppsett WHERE id = '$seteoppsett_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["klasse_id"]);
			}
		}
		connectDB()->close();
	}

	function sjekkOmKlasseIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM klasse WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function klasseListe($objektID) {
		$objektnavn = 'klasse';
		$objektIDeksisterer = sjekkOmKlasseIDeksisterer($objektID);
		$sql = "SELECT id, type FROM klasse ORDER BY type;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$type = utf8_encode($row["type"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $type . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmType_luftfartoyIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM type_luftfartoy WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function type_luftfartoyListe($objektID) {
		// OBS! "Velg type luftfartøy" er hardkodet p.ga. _ og ø
		$objektnavn = 'type_luftfartoy';
		$objektIDeksisterer = sjekkOmType_luftfartoyIDeksisterer($objektID);
		$sql = "SELECT id, type FROM type_luftfartoy ORDER BY type;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg type luftfatøy</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$type = utf8_encode($row["type"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $type . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmPassasjertypeIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM passasjertype WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function passasjertypeListe($objektID) {
		$objektnavn = 'passasjertype';
		$objektIDeksisterer = sjekkOmPassasjertypeIDeksisterer($objektID);
		$sql = "SELECT id, type, beskrivelse FROM passasjertype ORDER BY type;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$type = utf8_encode($row["type"]);
				$beskrivelse = utf8_encode($row["beskrivelse"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $type . ' (' . $beskrivelse . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmValutaIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM valuta WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function valutaListe($objektID) {
		$objektnavn = 'valuta';
		$objektIDeksisterer = sjekkOmValutaIDeksisterer($objektID);
		$sql = "SELECT id, valuta_navn, forkortelse FROM valuta ORDER BY valuta_navn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$navn = utf8_encode($row["valuta_navn"]);
				$forkortelse = utf8_encode($row["forkortelse"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $navn . ' (' . $forkortelse . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmLandIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM land WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function landListe($objektID) {
		$objektnavn = 'land';
		$objektIDeksisterer = sjekkOmLandIDeksisterer($objektID);
		$sql = "SELECT id, navn FROM land ORDER BY navn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$navn = utf8_encode($row["navn"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $navn . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmFlyplassIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM flyplass WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function flyplassListe($objektID) {
		$objektnavn = 'flyplass';
		$objektIDeksisterer = sjekkOmFlyplassIDeksisterer($objektID);
		$sql = "SELECT id, navn, flyplasskode FROM flyplass ORDER BY navn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$type = utf8_encode($row["navn"]);
				$flyplasskode = utf8_encode($row["flyplasskode"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $type . ' (' . $flyplasskode . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmBrukerIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM bruker WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function brukerListe($objektID) {
		$objektnavn = 'bruker';
		$objektIDeksisterer = sjekkOmBrukerIDeksisterer($objektID);
		$sql = "SELECT b.id, b.brukernavn, b.epost, p.fornavn, p.etternavn FROM bruker AS b LEFT JOIN person AS p ON p.id = b.person_id ORDER BY p.etternavn, p.fornavn, b.epost, b.brukernavn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$brukernavn = utf8_encode($row["brukernavn"]);
				$epost = utf8_encode($row["epost"]);
				$fornavn = utf8_encode($row["fornavn"]);
				$etternavn = utf8_encode($row["etternavn"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $brukernavn . ' ' . $epost . ' (' . $etternavn . ', ' . $fornavn . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmPersonIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM person WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function personListe($objektID) {
		$objektnavn = 'person';
		$objektIDeksisterer = sjekkOmPersonIDeksisterer($objektID);
		$sql = "SELECT id, fornavn, etternavn FROM person ORDER BY etternavn, fornavn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$fornavn = utf8_encode($row["fornavn"]);
				$etternavn = utf8_encode($row["etternavn"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $etternavn . ', ' . $fornavn . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

/* Bruker og person trenger asynkron søk */

	function sjekkOmModellIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM modell WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function modellListe($objektID) {
		$objektnavn = 'modell';
		$objektIDeksisterer = sjekkOmModellIDeksisterer($objektID);
		$sql = "SELECT id, navn FROM modell ORDER BY navn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$navn = utf8_encode($row["navn"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $navn . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmSeteoppsettIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM seteoppsett WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

/* Forløpig ingen hensikt med seteoppsett liste */

	function sjekkOmLuftfartoyIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM luftfartoy WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function luftfartoyListe($objektID) {
		$objektnavn = 'luftfartoy';
		$objektIDeksisterer = sjekkOmLuftfartoyIDeksisterer($objektID);
		$sql = "SELECT id, tailnr, (SELECT navn FROM modell WHERE id = luftfartoy.modell_id) AS modellnavn FROM luftfartoy ORDER BY tailnr;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$tailnr = utf8_encode($row["tailnr"]);
				$modellnavn = utf8_encode($row["modellnavn"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $tailnr . ' (' . $modellnavn . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

/* Sjekk om flyplass_gruppe eksisterer tas senere */

	function sjekkOmGruppeIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM gruppe WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function gruppeListe($objektID) {
		$objektnavn = 'gruppe';
		$objektIDeksisterer = sjekkOmGruppeIDeksisterer($objektID);
		$sql = "SELECT id, navn FROM gruppe ORDER BY navn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$navn = utf8_encode($row["navn"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $navn . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmTilgangIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM tilgang WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function tilgangListe($objektID) {
		$objektnavn = 'tilgang';
		$objektIDeksisterer = sjekkOmTilgangIDeksisterer($objektID);
		$sql = "SELECT id, navn FROM tilgang ORDER BY navn;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$navn = utf8_encode($row["navn"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $navn . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

/* bruker_tilgang ordnes senere */

	function sjekkOmRuteIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM rute WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function ruteListe($objektID) {
		$objektnavn = 'rute';
		$objektIDeksisterer = sjekkOmRuteIDeksisterer($objektID);
		$sql = "SELECT r.id, (SELECT navn FROM flyplass AS f WHERE f.id = rk.flyplass_id_fra) AS fra, (SELECT navn FROM flyplass AS f WHERE f.id = rk.flyplass_id_til) AS til FROM rute AS r LEFT JOIN rute_kombinasjon AS rk ON r.id = rk.rute_id ORDER BY fra;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$fra = utf8_encode($row["fra"]);
				$til = utf8_encode($row["til"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $fra . ' - ' . $til . ' (RuteID: ' . $id . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmRute_kombinasjonIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM rute WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function rute_kombinasjonListe($objektID) {
		$objektnavn = 'rute_kombinasjon';
		$objektIDeksisterer = sjekkOmRute_kombinasjonIDeksisterer($objektID);
		$sql = "SELECT rk.id, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fra, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS til FROM rute_kombinasjon rk ORDER BY id;";
		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$fra = utf8_encode($row["fra"]);
				$til = utf8_encode($row["til"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $fra . ' - ' . $til . '</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmFlyvningIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM flyvning WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function flyvningListe($objektID, $fraTid, $tilTid) {
		$objektnavn = 'flyvning';
		$objektIDeksisterer = sjekkOmFlyvningIDeksisterer($objektID);
		$sql = "SELECT f.id, f.avgang, ( SELECT f.navn FROM flyplass AS f WHERE f.id = (SELECT rk.flyplass_id_fra FROM rute_kombinasjon AS rk WHERE rk.id = f.rute_kombinasjon_id) ) AS fra,( SELECT f.navn FROM flyplass AS f WHERE f.id = (SELECT rk.flyplass_id_til FROM rute_kombinasjon AS rk WHERE rk.id = f.rute_kombinasjon_id) ) AS til FROM flyvning AS f";

		$argument = 0;

		if ($fraTid != "") {
			$sql .= " WHERE f.avgang > '$fraTid'";
			$argument++;
		}
		if ($tilTid != "") {
			if ($argument == 0) {
				$sql .= "WHERE";
			}
			else {
				$sql .= " AND";
			}
			$sql .= " f.avgang < '$tilTid'";
		}

		$sql .= " ORDER BY f.avgang;";

		$result = connectDB()->query($sql);
		
		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavn . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$avgang = utf8_encode($row["avgang"]);
				$fra = utf8_encode($row["fra"]);
				$til = utf8_encode($row["til"]);

				$tid = gmdate("H:i d/m-y", $avgang);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $fra . ' - ' . $til . ' (' . $tid . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

// Eksempel på valider-funksjon
function validerEksempel() {
    /* Klarerer variabler */
	$maaFyllesUt = array();
	$kommentar = array();
    $resultat = true;

    /* Ulike valideringer */
    
    // Sjekker om feltet er tomt
	if (true) {
		$maaFyllesUt[] = "fornavn";
		$resultat = false;
	}

    // Sjekker om feltet er tomt
	if (true) {
        $maaFyllesUt[] = "etternavn";
		$resultat = false;
	}

    // Sjekker om feltet er tomt
	if (true) {
        $maaFyllesUt[] = "alder";
		$resultat = false;
	}
    // Feltet er fylt ut, sjekker ytterligere valideringer
    else {
        if (true) {
            $kommentar = "<strong>Alder</strong> må være et possitivt tall.";
            $resultat = false;
        }
    }

    // Sjekker om feltet er tomt
	if (false) {
        $maaFyllesUt = "mobilnummer";
		$resultat = false;
	}
    // Feltet er fylt ut, sjekker ytterligere valideringer
    else {
        if (true) {
            $kommentar[] = "<strong>Mobilnummer</strong> kan kun inneholde siffer fra 0 - 9.";
            $resultat = false;
        }
        if (true) {
            $kommentar[] = "<strong>Mobilnummer</strong> må være minumum 8 tegn.";
            $resultat = false;
        }
    }

    /* Valideringer slutt */
    
    // Skriver ut feilmeldingsboks
    if (!$resultat) {
        feilmeldingBoks($maaFyllesUt, $kommentar);
        /*print_r($maaFyllesUt);
        echo "<br><br>";
        print_r($kommentar);*/
    }
    
    // Returnerer om neste side skal lastes inn
    return $resultat;
}

// Eksempel på valider-funksjon slutt

function feilmeldingBoks($maaFyllesUt, $kommentar) {
    
	$fyllesutOutput = "";
	$kommentarOutput = "";
	$output = "";
    
    /* Gjør om det som må fylles ut til tekst */
	for ($i = 0; $i < count($maaFyllesUt); $i++) {
        $fyllesutOutput .= "<strong>" . $maaFyllesUt[$i] . "</strong>";
        if ($i < count($maaFyllesUt) - 2) {
            $fyllesutOutput .= ", ";
        }
        elseif ($i < count($maaFyllesUt) - 1) {
            $fyllesutOutput .= " og ";
        }
	}
	if (count($maaFyllesUt) > 0) {
        $fyllesutOutput .= " må fylles ut.";
	}
    
    /* Gjør om kommentarer til tekst */
    for ($i = 0; $i < count($kommentar); $i++) {
        if ($i == 0 AND count($maaFyllesUt) != 0) {
            $kommentarOutput .= "<br><br>";
        }
        elseif ($i != 0) {
            $kommentarOutput .= "<br>";
        }
        
		$kommentarOutput .= $kommentar[$i];
        if ($i < count($kommentar) - 1) {
            $kommentarOutput .= " ";
        }
	}
    
    $output = $fyllesutOutput . $kommentarOutput;
    
    if ($output == "") {
        $output .= "Ingen output";
    }

    echo $output;
}

	function validerBruker($BrukerID, $brukernavn, $epost, $ukryptert_passord, $land_id, $mobilnr, $person_id) {
		$id = utf8_decode($BrukerID);
		$brukernavn = utf8_decode($brukernavn);
		$epost = utf8_decode($epost);
		$ukryptert_passord = utf8_decode($ukryptert_passord);
		$land_id = utf8_decode($land_id);
		$mobilnr = utf8_decode($mobilnr);
		$person_id = utf8_decode($person_id);

		$tilbakemelding = array();

		if (!is_numeric($id) AND $id !== 'IGNORE') {
			$tilbakemelding[] = 'BrukerIDen må kun bestå av tall.';
		}
		if (strlen($brukernavn) < 2 AND $brukernavn !== 'IGNORE') {
			$tilbakemelding[] = 'Brukernavnet må være minimum to tegn.';
		}
		if (filter_var($epost, FILTER_VALIDATE_EMAIL) === false AND $epost !== 'IGNORE') {
			$tilbakemelding[] = 'Epostadressen er ugyldig.';
		}
		if (strlen($ukryptert_passord) < 5 AND $ukryptert_passord !== 'IGNORE') {
			$tilbakemelding[] = 'Passordet må inneholde minst 5 tegn.';
		}
		if (!is_numeric($land_id) AND $land_id !== 'IGNORE') {
			$tilbakemelding[] = 'LandIDen må kun bestå av tall.';
		}
		if ((!is_numeric($mobilnr) OR strlen($mobilnr) < 8) AND $mobilnr !== 'IGNORE') {
			$tilbakemelding[] = 'Mobilnummeret må bestå av minimum 8 tegn og kun være siffer.';
		}
		if (!is_numeric($person_id) AND $person_id !== 'IGNORE') {
			$tilbakemelding[] = 'PersonIDen må kun bestå av tall.';
		}

		return $tilbakemelding;
	}

?>