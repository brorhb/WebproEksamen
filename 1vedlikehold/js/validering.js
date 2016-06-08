/* Legg til/endre klasse */

function validerOppdaterKlasse() {
	/* Klarerer variabler */
	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var klassenavn = document.forms["oppdater"]["klassenavn"].value;
	var beskrivelse = document.forms["oppdater"]["beskrivelse"].value;
	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if (klassenavn == "" || klassenavn == null) {
		maaFyllesUt.push("klassenavn");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (beskrivelse == "" || beskrivelse == null) {
		maaFyllesUt.push("beskrivelse");
		resultat = false;
	}
	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om neste side skal lastes inn
	return resultat;
}
/* Legg til/endre klasse */


/* Legg til/endre type (type_luftfartoy)*/
function validerTypeLuftfartoy() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var type = document.forms["oppdater"]["type"].value;
	/* Ulike valideringer */


	// Sjekker om feltet er tomt
	if (type == "" || type == null) {
		maaFyllesUt.push("type");
		resultat = false;
	}

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}

/* Legg til/endre type (type_luftfartoy)*/

/* Legg til/endre land  */
function validerOppdaterLand() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var navn = document.forms["oppdater"]["navn"].value;
	var landskode = document.forms["oppdater"]["landskode"].value;
	var valuta_id = document.getElementById("valuta_id");
	var iso = document.forms["oppdater"]["iso"].value;
	var iso3 = document.forms["oppdater"]["iso3"].value;
	/* Ulike valideringer */

	if (navn == "" || navn == null) {
		maaFyllesUt.push("navn");
		resultat = false;
	}
	if (landskode == "" || landskode == null) {
		maaFyllesUt.push("landskode");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer 
	else {
		if (isNaN(landskode)) {
			kommentar.push("<strong>Landskode</strong> må være minst et siffer og maks 4.");
			resultat = false;
		}
		if (landskode.length > 4) {
			kommentar.push("<strong>Landskode</strong> må være minst et siffer og maks 4.");
			resultat = false;
		}
	}
	if (valuta_id.value == "") {
		maaFyllesUt.push("valuta");
		resultat = false;
	}

	if (iso == "" || iso == null) {
		maaFyllesUt.push("iso");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (iso.length != 2) {
			kommentar.push("<strong>iso</strong> må bestå av 2 bokstaver.");
			resultat = false;
		}
		if (!isNaN(iso)) {
			kommentar.push("<strong>iso</strong> kan ikke bestå av siffer.");
			resultat = false;
		}
	}
	if (iso3 == "" || iso3 == null) {
		maaFyllesUt.push("iso3");
		resultat = false;
	}
	 else {
		if (iso3.length != 3) {
			kommentar.push("<strong>iso3</strong> må bestå av 3 bokstaver.");
			resultat = false;
		}
		if (!isNaN(iso3)) {
			kommentar.push("<strong>iso3</strong> kan ikke bestå av siffer.");
			resultat = false;
		}
	}
	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}
/* Legg til/endre land  */

