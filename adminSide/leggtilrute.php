<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Legg til rute</h2>
        <form action="alleruter.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="fraLand">Fra land</lable>
                    <input class="form-control" type="text" placeholder="Norge" name="fraLand" id="fraLand" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="fraflyplass">Fra flyplass</lable>
                    <input class="form-control" type="text" placeholder="Oslo Lufthavn" name="fraFlyplass" id="fraFlyplass" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="timer">Timer</lable>
                    <input class="form-control" type="text" placeholder="2" name="timer" id="timer" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="minutter">Minutter</lable>
                    <input class="form-control" type="text" placeholder="30" name="minutter" id="minutter" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="tilLand">Til land</lable>
                    <input class="form-control" type="text" placeholder="Norge" name="tilLand" id="tilLand" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="tilflyplass">Til flyplass</lable>
                    <input class="form-control" type="text" placeholder="Oslo Lufthavn" name="tilFlyplass" id="tilFlyplass" required>
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