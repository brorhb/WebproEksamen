/* Legg til/endre klasse */

function validerOppdaterKlasse() {
    var klassenavn = document.forms["oppdater"]["klassenavn"].value, beskrivelse = document.forms["oppdater"]["beskrivelse"].value, feilmeldinger = "", resultat = true;
    if (!klassenavn) {
        feilmeldinger = "Klassenavn må fylles ut";
        resultat = false;
    }
    else if (!beskrivelse) {
        feilmeldinger = feilmelding + "Beskrivelse må fylles ut";
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