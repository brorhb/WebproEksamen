<?php
    include_once ("head.php");
    connectDB();
?>



<!-- Innhold -->
<form action="alleklasser.php">
<div class="col-md-12">
    <h2>Endre Klasse</h2>
        <form action="allebestillinger.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Klassenavn">Klassenavn</lable>
                    <input type="text" class="form-control" name="klassenavn" id="klassenavn">
                </div>
            </div>
        <div class="col-md-12">
            <input type="submit" class="btn btn-info" value="Endre">
        </div>
    </form>
</div>
</form>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>