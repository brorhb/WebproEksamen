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

	?>