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