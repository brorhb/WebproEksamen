<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Endre bestilling</h2>
        <form action="allebestillinger.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Fra">Fra flyplass</lable>
                    <select class="form-control" name="fraFlyplass" id="fraFlyplass">
                        
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Fra">Til flyplass</lable>
                    <select class="form-control" name="tilFlyplass" id="tilFlyplass">
                        
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="fornavn">Fornavn</lable>
                    <input class="form-control" type="text" name="fornavn" id="fornavn" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="fornavn">Etternavn</lable>
                    <input class="form-control" type="text" name="etternavn" id="etternavn" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="avgangnummer">Avgangnummer</lable>
                    <select class="form-control" name="avgangnr" id="avgangnr">
                        
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