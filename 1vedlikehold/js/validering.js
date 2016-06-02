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
    else if (iso.length != 2){
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


<<<<<<< Updated upstream
//function 
=======
>>>>>>> Stashed changes

/*Legg til passasjertype*/
function validerOppdaterPassasjertype() {
    var Passasjertype = document.forms["oppdater"]["Passasjertype"].value, beskrivelse = document.forms["oppdater"]["beskrivelse"].value, resultat = true, feilmeldinger = "";
    var teller = 0;
    if (!Passasjertype) {
        feilmeldinger = "Passasjertype ";
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
/*Legg til passasjertype*/






















