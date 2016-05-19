$(document).ready(function () {
    
    $("button").click(function () {
        $("h1").hide();
    });
    
    // Kalender
    var checkout, nowTemp = new Date(), now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0), checkin = $('#dpd1').datepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('#dpd2')[0].focus();
    }).data('datepicker');
    checkout = $('#dpd2').datepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');
    
    // Hide fra/til Dato
    toggleFields();
    $('#tilLand').change(function () {
        toggleFields();
    });
    function toggleFields() {
        if ($('#tilLand option:selected').val() == 0) {
            $('#fraDato, #tilDato').hide();
        } else {
            $('#fraDato, #tilDato').fadeIn('fast');
        }
    }
    
    /*
    swal({
        title: "Obs!",
        text: "Alle feltene må være utfylt!",
        type: "warning",
    });
    */
});
/* Bestilling validering */
function validerBestilling() {
    var turRetur = document.forms["bestillReiseSkjema"]["turRetur"].value, enVei = document.forms["bestillReiseSkjema"]["enVei"].value, antallVoksene = document.forms["bestillReiseSkjema"]["antallVoksene"].value, antallUnge = document.forms["bestillReiseSkjema"]["antallUnge"].value, fraLand = document.forms["bestillReiseSkjema"]["fraLand"].value, tilLand = document.forms["bestillReiseSkjema"]["tilLand"].value, fraDato = document.forms["bestillReiseSkjema"]["dpd1"].value, tilDato = document.forms["bestillReiseSkjema"]["dpd2"].value, resultat = true, feilmeldinger = "";
        
    if (!turRetur && !enVei) {
        feilmeldinger += "Reisetype er ikke valgt</br>";
        resultat = false;
    } else if (antallVoksene && antallUnge == 0) {
        feilmeldinger += "Velg antall reisende</br>";
        resultat = false;
    } else if (!fraLand) {
        feilmeldinger += "Velg utreise destinasjon</br>";
        resultat = false;
    } else if (!tilLand) {
        feilmeldinger += "Velg reise destinasjon</br>";
        resultat = false;
    } else if (!fraDato) {
        feilmeldinger += "Velg reise dato</br>";
        resultat = false;
    }

    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning",
    });

    return resultat;
}
/* Bestilling validering slutt */