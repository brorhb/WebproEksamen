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

	function HentKategorinavnFraKategoriID($kategoriID) {
		/*connectDB();

		$sql = "SELECT navn FROM qz_kategori WHERE id = '$kategoriID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["navn"]);
			}
		}
		connectDB()->close();*/
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
?>