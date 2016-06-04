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

    // pris alle avgange
    $(leggTil).click(function (e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append(
                '$sql2 = "SELECT (SELECT p.passasjertype_id FROM pris p WHERE p.flyvning_id = f.id) AS passasjertype, p.fra_dato AS fraDato, p.til_dato AS tilDato FROM pris p LEFT JOIN flyvning f ON p.flyvning_id = f.id LIMIT 1;"; $result2 = connectDB()->query($sql2); if ($result2->num_rows> 0 ) { while ($row2 = $result2->fetch_assoc()) { $passasjertype2 = utf8_encode($row2["passasjertype"]); $fraDato2 = utf8_encode($row2["fraDato"]); $tilDato2 = utf8_encode($row2["tilDato"]); echo ' '<div class="form-group col-md-12"> <lable for="passasjertype">Passasjer Type</lable>'; 'echo passasjertypeListe($passasjertype2); echo ' '</div> <div class="form-group col-md-6"> <lable for="fraDato">Fra Dato</lable> <input class="form-control" type="text" placeholder="Fra Dato Nr" name="fraDato" id="dpd1" value="''.@$fraDato2.'" required> </div> <div class="'form-group col-md-6"> <lable for="tilDato">Til Dato</lable> <input class="form-control" type="text" placeholder="Til Dato Nr" name="tilDato" id="dpd2" value="''.@$tilDato2.'" required> </div> <div class="'form-group col-md-12"> <table class="table table-striped"> <thead> <tr> <th>Valgt</th> <th>Klasse</th> <th>Pris</th> <th>Valuta</th> </tr> </thead> <tbody>''; $sql3 = "SELECT k.id, k.type FROM klasse k;"; $result3 = connectDB()->query($sql3); if ($result3->num_rows> 0 ) { while ($row3 = $result3->fetch_assoc()) { $id3 = utf8_encode($row3["id"]); $type3 = utf8_encode($row3["type"]); echo ''<tr> <td> <input type="checkbox" name="id" value="''.$id3.'"> </td> <td>' . $type3 . '</td> <td> <input class="'form-control type="text" name="pris" value="testPris" placeholder="Pris"> </td> <td> <input class="form-control type="text" name="valuta" value="testValuta" placeholder="Valuta"> </td> </tr>''; } } echo ''</tbody> </table> </div>''; } }'
            );
            $('.totaltReisende').html(x);
        }
    });
    //pris alle avganger


});
