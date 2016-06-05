<?php
    include_once ("head.php");
?>

<!-- Reise info -->
<div class="col-md-12 reiseInfo">
    <div class="row">
        <div class="col-md-8">
            <?php
                $fraLand = $_GET["fraFlyplass_id"];
                $tilLand = $_GET["tilFlyplass_id"];
                $fradato = $_GET["fradato"];
                $tildato = $_GET["tildato"];
                $antallVoksene = $_GET["antallVoksene"];
                $antallUnge = $_GET["antallUnge"];
                $reisevalg = $_GET["reisevalg"];

                connectDB();
                $sqlFraLand = "SELECT navn AS navnFra FROM flyplass WHERE id='$fraLand';";
                $sqlTilLand = "SELECT navn AS navnTil FROM flyplass WHERE id='$tilLand';";
                $result = connectDB()->query($sqlFraLand);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sqlFraLandResult = utf8_encode($row["navnFra"]);
                        $sqlTilLandResult = utf8_encode($row["navnTil"]);

                        echo '<h2>' . $sqlFraLandResult . ' til ' . $sqlTilLandResult . '</h2>';
                    }
                }

            ?>
        </div>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="bestillReiseSkjema" name="bestillReiseSkjema" onsubmit="return validerBestilling()">
    <div class="row" id="reiseEndring">
        <div class="col-md-6">

        <!-- Fra/til land -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Fra"><h4>Fra</h4></label>
                            <?php fraFlyplassListe(); ?>
                        </div>
                    </div>

                    <div class="col-md-6" id="retur">
                        <div class="form-group">
                            <label for="Til"><h4>Til</h4></label>
                            <?php tilFlyplassListe(); ?>
                        </div>
                    </div>
                </div><!-- /row -->
        <!-- Fra/til land -->


        <!-- antall voksene -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <h4>Antall Voksene</h4>
                    <select class="form-control" name="antallVoksene" id="antallVoksene">
                        <option selected value='<?php echo $antallVoksene; ?>'><?php echo $antallVoksene . ' Voksene'; ?></option>
                        <option value="0">0 Voksene</option>
                        <option value="1">1 Voksen</option>
                        <option value="2">2 Voksene</option>
                        <option value="3">3 Voksene</option>
                        <option value="4">4 Voksene</option>
                        <option value="5">5 Voksene</option>
                        <option value="6">6 Voksene</option>
                        <option value="7">7 Voksene</option>
                        <option value="8">8 Voksene</option>
                        <option value="9">9 Voksene</option>
                    </select>
                </div>
            </div>
        <!-- antall voksene -->

        <!-- antall unge -->
        <div class="col-md-3">
            <div class="form-group">
                <h4>Antall Unge</h4>
                <select class="form-control" name="antallUnge" id="antallUnge">
                    <option selected value='<?php echo $antallUnge; ?>'><?php echo $antallUnge . ' Unge'; ?></option>
                    <option value="0">0 Unge(0-25)</option>
                    <option value="1">1 Unge</option>
                    <option value="2">2 Unge</option>
                    <option value="3">3 Unge</option>
                    <option value="4">4 Unge</option>
                    <option value="5">5 Unge</option>
                    <option value="6">6 Unge</option>
                    <option value="7">7 Unge</option>
                    <option value="8">8 Unge</option>
                    <option value="9">9 Unge</option>
                </select>
            </div>
        </div>
        <!-- antall unge -->

        <!-- Radio knapper -->
                    <div class="col-md-6" style="margin-top:30px;">
                        <div class="radio" name="reiseType" id="reiseType">
                            <div class="col-md-6">
                                <label><input type="radio" name="reisevalg" id="turRetur" value="1" >Tur/Retur</label>
                            </div>
                            <div class="col-md-6">
                                <label><input type="radio" name="reisevalg" id="enVei" value="2">En vei</label>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- Radio knapper -->

        <div class="row">
        <!-- Dato -->
                <div class="col-md-6" id="fraDato">
                    <div class="form-group" id="fraDato">
                        <label for="Fra"><h4>Fra dato </h4></label>
                        <input class="form-control" type="text" class="span2" value="<?php echo $fradato; ?>" id="dpd1" name="fradato" required>
                    </div>
                </div>
                <div class="col-md-6" id="tilDato">
                    <div class="form-group" id="tilDato">
                        <label for="Til"><h4>Til dato </h4></label>
                        <input class="form-control" type="text" class="span2" value="<?php echo $tildato; ?>" id="dpd2" name="tildato" required>
                    </div>
                </div>

        <!-- Dato -->
        </div>

        </div>
    </div>
    <input type="button" id="endreReise" class="btn btn-default pull-right" value="Endre reisen"/>
    </form>
</div>
<!-- Reise info -->

<!-- innhold -->
<div class="container">
    <!-- Avgang -->
    <form action="registrerReisende.php">
        <div class="col-md-10 col-md-offset-1">
            <h2><span class="glyphicon glyphicon-plane"></span> Avganger</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th><h4>Flight</h4></th>
                        <th><h4>Fra</h4></th>
                        <th><h4>Avgang</h4></th>
                        <th><h4>Til</h4></th>
                        <th><h4>Landing</h4></th>
                        <th><h4>Valgt</h4></th>
                    </tr>
                </thead>
            </table>
            <h3 class="pull-right">Pris</h3>
        </div>
        <!-- Avgang -->

        <!-- Retur -->
        <div class="col-md-10 col-md-offset-1">
            <h2><span class="glyphicon glyphicon-plane"></span> Retur</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th><h4>Flight</h4></th>
                        <th><h4>Fra</h4></th>
                        <th><h4>Avgang</h4></th>
                        <th><h4>Til</h4></th>
                        <th><h4>Landing</h4></th>
                        <th><h4>Valgt</h4></th>
                    </tr>
                </thead>
            </table>
            <h3 class="pull-right">Pris</h3>
        </div>
        <!-- Retur -->
        <div class="col-md-10 col-md-offset-1">
            <input type="submit" class="btn btn-default pull-right" value="Bekreft"/>
        </div>
    </form>
    </div>
<!-- innhold -->

<?php
    include_once ("end.php");
?>
