$(document).ready(function () {
  // sidebar
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
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
    
  
   
});

/* Endre/ny klasse */
function validerEndreNyKlasse() {
    var turRetur = document.forms["klasse"]["klassenavn"].value, resultat = true, feilmeldinger = "";
        
    if (!klassenavn) {
        feilmeldinger += "Feltet er ikke fylt ut";
        resultat = false;
    } 

    swal({
        title: "Obs!",
        text: feilmeldinger,
        type: "warning"
    });

    return resultat;
}
/* Endre/ny klasse */