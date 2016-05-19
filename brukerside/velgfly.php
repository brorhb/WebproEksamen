<?php
    include_once ("head.php");
?>

<!-- Reise info -->
<div class="col-md-12 reiseInfo">
    <div class="row">
        <div class="col-md-8">
            <?php
                $fraLand = $_GET["fraLand"];
                $tilLand = $_GET["tilLand"];
                $antallVoksene = $_GET["antallVoksene"];
                $antallUnge = $_GET["antallUnge"];
                echo '<h2>' . $fraLand . ' til ' . $tilLand . '</h2>';
            ?>
        </div>
    </div>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
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
                                <label><input type="radio" name="reisevalg" id="turRetur" value="1" checked>Tur/Retur</label>
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
                    <div class="form-group" name="fraDato" id="fraDato">
                        <label for="Fra"><h4>Fra dato </h4></label>
                        <input class="form-control" type="text" class="span2" value="" id="dpd1" required>
                    </div>
                </div>
                <div class="col-md-6" id="tilDato">
                    <div class="form-group" name="tilDato" id="tilDato">
                        <label for="Til"><h4>Til dato </h4></label>
                        <input class="form-control" type="text" class="span2" value="" id="dpd2" required>
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
    <form action="bekreftelsereise.php">
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