/*Legg til passasjertyper*/
function validerOppdaterPassasjertype() {
	/* Klarerer variabler */
	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var Passasjertype = document.forms["oppdater"]["Passasjertype"].value;
	var beskrivelse = document.forms["oppdater"]["beskrivelse"].value;
	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if (Passasjertype == "" || Passasjertype == null) {
		maaFyllesUt.push("passasjertype");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (beskrivelse == "" || beskrivelse == null) {
		maaFyllesUt.push("beskrivelse");
		resultat = false;
	}

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om neste side skal lastes inn
	return resultat;
}

/* Legg til/endre klasse */
function validerOppdaterKlasse() {
	/* Klarerer variabler */
	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var klassenavn = document.forms["oppdater"]["klassenavn"].value;/*vanlig*/
	var beskrivelse = document.forms["oppdater"]["beskrivelse"].value;/*vanlig*/
	/* Ulike valideringer */

	// Sjekker om feltet er tomt

	if (klassenavn == "" || klassenavn == null) {
		maaFyllesUt.push("klassenavn");
		resultat = false;
	}
	// Sjekker om feltet er tomt
	if (beskrivelse == "" || beskrivelse == null) {
		maaFyllesUt.push("beskrivelse");
		resultat = false;
	}

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}
/* Legg til/endre klasse */

/*legg til/ Alleflyplasser*/

function validerOppdaterAlleFlyplasser() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var navn = document.forms["oppdater"]["navn"].value;
	var flyplasskode = document.forms["oppdater"]["flyplasskode"].value; //kun 3 varchar
	var latitude = document.forms["oppdater"]["latitude"].value;
	var longitude = document.forms["oppdater"]["longitude"].value;
	var tidssone_gmt = document.getElementById("tidssone_gmt"); //listeboks
	var land_id = document.getElementById("land_id"); //listeboks
	/* Ulike valideringer */


	// Sjekker om feltet er tomt
	if (navn == "" || navn == null) {
		maaFyllesUt.push("navn");
		resultat = false;
	}


	// Sjekker om feltet er tomt
	if (flyplasskode == "" || flyplasskode == null) {
		maaFyllesUt.push("Flyplassforkortelse");
		resultat = false;
	}
	else {
		if (flyplasskode.length != 3) {
			kommentar.push("<strong>Flyplassforkortelse</strong> kan kun inneholde tre tegn");
			resultat = false;
		}
	}


	// Sjekker om feltet er tomt
	if (latitude == "" || latitude == null) {
		maaFyllesUt.push("latitude");
		resultat = false;
	}
	else {
		if (isNaN(latitude)) {
			kommentar.push("<strong>Latitude</strong> kan kun inneholde siffer, komma eller punktum.");
			resultat = false;
		}
	}

	// Sjekker om feltet er tomt
	if (longitude == "" || longitude == null) {
		maaFyllesUt.push("longitude");
		resultat = false;
	}
	else {
		if (isNaN(longitude)) {
			kommentar.push("<strong>Longitude</strong> kan kun inneholde siffer, komma eller punktum.");
			resultat = false;
		}
	}
	// Sjekker om feltet er tomt listeboks
	if (tidssone_gmt.value == "") {
		maaFyllesUt.push("tidssone gmt");
		resultat = false;
	}
	// Sjekker om feltet er tomt listeboks
	if (land_id.value == "") {
		maaFyllesUt.push("land id");
		resultat = false;
	}



	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}
/*legg til/ Alleflyplasser*/

/*legg til/ avg*/
function validerOppdaterRuter() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

 

	var tid = document.forms["oppdater"]["tid"].value;
	var pris = document.forms["oppdater"]["pris"].value;
	var valuta = document.getElementById("valuta_id"); //listeboks
	var fraFlyplass = document.getElementById("fraFlyplass_id").value; //listeboks
	var tilFlyplass = document.getElementById("tilFlyplass_id").value; //listeboks



	// Sjekker om feltet er tomt
	if (tid == "" || tid == null) {
		maaFyllesUt.push("tid");
		resultat = false;
	}
	else {
		if (isNaN(tid)) {
			kommentar.push("<strong>Tid</strong> kan kun inneholde siffer, sett tid som TIMER (1 = 1time).");
			resultat = false;
		}
	}
	if (pris == "" || pris == null) {
		maaFyllesUt.push("pris");
		resultat = false;
	}
	else {
		if (isNaN(pris)) {
			kommentar.push("<strong>Pris</strong> kan kun inneholde siffer.");
			resultat = false;
		}
	}
	if (valuta == "" || valuta == null) {
		maaFyllesUt.push("valuta");
		resultat = false;
	}
	if (fraFlyplass == "" || fraFlyplass == null) {
		maaFyllesUt.push("flyplass 1");
		resultat = false;
	}
	if (tilFlyplass == "" || tilFlyplass == null) {
		maaFyllesUt.push("flyplass 2");
		resultat = false;
	}
	if (fraFlyplass == tilFlyplass && (fraFlyplass != "" && fraFlyplass != null) && (tilFlyplass != "" && tilFlyplass != null)) {
		kommentar.push("<strong>Flyplassene</strong> kan ikke være like");
			resultat = false;
	}

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}


/*legg til /ruter*/

/* Legg til/endre valuta */

function validerOppdaterValuta() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var valuta_navn = document.forms["oppdater"]["valuta_navn"].value;
	var forkortelse = document.forms["oppdater"]["forkortelse"].value
	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if (valuta_navn == "" || valuta_navn == null) {
		maaFyllesUt.push("valuta");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		
		if (!isNaN(valuta_navn)) {
			kommentar.push("<strong>Valuta</strong> kan ikke bestå av siffer.");
			resultat = false;
		}
	}

	// Sjekker om feltet er tomt
	if (forkortelse == "" || forkortelse == null) {
		maaFyllesUt.push("forkortelse");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (forkortelse.length != 3) {
			kommentar.push("<strong>forkortelse</strong> må bestå av 3 bokstaver.");
			resultat = false;
		}
		if (!isNaN(forkortelse)) {
			kommentar.push("<strong>forkortelse</strong> kan ikke bestå av siffer.");
			resultat = false;
		}
	}

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}

