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

	function oppdaterSpørsmål($spørsmål,$kategoriID) {
		// Først sjekker man om det eksisterer, hvis det ikke eksisterer med den IDen så lager man en ny. Eksisterer det, oppdaterer man infoen.

		/*connectDB();

		$spørsmål = connectDB()->real_escape_string(utf8_decode($spørsmål));
		$kategoriID = connectDB()->real_escape_string(utf8_decode($kategoriID));

		$sql = "INSERT INTO qz_sporsmaal (sporsmaal, kategoriID)
		VALUES ('$spørsmål', '$kategoriID');";

		if (connectDB()->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . connectDB()->error;
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

    function HentTil_Flyplass_IDFraRute_kombinasjon_ID($rute_kombinasjon_id) {
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

    function Hentrute_kombinasjon_IDFraFlyvning_ID($flyvning_id) {
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

    function Hentflyvning_IDFraBestilling_Flyvning_ID($bestilling_flyvning_id) {
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

?>