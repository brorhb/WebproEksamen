<?php
	session_start();

	include_once("funksjoner.php");
	//krevInnlogging();
	
	connectDB();

		$spørsmål = test;
		$kategoriID = test;

		$sql = "INSERT INTO qz_sporsmaal (sporsmaal, kategoriID)
		VALUES ('$spørsmål', '$kategoriID');";

		if (connectDB()->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . connectDB()->error;
		}

		connectDB()->close();

	if (!erLoggetInn()) {
		echo '<a href="logg-inn.php"<h2>Logg inn</h2></a>';
	}
	else {
		echo '<a href="logg-ut.php"<h2>Logg ut</h2></a>';
	}

	//echo "Navn: " . HentFulltNavnFraBrukerID(@$_SESSION['brukerID']);

	echo "<br>BrukerID: " . @$_SESSION['brukerID'] . " slutt";
?>