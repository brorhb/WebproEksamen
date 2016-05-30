<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Legg til flyplass</h2>
        <form action="alleflyplasser.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Navn">Navn</lable>
                    <input class="form-control" type="text" placeholder="Oslo Lufthavn" name="navn" id="navn" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Latitude">Latitude</lable>
                    <input class="form-control" type="text" placeholder="Latitude" name="latitude" id="latitude" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Longitude">Longitude</lable>
                    <input class="form-control" type="text" placeholder="Longitude" name="longitude" id="longitude" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="land">Land</lable>
                    <input class="form-control" type="text" placeholder="Norge" name="land" id="land" required>
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