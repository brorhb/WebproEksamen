/* Legg til/endre klasse */
function ValiderOppdaterKlasse() {
    var type = document.forms["oppdater"]["type"].value, beskrivelse = document.forms["oppdater"]["beskrivelse"].value, feilmelding = "", resultat = true;
    if (type == null || type == "") {
        feilmelding = "Type må fylles ut<br/>";
        resultat = false;
    }
    else if (beskrivelse == null || beskrivelse == "") {
        feilmelding = feilmelding + "Beskrivelse må fylles ut<br/>";
        resultat = false;
    }
    document.getElementById('feilmelding').innerHTML = feilmelding;
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
    var navn = document.forms["oppdater"]["navn"].value, resultat = true, feilmeldinger = "";
    if (!navn) {
        feilmeldinger += "Navnet er for kort (under 4 bokstaver), eller ikke fylt ut";
        resultat = false;
    }
    swal({
       title: "Obs!",
       text: feilmeldinger,
       type: "warning"
    });
}
/* Legg til/endre land  */
