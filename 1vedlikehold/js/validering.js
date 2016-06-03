/* Legg til/endre klasse */

function validerOppdaterKlasse() {
    var klassenavn = document.forms["oppdater"]["klassenavn"].value, beskrivelse = document.forms["oppdater"]["beskrivelse"].value, resultat = true, feilmeldinger = "";
    var teller = 0;
    if (!klassenavn) {
        feilmeldinger = "Klassenavn ";
        teller++;

        resultat = false;
    }
    if (!beskrivelse) {
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "beskrivelse ";
        teller++;
        resultat = false;
    }
    feilmeldinger += "må fylles ut.";
       swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });
    return resultat;
}
/* Legg til/endre klasse */


/* Legg til/endre type (type_luftfartoy)*/
function validerTypeLuftfartoy() {
    var type = document.forms["oppdater"]["type"].value, resultat = true, feilmeldinger = "";

    if (!type) {
        feilmeldinger += "Type er ikke fylt ut";
        resultat = false;
    }
    
    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });

    return resultat;
}
/* Legg til/endre type (type_luftfartoy)*/

/* Legg til/endre land  */
function validerLand() {
    var navn = document.forms["oppdater"]["navn"].value, landskode = document.forms["oppdater"]["landskode"].value, valuta_id = document.forms["oppdater"]["valuta_id"].value,
    iso = document.forms["oppdater"]["iso"].value, iso3 = document.forms["oppdater"]["iso3"].value, resultat = true, feilmeldinger = "";
    var teller = 0;
    // navn
    if (!navn) {
        feilmeldinger += "Navnet er for kort (under 4 bokstaver), eller ikke fylt ut";
        resultat = false;
    } 
    else if (navn.length < 4) {
        feilmeldinger += "Navnet kan ikke være under 4 tegn langt";
        resultat = false;    
    }
    else if (!isNaN(navn)) {
        feilmeldinger += "Navnet kan ikke inneholde tall";
        resultat = false;
    }
    // landskode
    else if (!landskode) {
        feilmeldinger += "landskode må fylles ut";
        resultat = false;
    }
    else if (isNaN(landskode) || landskode == 0) {
        feilmeldinger += "Landskode må være ett tall";
        resultat = false;
    }
    // valuta_id
    else if (valuta_id == 0) {
        feilmeldinger += "Valuta må velges";
        resultat = false;
    }
    // iso
    else if (!iso) {
        feilmeldinger += "Iso må fylles ut";
        resultat = false;
    }
    else if (!isNaN(iso)) {
        feilmeldinger += "iso kan kun være bokstaver";
        resultat = false;
    }
    else if (iso.length !== 2) {
        feilmeldinger += "iso må være på 2 tegn";
        resultat = false;
    }
    //iso3
    else if (!iso3) {
        feilmeldinger += "iso3 må ha en verdi";
        resultat = false;
    }
    else if (!isNaN(iso3)) {
        feilmeldinger += "iso3 kan kun være bokstaver"
        resultat = false;
    }
    else if (iso3.length != 3){
        feilmeldinger += "iso3 må være på 3 tegn";
        resultat = false;
    }
    
    // Alert
    swal({
       title: "Obs!",
       text: feilmeldinger,
       type: "warning"
    });
    return resultat;
}
/* Legg til/endre land  */

/*Legg til passasjertype*/
function validerOppdaterPassasjertype() {
    var passasjertype = document.forms["oppdater"]["Passasjertype"].value, beskrivelse = document.forms["oppdater"]["beskrivelse"].value, resultat = true, feilmeldinger = "";
    var teller = 0;
    if (!passasjertype) {
        feilmeldinger = "Passasjertype ";
        teller++;

        resultat = false;
    }
    if (!beskrivelse){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "beskrivelse må fylles ut";
        teller++;
        resultat = false;
    }
       swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });
    return resultat;
}

/* Legg til/endre klasse */
function validerOppdaterKlasse() {
    var klassenavn = document.forms["oppdater"]["klassenavn"].value, beskrivelse = document.forms["oppdater"]["beskrivelse"].value, resultat = true, feilmeldinger = "";
    var teller = 0;
    if (!klassenavn) {
        feilmeldinger = "Klassenavn ";
        teller++;

        resultat = false;
    }
    if (!beskrivelse){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "beskrivelse ";
        teller++;
        resultat = false;
    }
    feilmeldinger += "må fylles ut.";
       swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });
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
    var valuta_navn = document.forms["oppdater"]["valuta_navn"].value, forkortelse = document.forms["oppdater"]["forkortelse"].value, resultat = true, feilmeldinger = "";
    var teller = 0;
    if (!valuta_navn) {
        feilmeldinger = "Valuta ";
        teller++;

        resultat = false;
    }
    if (!forkortelse) {
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "beskrivelse ";
        teller++;
        resultat = false;
    }
    feilmeldinger += "må fylles ut.";
       swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });
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
	if (brukernavn == "") {
		maaFyllesUt.push("brukernavn");
		resultat = false;
	}

    // Sjekker om feltet er tomt
	if (passord == "") {
        maaFyllesUt.push("passord");
		resultat = false;
	}

    // Sjekker om feltet er tomt
	if (fornavn == "") {
        maaFyllesUt.push("fornavn");
		resultat = false;
	}

    // Sjekker om feltet er tomt
	if (etternavn == "") {
        maaFyllesUt.push("etternavn");
		resultat = false;
	}

    // Sjekker om feltet er tomt
	if (fodselsdato == "") {
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
	if (landID.value == "") {
        maaFyllesUt.push("land");
		resultat = false;
	}
    
    // Sjekker om feltet er tomt
	if (epost == "") {
        maaFyllesUt.push("epost");
		resultat = false;
	}
    
    // Sjekker om feltet er tomt
	if (mobilnr == "") {
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

function validerOppdaterModeller() {
    var navn = document.forms["oppdater"]["navn"].value;
    var kapasitet = document.forms["oppdater"]["kapasitet"].value;
    var rader = document.forms["oppdater"]["rader"].value;
    var rader = document.forms["oppdater"]["bredde"].value;
    var resultat = true;
    if (navn == null || navn == "") {
        swal({
            title: "Obs!",
            text: "Navn må fylles ut",
            type: "warning"
        });
        resultat = false;
    }
    else if (kapasitet == null || kapasitet == "") {
        swal({
            title: "Obs!",
            text: "Kapasitet må legges til",
            type: "warning"
        });
        resultat = false;
    }
    else if (isNaN(kapasitet)) {
        swal({
            title: "Obs!",
            text: "Kapasitet må være ett tall",
            type: "warning"
        });
        resultat = false;
    }
    else if (rader == null || rader == "") {
        swal({
            title: "Obs!",
            text: "Rader må legges til",
            type: "warning"
        });
        resultat = false;
    }
    else if (isNaN(rader)) {
        swal({
            title: "Obs!",
            text: "Rader må være ett tall",
            type: "warning"
        });
        resultat = false;
    }
    else if (bredde == null || bredde == "") {
        swal({
            title: "Obs!",
            text: "Bredde må legges til",
            type: "warning"
        });
        resultat = false;
    }
    else if (isNaN(bredde)) {
        swal({
            title: "Obs!",
            text: "Bredde må være ett tall",
            type: "warning"
        });
        resultat = false;
    }
    return resultat;
}

// valider modeller

/* legg til/endre luftfartoy/fly */

function validerLuftfartoy() {
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
        else if (maaFyllesUt.length != 0) {
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