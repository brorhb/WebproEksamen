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

/*function validerOppdaterFlyplass() {
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
    }
    else if (latitude == null || latitude == "") {
        alert("Latitude må fylles ut");
        resultat = false;
    }
    }
    else if (longtude == null || longtude == "") {
        alert("Longtude må fylles ut");
        resultat = false;
    }
    }
    else if (tidssone_gmt == null || tidssone_gmt == "") {
        alert("Tidssone må fylles ut");
        resultat = false;
    }
    }
    else if (land_id == null || land_id == "") {
        alert("Land ID må fylles ut");
        resultat = false;
    }
    
    return resultat;
}
*/
/*legg til/ Alleflyplasser*/ 

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

function validerPersonBruker() {
    var brukerID = document.forms["oppdater"]["brukerID"].value;
    var personID = document.forms["oppdater"]["personID"].value;
    var brukernavn = document.forms["oppdater"]["brukernavn"].value;
    var ukryptertPassord = document.forms["oppdater"]["ukryptertPassord"].value;
    var fornavn = document.forms["oppdater"]["fornavn"].value;
    var etternavn = document.forms["oppdater"]["etternavn"].value;
    var fodselsdato = document.forms["oppdater"]["fodselsdato"].value;
    var land = document.forms["oppdater"]["land"].value;
    var landID = document.forms["oppdater"]["landID"].value;
    var epost = document.forms["oppdater"]["epost"].value;
    var mobilnr = document.forms["oppdater"]["mobilnr"].value;
    var resultat = true;
    
    //brukerID
    if (brukerID == null || brukerID == "") {
        swal({
            title: "Obs!",
            text: "brukerID finnes ikke",
            type: "warning"
        });
        resultat = false;
    }
    //brukerID slutt
    else if (personID == null || personID == "") {
        alert("personID finnes ikke");
        resultat = false;
    }
    
    return resultat;
}

function validerOppdaterModeller() {
    var navn = document.forms["oppdater"]["navn"].value;
    var kapasitet = document.forms["oppdater"]["kapasitet"].value;
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
        alert("kapasitet må fylles ut");
        resultat = false;
    }
    
    return resultat;
}

// valider modeller