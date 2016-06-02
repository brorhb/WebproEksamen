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
    else if (!IsNaN(iso)) {
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
    else if (!IsNaN(iso3)) {
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

function validerAlleflyplasser() {
    var navn = document.forms["oppdater"]["navn"].value, flyplasskode = document.forms["oppdater"]["flyplasskode"].value, latitude = document.forms["oppdater"]["latitude"].value,
    longtude = document.forms["oppdater"]["longtude"].value, land_id = document.forms["oppdater"]["land_id"].value, resultat = true, feilmeldinger = "";
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
    // flyplasskode
    else if (!flyplasskode) {
        feilmeldinger += "Flyplasskode må fylles ut";
        resultat = false;
    }
    else if (isNaN(flyplasskode) || flyplasskode == 0) {
        feilmeldinger += "Flyplasskode FEILMEDLING";
        resultat = false;
    }
    // latitude
    //else if (latitude == 0) {
        //feilmeldinger += "Latitude FEILMEDLING";
        //resultat = false;
   // }
    else if (!latitude {
        feilmeldinger += "Longtude FEILMEDLING";
        resultat = false;
    }
    else if (!IsNaN(latitude)) {
        feilmeldinger += "Latitude FEILMEDLING";
        resultat = false;
    }
    
    //Longtude
    else if (!longtude {
        feilmeldinger += "Longtude må ha en verdi";
        resultat = false;
    }
    else if (!IsNaN(longtude)) {
        feilmeldinger += "Longtude kan kun inneholde tall"
        resultat = false;
    }

    //tidssone_gmt
    
    //land
     else if (!land_id) {
        feilmeldinger += "Land må fylles ut";
        resultat = false;
    }
    else if (isNaN(land_id) || land_id == 0) {
        feilmeldinger += "Flyplasskode FEILMEDLING";
        resultat = false;

        
    // Alert
    swal({
       title: "Obs!",
       text: feilmeldinger,
       type: "warning"
    });
    return resultat;
}

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
/* Valider endre/legg til på alle brukere siden */

function validerPersonBruker() {
    var brukerID = document.forms["oppdater"]["brukerID"].value, personID = document.forms["oppdater"]["personID"].value, brukernavn = document.forms["oppdater"]["brukernavn"].value, ukryptertPassord = document.forms["oppdater"]["ukryptertpassord"].value, fornavn = document.forms["oppdater"]["fornavn"].value, etternavn = document.forms["oppdater"]["etternavn"].value, fodselsdato = document.forms["oppdater"]["fodselsdato"].value, land = document.forms["oppdater"]["land"].value, landID = document.forms["oppdater"]["landID"].value, epost = document.forms["oppdater"]["epost"].value, mobilnr = document.forms["oppdater"]["mobilnr"].value, resultat = true, feilmeldinger = "", teller = 0;
    
    // brukerID 
    if (!brukerID) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Bruker ID er ikke fylt ut";
        resultat = false;
        teller++;
    }
    if (isNaN(brukerID)) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Bruker ID er ikke et nummer";
        resultat = false;
        teller++;
    }
    // brukerID 
    
    // personID 
    if (!personID) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Person ID er ikke fylt ut";
        resultat = false;
        teller++;
    }
    if (isNaN(personID)) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Person ID er ikke et nummer";
        resultat = false;
        teller++;
    }
    // personID 
    
    // brukernavn 
    if (!brukernavn) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Brukernavn er ikke fylt ut";
        resultat = false;
        teller++;
    }
    // brukernavn 
    
    // ukryptertPassord 
    if (!ukryptertPassord) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Passord er ikke fylt ut";
        resultat = false;
        teller++;
    }
    // ukryptertPassord 
    
    // fornavn 
    if (!fornavn) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Fornavn er ikke fylt ut";
        resultat = false;
        teller++;
    }
    // fornavn 
    
    // etternavn
    if (!etternavn) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Etternavn er ikke fylt ut";
        resultat = false;
        teller++;
    }
    // etternavn 
    
    // fodselsdato 
    if (!fodselsdato) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Fødselsdato er ikke fylt ut";
        resultat = false;
        teller++;
    }
    if (isNaN(fodselsdato)) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Fødselsdato er ikke en dato";
        resultat = false;
        teller++;
    }
    if (!fodselsdato == 8) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Fødselsdato er ikke en gyldig dato (DDMMYYY)";
        resultat = false;
        teller++;
    }
    // fodselsdato 
    
    // land 
    if (!land) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Land er ikke fylt ut";
        resultat = false;
        teller++;
    }
    // land 
    
    // landID 
    if (!landID) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Land ID er ikke fylt ut";
        resultat = false;
        teller++;
    }
    if (isNaN(landID)) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Land ID er ikke et nummer";
        resultat = false;
        teller++;
    }
    // landID 
    
    // epost 
    if (!epost) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "E-post er ikke fylt ut";
        resultat = false;
        teller++;
    }
    // epost 
    
    // mobilnr 
    if (!mobilnr) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Mobilnr er ikke fylt ut";
        resultat = false;
        teller++;
    }
    
    if (isNaN(mobilnr)) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Mobilnr er ikke ett nummer";
        resultat = false;
        teller++;
    }
    
    if (mobilnr.length < 8) {
        if (teller > 0) {
            feilmeldinger += "og";
            teller++;
        }
        feilmeldinger += "Mobilnr er ikke gyldig";
        resultat = false;
        teller++;
    }
    // mobilnr
    
    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });
    
    return resultat;
}

/* Valider endre/legg til på alle brukere siden */

// valider modeller
function validerOppdaterModeller() {
    var navn = document.forms["oppdater"]["navn"].value, type = document.forms["oppdater"]["type"].value, kapasitet = document.forms["oppdater"]["kapasitet"].value, rader = document.forms["oppdater"]["rader"].value, bredde = document.forms["oppdater"]["bredde"].value, resultat = true, feilmeldinger = "";
    var teller = 0;
    
    // navn
    if (!navn) {
        feilmeldinger = "Navn er ikke fylt ut ";
        teller++;

        resultat = false;
    }
    
    // Type
    if (!type){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "Type er ikke valgt ";
        teller++;
        resultat = false;
    }
    
    // kapasitet
    if (!kapasitet){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "kapasitet mangler ";
        teller++;
        resultat = false;
    }
    if (!isNaN(kapasitet)){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "kapasitet må være ett tall ";
        teller++;
        resultat = false;
    }
    
    // rader
    if (!rader){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "rader mangler ";
        teller++;
        resultat = false;
    }
    if (!isNaN(rader)){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "rader må være ett tall ";
        teller++;
        resultat = false;
    }
    
    // bredde
    if (!bredde){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "bredde mangler ";
        teller++;
        resultat = false;
    }
    if (!isNaN(bredde)){
        if (teller > 0) {
            feilmeldinger += "og ";
        }
        feilmeldinger += "bredde må være ett tall ";
        teller++;
        resultat = false;
    }
    
    // swal
       swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });
    
    return resultat;
}

// valider modeller