<?php

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
		$objektIDeksisterer = sjekkOmFlyplassIDeksisterer($objektID);
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

?>