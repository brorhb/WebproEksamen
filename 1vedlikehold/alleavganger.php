<?php 
    include_once("lib/funksjoner.php");
    krevInnlogging("0");
    include_once("head.php");


    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettFlyvning($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $flyvningNr = $_POST["flyvningNr"];
        $ruteNr = $_POST["ruteNr"];
        $tailNr = $_POST["tailNr"];
        $type = $_POST["type"];
        $avgang = $_POST["avgang"];
        $fraFlyplass = $_POST["fraFlyplass"];
        $gate = $_POST["gate"];
        $tilFlyplass = $_POST["tilFlyplass"];

        if (oppdaterFlyvning($brukerID, $personID, $brukernavn, $ukryptertPassord, $fornavn, $etternavn, $fodselsdato, $landID, $epost, $mobilnr)) {
        
          // Valideringen gogdkjent, oppdater databasen
            oppdaterPersonBruker($brukerID, $personID, $brukernavn, $ukryptertPassord, $fornavn, $etternavn, $fodselsdato, $landID, $epost, $mobilnr);
            echo "Informasjonen ble oppdatert.";
            $feiletPHPvalidering = false;
        }
        else {
            // PHP-validering ikke godkjent, feilmeldinger skrives ut og skjemaet for å fylle ut info vises:
            $feiletPHPvalidering = true;
        }
    }
    elseif (@$_POST['ny'] || @$_POST['endre']) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerFlyvning()">
            <div class="col-md-12">';
                if (@$_POST['ny']) {
                    echo '<h2>Ny flyvning</h2>';
                }
                elseif (@$_POST['endre']) {
                    echo '<h2>Endre flyvning</h2>';
                }
        echo '
            <div class="col-md-12">';

                    connectDB();
                    $sql = "SELECT f.id AS flyvningNr, (SELECT rk.rute_id FROM rute_kombinasjon rk WHERE rk.id = f.rute_kombinasjon_id) AS ruteNr, (SELECT id FROM luftfartoy l WHERE f.luftfartoy_id = l.id) AS tailNr, (SELECT m.navn FROM modell m WHERE l.modell_id = m.id) AS type, f.avgang, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fraFlyplass, f.gate, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS tilFlyplass FROM flyvning f LEFT JOIN rute_kombinasjon rk ON f.rute_kombinasjon_id = rk.id LEFT JOIN luftfartoy l ON f.luftfartoy_id = l.id WHERE f.id = '$id';";
                    $result = connectDB()->query($sql);

                    if ($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $flyvningNr = utf8_encode($row["flyvningNr"]);
                            $ruteNr = utf8_encode($row["ruteNr"]);
                            $tailNr = utf8_encode($row["tailNr"]);
                            $type = utf8_encode($row["type"]);
                            $avgang = utf8_encode($row["avgang"]);
                            $fraFlyplass = utf8_encode($row["fraFlyplass"]);
                            $gate = utf8_encode($row["gate"]);
                            $tilFlyplass = utf8_encode($row["tilFlyplass"]);

                            echo '
                            <div class="form-group col-md-6">
                                <lable for="avgang">Avganger</lable>
                                <input class="form-control" type="text" placeholder="Avgang" name="avgang" id="avgang" value="' . @$avgang . '" required>
                                <lable for="gate">Gate</lable>
                                <input class="form-control" type="text" placeholder="Gate Nr" name="gate" id="gate" value="' . @$gate . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="ruteNr">Rute Nr</lable>';
                            echo rute_kombinasjonListe($ruteNr);
                            echo '
                                <lable for="luftfartoy">Tail Nr</lable>';
                            echo luftfartoyListe($tailNr);
                            echo '</div>';
                        }

                        echo '<h3>Pris</h3>';
                        $sql2 = "SELECT (SELECT p.passasjertype_id FROM pris p WHERE p.flyvning_id = f.id) AS passasjertype, p.fra_dato AS fraDato, p.til_dato AS tilDato FROM pris p LEFT JOIN flyvning f ON p.flyvning_id = f.id LIMIT 5;";

                        $result2 = connectDB()->query($sql2);

                        if ($result2->num_rows > 0 ) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $passasjertype2 = utf8_encode($row2["passasjertype"]);
                                $fraDato2 = utf8_encode($row2["fraDato"]);
                                $tilDato2 = utf8_encode($row2["tilDato"]);

                                echo '
                                <div class="form-group col-md-12">
                                    <lable for="passasjertype">Passasjer Type</lable>';
                                    echo passasjertypeListe($passasjertype2);
                                    echo '
                                </div>
                                <div class="form-group col-md-6">
                                    <lable for="fraDato">Fra Dato</lable>
                                    <input class="form-control" type="text" placeholder="Fra Dato Nr" name="fraDato" id="dpd1" value="' . @$fraDato2 . '" required>
                               </div>
                               <div class="form-group col-md-6">
                                    <lable for="tilDato">Til Dato</lable>
                                    <input class="form-control" type="text" placeholder="Til Dato Nr" name="tilDato" id="dpd2" value="' . @$tilDato2 . '" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Valgt</th>
                                                <th>Klasse</th>
                                                <th>Pris</th>
                                                <th>Valuta</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                            $sql3 = "SELECT k.id, (SELECT k.type FROM klasse k WHERE k.id = p.klasse_id) AS type, p.pris, (SELECT v.id FROM valuta v WHERE v.id = p.valuta_id) AS valuta FROM pris p LEFT JOIN klasse k ON k.id = p.klasse_id LEFT JOIN valuta v ON v.id = p.valuta_id;";
                                            $result3 = connectDB()->query($sql3);

                                            if ($result3->num_rows > 0 ) {
                                                while ($row3 = $result3->fetch_assoc()) {
                                                    $id3 = utf8_encode($row3["id"]);
                                                    $type3 = utf8_encode($row3["type"]);
                                                    $pris3 = utf8_encode($row3["pris"]);
                                                    $valuta3 = utf8_encode($row3["valuta"]);

                                
                                                    echo '
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="id" value="' . $id3 . '" required>
                                                            </td>
                                                            <td>' . $type3 . '</td>
                                                            <td>
                                                                <input class="form-control type="text" name="pris" value="' . $pris3 . '" placeholder="Pris" required>
                                                            </td>
                                                            <td>'; 
                                                            echo valutaListe($valuta3);
                                                            echo '
                                                            </td>
                                                        </tr>';
                                                }
                                            }
                                        echo '</tbody>
                                    </table>
                                </div>';
                            }
                        }
                    }
                    else {
                        echo '
                            <div class="form-group col-md-6">
                                <lable for="avgang">Avganger</lable>
                                <input class="form-control" type="text" placeholder="Avgang" name="avgang" id="avgang" value="' . @$avgang . '" required>
                                <lable for="gate">Gate</lable>
                                <input class="form-control" type="text" placeholder="Gate Nr" name="gate" id="gate" value="' . @$gate . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="ruteNr">Rute Nr</lable>';
                            echo rute_kombinasjonListe($ruteNr);
                            echo '
                                <lable for="luftfartoy">Tail Nr</lable>';
                            echo luftfartoyListe($tailNr);
                            echo '</div>';

                        
                        echo '<h3>Pris</h3>';
                        $sql2 = "SELECT (SELECT p.passasjertype_id FROM pris p WHERE p.flyvning_id = f.id) AS passasjertype, p.fra_dato AS fraDato, p.til_dato AS tilDato FROM pris p LEFT JOIN flyvning f ON p.flyvning_id = f.id LIMIT 5;";

                        $result2 = connectDB()->query($sql2);

                        if ($result2->num_rows > 0 ) {
                            while ($row2 = $result2->fetch_assoc()) {
                                $passasjertype2 = utf8_encode($row2["passasjertype"]);
                                $fraDato2 = utf8_encode($row2["fraDato"]);
                                $tilDato2 = utf8_encode($row2["tilDato"]);

                                echo '
                                <div class="form-group col-md-12">
                                    <lable for="passasjertype">Passasjer Type</lable>';
                                    echo passasjertypeListe(@$passasjertype2);
                                    echo '
                                </div>
                                <div class="form-group col-md-6">
                                    <lable for="fraDato">Fra Dato</lable>
                                    <input class="form-control" type="text" placeholder="Fra Dato Nr" name="fraDato" id="dpd1" value="' . @$fraDato2 . '" required>
                               </div>
                               <div class="form-group col-md-6">
                                    <lable for="tilDato">Til Dato</lable>
                                    <input class="form-control" type="text" placeholder="Til Dato Nr" name="tilDato" id="dpd2" value="' . @$tilDato2 . '" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Valgt</th>
                                                <th>Klasse</th>
                                                <th>Pris</th>
                                                <th>Valuta</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                            $sql3 = "SELECT k.id, k.type FROM klasse k;";
                                            $result3 = connectDB()->query($sql3);

                                            if ($result3->num_rows > 0 ) {
                                                while ($row3 = $result3->fetch_assoc()) {
                                                    $id3 = utf8_encode($row3["id"]);
                                                    $type3 = utf8_encode($row3["type"]);

                                                    echo '
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="id" value="' . $id3 . '" required>
                                                            </td>
                                                            <td>' . $type3 . '</td>
                                                            <td>
                                                                <input class="form-control type="text" name="pris" value="testPris" placeholder="Pris" required>
                                                            </td>
                                                            <td>'; 
                                                            echo valutaListe();
                                                            echo '
                                                            </td>
                                                        </tr>';
                                                }
                                            }
                                        echo '</tbody>
                                    </table>
                                </div>';
                            }
                        }
                    }
                    connectDB()->close();
            echo'
            </div>
               <div class="col-md-12">
                    <input type="submit" id="lagre" name="lagre" class="btn btn-info" value="lagre" required>
                </div>
            </div>
            </form>
            <!-- Innhold -->';
    }


        echo'<div class="col-md-12">
            <form method="post" action="' . $_SERVER['PHP_SELF'] . '" id="tabell" onsubmit="return validerSubmitKnapp(this.submited);">
            <h2>Alle Flyvninger</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Rute Nr</th>
                        <th>Tail Nr (& type)</th>
                        <th>Avgang</th>
                        <th>Fra Flyplass</th>
                        <th>Fra Gate</th>
                        <th>Til Flyplass</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT f.id AS flyvningNr, (SELECT rk.rute_id FROM rute_kombinasjon rk WHERE rk.id = f.rute_kombinasjon_id) AS ruteNr, l.tailnr AS tailNr, (SELECT m.navn FROM modell m WHERE l.modell_id = m.id) AS type, f.avgang, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fraFlyplass, f.gate, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS tilFlyplass FROM flyvning f LEFT JOIN rute_kombinasjon rk ON f.rute_kombinasjon_id = rk.id LEFT JOIN luftfartoy l ON f.luftfartoy_id = l.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {
                                    $flyvningNr = utf8_encode($row["flyvningNr"]);
                                    $ruteNr = utf8_encode($row["ruteNr"]);
                                    $tailNr = utf8_encode($row["tailNr"]);
                                    $type = utf8_encode($row["type"]);
                                    $avgang = utf8_encode($row["avgang"]);
                                    $fraFlyplass = utf8_encode($row["fraFlyplass"]);
                                    $gate = utf8_encode($row["gate"]);
                                    $tilFlyplass = utf8_encode($row["tilFlyplass"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $flyvningNr . '" required></td>
                                                <td>' . $ruteNr . '</td>
                                                <td>' . $tailNr . ' (' . $type . ')</td>
                                                <td>' . $avgang . '</td>
                                                <td>' . $fraFlyplass . '</td>
                                                <td>' . $gate . '</td>
                                                <td>' . $tilFlyplass . '</td>
                                          </tr>';
                                }
                            }

        echo '
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endre" class="btn btn-info" value="Endre" onclick="this.form.submited=this.name;"/ required>
                    </div>
                    <div class="col-md-1 col-md-offset-4 text-center">
                        <input type="submit" name="ny" class="btn btn-success" value="Legg til" onclick="this.form.submited=this.name;"/ required>
                    </div>
                    <div class="col-md-1 col-md-offset-4 pull-right">
                        <input type="submit" name="slett" href="#" class="btn btn-danger" value="Slett" onclick="this.form.submited=this.name;"/ required>
                    </div>
                </form>
        </div>
        <!-- Innhold -->
        ';

include_once ("end.php"); ?>