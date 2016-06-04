<?php

	include_once("funksjoner.php");

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
				$kommentar[] = "<strong>Alder</strong> må være et possitivt tall.";
				$resultat = false;
			}
		}

		// Sjekker om feltet er tomt
		if (false) {
			$maaFyllesUt[] = "mobilnummer";
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

	function validerBruker($BrukerID, $brukernavn, $epost, $ukryptert_passord, $land_id, $mobilnummer, $person_id) {
		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$id = utf8_decode($BrukerID);
		$brukernavn = utf8_decode($brukernavn);
		$epost = utf8_decode($epost);
		$ukryptert_passord = utf8_decode($ukryptert_passord);
		$land_id = utf8_decode($land_id);
		$mobilnummer = utf8_decode($mobilnummer);
		$person_id = utf8_decode($person_id);

		/* Ulike valideringer */
		
		// Sjekker om feltet er tomt
		if ($id == "" || $id == null) {
			$maaFyllesUt[] = "brukerID";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (!is_numeric($id)) {
				$kommentar[] = "<strong>BrukerID</strong>en må kun bestå av tall.";
				$resultat = false;
			}
		}

		// Sjekker om feltet er tomt
		if ($brukernavn == "" || $brukernavn == null) {
			$maaFyllesUt[] = "brukernavn";
			$resultat = false;
		}

		// Sjekker om feltet er tomt
		if ($epost == "" || $epost == null) {
			$maaFyllesUt[] = "epost";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (filter_var($epost, FILTER_VALIDATE_EMAIL) === false) {
				$kommentar[] = "<strong>Epostadressen</strong> er ugyldig.";
				$resultat = false;
			}
		}

		// Sjekker om feltet er tomt
		if ($ukryptert_passord == "" || $ukryptert_passord == null) {
			$maaFyllesUt[] = "passord";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (strlen($ukryptert_passord) < 5) {
				$kommentar[] = "<strong>Passordet</strong> må inneholde minumum 5 tegn.";
				$resultat = false;
			}
		}

		// Sjekker om feltet er tomt
		if ($land_id == "" || $land_id == null) {
			$maaFyllesUt[] = "land";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (!sjekkOmLandIDeksisterer($land_id)) {
				$kommentar[] = "<strong>Landet</strong> eksisterer ikke.";
				$resultat = false;
			}
		}

		// Sjekker om feltet er tomt
		if ($mobilnummer == "" || $mobilnummer == null) {
			$maaFyllesUt[] = "mobilnummer";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (!is_numeric($mobilnummer)) {
				$kommentar[] = "<strong>Mobilnummeret</strong> kan kun inneholde siffer fra 0 - 9.";
				$resultat = false;
			}
			if (strlen($mobilnummer) < 8) {
				$kommentar[] = "<strong>Mobilnummeret</strong> må inneholde minimum 8 tegn.";
				$resultat = false;
			}
		}

		// Sjekker om feltet er tomt
		if ($person_id == "" || $person_id == null) {
			$maaFyllesUt[] = "person";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (!sjekkOmPersonIDeksisterer($person_id)) {
				$kommentar[] = "<strong>Personen</strong> eksisterer ikke.";
				$resultat = false;
			}
		}

		/* Valideringer slutt */
		
		// Skriver ut feilmeldingsboks
		if (!$resultat) {
			feilmeldingBoks($maaFyllesUt, $kommentar);
		}
		
		// Returnerer om neste side skal lastes inn
		return $resultat;
	}

?>