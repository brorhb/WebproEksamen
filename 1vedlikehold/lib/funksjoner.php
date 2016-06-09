<?php

	include_once("validering.php");

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
			$innhold = include 'login.php';
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

		$id = connectDB()->real_escape_string(utf8_encode($KlasseID));
		$type = connectDB()->real_escape_string(utf8_encode($type));
		$beskrivelse = connectDB()->real_escape_string(utf8_encode($beskrivelse));

		if ($id == '') {

			$sql = "INSERT INTO klasse (type, beskrivelse)
			VALUES ('$type', '$beskrivelse');";

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
		$resultat = TRUE;

		if (validerSlettKlasse($KlasseID)) {
			connectDB();
/*legge til det som er over dette*/
			$sql = "DELETE FROM klasse WHERE id = '$KlasseID';";
			$result = connectDB()->query($sql);

			if (connectDB()->query($sql) === TRUE) {
				$resultat = TRUE;
			}
			else {
				$resultat = FALSE;
			}
			connectDB()->close();
		}
		/* må endre fra return - resultat*/
		/*og ubder dette*/
		else {
			$resultat = FALSE;
		}

		return $resultat;
	}

	function oppdaterType_luftfartoy($TypeID, $type) {

		connectDB();

		$id = connectDB()->real_escape_string(utf8_encode($TypeID));
		$type = connectDB()->real_escape_string(utf8_encode($type));

		if ($id == '') {

			$sql = "INSERT INTO type_luftfartoy (type)
			VALUES ('$type');";

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

	function slettType_Luftfartoy($Type_LuftfartoyID) {
		$resultat = TRUE;

		if (validerSlettType_Luftfartoy($Type_LuftfartoyID)) {
			connectDB();

			$sql = "DELETE FROM luftfartoy WHERE id = '$Type_LuftfartoyID';";
			$result = connectDB()->query($sql);

			if (connectDB()->query($sql) === TRUE) {
				$resultat = TRUE;
				}
			else {
				$resultat = FALSE;
			}
			connectDB()->close();
		}
		else {
			$resultat = FALSE;
		}

		return $resultat;
	}

	function oppdaterAlleModeller($id, $type, $navn, $kapasitet, $rader, $bredde) {

		connectDB();

		$id = connectDB()->real_escape_string(utf8_encode($id));
		$navn = connectDB()->real_escape_string(utf8_encode($navn));
		$type = connectDB()->real_escape_string(utf8_encode($type));
		$kapasitet = connectDB()->real_escape_string(utf8_encode($kapasitet));
		$rader = connectDB()->real_escape_string(utf8_encode($rader));
		$bredde = connectDB()->real_escape_string(utf8_encode($bredde));

		if ($id == '') {

			$sql = "INSERT INTO `modell` (`type_luftfartoy_id`, `navn`, `kapasitet`, `rader`, `bredde`) VALUES ('$type', '$navn', '$kapasitet', '$rader', '$bredde');";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE `modell` SET `type_luftfartoy_id` = '$type', `navn` = '$navn', `kapasitet` = '$kapasitet', `rader` = '$rader', `bredde` = '$bredde' WHERE `modell`.`id` = '$id';";

			if (connectDB()->query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		connectDB()->close();
	}

	function slettAlleModeller($id) {
		connectDB();

		$sql = "DELETE FROM `web-is-gr02w`.`modell` WHERE `modell`.`id` = '$id';";
		$result = connectDB()->query($sql);

		if (connectDB()->query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function oppdaterAlleRuter($ruteKombinasjonNr, $ruteNr, $valuta, $pris, $fraLand, $fraFlyplass, $tid, $tilLand, $tilFlyplass) {

		connectDB();

		$ruteKombinasjonNr = connectDB()->real_escape_string(utf8_encode($ruteKombinasjonNr));
		$ruteNr = connectDB()->real_escape_string(utf8_encode($ruteNr));
		$valuta = connectDB()->real_escape_string(utf8_encode($valuta));
		$pris = connectDB()->real_escape_string(utf8_encode($pris));
		$fraLand = connectDB()->real_escape_string(utf8_encode($fraLand));
		$fraFlyplass = connectDB()->real_escape_string(utf8_encode($fraFlyplass));
		$tid = connectDB()->real_escape_string(utf8_encode($tid));
		$tilLand = connectDB()->real_escape_string(utf8_encode($tilLand));
		$tilFlyplass = connectDB()->real_escape_string(utf8_encode($tilFlyplass));


		if ($ruteKombinasjonNr == '') {

			$sql = "START TRANSACTION;
					INSERT INTO `web-is-gr02w`.`rute` (`id`, `reisetid`, `basis_pris`, `valuta_id`) VALUES (NULL, '$tid', '$pris', '$valuta');
					INSERT INTO `web-is-gr02w`.`rute_kombinasjon` (`id`, `rute_id`, `flyplass_id_fra`, `flyplass_id_til`) VALUES (NULL, (SELECT id FROM rute WHERE reisetid = '$tid' AND basis_pris = '$pris' AND valuta_id = '$valuta'), '$tilFlyplass', '$fraFlyplass'), 
					(NULL, (SELECT id FROM rute WHERE reisetid = '$tid' AND basis_pris = '$pris' AND valuta_id = '$valuta'), '$fraFlyplass', '$tilFlyplass');
					COMMIT;
					ROLLBACK;";

			if (connectDB()->multi_query($sql) === TRUE) {
				return TRUE;
			}
			else {
				//return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "START TRANSACTION;
					UPDATE `rute` SET `reisetid` = '$tid', `basis_pris` = '$pris', `valuta_id` = '$valuta' WHERE `rute`.`id` = '$ruteNr';
					UPDATE `web-is-gr02w`.`rute_kombinasjon` SET `flyplass_id_fra` = '$tilFlyplass', `flyplass_id_til` = '$fraFlyplass' WHERE `rute_kombinasjon`.`rute_id` = '$ruteNr'; 
					UPDATE `web-is-gr02w`.`rute_kombinasjon` SET `flyplass_id_fra` = '$fraFlyplass', `flyplass_id_til` = '$tilFlyplass' WHERE `rute_kombinasjon`.`rute_id` = '$ruteNr' AND `rute_kombinasjon`.`id` = '$ruteKombinasjonNr';
					COMMIT;
					ROLLBACK;";

			if (connectDB()->multi_query($sql) === TRUE) {
				return TRUE;
			}
			else {
				//return FALSE;
			}
		}
		connectDB()->close();
	}

	function slettAlleRuter($id) {
		connectDB();
		$id = connectDB()->real_escape_string(utf8_encode($id));
		$rute_id = HentRute_idFraKombinasjon_Rute_id($id);

		$sql = "START TRANSACTION;
				DELETE FROM `rute_kombinasjon` WHERE rute_id = '$rute_id';
				DELETE FROM `rute` WHERE id = '$rute_id';
				COMMIT;
				ROLLBACK;";

		$result = connectDB()->multi_query($sql);

		if (connectDB()->multi_query($sql) === TRUE) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function oppdaterPassasjertype($PassasjertypeID, $type, $beskrivelse) {

		connectDB();

		$id = connectDB()->real_escape_string(utf8_encode($PassasjertypeID));
		$type = connectDB()->real_escape_string(utf8_encode($type));
		$beskrivelse = connectDB()->real_escape_string(utf8_encode($beskrivelse));

		if ($id == '') {

			$sql = "INSERT INTO passasjertype (type, beskrivelse)
			VALUES ('$type', '$beskrivelse');";

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

		$id = connectDB()->real_escape_string(utf8_encode($ValutaID));
		$valuta_navn = connectDB()->real_escape_string(utf8_encode($valuta_navn));
		$forkortelse = connectDB()->real_escape_string(utf8_encode($forkortelse));

		if ($id == '') {

			$sql = "INSERT INTO valuta (valuta_navn, forkortelse)
			VALUES ('$valuta_navn', '$forkortelse');";

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

		$id = connectDB()->real_escape_string(utf8_encode($LandID));
		$navn = connectDB()->real_escape_string(utf8_encode($navn));
		$landskode = connectDB()->real_escape_string(utf8_encode($landskode));
		$valuta_id = connectDB()->real_escape_string(utf8_encode($valuta_id));
		$iso = connectDB()->real_escape_string(utf8_encode($iso));
		$iso3 = connectDB()->real_escape_string(utf8_encode($iso3));

		if ($id == '') {

			$sql = "INSERT INTO land (navn, landskode, valuta_id, iso, iso3)
			VALUES ('$navn', '$landskode', '$valuta_id', '$iso', '$iso3');";

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

		$id = connectDB()->real_escape_string(utf8_encode($FlyplassID));
		$navn = connectDB()->real_escape_string(utf8_encode($navn));
		$flyplasskode = connectDB()->real_escape_string(utf8_encode($flyplasskode));
		$latitude = connectDB()->real_escape_string(utf8_encode($latitude));
		$longitude = connectDB()->real_escape_string(utf8_encode($longitude));
		$tidssone_gmt = connectDB()->real_escape_string(utf8_encode($tidssone_gmt));
		$land_id = connectDB()->real_escape_string(utf8_encode($land_id));

		if ($id == '') {
			$sql = "INSERT INTO flyplass (navn, flyplasskode, latitude, longitude, tidssone_gmt, land_id)
			VALUES ('$navn', '$flyplasskode', '$latitude', '$longitude', '$tidssone_gmt', '$land_id');";
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

		$brukerID = connectDB()->real_escape_string(utf8_encode($brukerID));
        $personID = connectDB()->real_escape_string(utf8_encode($personID));
        $brukernavn = connectDB()->real_escape_string(utf8_encode($brukernavn));
        $ukryptertPassord = connectDB()->real_escape_string(utf8_encode($ukryptertPassord));
        $kryptertPassord = md5($ukryptertPassord);
		$fornavn = connectDB()->real_escape_string(utf8_encode($fornavn));
		$etternavn = connectDB()->real_escape_string(utf8_encode($etternavn));
		$fodselsdato = connectDB()->real_escape_string(utf8_encode($fodselsdato));
        $landID = connectDB()->real_escape_string(utf8_encode($landID));
        $epost = connectDB()->real_escape_string(utf8_encode($epost));
        $mobilnr = connectDB()->real_escape_string(utf8_encode($mobilnr));

		if ($id == '') {

			$sql = "START TRANSACTION;
                    INSERT INTO person (fornavn, etternavn, fodselsdato) VALUES ('$fornavn', '$etternavn', '$fodselsdato');
                    INSERT INTO bruker (brukernavn, epost, passord, land_id, mobilnr, person_id) VALUES ('$brukernavn', '$epost', '$kryptertPassord', '$landID', '$mobilnr', (SELECT MAX(id) FROM person));
                    COMMIT;";

			if (connectDB()->multi_query($sql) === TRUE) {
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

			if (connectDB()->multi_query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		connectDB()->close();
	}

    function slettPersonBruker($brukerID) {
        
		connectDB();
		$brukerID = connectDB()->real_escape_string(utf8_encode($brukerID));
		$personID = HentPerson_idFraBruker_id($brukerID);

		$sql = "START TRANSACTION; 
				DELETE FROM `web-is-gr02w`.`bruker` WHERE `bruker`.`id` = $brukerID; 
				DELETE FROM `web-is-gr02w`.`person` WHERE `person`.`id` = '$personID';
				COMMIT;
				ROLLBACK;";


		$result = connectDB()->multi_query($sql);

		if (connectDB()->multi_query($sql) === TRUE) {
			return TRUE;
			}
		else {
			return FALSE;
		}
		connectDB()->close();
    }

    function oppdaterPerson($PersonID, $fornavn, $etternavn, $fodselsdato) {

		connectDB();

		$id = connectDB()->real_escape_string(utf8_encode($PersonID));
		$fornavn = connectDB()->real_escape_string(utf8_encode($fornavn));
		$etternavn = connectDB()->real_escape_string(utf8_encode($etternavn));
		$fodselsdato = connectDB()->real_escape_string(utf8_encode($fodselsdato));

		if ($id == '') {

			$sql = "INSERT INTO person (fornavn, etternavn, fodselsdato)
			VALUES ('$fornavn', '$etternavn', '$fodselsdato');";

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

		$id = connectDB()->real_escape_string(utf8_encode($LuftfartoyID));
		$modell_id = connectDB()->real_escape_string(utf8_encode($modell_id));
		$tailnr = connectDB()->real_escape_string(utf8_encode($tailnr));

		if ($id == '') {

			$sql = "INSERT INTO luftfartoy (modell_id, tailnr)
			VALUES ('$modell_id', '$tailnr');";

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

		if ($resultat) {
			$sql = "DELETE FROM luftfartoy WHERE id = '$LuftfartoyID';";
			$result = connectDB()->query($sql);

			if (connectDB()->query($sql) === TRUE) {
				$resultat = TRUE;
				}
			else {
				$resultat = FALSE;
			}
		}

		connectDB()->close();
	}

	function oppdaterFlyvning($FlyvningID, $luftfartoy_id, $rute_kombinasjon_id, $dato, $klokkeslett, $gate, $passasjertype_id, $pris, $valuta_id) {
		// Spesialtilpasset

		/*echo 'PassasjertypeID: ' . print_r($passasjertype_id) . '<br>';
		echo 'Pris: ' . print_r($pris) . '<br>';
		echo 'ValutaID: ' . print_r($valuta_id) . '<br>';*/

		connectDB();

		$flyvning_id = connectDB()->real_escape_string(utf8_encode($FlyvningID));
		$luftfartoy_id = connectDB()->real_escape_string(utf8_encode($luftfartoy_id));
		$rute_kombinasjon_id = connectDB()->real_escape_string(utf8_encode($rute_kombinasjon_id));
		$dato = connectDB()->real_escape_string(utf8_encode($dato));
		$klokkeslett = connectDB()->real_escape_string(utf8_encode($klokkeslett));
		$gate = connectDB()->real_escape_string(utf8_encode($gate));
		
        $avgang = regnUtUnixtimeFraDatoOgKlokkeslett($dato, $klokkeslett);

		if ($flyvning_id == '') {

			$sql = "INSERT INTO flyvning (id, luftfartoy_id, rute_kombinasjon_id, avgang, gate)
			VALUES ('', '$luftfartoy_id', '$rute_kombinasjon_id', '$avgang', '$gate');";

			$opprettetFlyvningID = "SELECT id FROM flyvning WHERE luftfartoy_id = '$luftfartoy_id' AND rute_kombinasjon_id = '$rute_kombinasjon_id' AND avgang = '$avgang' AND gate = '$gate' ORDER BY id DESC LIMIT 1";

			for ($i=0; $i < count($passasjertype_id); $i++) {
				$passasjertype_iden = connectDB()->real_escape_string(utf8_encode($passasjertype_id[$i]));

				$prisen = connectDB()->real_escape_string(utf8_encode($pris[$i]));
				$valuta_iden = connectDB()->real_escape_string(utf8_encode($valuta_id[$i]));

				$sql .= "INSERT INTO pris (id, passasjertype_id, flyvning_id, pris, valuta_id) VALUES ('', '$passasjertype_iden', ($opprettetFlyvningID), '$prisen', '$valuta_iden');";
			}

			//die("Legg til: " . $sql);

			if (connectDB()->multi_query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		else {
			// ID er ikke satt
			$sql = "UPDATE `flyvning` SET `luftfartoy_id` = '$luftfartoy_id', `rute_kombinasjon_id` = '$rute_kombinasjon_id', `avgang` = '$avgang', `gate` = '$gate' WHERE id = '$flyvning_id';";

			// Slett gamle priser
			$sql .= "DELETE FROM pris WHERE flyvning_id = '$flyvning_id';";

			// Sett inn nye priser
			for ($i=0; $i < count($passasjertype_id); $i++) {
				$passasjertype_iden = connectDB()->real_escape_string(utf8_encode($passasjertype_id[$i]));

				$prisen = connectDB()->real_escape_string(utf8_encode($pris[$i]));
				$valuta_iden = connectDB()->real_escape_string(utf8_encode($valuta_id[$i]));

				$sql .= "INSERT INTO pris (id, passasjertype_id, flyvning_id, pris, valuta_id) VALUES ('', '$passasjertype_iden', ($flyvning_id), '$prisen', '$valuta_iden');";
			}

			if (connectDB()->multi_query($sql) === TRUE) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		connectDB()->close();
	}

	function slettFlyvning($id) {
		connectDB();
		$id = connectDB()->real_escape_string(utf8_encode($id));

		$sql = "START TRANSACTION;
				DELETE FROM pris WHERE flyvning_id = '$id';
				DELETE FROM `flyvning` WHERE id = '$id';
				COMMIT;
				ROLLBACK;";

		$result = connectDB()->multi_query($sql);

		if (connectDB()->multi_query($sql) === TRUE) {
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

	function HentPrisFraFlyvning_idOgPassasjertype_id($flyvning_id, $passasjertype_id) {
		connectDB();

		$sql = "SELECT pris FROM pris WHERE flyvning_id = '$flyvning_id' AND passasjertype_id = '$passasjertype_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["pris"]);
			}
		}
		connectDB()->close();
	}

	function HentValuta_idFraFlyvning_idOgPassasjertype_id($flyvning_id, $passasjertype_id) {
		connectDB();

		$sql = "SELECT valuta_id FROM pris WHERE flyvning_id = '$flyvning_id' AND passasjertype_id = '$passasjertype_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["valuta_id"]);
			}
		}
		connectDB()->close();
	}

	function HentPerson_idFraBruker_id($Bruker_id) {
		connectDB();

		$sql = "SELECT person_id FROM bruker WHERE id = '$Bruker_id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["person_id"]);
			}
		}
		connectDB()->close();
	}

	function HentRute_idFraKombinasjon_Rute_id($id) {
		connectDB();

		$sql = "SELECT rute_id FROM rute_kombinasjon WHERE id = '$id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["rute_id"]);
			}
		}
		connectDB()->close();
	}

	function HentPassasjertype_typeFraPassasjertype_id($id) {
		connectDB();

		$sql = "SELECT type FROM passasjertype WHERE id = '$id';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["type"]);
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


		function sjekkOmKlasseIDeksistereriPris($objektID) {
		connectDB();

		$sql = "SELECT klasse_id FROM pris WHERE klasse_id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}


		function sjekkOmKlasseIDeksistereriSeteoppsett($objektID) {
		connectDB();

		$sql = "SELECT klasse_id FROM seteoppsett WHERE klasse_id = '$objektID';";
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


function sjekkOmType_luftfartoyIDeksistereriModell($objektID) {
		connectDB();

		$sql = "SELECT type_luftfartoy_id FROM modell WHERE type_luftfartoy_id = '$objektID';";
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

	function sjekkOmPassasjertypeIDEksistereriPris($objektID) {
		connectDB();

		$sql = "SELECT passasjertype_id FROM pris WHERE passasjertype_id = '$objektID';";
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

	function sjekkOmValutaEksistereriPris($objektID) {
		connectDB();

		$sql = "SELECT valuta_id FROM pris WHERE valuta_id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function sjekkOmValutaEksistereriRute($objektID) {
		connectDB();

		$sql = "SELECT valuta_id FROM rute WHERE valuta_id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function valutaListe($objektID, $arrayID = '') {
		// spesialtilpasset til array

		$objektnavn = 'valuta';
		$objektIDeksisterer = sjekkOmValutaIDeksisterer($objektID);
		$sql = "SELECT id, valuta_navn, forkortelse FROM valuta ORDER BY valuta_navn;";
		$result = connectDB()->query($sql);

		if ($arrayID === "") {
			echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';
		}
		else {
			echo '<select class="form-control" name="' . $objektnavn . '_id[' . $arrayID . ']" id="' . $objektnavn . '_id[' . $arrayID . ']">';
		}

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

	function landskodeListe($objektID) {
		// Spesialtilfelle p.ga. landskode skal vises i lista, men IDen er landID
		$objektnavn = 'land';
		$objektnavnet = 'landskode';
		$objektIDeksisterer = sjekkOmLandIDeksisterer($objektID);
		$sql = "SELECT id, navn, landskode FROM land ORDER BY navn;";
		$result = connectDB()->query($sql);

		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg ' . $objektnavnet . '</option>';

			while($row = $result->fetch_assoc()) {
				$id = utf8_encode($row["id"]);
				$navn = utf8_encode($row["navn"]);
				$landskode = utf8_encode($row["landskode"]);

				echo '<option ';
				if ($objektID == $id) { echo'selected '; }
				echo 'value="' . $id . '">' . $navn . ' (+' . $landskode . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavnet . ' Legg til minst et valg først.</option>';
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

		function sjekkOmLandEksistereriFlyplass($objektID) {
		connectDB();

		$sql = "SELECT land_id FROM flyplass WHERE land_id = '$objektID';";
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

		function sjekkOmLandEksistereriBruker($objektID) {
		connectDB();

		$sql = "SELECT land_id FROM bruker WHERE land_id = '$objektID';";
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

	function sjekkOmLuftfartoyIDeksistereriFlyvning($objektID) {
		connectDB();

		$sql = "SELECT luftfartoy_id FROM flyvning WHERE luftfartoy_id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}




function sjekkOmBestilling_flyvning_idEksistereriPassasjer_flyvning($objektID) {
		connectDB();

		$sql = "SELECT bestilling_flyvning_id FROM passasjer_flyvning WHERE bestilling_flyvning_id = '$objektID';";
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
		$sql = "SELECT rk.id, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fra, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS til FROM rute_kombinasjon rk ORDER BY fra;";
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

	function sjekkOmPrisIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM pris WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function sjekkOmBestillingIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM bestilling WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function bestillingListe($objektID) {
		$objektnavn = 'bestilling';
		$objektIDeksisterer = sjekkOmBestillingIDeksisterer($objektID);
		$sql = "SELECT bestilling.id, person.fornavn, person.etternavn FROM bestilling LEFT JOIN bruker ON bestilling.bruker_id = bruker.id LEFT JOIN person ON person.id = bruker.person_id ORDER BY etternavn, fornavn;";
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
				echo 'value="' . $id . '">#' . $id . ' (' . $etternavn . ', ' . $fornavn . ')</option>';
			}
		}
		else {
			echo '<option disabled value="">Tomt resultat for ' . $objektnavn . ' Legg til minst et valg først.</option>';
		}
		echo '</select>';
	}

	function sjekkOmBestilling_flyvningIDeksisterer($objektID) {
		connectDB();

		$sql = "SELECT id FROM bestilling_flyvning WHERE id = '$objektID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function sjekkOmBrukernavnEksisterer($brukernavn, $brukerID) {
		// Hvis brukerID er satt sjekkes det ikke for den brukeren p.ga. når man oppdaterer finnes brukernavnet fra før hos brukeren man oppdaterer
		connectDB();

		$sql = "SELECT brukernavn FROM bruker WHERE brukernavn LIKE '$brukernavn'";
		if ($brukerID != "" || $brukerID != NULL) {
			 $sql .= "AND id <> '$brukerID'";
		}
		$sql .= ";";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function sjekkOmEpostEksisterer($epost, $brukerID) {
		// Hvis brukerID er satt sjekkes det ikke for den brukeren p.ga. når man oppdaterer finnes eposten fra før hos brukeren man oppdaterer
		connectDB();

		$sql = "SELECT epost FROM bruker WHERE epost LIKE '$epost'";
		if ($brukerID != "" || $brukerID != NULL) {
			 $sql .= "AND id <> '$brukerID'";
		}
		$sql .= ";";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

	function sjekkOmMobilnummerEksisterer($mobilnummer, $landID, $brukerID) {
		// Hvis brukerID er satt sjekkes det ikke for den brukeren p.ga. når man oppdaterer finnes mobilnummeret fra før hos brukeren man oppdaterer
		connectDB();

		$sql = "SELECT mobilnr FROM bruker WHERE mobilnr LIKE '$mobilnummer' AND land_id = '$landID'";
		if ($brukerID != "" || $brukerID != NULL) {
			 $sql .= "AND id <> '$brukerID'";
		}
		$sql .= ";";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
		connectDB()->close();
	}

// fraFlyplassListe
function fraflyplassListe($objektID) {
		$objektnavn = 'fraFlyplass';
		$objektIDeksisterer = sjekkOmFlyplassIDeksisterer(@$objektID);
		$sql = "SELECT id, navn, flyplasskode FROM flyplass ORDER BY navn;";
		$result = connectDB()->query($sql);

		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg Flyplass</option>';

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

// tilFlyplassListe
	function tilflyplassListe($objektID) {
		$objektnavn = 'tilFlyplass';
		$objektIDeksisterer = sjekkOmFlyplassIDeksisterer(@$objektID);
		$sql = "SELECT id, navn, flyplasskode FROM flyplass ORDER BY navn;";
		$result = connectDB()->query($sql);

		echo '<select class="form-control" name="' . $objektnavn . '_id" id="' . $objektnavn . '_id">';

		if ($result->num_rows > 0) {

			echo '<option ';
			if (!$objektIDeksisterer) { echo 'selected '; }
			echo 'disabled value="">Velg Flyplass</option>';

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

	function regnUtDatoFraUnixtime($timestamp) {
		return gmdate("m/d/Y", $timestamp);
	}

	function regnUtKlokkeslettFraUnixtime($timestamp) {
		return gmdate("H:i", $timestamp);
	}

	function regnUtUnixtimeFraDatoOgKlokkeslett($dato, $klokkeslett) {
		// Format på dato (MM/DD/YYYY) og klokkeslett (HH:MM)
		$d = explode('/', $dato);
		$k = explode(':', $klokkeslett);

		$hour = $k[0];
		$minute = $k[1];
		$second = 0;
		$month = $d[0];
		$day = $d[1];
		$year = $d[2];

		return gmmktime($hour,$minute,$second,$month,$day,$year);
	}

	function tidTimer($timer) {
	echo '<select class="form-control" name="timer" id="timer">';
		for ($i = 0; $i < 24; $i++) {
			echo '<option';
			if ($timer == $i) {
				echo ' selected';
			}
			echo ' value="' . $i . '">' . $i . '</option>';
		}	
	echo '</select>';

	}

	function tidMinutter($minutter) {
		echo '<select class="form-control" name="timer" id="timer">';
		for ($i = 0; $i < 24; $i++) {
			echo '<option';
			if ($minutter == $i) {
				echo ' selected';
			}
			echo ' value="' . $i . '">' . $i . '</option>';
		}	
	echo '</select>';
	}


?>