/* Legg til/endre valuta */

/* Slett */

function sikkerSlett() {
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
		function (isConfirm) {
			if (isConfirm) {
				swal("Deleted!", "Your imaginary file has been deleted.", "success");
			}
			else {
				swal("Cancelled", "Your imaginary file is safe :)", "error");
			}
		});
}

/* Slett */

// valider modeller
/*function validerOppdaterModeller() {
	var navn = document.form["oppdater"]["navn"].value, type = document.forms["oppdater"]["type"].value, kapasitet = document.forms["oppdater"]["kapasitet"].value, rader = document.forms["oppdater"]["rader"].value, bredde = document.forms["oppdater"]["bredde"].value, resultat = true;
	// navn
	if (!navn) {
		alert("Navn er ikke fylt ut ");
		resultat = false;
	}

	// Type
	if (type == null || type == "") {
		alert("Type er ikke valgt ");
		resultat = false;
	}

	// kapasitet
	else if (!kapasitet) {
		alert("kapasitet mangler ");
		resultat = false;
	}
	else if (!isNaN(kapasitet)) {
		alert("kapasitet må være ett tall ");
		resultat = false;
	}

	// rader
	else if (!rader){
		alert("rader mangler ");
		resultat = false;
	}
	else if (!isNaN(rader)){
		alert("rader må være ett tall ");
		resultat = false;
	}

	// bredde
	else if (!bredde){
		alert("bredde mangler ");
		resultat = false;
	}
	else if (!isNaN(bredde)){
		alert("bredde må være ett tall ");
		resultat = false;
	}

	return resultat;
}*/

/*
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (true) {
			kommentar.push("<strong>Mobilnummer</strong> kan kun inneholde siffer fra 0 - 9.");
			resultat = false;
		}
		if (true) {
			kommentar.push("<strong>Mobilnummer</strong> må være minumum 8 tegn.");
			resultat = false;
		}
	}
*/


