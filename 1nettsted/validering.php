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


	/* Validering php Registrer reisende*/
function validerRegistrerReisende($fornavn,$etternavn, $epost, $kjonn, $fodeselsdato, $mobilnummer) {

		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$fornavn = utf8_decode($fornavn);
		$etternavn = utf8_decode($etternavn);
		$epost = utf8_decode($epost);
		$kjonn = utf8_decode($kjonn);
		$fodeselsdato = utf8_decode($fodeselsdato);
		$mobilnummer = utf8_decode($mobilnummer);

		/* Ulike valideringer */
		
		// Sjekker om feltet er tomt
		if ($fornavn == "" || $fornavn == null) {
			$maaFyllesUt[] = "fornavn";
			$resultat = false;
		}

		if ($etternavn == "" || $etternavn == null) {
			$maaFyllesUt[] = "etternavn";
			$resultat = false;
		}

		if ($epost == "" || $epost == null) {
			$maaFyllesUt[] = "epost";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (filter_var($epost, FILTER_VALIDATE_EMAIL) === false) {
				$kommentar[] = "<strong>E-postadressen</strong> er ugyldig.";
				$resultat = false;
			}
			if (sjekkOmEpostEksisterer($epost) ) {
				$kommentar[] = "<strong>E-postadressen</strong> eksisterer.";
				$resultat = false;
			}
		}
		
		if ($kjonn == "" || $kjonn== null) {
			$maaFyllesUt[] = "kjønn";
			$resultat = false;
		}

		if ($mobilnummer == "" || $mobilnummer == null) {
			$maaFyllesUt[] = "mobilnummer";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if (!is_numeric($mobilnummer)) {
				$kommentar[] = "<strong>Mobilnummeret</strong> må inneholde minimum 8 siffer.";
				$resultat = false;
			}
			
			if (sjekkOmMobilnummerEksisterer($mobilnummer)) {
				$kommentar[] = "<strong>Mobilnummer</strong> eksisterer.";
				$resultat = false;
			}
		}
		if ($fodselsdato == "" || $fodselsdato == null) {
			$maaFyllesUt[] = "fødselsdato";
			$resultat = false;
		}
		// Feltet er fylt ut, sjekker ytterligere valideringer
		else {
			if ($fodselsdato > time()) {
				$kommentar[] = "passasjer må være født";
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

function validerBestilling($fraFlyplass, $tilFlyplass, $passasjertype, $fraDato, $tilDato) {
    
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$fraFlyplass = utf_decode($fraFlyplass);
		$tilFlyplass = utf8_decode($tilFlyplass);
		$passasjertype = utf8_decode($passasjertype);
		$fraDato = utf8_decode($fraDato);
		$tilDato = utf8_decode($tilDato);


    //Sjekker om feltet er tomt,listeboks
    if ($fraFlyplass.value == ""){
        $maaFyllesUt.push("fraFlyplass");
        $resultat = false;
    }
    //Sjekker om feltet er tomt, listeboks
    if ($tilFlyplass.value == ""){
        $maaFyllesUt.push("tilFlyplass");
        $resultat = false;
    }
     //Sjekker om feltet er tomt,listeboks
    if ($passasjertype == "") {
        $maaFyllesUt.push(passasjertype);
        $resultat = false;
    }
        //Sjekker om feltet er tomt,listeboks
    if ($fraDato.value == ""){
        $maaFyllesUt.push("fraDato");
        $resultat = false;
    }

    //Sjekker om feltet er tomt,listeboks
    if($tilDato.value == ""){
        $maaFyllesUt.push("tilDato");
        $resultat = false;
    }
    return $resultat;
    }
}
/* Bestilling validering slutt */




	?>