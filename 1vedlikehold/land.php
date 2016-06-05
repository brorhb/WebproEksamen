<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    echo '<button onclick="validerEksempel()">Skriv ut feilmeldinger</button>';
    echo '<p id="demo"></p>';
    
    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettLand($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $id = @$_POST['id'];
        $navn = $_POST['navn'];
        $landskode = $_POST['landskode'];
        $valuta_id = $_POST['valuta_id'];
        $iso = $_POST["iso"];
        $iso3 = $_POST["iso3"];

        if(oppdaterLand($id, $navn, $landskode, $valuta_id, $iso, $iso3)) {
            echo "Informasjonen ble oppdatert.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['ny'] || @$_POST['endre']) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerOppdaterLand()">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Nytt land</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre land</h2>';
                }
        echo '
            <div class="col-md-12">';
                
                    connectDB();
                    $sql = "SELECT land.id AS land_id, land.navn, land.landskode, land.iso, land.iso3, valuta.valuta_navn, valuta.id AS valuta_id FROM land LEFT JOIN valuta ON land.valuta_id = valuta.id WHERE land.id = '$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["land_id"]);
                            $navn = utf8_encode($row["navn"]);
                            $landskode = utf8_encode($row["landskode"]);
                            $valuta_navn = utf8_encode($row["valuta_navn"]);
                            $valuta_id = utf8_encode($row["valuta_id"]);
                            $iso = utf8_encode($row["iso"]);
                            $iso3 = utf8_encode($row["iso3"]);
                            echo '
                            <div class="form-group col-md-6">
                                <lable for="navn">Navn</lable>
                                <input class="form-control" type="text" placeholder="Navn" name="navn" id="navn" value="' . @$navn . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '">
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="landskode">landskode</lable>
                                <input class="form-control" type="text" placeholder="landskode" name="landskode" id="landskode" value="' . @$landskode . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="valutanavn">Valuta navn</lable>';
                            
                            valutaListe($valuta_id);
                                
                            echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="iso">iso</lable>
                                <input class="form-control" type="text" placeholder="iso" name="iso" id="beskrivelse" value="' . @$iso . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="iso3">iso3</lable>
                                <input class="form-control" type="text" placeholder="iso3" name="iso3" id="beskrivelse" value="' . @$iso3 . '" required>
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group col-md-6">
                                <lable for="navn">Navn</lable>
                                <input class="form-control" type="text" placeholder="Navn" name="navn" id="navn" value="' . @$navn . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '">
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="landskode">landskode</lable>
                                <input class="form-control" type="text" placeholder="landskode" name="landskode" id="landskode" value="' . @$landskode . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="valutanavn">Valuta navn</lable>';
                            
                            valutaListe($valuta_id);
                                
                            echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="iso">iso</lable>
                                <input class="form-control" type="text" placeholder="iso" name="iso" id="beskrivelse" value="' . @$iso . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="iso3">iso3</lable>
                                <input class="form-control" type="text" placeholder="iso3" name="iso3" id="beskrivelse" value="' . @$iso3 . '" required>
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
            <form method="post" action="' . $_SERVER['PHP_SELF'] . '" id="tabell">
            <h2>Alle land</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Navn</th>
                        <th>Landskode</th>
                        <th>Valutta id</th>
                        <th>iso</th>
                        <th>iso3</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT land.id AS land_id, land.navn, land.landskode, land.iso, land.iso3, valuta.valuta_navn FROM land LEFT JOIN valuta ON land.valuta_id = valuta.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["land_id"]);
                                    $navn = utf8_encode($row["navn"]);
                                    $landskode = utf8_encode($row["landskode"]);
                                    $valuta_navn = utf8_encode($row["valuta_navn"]);
                                    $iso = utf8_encode($row["iso"]);
                                    $iso3 = utf8_encode($row["iso3"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $id . '"></td>
                                                <td>' . $navn . '</td>
                                                <td>' . $landskode . '</td>
                                                <td>' . $valuta_navn . '</td>
                                                <td>' . $iso . '</td>
                                                <td>' . $iso3 . '</td>
                                          </tr>';
                                }
                            }
                        
        echo '
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endre" class="btn btn-info" value="Endre" />
                    </div>
                    <div class="col-md-1 col-md-offset-4 text-center">
                        <input type="submit" name="ny" class="btn btn-success" value="Legg til" />
                    </div>
                    <div class="col-md-1 col-md-offset-4 pull-right">
                        <input type="submit" name="slett" class="btn btn-danger" value="Slett" id="slett"/>
                    </div>
                </form>
        </div>
        <!-- Innhold -->
        ';

    




    include_once ("end.php");
?>