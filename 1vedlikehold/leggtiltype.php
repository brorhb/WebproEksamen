<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Nytt Fly</h2>
        <form action="allefly.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="type">Flytype</lable>
                    <input class="form-control" type="text" placeholder="Helikopter" name="type" id="modell" required>
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