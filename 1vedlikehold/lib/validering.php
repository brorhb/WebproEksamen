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