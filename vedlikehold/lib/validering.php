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

		echo '<p style="color:#c9302c;">' . $output . '</p>';
	}

	function validerPersonBruker($BrukerID, $brukernavn, $epost, $ukryptert_passord, $land_id, $mobilnummer, $person_id, $fornavn, $etternavn, $date) {
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
		$fornavn = utf8_decode($fornavn);
		$etternavn = utf8_decode($etternavn);
		$fodselsdato = utf8_decode($date);

		/* Ulike valideringer */

		// På IDen sjekker man kun om den eksisterer hvis den er er fyllt ut. Hvis den ikke er fyllt ut, skal den ikke valideres p.ga. da oppretter man en ny linje i databasen.
		if (($id != "" || $id != null) AND !sjekkOmBrukerIDeksisterer($id)) {
			$kommentar[] = "<strong>Brukeren</strong> eksisterer ikke.";
			$resultat = false;
		}

		// Sjekker om feltet er tomt
		if ($brukernavn == "" || $brukernavn == null) {
			$maaFyllesUt[] = "brukernavn";
			$resultat = false;
		}
		else {
			if (sjekkOmBrukernavnEksisterer(@$brukernavn, @$brukerID) ) {
				$kommentar[] = "<strong>Brukernavn</strong> eksisterer.";
				$resultat = false;
			}
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
			if (sjekkOmEpostEksisterer(@$epost, @$brukerID) ) {
				$kommentar[] = "<strong>E-post</strong> eksisterer.";
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
				$kommentar[] = "<strong>Mobilnummeret</strong> må inneholde minimum 8 siffer.";
				$resultat = false;
			}
			
			if (sjekkOmMobilnummerEksisterer($mobilnummer, $landID, $brukerID)) {
				$kommentar[] = "<strong>Mobilnummer</strong> eksisterer.";
				$resultat = false;
			}
		}

		// Sjekker om feltet er tomt
		if ($fornavn == "" || $fornavn == null) {
			$maaFyllesUt[] = "fornavn";
			$resultat = false;
		}

		// Sjekker om feltet er tomt
		if ($etternavn == "" || $etternavn == null) {
			$maaFyllesUt[] = "etternavn";
			$resultat = false;
		}

		// Sjekker om feltet er tomt
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

/* valider flyvninger */
	function validerFlyvninger($gate, $klokkeslett, $dato, $luftfartoy_id, $rute_kombinasjon_id) {
		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$gate = utf8_decode($gate);
		//$pris = utf8_decode($pris);
		$klokkeslett = utf8_decode($klokkeslett);
		$dato = utf8_decode($avgang);
		//$valuta_id = utf8_decode($valuta_id);
		$luftfartoy_id = utf8_decode($luftfartoy_id);
		$rute_kombinasjon_id = utf8_decode($rute_kombinasjon_id);

		/* Ulike valideringer */
		// Sjekker om feltet er tomt
		if ($gate == "" || $gate == null) {
			$maaFyllesUt[] = "gate";
			$resultat = false;
		}

		/*// Sjekker om feltet er tomt
		if ($pris == "" || $pris == null) {
			$maaFyllesUt[] = "pris";
			$resultat = false;
		}*/

		// Sjekker om feltet er tomt
		if ($klokkeslett == "" || $klokkeslett == null) {
			$maaFyllesUt[] = "klokkeslett";
			$resultat = false;
		}
/*
		// Sjekker om feltet er tomt
		if ($avgang == "" || $avgang == null) {
			$maaFyllesUt[] = "avgang";
			$resultat = false;
		}*/

		/*// Sjekker om feltet er tomt
		if ($valuta_id == "" || $valuta_id == null) {
			$maaFyllesUt[] = "valuta_id";
			$resultat = false;
		}*/

		// Sjekker om feltet er tomt
		if ($luftfartoy_id == "" || $luftfartoy_id == null) {
			$maaFyllesUt[] = "tail nr";
			$resultat = false;
		}

		// Sjekker om feltet er tomt
		if ($rute_kombinasjon_id == "" || $rute_kombinasjon_id == null) {
			$maaFyllesUt[] = "rute nr";
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
/* Valider flyvninger slutt */

/*Validering Klasse - VET IKKE OM DEN FUNGERER*/
function validerKlasse($klassenavn, $beskrivelse) {
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
function validerPassasjertype($passasjertype, $beskrivelse) {
		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$passasjertype = utf8_decode($passasjertype);
		$beskrivelse = utf8_decode($beskrivelse);


		/* Ulike valideringer */

		 // Sjekker om feltet er tomt


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
function validerLand($navn,$landskode, $valuta_id, $iso, $iso3) {

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
		else {
			if (!is_numeric($landskode)) {
				$kommentar[] = "<strong>landskode</strong> kan kun bestå av tall.";
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
		else {
			if (is_numeric($iso)) {
				$kommentar[] = "<strong>iso</strong> kan ikke være et nummer.";
				$resultat = false;
			}
			if (strlen($iso) != 2) {
				$kommentar[] = "<strong>iso</strong> må bestå av 2 bokstaver";
				$resultat = false;
			}
		}
		if ($iso3 == "" || $iso3 == null) {
			$maaFyllesUt[] = "iso3";
			$resultat = false;
		}
		else {
			if (is_numeric($iso3)) {
				$kommentar[] = "<strong>iso3</strong> kan ikke være et nummer.";
				$resultat = false;
			}
			if (strlen($iso3) != 3) {
				$kommentar[] = "<strong>iso3</strong> må bestå av 3 bokstaver";
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

/* Validering land - VET IKKE OM DEN FUNGERER */

/* Validering valuta - VET IKKE OM DEN FUNGERER */
function validerValuta($valuta_navn,$forkortelse) {

		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$valuta_navn = utf8_decode($valuta_navn);
		$forkortelse = utf8_decode($forkortelse);
		
		if ($valuta_navn == "" || $valuta_navn == null) {
		$maaFyllesUt[] = "valuta_navn";
		$resultat = false;
		} 
		else {
			if (is_numeric($valuta_navn)) {
				$kommentar[] = "<strong>valuta navn</strong> kan ikke være et siffer.";
				$resultat = false;
			}
		}

	
		if ($forkortelse == "" || $forkortelse == null) {
				$maaFyllesUt[] = "forkortelse";
				$resultat = false;
			}
			else {
				if (is_numeric($forkortelse)) {
					$kommentar[] = "<strong>forkortelse</strong> kan ikke være et siffer.";
					$resultat = false;
				}
				if (strlen($forkortelse) != 3) {
					$kommentar[] = "<strong>forkortelse</strong> må bestå av 3 bokstaver";
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
/*Validering valuta - VET IKKE OM DEN FUNGERER*/

/*Validering ruter- VET IKKE OM DEN FUNGERER*/

function validerAlleRuter($tid, $pris, $valuta, $fraFlyplass, $tilFlyplass) {

	/* Klarerer variabler */
	$maaFyllesUt = array();
	$kommentar = array();
	$resultat = true;

	$tid = utf8_decode($tid);
	$pris = utf8_decode($pris);
	$valuta = utf8_decode($valuta);
	$fraFlyplass = utf8_decode($fraFlyplass);
	$tilFlyplass = utf8_decode($tilFlyplass);

	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if ($tid == "" || $tid == null) {
		$maaFyllesUt[] = "reisetid";
		$resultat = false;
	}
	if ($pris == "" || $pris == null) {
		$maaFyllesUt[] = "pris";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (!is_numeric($pris)) {
			$kommentar[] = "<strong>Pris</strong> kan kun bestå av tall.";
			$resultat = false;
		}
	}
	if ($valuta == "" || $valuta == null) {
		$maaFyllesUt[] = "valuta";
		$resultat = false;
	}

	/*if ($valuta == "" || $valuta == null) {
		$maaFyllesUt[] = "valuta";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (strlen($valuta) < 3) {
			$kommentar[] = "<strong>Valutaen</strong> må inneholde minumum 3 tegn.";
			$resultat = false;
		}
	}*/
	if ($fraFlyplass == "" || $fraFlyplass== null) {
		$maaFyllesUt[] = "flyplass 1";
		$resultat = false;
	}
	if ($tilFlyplass== "" || $tilFlyplass== null) {
		$maaFyllesUt[] = "flyplass 2";
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

/*Validering type - VET IKKE OM DEN FUNGERER*/
function validerType($type) {
		/* Klarerer variabler */
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = true;

		$type = utf8_decode($type);

		/* Ulike valideringer */

		// Sjekker om feltet er tomt

		if ($type == "" || $type == null) {
			$maaFyllesUt[] = "Type";
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
/*Validering allefly - VET IKKE OM DEN FUNGERER*/

function validerAlleFly($modell_id, $tailnr) {

	/* Klarerer variabler */
	$maaFyllesUt = array();
	$kommentar = array();
	$resultat = true;

	$modell_id = utf8_decode($modell_id);
	$tailnr = utf8_decode($tailnr);

	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if ($modell_id == "" || $modell_id == null) {
		$maaFyllesUt[] = "modell";
		$resultat = false;
	}

	if ($tailnr == "" || $tailnr == null) {
		$maaFyllesUt[] = "tailnr";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!$resultat) {
		feilmeldingBoks($maaFyllesUt, $kommentar);
	} 

	// Returnerer om neste side skal lastes inn
	return $resultat;
}
/*Validering valuta - VET IKKE OM DEN FUNGERER*/

function validerAlleModeller($navn, $type, $rader, $bredde) {
	$maaFyllesUt = array();
	$kommentar = array();
	$resultat = true;

	$navn = utf8_decode($navn);
	$type = utf8_decode($type);
	$rader = utf8_decode($rader);
	$bredde = utf8_decode($bredde);

	if ($navn == "" || $navn == null) {
		$maaFyllesUt[] = "navn";
		$resultat = false;
	}
	if ($type == "" || $type == null) {
		$maaFyllesUt[] = "type";
		$resultat = false;
	}

	if ($rader == "" || $rader == null) {
		$maaFyllesUt[] = "rader";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (!is_numeric($rader)) {
			$kommentar[] = "<strong>Rader</strong> kan kun bestå av tall.";
			$resultat = false;
		}
	}
	if ($bredde == "" || $bredde == null) {
		$maaFyllesUt[] = "bredde";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (!is_numeric($bredde)) {
			$kommentar[] = "<strong>Bredden</strong> kan kun bestå av tall.";
			$resultat = false;
		}
	}
	if (!$resultat) {
		feilmeldingBoks($maaFyllesUt, $kommentar);
	} 
	return $resultat;
}

function validerAlleFlyplasser($navn, $flyplasskode, $latitude, $longitude, $tidssone_gmt, $land_id) {
	$maaFyllesUt = array();
	$kommentar = array();
	$resultat = true;

	$navn = utf8_decode($navn);
	$flyplasskode = utf8_decode($flyplasskode);
	$latitude = utf8_decode($latitude);
	$longitude = utf8_decode($longitude);
	$tidssone_gmt = utf8_decode($tidssone_gmt);
	$land_id = utf8_decode($land_id);

	if ($navn == "" || $navn == null) {
		$maaFyllesUt[] = "Navn";
		$resultat = false;
	}
	
	if ($flyplasskode == "" || $flyplasskode == null) {
			$maaFyllesUt[] = "flyplasskode";
			$resultat = false;
		}
		else {
			if (is_numeric($flyplasskode)) {
				$kommentar[] = "<strong>flyplassforkortelse</strong> kan ikke være et nummer.";
				$resultat = false;
			}
			if (strlen($flyplasskode) != 3) {
				$kommentar[] = "<strong>flyplassforkortelse</strong> må bestå av 3 bokstaver";
				$resultat = false;
			}
		}

		if ($latitude == "" || $latitude == null) {
			$maaFyllesUt[] = "Latitude";
			$resultat = false;
		}
		else {
			if (!is_numeric($latitude)) {
				$kommentar[] = "<strong>Latitude</strong> kan kun bestå av tall.";
				$resultat = false;
			}
		}
	
	if ($longitude == "" || $longitude == null) {
		$maaFyllesUt[] = "Longitude";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (!is_numeric($longitude)) {
			$kommentar[] = "<strong>Longitude</strong> kan kun bestå av tall.";
			$resultat = false;
		}
	}
	if ($tidssone_gmt == "" || $tidssone_gmt == null) {
		$maaFyllesUt[] = "Tidssone_gmt";
		$resultat = false;
	}
	if ($land_id == "" || $land_id == null) {
		$maaFyllesUt[] = "Land_id";
		$resultat = false;
	}
	
	if (!$resultat) {
			feilmeldingBoks($maaFyllesUt, $kommentar);
		}
		
		// Returnerer om neste side skal lastes inn
		return $resultat;
}


function validerFlyvning($flyvningNr, $ruteNr, $tailNr, $type, $avgang, $fraFlyplass, $gate, $tilFlyplass) {
	$maaFyllesUt = array();
	$kommentar = array();
	$resultat = true;

	$flyvningNr = utf8_decode($flyvningNr);
	$ruteNr = utf8_decode($ruteNr);
	$tailNr = utf8_decode($tailNr);
	$type = utf8_decode($type);
	$avgang = utf8_decode($avgang);
	$fraFlyplass = utf8_decode($fraFlyplass);
	$gate = utf8_decode($gate);
	$tilFlyplass = utf8_decode($tilFlyplass);

	if ($flyvningNr == "" || $flyvningNr == null) {
		$maaFyllesUt[] = "FlyvningNr";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (!is_numeric($flyvningNr)) {
			$kommentar[] = "<strong>FlyvningNr</strong> kan kun bestå av tall.";
			$resultat = false;
		}
	}
	
	if ($flyplasskode == "" || $flyplasskode == null) {
				$maaFyllesUt[] = "flyplasskode";
				$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (strlen($flyplasskode) < 3) {
			$kommentar[] = "<strong>flyplasskoden</strong> må inneholde minumum 3 tegn.";
			$resultat = false;
		}
	}

	if ($latitude == "" || $latitude == null) {
		$maaFyllesUt[] = "Latitude";
		$resultat = false;
	}
	else {
		if (!is_numeric($latitude)) {
			$kommentar[] = "<strong>Latitude</strong> kan kun bestå av tall.";
			$resultat = false;
		}
	}
	
	if ($longitude == "" || $longitude == null) {
		$maaFyllesUt[] = "Longitude";
		$resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (!is_numeric($longitude)) {
			$kommentar[] = "<strong>Longitude</strong> kan kun bestå av tall.";
			$resultat = false;
		}
	}
	if ($tidssone_gmt == "" || $tidssone_gmt == null) {
		$maaFyllesUt[] = "Tidssone_gmt";
		$resultat = false;
	}
	if ($land_id == "" || $land_id == null) {
		$maaFyllesUt[] = "Land_id";
		$resultat = false;
	}
	
	if (!$resultat) {
			feilmeldingBoks($maaFyllesUt, $kommentar);
	}
		
	// Returnerer om neste side skal lastes inn

	return $resultat;
		
}

	function validerSlettKlasse($objektID) {
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = TRUE;

		if (sjekkOmKlasseIDeksistereriPris($objektID)) {
			$kommentar[] = 'Klassen brukes i en eller flere priser. Du må slette de først.';
			$resultat = FALSE;
		}
		if (sjekkOmKlasseIDeksistereriSeteoppsett($objektID)) {
			$kommentar[] = 'Klassen brukes i en eller flere seteoppsett. Du må slette de først.';
			$resultat = FALSE;
		}

		if (!$resultat) {
        	feilmeldingBoks($maaFyllesUt, $kommentar);
    	}

		return $resultat;
	}

	function validerSlettValuta($objektID) {
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = TRUE;

		if (sjekkOmValutaEksistereriPris($objektID)) {
			$kommentar[] = 'Valutaen brukes av en pris. Du må slette den først.';
			$resultat = FALSE;
		}
		if (sjekkOmValutaEksistereriRute($objektID)) {
			$kommentar[] = 'Valutaen brukes av en rute. Du må slette den først.';
			$resultat = FALSE;
		}

		if (!$resultat) {
        	feilmeldingBoks($maaFyllesUt, $kommentar);
    	}

		return $resultat;
	}

	function validerSlettType_Luftfartoy($objektID) {
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = TRUE;

		if (sjekkOmLuftfartoyIDeksistereriType_Flyvning($objektID)) {
			$kommentar[] = 'Flyet brukes i en eller flere flyvninger. Du må slette de først.';
			$resultat = FALSE;
		}

		if (!$resultat) {
        	feilmeldingBoks($maaFyllesUt, $kommentar);
    	}

		return $resultat;
	}

	function validerSlettPassasjertype($objektID) {
		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = TRUE;

		if (sjekkOmPassasjertypeIDeksistereriPris($objektID)) {
			$kommentar[] = 'Passasjertypen brukes i en eller flere priser. Du må slette de først.';
			$resultat = FALSE;
		}

		if (!$resultat) {
        	feilmeldingBoks($maaFyllesUt, $kommentar);
    	}

		return $resultat;
	}


	

function validerSlettLand($objektID) {

		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = TRUE;


		if (sjekkOmLandEksistereriFlyplass($objektID)) {
			$kommentar[] = 'Land brukes i en eller flere flyplasser. Du må slette de først.';
			$resultat = FALSE;
		}

		if (sjekkOmLandEksistereriBruker($objektID)) {
			$kommentar[] = 'Land brukes i en eller flere brukere. Du må slette de først.';
			$resultat = FALSE;
		}

		if (!$resultat) {
        	feilmeldingBoks($maaFyllesUt, $kommentar);
    	}

		return $resultat;
	}


	function validerSlettFlyplass($objektID) {

		$maaFyllesUt = array();
		$kommentar = array();
		$resultat = TRUE;

		if (sjekkOmFraFlyplassIDeksistereriRute_kombinasjon($objektID)) {
			$kommentar[] = 'Flyplassen brukes i en eller flere fra - flyplasser. Du må slette de først.';
			$resultat = FALSE;
		}
		if (sjekkOmTilFlyplassIDeksistereriRute_kombinasjon($objektID)) {
			$kommentar[] = 'Flyplassen brukes i en eller flere til- flyplasser. Du må slette de først.';
			$resultat = FALSE;
		}
			if (!$resultat) {
			        	feilmeldingBoks($maaFyllesUt, $kommentar);
			    	}

					return $resultat;
				}


?>