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

   var type = document.forms["oppdater"]["type"].value
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
function validerLand() {

    var maaFyllesUt = [];
    var kommentar = [];
    var resultat = true;

    var navn = document.forms["oppdater"]["navn"].value;
    var landskode = document.forms["oppdater"]["landskode"].value;
    var valuta_id = document.getElementById("valuta_id");
    var iso = document.forms["oppdater"]["iso"].value;
    var iso3 = document.forms["oppdater"]["iso3"].value;
    /* Ulike valideringer */
    
    if (true) {
        maaFyllesUt.push("navn");
        resultat = false;
    }
    if (landskode == "" || landskode == null) {
        maaFyllesUt.push("landskode");
        resultat = false;
    }
    if (valuta_id.value == "") {
        maaFyllesUt.push("valuta_id");
        resultat = false;
    }

    if (iso.value == "") {
        maaFyllesUt.push("iso");
        resultat = false;
    }
    if (true) {
        maaFyllesUt.push("iso3");
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
/* Legg til/endre land  */

/*Legg til passasjertyper*/
function validerOppdaterPassasjertyper() {
    /* Klarerer variabler */
    var maaFyllesUt = [];
    var kommentar = [];
    var resultat = true;

    var passasjertyper = document.forms["oppdater"]["passasjertyper"].value;
    var beskrivelse = document.forms["oppdater"]["beskrivelse"].value;
    /* Ulike valideringer */
    
    // Sjekker om feltet er tomt
    if (passasjertyper == "" || passasjertyper == null) {
        maaFyllesUt.push("passasjertyper");
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

function validerOppdaterAlleflyplasser() {
    var navn = document.forms["oppdater"]["navn"].value;
    var flyplasskode = document.forms["oppdater"]["flyplasskode"].value;
    var latitude = document.forms["oppdater"]["latitude"].value;
    var longtude = document.forms["oppdater"]["longtude"].value;
    var tidssone_gmt = document.forms["oppdater"]["tidssone_gmt"].value;
    var land_id = document.forms["oppdater"]["land_id"].value;
    var resultat = true;
    if (navn == null || navn == "") {
        swal({
            title: "Obs!",
            text: "Navn må fylles ut",
            type: "warning"
        });
        resultat = false;
    }
    else if (flyplasskode == null || flyplasskode == "") {
        alert("Flyplasskode må fylles ut");
        resultat = false;
    }
    else if (latitude == null || latitude == "") {
        alert("Latitude må fylles ut");
        resultat = false;
    }
    else if (longtude == null || longtude == "") {
        alert("Longtude må fylles ut");
        resultat = false;
    }
    else if (tidssone_gmt == null || tidssone_gmt == "") {
        alert("Tidssone må fylles ut");
        resultat = false;
    }
    else if (land_id == null || land_id == "") {
        alert("Land ID må fylles ut");
        resultat = false;
    }
    
    return resultat;
}
/*legg til/ Alleflyplasser*/ 

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
        maaFyllesUt.push("valuta navn");
        resultat = false;
    }

    // Sjekker om feltet er tomt
    if (forkortelse == "" || forkortelse == null) {
        maaFyllesUt.push("forkortelse");
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
         function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your imaginary file has been deleted.", "success");   
            } 
            else {     
                swal("Cancelled", "Your imaginary file is safe :)", "error");  
            } 
    });
}

/* Slett  */ 

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
    var fodselsdato = document.forms["oppdater"]["fodselsdato"].value;
    var landID = document.getElementById("land_id");
    var epost = document.forms["oppdater"]["epost"].value;
    var mobilnr = document.forms["oppdater"]["mobilnr"].value;
    var resultat = true;
    
    /* Klarerer variabler */
	var maaFyllesUt = [];
	var kommentar = [];

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
        if (fodselsdato.length != 8) {
            kommentar.push("<strong>Fødselsdato</strong> må være 8 siffer (DDMMYYYY).");
            resultat = false;
        }
        if (isNaN(fodselsdato)) {
            kommentar.push("<strong>Fødselsdato</strong> må være 8 siffer (DDMMYYYY).");
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
        maaFyllesUt.push("mobilnummer");
		resultat = false;
	}
    // Feltet er fylt ut, sjekker ytterligere valideringer
    else {
        if (mobilnr.length != 8) {
            kommentar.push("<strong>Mobilnummer</strong> må være 8 siffer.");
            resultat = false;
        }
        if (isNaN(mobilnr)) {
            kommentar.push("<strong>Fødselsdato</strong> må være 8 siffer.");
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

        // Sjekker om feltet er tomt
    if (rader == "" || rader == null) {
        maaFyllesUt.push("rader");
        resultat = false;
    }
        // Sjekker om feltet er tomt
    if (bredde == "" || bredde == null) {
        maaFyllesUt.push("bredde");
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

    var modellid = document.getElementById("modell_id"); /*lesteboks*/
    var tailnr = document.forms["oppdater"]["tailnr"].value;/*vanlig*/
    /* Ulike valideringer */
    
    // Sjekker om feltet er tomt
    if (modellid.value == "") {
        maaFyllesUt.push("modell");
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

// Eksempel på valider-funksjon
function validerEksempel() {
    /* Klarerer variabler */
	var maaFyllesUt = [];
	var kommentar = [];
    var resultat = true;

    /* Ulike valideringer */
    
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

    /* Valideringer slutt */
    
    // Skriver ut feilmeldingsboks
    if (!resultat) {
        feilmeldingBoks(maaFyllesUt, kommentar);
    }
    
    // Returnerer om neste side skal lastes inn
    return resultat;
}

// Eksempel på valider-funksjon slutt

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
    var slett = "";
}