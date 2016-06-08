
/* Bestilling validering  */
function validerBestilling() {
    

    var maaFyllesUt = [];
    var kommentar = [];
    var resultat = true;

    //var turRetur = document.forms["bestillReiseSkjema"]["turRetur"].value, enVei = document.forms["bestillReiseSkjema"]["enVei"].value,  fraLand = document.forms["bestillReiseSkjema"]["fraLand"].value, tilLand = document.forms["bestillReiseSkjema"]["tilLand"].value, fraDato = document.forms["bestillReiseSkjema"]["dpd1"].value, tilDato = document.forms["bestillReiseSkjema"]["dpd2"].value, resultat = true, feilmeldinger = "";
    var fraFlyplass = document.getElementById("fraFlyplass_id").value; //listeboks
    var tilFlyplass = document.getElementById("tilFlyplass_id").value; //listeboks
    var passasjertype = document.getElementById("passasjertype");
    var fraDato = document.getElementById("fraDato").value; //datepicker
    var tilDato = document.getElementById("tilDato") //datepicker




    if (fraFlyplass == "" || fraFlyplass == null) {
        maaFyllesUt.push("flyplass 1");
        resultat = false;
    }
    if (tilFlyplass == "" || tilFlyplass == null) {
        maaFyllesUt.push("flyplass 2");
        resultat = false;
    }

    //flyplassene kan ikke være like
    if (fraFlyplass == tilFlyplass && (fraFlyplass != "" && fraFlyplass != null) && (tilFlyplass != "" && tilFlyplass != null)) {
        kommentar.push("<strong>Flyplassene</strong> kan ikke være like");
            resultat = false;
    }

    //Sjekker om feltet er tomt 
     if (passasjertype == "") {
        maaFyllesUt.push(passasjertype);
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
   if (!resultat) {
                feilmeldingBoks(maaFyllesUt, kommentar);
            }
            return resultat;


/* Bestilling validering slutt */


/* Reisende validering */
function validerRegistrerReisende() {
    var antallet = document.querySelectorAll('.reisende').length;
    for (x=1, x <= antallet, x++ ) {
        var maaFyllesUt = [];
        var kommentar = [];
        var resultat = true;

        var fornavn = document.forms["oppdater"]["fornavn["x"]"].value; 
        var etternavn = document.forms["oppdater"]["etternavn["x"]"].value;
        var epost = document.forms["oppdater"]["epost["x"]"].value;
        var kjonn = document.getElementById("kjonn["x"]"); //listeboks
        var mobilnummer = document.forms["oppdater"]["mobilnummer["x"]"].value;
        var fodselsdato = document.forms["oppdater"]["fodselsdato["x"]"].value;


        //Sjekker om feltet er tomt,listeboks
        if (fornavn[x].value == ""){
            maaFyllesUt.push("fornavn");
            resultat = false;
        }
        //Sjekker om feltet er tomt, listeboks
        if (etternavn[x].value == ""){
            maaFyllesUt.push("etternavn");
            resultat = false;
        }
         //Sjekker om feltet er tomt,listeboks
        if (epost[x] == "" || epost[x] == null) {
            maaFyllesUt.push("epost");
            resultat = false;
        }
        //Sjekker om feltet er tomt,listeboks 
         if (kjonn[x].value == "" || kjonn[x].value == null) {
            maaFyllesUt.push("kjønn");
            resultat = false;
        }
            //Sjekker om feltet er tomt,listeboks
        if (mobilnummer[x] == "" || mobilnummer[x] == null) {
            maaFyllesUt.push("mobilnummer");
            resultat = false;
        }
        // Feltet er fylt ut, sjekker ytterligere valideringer 
        else {
            if (isNaN(mobilnummer[x])) {
                kommentar.push("<strong>mobilnummer</strong> må være minst 8 siffer.");
                resultat = false;
            }
            if (mobilnummer[x].length > 8) {
                kommentar.push("<strong>mobilnummer</strong> må være minst 8 siffer.");
                resultat = false;
            }

        //Sjekker om feltet er tomt,listeboks
        if (fodselsdato[x] == "" || fodselsdato[x] == null) {
            maaFyllesUt.push("fødselsdato");
            resultat = false;
        }
        // Feltet er fylt ut, sjekker ytterligere valideringer 
        else {
            if (isNaN(fodselsdato[x])) {
                kommentar.push("<strong>fødselsdato</strong> må være minst 10 tegn (DD.MM.YYYY).");
                resultat = false;
            }
            if (fodselsdato[x].length > 10) {
                kommentar.push("<strong>fødselsdato</strong> må være minst 10 tegn (DD.MM.YYYY).");
                resultat = false;
            }
        }
    /* Valideringer slutt */

        // Skriver ut feilmeldingsboks
        
        
            if (!resultat) {
                feilmeldingBoks(maaFyllesUt, kommentar);
            }
            return resultat;

        // Returnerer om neste side skal lastes inn
        
        function validerReferansesok() {
    
            var maaFyllesUt = [];
            var kommentar = [];
            var resultat = true;

            
            var sokefelt = document.forms["oppdater"]["sokefelt"].value; 
          
            if (sokeflet.value == ""){
            maaFyllesUt.push("sokefelt");
            resultat = false;
        }
            if (!resultat) {
                        feilmeldingBoks(maaFyllesUt, kommentar);
                    }
                    return resultat;
    }
}














/*Registerer Reisende*/
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