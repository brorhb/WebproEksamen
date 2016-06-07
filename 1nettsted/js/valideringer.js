
/* Bestilling validering */
function validerBestilling() {
    var turRetur = document.forms["bestillReiseSkjema"]["turRetur"].value, enVei = document.forms["bestillReiseSkjema"]["enVei"].value,  fraLand = document.forms["bestillReiseSkjema"]["fraLand"].value, tilLand = document.forms["bestillReiseSkjema"]["tilLand"].value, fraDato = document.forms["bestillReiseSkjema"]["dpd1"].value, tilDato = document.forms["bestillReiseSkjema"]["dpd2"].value, resultat = true, feilmeldinger = "";
        
    if (!turRetur && !enVei) {
        feilmeldinger += "Reisetype er ikke valgt";
        resultat = false;
    } else if (document.getElementsByName('antallVoksene')[0].value == '0' && document.getElementsByName('antallUnge')[0].value == '0') {
        feilmeldinger += "Velg antall reisende";
        resultat = false;
    } else if (!fraLand) {
        feilmeldinger += "Velg utreise destinasjon";
        resultat = false;
    } else if (!tilLand) {
        feilmeldinger += "Velg reise destinasjon";
        resultat = false;
    } else if (!fraDato) {
        feilmeldinger += "Velg reise dato";
        resultat = false;
    }

    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });

    return resultat;
}
/* Bestilling validering slutt */


/* Reisende validering */
function validerReisende() {
    var fornavn = document.forms["registrerReisende"]["fornavn"].value, etternavn = document.forms["registrerReisende"]["etternavn"].value, email = document.forms["registrerReisendea"]["email"].value, mobilnummer = document.forms["registrerReisende"]["mobilnummer"].value, fodsel = document.forms["registrerReisende"]["dob"].value, resultat = true, feilmeldinger = "";

    if (!fornavn) {
        feilmeldinger += "Fyll ut (alle) fornavn";
        resultat = false;
    } else if (!etternavn) {
        feilmeldinger += "Fyll ut (alle) etternavn";
        resultat = false;
    } else if (document.getElementsByName('kjonn')[0].value == '0') {
        feilmeldinger += "Velg alle kjønn";
        resultat = false;
    } else if (!email) {
        feilmeldinger += "fyll ut (alle) E-mail";
        resultat = false;
    } else if (!mobilnummer) {
        feilmeldinger += "fyll ut (alle) mobilnummer";
        resultat = false;
    } else if (!fodsel) {
        feilmeldinger += "fyll ut (alle) fødselsdager";
        resultat = false;
    }
    
    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });

    return resultat;
}
/* Reisende validering slutt */

/*Velgfly validering start*/
/*function validerVelgFly() {
    var fornavn = document.forms["registrerReisende"]["fornavn"].value, etternavn = document.forms["registrerReisende"]["etternavn"].value, email = document.forms["registrerReisendea"]["email"].value, mobilnummer = document.forms["registrerReisende"]["mobilnummer"].value, fodsel = document.forms["registrerReisende"]["dob"].value, resultat = true, feilmeldinger = "";

    if (!fornavn) {
        feilmeldinger += "Fyll ut (alle) fornavn";
        resultat = false;
    } else if (!etternavn) {
        feilmeldinger += "Fyll ut (alle) etternavn";
        resultat = false;
    } else if (document.getElementsByName('kjonn')[0].value == '0') {
        feilmeldinger += "Velg alle kjønn";
        resultat = false;
    } else if (!email) {
        feilmeldinger += "fyll ut (alle) E-mail";
        resultat = false;
    } else if (!mobilnummer) {
        feilmeldinger += "fyll ut (alle) mobilnummer";
        resultat = false;
    } else if (!fodsel) {
        feilmeldinger += "fyll ut (alle) fødselsdager";
        resultat = false;
    }
    
    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });

    return resultat;
}
/*Velgfly validering slutt*/

function validerRegistrerReisende() {
    var fornavn = document.forms["registrerReisende"]["fornavn"].value, etternavn = document.forms["registrerReisende"]["etternavn"].value, email = document.forms["registrerReisendea"]["email"].value, mobilnummer = document.forms["registrerReisende"]["mobilnummer"].value, fodsel = document.forms["registrerReisende"]["dob"].value, resultat = true, feilmeldinger = "";

    if (!fornavn) {
        feilmeldinger += "Fyll ut (alle) fornavn";
        resultat = false;
    } else if (!etternavn) {
        feilmeldinger += "Fyll ut (alle) etternavn";
        resultat = false;
    } else if (document.getElementsByName('kjonn')[0].value == '0') {
        feilmeldinger += "Velg alle kjønn";
        resultat = false;
    } else if (!email) {
        feilmeldinger += "fyll ut (alle) E-mail";
        resultat = false;
    } else if (!mobilnummer) {
        feilmeldinger += "fyll ut (alle) mobilnummer";
        resultat = false;
    } else if (!fodsel) {
        feilmeldinger += "fyll ut (alle) fødselsdager";
        resultat = false;
    }
    
    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });

    return resultat;
}


/*Registerer Reisende*/
