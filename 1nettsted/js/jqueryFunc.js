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
    $('#tilFlyplass_id').change(function () {
        toggleFields();
    });
    
    function toggleFields() {
        if ($('#tilFlyplass_id option:selected').val() == 0) {
            $('#fraDato, #tilDato, #reisende').hide();
        } else {
            $('#fraDato, #tilDato, #reisende').fadeIn('fast');
            $("input[name='reisevalg']:radio")
                .change(function () {
                    $('#tilDato').toggle($(this).val() == "1");
                });
        }
    }
    
    //Hide endre reise
    toggleEndreReise();
    $('#reiseEndring').hide();
    function toggleEndreReise() {
        $("#endreReise").click(function () {
            $("#reiseEndring").toggle();
            $("#endreReise").hide();
            $(".knapp").append("<input type='submit' class='btn btn-default pull-right' value='Lagre'/>");
        });
    }
    
}); //Slutt på Jquery

