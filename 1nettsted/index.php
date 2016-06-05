<?php
    include_once ("head.php");
?>

<!-- Header bilde -->
    <div class="row headerBilde"></div>
<!-- Header bilde -->

<!-- Innhold -->
<div class="container">

    <!-- Bestille reise -->
    <form method="GET" action="velgfly.php" role="form" id="bestillReiseSkjema" name="bestillReiseSkjema" onsubmit="return validerBestilling()">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 bestillReiseBoks">


                <!-- Fra/til land -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" name="fraFlyplass" id="fraFlyplass">
                            <label for="Fra"><h4>Fra</h4></label>
                            <?php echo fraFlyplassListe(); ?>
                        </div>
                    </div>

                    <div class="col-md-6" name="tilFlyplass" id="retur">
                        <div class="form-group">
                            <label for="Til"><h4>Til</h4></label>
                            <?php echo tilFlyplassListe(); ?>
                        </div>
                    </div>
                </div><!-- /row -->
                <!-- Fra/til lanf -->
                                <div class="row">
                    <!-- Radio knapper -->
                    <div class="col-md-6">
                        <div class="radio" name="reiseType" id="reiseType">
                            <div class="col-md-6">
                                <label><input type="radio" name="reisevalg" id="turRetur" value="1" checked>Tur/Retur</label>
                            </div>
                            <div class="col-md-6">
                                <label><input type="radio" name="reisevalg" id="enVei" value="2">En vei</label>
                            </div>
                        </div>
                    </div>
                    <!-- Radio knapper -->

                    <!-- Antall reisende -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="antallVoksene" id="antallVoksene">
                                <option selected value="0">0 Voksene</option>
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="antallUnge" id="antallUnge">
                                <option selected value="0">0 Unge(0-25)</option>
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
                    <!-- Antall reisende -->
                </div> <!-- /row -->

                <!-- Dato -->
                <div class="row">
                    <div class="col-md-6" id="fraDato">
                        <div class="form-group" name="fraDato" id="fraDato">
                            <label for="Fra"><h4>Fra dato </h4></label>
                            <input class="form-control" type="text" class="span2" value="" id="dpd1" name="fradato" required>
                        </div>
                    </div>
                    <div class="col-md-6" id="tilDato">
                        <div class="form-group" name="tilDato" id="tilDato">
                            <label for="Til"><h4>Til dato </h4></label>
                            <input class="form-control" type="text" class="span2" value="" id="dpd2" name="tildato" required>
                        </div>
                    </div>
                </div>
                <!-- Dato -->

                <input type="submit" class="btn btn-default" value="Bekreft" onclick="validerBestilling();"/>
            </div>
        </div>
    </form>
    <!-- Bestille reise -->

    <!-- Populære reiser -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Alle ruter</h2>
            <p>I tvil på hvor du vil reise? Her en oversikt over alle våre ruter</p>
            <table class="table">
                <thead>
                    <tr>
                        <th><h4>Valgt</h4></th>
                        <th><h4>Avgang</h4></th>
                        <th><h4>Fra</h4></th>
                        <th><h4>Til</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT f.id, f.avgang, ( SELECT f.navn FROM flyplass AS f WHERE f.id = (SELECT rk.flyplass_id_fra FROM rute_kombinasjon AS rk WHERE rk.id = f.rute_kombinasjon_id) ) AS fra,( SELECT f.navn FROM flyplass AS f WHERE f.id = (SELECT rk.flyplass_id_til FROM rute_kombinasjon AS rk WHERE rk.id = f.rute_kombinasjon_id) ) AS til FROM flyvning AS f;";
                    $result = connectDB()->query($sql);

                        if($result->num_rows > 0 ) {
                            while ($row = $result->fetch_assoc()) {
                                $id = utf8_encode($row["id"]);
                                $avgang = utf8_encode($row["avgang"]);
                                $fra = utf8_encode($row["fra"]);
                                $til = utf8_encode($row["til"]);

                                echo '
                                    <td><input type="radio" name="id" value="' . $id . '"></td>
                                    <td>' . $avgang . '</td>
                                    <td>' . $fra . '</td>
                                    <td>' . $til . '</td>
                                ';
                            }
                        }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Populære reiser -->
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>
