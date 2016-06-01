<?php
    include_once("head.php");
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');

    if (@$_POST=["endre"]) {
    if(oppdaterValuta($ValutaID, $valuta_navn, $forkortelse))
    {
        echo "Flytype er lagt til";
    }
    else {
        echo "Noe galt skjedde";
    }
    }
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Legg til valutta</h2>
        <form action="valutta.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="navn">Navn</lable>
                    <input class="form-control" type="text" placeholder="Norske Kroner" name="navn" id="navn" required>
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