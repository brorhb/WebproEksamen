<?php
    include_once ('head.php');
?>

<!-- Reise info -->
<div class="col-md-12 reiseInfo">
    <div class="row">
        <div class="col-md-8">
            <?php
                $fraLand = $_GET["fraLand"];
                $tilLand = $_GET["tilLand"];
                $fradato = $_GET["fradato"];
                $tildato = $_GET["tildato"];
                $antallVoksene = $_GET["antallVoksene"];
                $antallUnge = $_GET["antallUnge"];
                $reisevalg = $_GET["reisevalg"];
                echo '<h2>' . $fraLand . ' til ' . $tilLand . '</h2>';
            ?>
        </div>
    </div>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" onsubmit="return validerBestilling()">
    <div class="row" id="reiseEndring">
        <div class="col-md-6">
            
        <!-- Fra/til land -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Fra"><h4>Fra</h4></label>
                            <select class="form-control" name="fraLand" id="fraLand">
                                <option selected value="<?php echo $fraLand ?>"><?php echo $fraLand ?></option>
                                <option value="Norge">Norge</option>
                                <option value="Sverige">Sverige</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6" id="retur">
                        <div class="form-group">
                            <label for="Til"><h4>Til</h4></label>
                            <select class="form-control" name="tilLand" id="tilLand">
                                <option selected value="<?php echo $tilLand ?>"><?php echo $tilLand ?></option>
                                <option value="Norge">Norge</option>
                                <option value="Sverige">Sverige</option>
                            </select>
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
    <div class="prisboks">
        <div class="col-md-6 col-md-offset-3">
            <h1>Total pris</h1>
            <h3>Reisen består av <?php echo $antallVoksene ?> voksene og <?php echo $antallUnge ?> unge, totalt blir prisen 999,- på reisen til <?php echo $tilLand ?></h3>
            <a class="btn btn-default pull-right" href="bekreftelsereise.php">Bekreft</a>
        </div>
    </div>
</div>
<!-- innhold -->

<?php
    include_once ('end.php');
?>