function validerPersonBruker() {
	var brukernavn = document.forms["oppdater"]["brukernavn"].value;
	var passord = document.forms["oppdater"]["passord"].value;
	var fornavn = document.forms["oppdater"]["fornavn"].value;
	var etternavn = document.forms["oppdater"]["etternavn"].value;
	var fodselsdato = document.forms["oppdater"]["date"].value;
	var landID = document.getElementById("land_id");
	var epost = document.forms["oppdater"]["epost"].value;
	var mobilnr = document.forms["oppdater"]["mobilnr"].value;
	var resultat = true;

	/* Klarerer variabler */
	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if (brukernavn == "" || brukernavn == null) {
		maaFyllesUt.push("brukernavn");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (passord == "" || passord == null) {
		maaFyllesUt.push("passord");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (fornavn == "" || fornavn == null) {
		maaFyllesUt.push("fornavn");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (etternavn == "" || etternavn == null) {
		maaFyllesUt.push("etternavn");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	 if (fodselsdato == "" || fodselsdato == null) {
		maaFyllesUt.push("fødselsdato");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer 
	else {
		if (fodselsdato.length > 10) {
			kommentar.push("<strong>fødselsdato</strong> må være minst 8 siffer(DD/MM/YYYY).");
			resultat = false;
		}
	}

	// Sjekker om feltet er tomt
	if (landID.value == "" || landID.value == null) {
		maaFyllesUt.push("land");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (epost == "" || epost == null) {
		maaFyllesUt.push("epost");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (mobilnr == "" || mobilnr == null) {
		maaFyllesUt.push("mobilnr");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer 
	else {
		if (isNaN(mobilnr)) {
			kommentar.push("<strong>mobilnummer</strong> må være minst 8 siffer.");
			resultat = false;
		}
		if (mobilnr.length > 8) {
			kommentar.push("<strong>mobilnummer</strong> må være minst 8 siffer.");
			resultat = false;
		}
	}

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om neste side skal lastes inn
	return resultat;
}
/*legg til/endre modeller*/

function validerOppdaterModeller() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var navn = document.forms["oppdater"]["navn"].value;
	var type_luftfartoy_id = document.getElementById("type_luftfartoy_id");
	var kapasitet = document.forms["oppdater"]["kapasitet"].value;
	var rader = document.forms["oppdater"]["rader"].value;
	var bredde = document.forms["oppdater"]["bredde"].value;
	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if (navn == "" || navn == null) {
		maaFyllesUt.push("navn");
		resultat = false;
	}

	if (type_luftfartoy_id.value == "") {
		maaFyllesUt.push("luftfartøy");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (kapasitet == "" || kapasitet == null) {
		maaFyllesUt.push("kapasitet");
		resultat = false;
	}
	if (isNaN(kapasitet)) {
		maaFyllesUt.push("kapasitet må være siffer");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (rader == "" || rader == null) {
		maaFyllesUt.push("rader");
		resultat = false;
	}
	if (isNaN(rader)) {
		maaFyllesUt.push("rader må være tall");
		resultat = false;
	}
	// Sjekker om feltet er tomt
	if (bredde == "" || bredde == null) {
		maaFyllesUt.push("bredde");
		resultat = false;
	}
	if (isNaN(bredde)) {
		maaFyllesUt.push("bredde må være siffer");
		resultat = false;
	}
	else {
		if (true) {
			kommentar.push("Kan kun inneholde siffer")
		}
	}

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}

/* legg til/endre luftfartoy/fly */

if (landskode == "" || landskode == null) {
	maaFyllesUt.push("landskode");
	resultat = false;
}


/*legg til/endre modeller*/


/* legg til/endre luftfartoy/fly */

/*function validerLuftfartoy() {
	var modell_id = document.forms["oppdater"]["modell_id"].value;
	var tailnr = document.forms["oppdater"]["tailnr"].value;
	var resultat = true;
	if (modell_id == null || modell_id == "") {
		swal({
			title: "Obs!",
			text: "Modell_id må velges",
			type: "warning"
		});
		resultat = false;
	}
	else if (tailnr == null || tailnr == "") {
		swal({
			title: "Obs!",
			text: "Tailnr må fylles ut",
			type: "warning"
		});
		resultat = false;
	}

	return resultat;
}*/
function validerLuftfartoy() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var modell_id = document.getElementById("modell_id"); /*lesteboks*/
	var tailnr = document.forms["oppdater"]["tailnr"].value;/*vanlig*/
	/* Ulike valideringer */

	// Sjekker om feltet er tomt
	if (modell_id == "" || modell_id == null) {
		maaFyllesUt.push("modell_id");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (tailnr == "" || tailnr == null) {
		maaFyllesUt.push("tailnr");
		resultat = false;
	}

	/* Valideringer slutt */

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}

/* legg til/endre luftfartoy/fly */

/*sok alleavganger.php  return validerFlyvning() MÅ TESTES */
/* Gammel versjon, slettes når alleflyvninger.php fungerer

function validerFlyvning() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var flyvningNr = document.forms["oppdater"]["flyvningNr"].value;
	var ruteNr = document.getElementById("ruteNr"); //listeboks
	var tailNr = document.getElementById("tailNr"); //listeboks
	var type = document.getElementById("type"); //listeboks
	var avgang = document.forms["oppdater"]["avgang"].value;
	var fraFlyplass = document.getElementById("fraFlyplass"); //listeboks
	var gate = document.forms["oppdater"]["gate"].value;
	var tilFlyplass = document.getElementById("tilFlyplass"); //listeboks
	/* Ulike valideringer 


	// Sjekker om feltet er tomt
	if (flyvningNr == "" || flyvningNr == null) {
		maaFyllesUt.push("flyvningNr");
		resultat = false;
	}

		// Sjekker om feltet er tomt listeboks
	if (ruteNr.value == "") {
		maaFyllesUt.push("ruteNr");
		resultat = false;
	}

	// Sjekker om feltet er tomt listeboks
	if (tailNr.value == "") {
		maaFyllesUt.push("tailNr");
		resultat = false;
	}

	// Sjekker om feltet er tomt listeboks
	if (type.value == "") {
		maaFyllesUt.push("type");
		resultat = false;
	}


	// Sjekker om feltet er tomt
	if (avgang == "" || avgang == null) {
		maaFyllesUt.push("avgang");
		resultat = false;
	}
		// Sjekker om feltet er tomt listeboks
	if (fraFlyplass.value == "") {
		maaFyllesUt.push("fraFlyplass");
		resultat = false;
	}

		// Sjekker om feltet er tomt
	if (gate == "" || gate == null) {
		maaFyllesUt.push("gate");
		resultat = false;
	}

		// Sjekker om feltet er tomt listeboks
	if (tilFlyplass.value == "") {
		maaFyllesUt.push("tilFlyplass");
		resultat = false;
	}

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
	return resultat;
}
*/


/* ny versjon til alleflyvninger.php*/

/* */
function validerFlyvning() {

    return false;
    break;
    var maaFyllesUt = [];
    var kommentar = [];
    var resultat = true;
    var reg = /[^0-9\/]+/;
    var klokke = /[^0-9\:]+/;


    //var flyvningNr = document.forms["oppdater"]["flyvningNr"].value;
    var luftfartoy_id = document.getElementById("luftfartoy_id"); //listeboks
    var rute_kombinasjon_id = document.getElementById("rute_kombinasjon_id"); //listeboks
    var avgang = document.getElementById("avgang"); //datepicker
    var klokkeslett = document.forms["oppdater"]["klokkeslett"].value;
    var gate = document.forms["oppdater"]["gate"].value;
    var pris = document.forms["oppdater"]["pris"].value;
    var valuta_id = document.getElementById("valuta_id"); //listeboks

    var del = klokkeslett.split(":");
    var timer = del[0];
    var minutter = del[1];
    
    /* Ulike valideringer */
        // Sjekker om feltet er tomt listeboks
    if (luftfartoy_id.value == "") {
        maaFyllesUt.push("luftfartoy_id");
        resultat = false;
    }

        // Sjekker om feltet er tomt listeboks
    if (rute_kombinasjon_id.value == "") {
        maaFyllesUt.push("rute nr");
        resultat = false;
    }


    // Sjekker om feltet er tomt datepicker
    if (avgang.value == "") {
        maaFyllesUt.push("avgang");
        resultat = false;
    }
        else {
        if (forkortelse.length != 10) {
            kommentar.push("<strong>forkortelse</strong> må bestå av 10 tegn. f.eks 07/06/2016");
            resultat = false;
        }
        if (reg(avgang)) {
            kommentar.push("<strong>avgang</strong> må velges");
            resultat = false;
        }
    }
    // Sjekker om feltet er tomt
    if (klokkeslett == "" || klokkeslett == null) {
        maaFyllesUt.push("klokkeslett");
        resultat = false;
    }
      else {
        if (klokkeslett.length != 5) {
            kommentar.push("<strong>klokkeslett</strong> må bestå av 5 tegn. f.eks 14:00");
            resultat = false;
        }
        if (isNaN(timer) || isNaN(minutter)) {
            kommentar.push("<strong>Klokkeslett</strong> kan kun inneholde siffer på hver side av kolon (:)");
            resultat = false;
        }
        if (timer < 0 || timer > 23) {
            kommentar.push("<strong>Klokkeslett</strong> kan kun ha timer fra og med 0 til og med 23");
            resultat = false;
        }
        if (minutter < 0 || minutter > 59) {
            kommentar.push("<strong>Klokkeslett</strong> kan kun ha minutter fra og med 0 til og med 59");
            resultat = false;
        }
    }

            // Sjekker om feltet er tomt
    if (gate == "" || gate == null) {
        maaFyllesUt.push("gate");
        resultat = false;
    }



    // Sjekker om feltet er tomt
    if (pris == "" || pris == null) {
        maaFyllesUt.push("pris");
        resultat = false;
    }


        // Sjekker om feltet er tomt listeboks
    if (valuta_id.value == "") {
        maaFyllesUt.push("valuta_id");
        resultat = false;
    }

    // Skriver ut feilmeldingsboks
    if (!resultat) {
        feilmeldingBoks(maaFyllesUt, kommentar);
    }

    // Returnerer om det er noen feil
    return resultat;
}
/* ny versjon alleflyvninger.php*/

/*sok alleavganger.php*/

// Eksempel på valider-funksjon
/*function validerEksempel() {
	// Klarerer variabler 
	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	// Ulike valideringer

	// Sjekker om feltet er tomt
	if (true) {
		maaFyllesUt.push("fornavn");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (true) {
		maaFyllesUt.push("etternavn");
		resultat = false;
	}

	// Sjekker om feltet er tomt
	if (true) {
		maaFyllesUt.push("alder");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (true) {
			kommentar.push("<strong>Alder</strong> må være et possitivt tall.");
			resultat = false;
		}
	}

	// Sjekker om feltet er tomt
	if (false) {
		maaFyllesUt.push("mobilnummer");
		resultat = false;
	}
	// Feltet er fylt ut, sjekker ytterligere valideringer
	else {
		if (true) {
			kommentar.push("<strong>Mobilnummer</strong> kan kun inneholde siffer fra 0 - 9.");
			resultat = false;
		}
		if (true) {
			kommentar.push("<strong>Mobilnummer</strong> må være minumum 8 tegn.");
			resultat = false;
		}
	}

	// Valideringer slutt 

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om neste side skal lastes inn
	return resultat;
}

// Eksempel på valider-funksjon slutt*/

function feilmeldingBoks(maaFyllesUt, kommentar) {

	var fyllesutOutput = "";
	var kommentarOutput = "";
	var output = "";

	/* Gjør om det som må fylles ut til tekst */
	for (var i = 0; i < maaFyllesUt.length; i++) {
		fyllesutOutput += "<strong>" + maaFyllesUt[i] + "</strong>";
		if (i < maaFyllesUt.length - 2) {
			fyllesutOutput += ", ";
		}
		else if (i < maaFyllesUt.length - 1) {
			fyllesutOutput += " og ";
		}
	}
	if (maaFyllesUt.length > 0) {
		fyllesutOutput += " må fylles ut.";
	}

	/* Gjør om kommentarer til tekst */
	for (var i = 0; i < kommentar.length; i++) {
		if (i == 0 && maaFyllesUt.length != 0) {
			kommentarOutput += "<br><br>";
		}
		else if (i != 0) {
			kommentarOutput += "<br>";
		}

		kommentarOutput += kommentar[i];
		if (i < kommentar.length - 1) {
			kommentarOutput += " ";
		}
	}

	output = fyllesutOutput + kommentarOutput;

	if (output == "") {
		output += "Ingen output";
	}

	swal({
		title: "Obs!",
		text: output,
		type: "error",
		html: true
	});
}

function sikkerSlett() {
	var resultat = true;
	var slett = document.getElementById("Slett");
	
	if (true) {
		resultat = false;

		swal({
			title: "Er du sikker?",
			text: "Filen vil ikke kunne bli gjennopprettet!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Ja, slett!",
			cancelButtonText: "Nei, avbryt!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
			function (isConfirm) {
				if (isConfirm) {
					swal("Slettet!", "Filen er blitt slettet.", "success");
				}
				else {
					swal("Avbrutt", "Filen er fortsatt trygt lagret :)", "error");
				}
			});
	}

	return resultat;
}

function validerSubmitKnapp(handlingstype) {
	var resultat = true;
	var erSjekketAv = validerAvsjekking("id");

	// Trykket på legg til. Utfør operasjon
	if (handlingstype == "Legg til" || handlingstype == "legg til"|| handlingstype == "Ny"|| handlingstype == "ny") {
		resultat = true;
	}
	// Alt under her må man velge et valg for å komme videre
	else if(!erSjekketAv) {
		swal(handlingstype, "Huk av for informasjonen du vil behandle.", "error");
		resultat = false;
	}
	// Trykket på slett
	else if (handlingstype == "Slett" || handlingstype == "slett") {
		resultat = false;
		swal({
			title: "Er du sikker?",
			text: "Informasjonen vil bli slettet for godt!<form method=\"post\" id=\"slettForm\"><input type=\"hidden\" name=\"id\" value=" + erSjekketAv + "><input type=\"hidden\" name=\"slett\" value=\"true\"></form>",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Ja, slett det!",
			cancelButtonText: "Nei, kanseller det!",
			closeOnConfirm: false,
			closeOnCancel: false,
			html: true
		},
		function(isConfirm){
			if (isConfirm) {
				document.getElementById("slettForm").submit();
				swal.close();
				resultat = true;
			} else {
				swal("Kansellert", "Informasjonen er trygg :)", "error");
				resultat = false;
			}
		});
	}
	// Trykket på endre
	else if (handlingstype == "Endre" || handlingstype == "endre") {
		resultat = true;
	}
	// Her skal det egentlg ikke være mulig å komme
	else {
		swal("Noe galt skjedde...", "Dette valget skal i teorien være umulig å vise hvis valideringen er gjort riktig.", "error");
		resultat = false;
	}

	return resultat;
}

function validerAvsjekking(name) {
	var checkboxs=document.getElementsByName(name);
	var erSjekketAv=false;

	for(var i=0,l=checkboxs.length;i<l;i++)
	{
		if(checkboxs[i].checked)
		{
			erSjekketAv=checkboxs[i].value;
			break;
		}
	}
	return erSjekketAv;
}