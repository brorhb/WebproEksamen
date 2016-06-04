<?php

	// include_once("funksjoner.php");

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

		echo '<p style="color:#c9302c;">' . $output . '</p>';
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

/*Validering Klasse - VET IKKE OM DEN FUNGERER*/
function validerOppdaterKlasse($klassenavn, $beskrivelse) {
		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$klassenavn = utf8_decode($klassenavn);
		$beskrivelse = utf8_decode($beskrivelse);


		/* Ulike valideringer */

		// Sjekker om feltet er tomt

		if ($klassenavn == "" || $klassenavn == null) {
			$maaFyllesUt[] = "klassenavn";
			$resultat = false;
		}

		// Sjekker om feltet er tomt
		if ($beskrivelse == "" || $beskrivelse == null) {
			$maaFyllesUt[] = "beskrivelse";
			$resultat = false;
		}
		/* Valideringer slutt */

		// Skriver ut feilmeldingsboks
		if (!$resultat) {
			feilmeldingBoks($maaFyllesUt, $kommentar);
		}

		// Returnerer om neste side skal lastes inn
		return $resultat;
	}
/*Validering Klasse - VET IKKE OM DEN FUNGERER*/

/*Validering Passasjertype - VET IKKE OM DEN FUNGERER*/
function validerOppdaterPassasjertype($passasjertype, $beskrivelse) {
		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$passasjertype = utf8_decode($passasjertype);
		$beskrivelse = utf8_decode($beskrivelse);


		/* Ulike valideringer */

		// Sjekker om feltet er tomt

		if ($passasjertype == "" || $passasjertype == null) {
			$maaFyllesUt[] = "passasjertype";
			$resultat = false;
		}

		// Sjekker om feltet er tomt
		if ($beskrivelse == "" || $beskrivelse == null) {
			$maaFyllesUt[] = "beskrivelse";
			$resultat = false;
		}
		/* Valideringer slutt */

		// Skriver ut feilmeldingsboks
		if (!$resultat) {
			feilmeldingBoks($maaFyllesUt, $kommentar);
		}

		// Returnerer om neste side skal lastes inn
		return $resultat;
	}
/*Validering passasjertype - VET IKKE OM DEN FUNGERER*/

/*Validering land - VET IKKE OM DEN FUNGERER*/
function validerOppdaterLand($navn,$landskode, $valuta_id, $iso, $iso3) {

		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$navn = utf8_decode($navn);
		$landskode = utf8_decode($landskode);
		$valuta_id = utf8_decode($valuta_id);
		$iso = utf8_decode($iso);
		$iso3 = utf8_decode($iso3);

		//$mobilnummer = utf8_decode($mobilnummer);
		//$person_id = utf8_decode($person_id);

		/* Ulike valideringer */

		// Sjekker om feltet er tomt
		if ($navn == "" || $navn == null) {
			$maaFyllesUt[] = "navn";
			$resultat = false;
		}

	if ($landskode == "" || $landskode == null) {
			$maaFyllesUt[] = "landskode";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (strlen($landskode) < 3) {
				$kommentar[] = "<strong>Landskoden</strong> må inneholde minumum 3 tegn.";
				$resultat = false;
			}
		}
		if ($valuta_id == "" || $valuta_id == null) {
			$maaFyllesUt[] = "valuta";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (!sjekkOmValutaIDeksisterer($valuta_id)) {
				$kommentar[] = "<strong>Valuta</strong> eksisterer ikke.";
				$resultat = false;
			}
		}
			if ($iso == "" || $iso == null) {
			$maaFyllesUt[] = "iso";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (strlen($iso) < 3) {
				$kommentar[] = "<strong>Iso</strong> må inneholde minumum 3 tegn.";
				$resultat = false;
			}
		}
			if ($iso3 == "" || $iso3 == null) {
			$maaFyllesUt[] = "iso3";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (strlen($iso3) < 3) {
				$kommentar[] = "<strong>Iso3</strong> må inneholde minumum 3 tegn.";
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

/*Validering land - VET IKKE OM DEN FUNGERER*/

/*Validering valuta - VET IKKE OM DEN FUNGERER*/
function validerOppdaterValuta($valuta_navn,$forkortelse) {

		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$valuta_navn = utf8_decode($valuta_navn);
		$forkortelse = utf8_decode($forkortelse);
		
		//$mobilnummer = utf8_decode($mobilnummer);
		//$person_id = utf8_decode($person_id);

		/* Ulike valideringer */
		
		// Sjekker om feltet er tomt
		if ($valuta_navn == "" || $valuta_navn == null) {
			$maaFyllesUt[] = "valuta_navn";
			$resultat = false;
		}

	if ($forkortelse == "" || $forkortelse == null) {
			$maaFyllesUt[] = "forkortelse";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (strlen($forkortelse) < 3) {
				$kommentar[] = "<strong>Forkortelsen</strong> må inneholde minumum 3 tegn.";
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


/*Validering ruter- VET IKKE OM DEN FUNGERER*/


/*Validering ruter - VET IKKE OM DEN FUNGERER*/

/*Validering valuta - VET IKKE OM DEN FUNGERER*/
?>
