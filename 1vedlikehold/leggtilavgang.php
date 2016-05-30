<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Legg til avgang</h2>
        <form action="alleavganger.php">
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="Tidspunkt">Tidspunkt</lable>
                    <select class="form-control" name="tidspunkt" id="tidspunkt">
                        <option value="1">00:00</option>
                        <option value="0030">00:30</option>
                        <option value="0100">01:00</option>
                        <option value="0130">01:30</option>
                        <option value="0200">02:00</option>
                        <option value="0230">02:30</option>
                        <option value="0300">03:00</option>
                        <option value="0330">03:30</option>
                        <option value="0400">04:00</option>
                        <option value="0430">04:30</option>
                        <option value="0500">05:00</option>
                        <option value="0530">05:30</option>
                        <option value="0600">06:00</option>
                        <option value="0630">06:30</option>
                        <option value="0700">07:00</option>
                        <option value="0730">07:30</option>
                        <option value="0800">08:00</option>
                        <option value="0830">08:30</option>
                        <option value="0900">09:00</option>
                        <option value="0930">09:30</option>
                        <option value="1000">10:00</option>
                        <option value="1030">10:30</option>
                        <option value="1100">11:00</option>
                        <option value="1130">11:30</option>
                        <option value="1200">12:00</option>
                        <option value="1230">12:30</option>
                        <option value="1300">13:00</option>
                        <option value="1330">13:30</option>
                        <option value="1400">14:00</option>
                        <option value="1430">14:30</option>
                        <option value="1500">15:00</option>
                        <option value="1530">15:30</option>
                        <option value="1600">16:00</option>
                        <option value="1630">16:30</option>
                        <option value="1700">17:00</option>
                        <option value="1730">17:30</option>
                        <option value="1800">18:00</option>
                        <option value="1830">18:30</option>
                        <option value="1900">19:00</option>
                        <option value="1930">19:30</option>
                        <option value="2000">20:00</option>
                        <option value="2030">20:30</option>
                        <option value="2100">21:00</option>
                        <option value="2130">21:30</option>
                        <option value="2200">22:00</option>
                        <option value="2230">22:30</option>
                        <option value="2300">23:00</option>
                        <option value="2330">23:30</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="dato">Dato</lable>
                    <input class="form-control" type="text" class="span2" value="" id="dpd1" name="fradato" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="rutenummer">Rutenummer</lable>
                    <select class="form-control" name="rutenummer" id="rutenummer">
                        
                    </select>
                </div>
            </div>
        <div class="col-md-12">
            <input type="submit" class="btn btn-info" value="Endre">
        </div>
    </form>
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>