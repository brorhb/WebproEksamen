$(document).ready(function(){
    
    $("button").click(function(){
       $("h1").hide(); 
    });
    
    // Kalender
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    
    var checkin = $('#dpd1').datepicker({
    onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
    }
    checkin.hide();
    $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
    onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    checkout.hide();
    }).data('datepicker');
    
    // Hide fra/til Dato
    toggleFields();
    $('#tilLand').change(function(){
       toggleFields(); 
    });
    function toggleFields() {
        if ($('#tilLand option:selected').val() == 0) {
            $('#fraDato, #tilDato').hide();
        }
        else {
            $('#fraDato, #tilDato').show();
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