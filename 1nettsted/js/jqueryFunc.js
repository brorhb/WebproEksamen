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
            $('#fraDato, #tilDato').hide();
        } else {
            $('#fraDato, #tilDato').fadeIn('fast');
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
        });
    }
    
    //legg til/fjern personregistrering
    var max_fields = 10;
    var wrapper = $('.formWrapper');
    var leggTil = $('.legg_til_reisende');
    var x = 0; //start antall reisende
    
    $(leggTil).click(function (e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append(
                "<div class='reisende'><div class='col-md-12'><h3>Reisende</h3><a href='#' class='remove_field'>Fjern</a></div> <div class='col-md-6'>                    <label for='fornavn'>Fornavn</label>                    <input type='text' class='form-control' name='fornavn' id='fornavn' placeholder='Fornavn' required />                </div>                <div class='col-md-6'>                    <label for='etternavn'>Etternavn</label>                    <input type='text' class='form-control' name='etternavn' id='etternavn' placeholder='Etternavn' required />                </div>                <div class='col-md-6'>                    <label for='epost'>Epost</label>                    <input type='email' class='form-control' name='email' id='email' placeholder='eksempel@bjarvin.no' required />                </div>                <div class='col-md-6'>                    <label for='kjonn'>Kjønn</label>                    <select class='form-control' name='kjonn' id='kjonn'>                        <option disabled selected value=''>Kjønn</option>                        <option value='1'>Mann</option>                       <option value='2'>Kvinne</option>                    </select>                </div>                <div class='col-md-6'>                    <label for='mobilnummer'>Mobilnummer</label>                    <input type='text' class='form-control' name='mobilnummer' id='mobilnummer' placeholder='99999999' required />                </div>                 <div class='col-md-6'>                    <label for='dob'>Fødselsdato</label>                    <input type='text' class='form-control' name='dob' id='dob' placeholder='dd.mm.yyyy' required />                </div></div>"
            );
            $('.totaltReisende').html(x);
        }
    });
    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault(); $(this).closest('.reisende').remove();
        x--;
    });
    
}); //Slutt på Jquery

