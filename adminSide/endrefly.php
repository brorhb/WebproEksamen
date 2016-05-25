<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Endre Fly</h2>
        <form action="allefly.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="modell">Modell</lable>
                    <input class="form-control" type="text" placeholder="Fly modell" name="modell" id="modell" required>
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