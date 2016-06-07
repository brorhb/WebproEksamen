
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
    var fraLand = document.forms["oppdater"]["fraLand"].value;
    var tilLand = document.forms["oppdater"]["tilLand"].value;
    var fraDato = document.forms["oppdater"]["fraDato"].value;
    var tilDato = document.forms["oppdater"]["tilDato"].value;
    var antallVoksene = document.forms["oppdater"]["antallVoksene"].value;
    var antallUnge = document.getElementById("antallUnge");
    var reisevalg = document.forms["oppdater"]["reisevalg"].value;
    var antallReisene = document.forms["oppdater"]["reisevalg"].value;
}
/* Reisende validering slutt */




/*Registerer Reisende*/
