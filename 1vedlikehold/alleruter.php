<?php
    include_once("lib/funksjoner.php");
    krevInnlogging('0');
    include_once("head.php");

    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettRute($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $rutenr = $_POST["rutenr"];
        $pris = $_POST["pris"];
        $fraLand = $_POST["fraLand"];
        $fraFlyplass = $_POST["Flyplass"];
        $tid = $_POST["tid"];
        $tilLand = $_POST["tilLand"];
        $tilFlyplass = $_POST["Flyplass"];

        if(validerRuter($tid,$pris, $valuta, $fraFlyplass, $tilFlyplass)){
            oppdaterRute($rutenr, $pris, $fraLand,$fraFlyplass, $tid, $tilLand, $tilFlyplass);
            echo "Informasjonen ble oppdatert.";
            $feiletPHPvalidering = false;
        }
        else {
            $feiletPHPvalidering = true;
        }
    }
    if (@$_POST['ny'] || @$_POST['endre'] || $feiletPHPvalidering) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerOppdaterRuter()">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Ny rute</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre rute</h2>';
                }
        echo '
            <div class="col-md-12">';

                    connectDB();
                    $sql = "SELECT rk.id AS ruteKombinasjonNr, r.id AS ruteNr, r.basis_pris AS pris, r.valuta_id AS valuta, (SELECT navn FROM land l WHERE l.id = (SELECT land_id FROM flyplass f WHERE f.id = rk.flyplass_id_fra)) AS fraLand, (SELECT id FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fraFlyplass, reisetid AS tid, (SELECT navn FROM land l WHERE l.id = (SELECT land_id FROM flyplass f WHERE f.id = rk.flyplass_id_til)) AS tilLand, (SELECT id FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS tilFlyplass FROM rute_kombinasjon rk LEFT JOIN flyplass f ON rk.flyplass_id_fra = f.id AND rk.flyplass_id_til = f.id LEFT JOIN land l ON f.land_id = l.id LEFT JOIN rute r ON rk.rute_id = r.id LEFT JOIN valuta v ON r.valuta_id = v.id WHERE rk.id = '$id';";
                    $result = connectDB()->query($sql);

                    if ($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $ruteKombinasjonNr = utf8_encode($row["ruteKombinasjonNr"]);
                            $ruteNr = utf8_encode($row["ruteNr"]);
                            $valuta = utf8_encode($row["valuta"]);
                            $pris = utf8_encode($row["pris"]);
                            $fraLand = utf8_encode($row["fraLand"]);
                            $fraFlyplass = utf8_encode($row["fraFlyplass"]);
                            $tid = utf8_encode($row["tid"]);
                            $tilLand = utf8_encode($row["tilLand"]);
                            $tilFlyplass = utf8_encode($row["tilFlyplass"]);
                            echo '
                            <div class="form-group col-md-6">
                                <lable for="tid">Reisetid</lable>
                                <input class="form-control" type="text" placeholder="Reisetid" name="tid" id="tid" value="' . @$tid . '" required>
                                <lable for="pris">Basis pris</lable>
                                <input class="form-control" type="text" placeholder="Basis pris" name="pris" id="pris" value="' . @$pris . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="fraFlyplas">Flyplass 1</lable>';
                               echo flyplassListe(@$fraFlyplass);
                               echo '<lable for="tilFlyplas">Flyplass 2</lable>';
                               echo flyplassListe(@$tilFlyplass);
                               echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="valuta">Valuta</lable>';
                               echo valutaListe(@$valuta);
                               echo '
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group col-md-6">
                                <lable for="tid">Reisetid</lable>
                                <input class="form-control" type="text" placeholder="Reisetid" name="tid" id="tid" value="' . @$tid . '" required>
                                <lable for="pris">Basis pris</lable>
                                <input class="form-control" type="text" placeholder="Basis pris" name="pris" id="pris" value="' . @$pris . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="fraFlyplas">Flyplass 1</lable>';
                               echo flyplassListe(@$fraFlyplass);
                               echo '<lable for="tilFlyplass">Flyplass 2</lable>';
                               echo flyplassListe(@$tilFlyplass);
                               echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="valuta">Valuta</lable>';
                               echo valutaListe(@$valuta);
                               echo '
                            </div>';
                    }
                    connectDB()->close();
            echo'
            </div>
               <div class="col-md-12">
                    <input type="submit" id="lagre" name="lagre" class="btn btn-info" value="lagre">
                </div>
            </div>
            </form>
            <!-- Innhold -->';
    }


        echo'<div class="col-md-12">
            <form method="post" action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerSubmitKnapp(this.submited);">
            <h2>Alle Ruter</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Rutenummer</th>
                        <th>Fra land</th>
                        <th>Fra flyplass</th>
                        <th>tid</th>
                        <th>Til land</th>
                        <th>Til flyplass</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT rk.id AS ruteKombinasjonNr, r.id AS ruteNr, r.basis_pris AS pris, r.valuta_id AS valuta, (SELECT navn FROM land l WHERE l.id = (SELECT land_id FROM flyplass f WHERE f.id = rk.flyplass_id_fra)) AS fraLand, (SELECT navn FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fraFlyplass, reisetid AS tid, (SELECT navn FROM land l WHERE l.id = (SELECT land_id FROM flyplass f WHERE f.id = rk.flyplass_id_til)) AS tilLand, (SELECT navn FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS tilFlyplass FROM rute_kombinasjon rk LEFT JOIN flyplass f ON rk.flyplass_id_fra = f.id AND rk.flyplass_id_til = f.id LEFT JOIN land l ON f.land_id = l.id LEFT JOIN rute r ON rk.rute_id = r.id LEFT JOIN valuta v ON r.valuta_id = v.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {
                                    $ruteKombinasjonNr = utf8_encode($row["ruteKombinasjonNr"]);
                                    $ruteNr = utf8_encode($row["ruteNr"]);
                                    $fraLand = utf8_encode($row["fraLand"]);
                                    $fraFlyplass = utf8_encode($row["fraFlyplass"]);
                                    $tid = utf8_encode($row["tid"]);
                                    $tilLand = utf8_encode($row["tilLand"]);
                                    $tilFlyplass = utf8_encode($row["tilFlyplass"]);
                                    echo '
                                    <tr>
                                        <td>
                                            <input type="radio" name="id" value="' . $ruteKombinasjonNr . '">
                                        </td>
                                        <td>' . $ruteNr . '</td>
                                        <td>' . $fraLand . '</td>
                                        <td>' . $fraFlyplass . '</td>
                                        <td>' . $tid . '</td>
                                        <td>' . $tilLand . '</td>
                                        <td>' . $tilFlyplass . '</td>
                                    </tr>';
                                }
                            }

        echo '
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endre" class="btn btn-info" value="Endre" onclick="this.form.submited=this.name;"/>
                    </div>
                    <div class="col-md-1 col-md-offset-4 text-center">
                        <input type="submit" name="ny" class="btn btn-success" value="Legg til" onclick="this.form.submited=this.name;"/>
                    </div>
                    <div class="col-md-1 col-md-offset-4 pull-right">
                        <input type="submit" name="slett" href="#" class="btn btn-danger" value="Slett" onclick="this.form.submited=this.name;"/>
                    </div>
                </form>
        </div>
        <!-- Innhold -->
        ';






    include_once ("end.php");
?>
