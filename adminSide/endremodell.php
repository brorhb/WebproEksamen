<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Endre modell</h2>
        <form action="allemodeller.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Navn">Navn</lable>
                    <input class="form-control" type="text" placeholder="Boeing 737" name="navn" id="navn" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="type">Type</lable>
                    <input class="form-control" type="text" placeholder="Rutefly" name="type" id="type" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="kapasitet">kapasitet</lable>
                    <input class="form-control" type="text" placeholder="256" name="kapasitet" id="kapasitet" required>
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