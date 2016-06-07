
/* Bestilling validering  */
function validerBestilling() {
    

    var maaFyllesUt = [];
    var kommentar = [];
    var resultat = true;

    //var turRetur = document.forms["bestillReiseSkjema"]["turRetur"].value, enVei = document.forms["bestillReiseSkjema"]["enVei"].value,  fraLand = document.forms["bestillReiseSkjema"]["fraLand"].value, tilLand = document.forms["bestillReiseSkjema"]["tilLand"].value, fraDato = document.forms["bestillReiseSkjema"]["dpd1"].value, tilDato = document.forms["bestillReiseSkjema"]["dpd2"].value, resultat = true, feilmeldinger = "";
    var fraFlyplass = document.getElementById("fraFlyplass"); //listeboks
    var tilFlyplass =  document.getElementById("tilFlyplass"); //listeboks
    var antallVoksne = document.getElementById("antallVoksne");
    var antallUnge = document.getElementById("antallUnge");
    var fraDato = document.getElementById("fraDato"); //listeboks
    var tilDato = document.getElementById("tilDato"); //listeboks



    //Sjekker om feltet er tomt,listeboks
    if (fraFlyplass.value == ""){
        maaFyllesUt.push("fraFlyplass");
        resultat = false;
    }
    //Sjekker om feltet er tomt, listeboks
    if (tilFlyplass.value == ""){
        maaFyllesUt.push("tilFlyplass");
        resultat = false;
    }
     //Sjekker om feltet er tomt,listeboks
    if (antallVoksne == "") {
        maaFyllesUt.push(antallVoksne);
        resultat = false;
    }
    //Sjekker om feltet er tomt,listeboks 
     if (antallUnge == "") {
        maaFyllesUt.push(antallUnge);
        resultat = false;
    }
        //Sjekker om feltet er tomt,listeboks
    if (fraDato.value == ""){
        maaFyllesUt.push("fraDato");
        resultat = false;
    }

    //Sjekker om feltet er tomt,listeboks
    if(tilDato.value == ""){
        maaFyllesUt.push("tilDato");
        resultat = false;
    }
    return resultat;
    }

/* Bestilling validering slutt */


/* Reisende validering */
function validerReisende() {
    var fornavn = document.forms["bestillReiseSkjema"]["fornavn"].value, etternavn = document.forms["registrerReisende"]["etternavn"].value, email = document.forms["registrerReisendea"]["email"].value, mobilnummer = document.forms["registrerReisende"]["mobilnummer"].value, fodsel = document.forms["registrerReisende"]["dob"].value, resultat = true, feilmeldinger = "";
  
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