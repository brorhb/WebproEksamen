<?php 
    include_once("head.php");
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');

    if (@$_POST=["endre"]) {
    if(oppdaterType_luftfartoy($TypeID, $type))
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
        <h2>Nytt Fly</h2>
        <form action="alletyper.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="type">Flytype</lable>
                    <input class="form-control" type="text" placeholder="Helikopter" name="type" id="type" required/>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-info" value="endre">
            </div>
        </form>
    </div>
    <!-- Innhold -->

<?php include_once ("end.php"); ?>