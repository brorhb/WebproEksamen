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

	/*function oppdaterFlyplass($FlyplassID, $navn, $flyplasskode, $latitude, $longitude, $tidssone_gmt, $land_id) {
		
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
	}*/

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

?>