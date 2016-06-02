<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    
    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettPassasjertype($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $id = @$_POST['id'];
        $navn = $_POST['navn'];
        $type = $_POST['type_luftfartoy'];
        $kapasitet = $_POST[''];

        if(oppdaterTypeLuftfartoy($id, $navn, $type)) {
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
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Ny modell</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre modell</h2>';
                }
        echo '
            <div class="col-md-12">';
                
                    connectDB();
                    $sql = "SELECT modell.id , modell.navn, type_luftfartoy.type, modell.kapasitet, modell.rader, modell.bredde FROM modell LEFT JOIN type_luftfartoy ON modell.type_luftfartoy_id = type_luftfartoy.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $navn = utf8_encode($row["navn"]);
                                    $type = utf8_encode($row["type"]);
                                    $kapasitet = utf8_encode($row["kapasitet"]);
                                    $rader = utf8_encode($row["rader"]);
                                    $bredde = utf8_encode($row["bredde"]);
                            echo '
                            <div class="form-group col-md-6">
                                <lable for="navn">Navn</lable>
                                <input class="form-control" type="text" placeholder="Navn" name="navn" id="navn" value="' . @$navn . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '">
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="type_luftfartoy">Type luftfartøy</lable>';
                            
                            type_luftfartoyListe($type);
                                
                            echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="kapasitet">kapasitet</lable>
                                <input class="form-control" type="text" placeholder="kapasitet" name="kapasitet" id="kapasitet" value="' . @$kapasitet . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="rader">Rader</lable>
                                <input class="form-control" type="text" placeholder="rader" name="rader" id="rader" value="' . @$rader . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="bredde">bredde</lable>
                                <input class="form-control" type="text" placeholder="bredde" name="bredde" id="bredde" value="' . @$bredde . '" required>
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
                                <lable for="type_luftfartoy">Type luftfartøy</lable>';
                            
                            type_luftfartoyListe($type);
                                
                            echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="kapasitet">kapasitet</lable>
                                <input class="form-control" type="text" placeholder="kapasitet" name="kapasitet" id="kapasitet" value="' . @$kapasitet . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="rader">Rader</lable>
                                <input class="form-control" type="text" placeholder="rader" name="rader" id="rader" value="' . @$rader . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="bredde">bredde</lable>
                                <input class="form-control" type="text" placeholder="bredde" name="bredde" id="bredde" value="' . @$bredde . '" required>
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
            <form method="post" action="' . $_SERVER['PHP_SELF'] . '">
            <h2>Alle Klasser</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Navn</th>
                        <th>Type</th>
                        <th>Kapasitet</th>
                        <th>Rader</th>
                        <th>Bredde</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT modell.id , modell.navn, type_luftfartoy.type, modell.kapasitet, modell.rader, modell.bredde FROM modell LEFT JOIN type_luftfartoy ON modell.type_luftfartoy_id = type_luftfartoy.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $navn = utf8_encode($row["navn"]);
                                    $type = utf8_encode($row["type"]);
                                    $kapasitet = utf8_encode($row["kapasitet"]);
                                    $rader = utf8_encode($row["rader"]);
                                    $bredde = utf8_encode($row["bredde"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $id . '"></td>
                                                <td>' . $navn . '</td>
                                                <td>' . $type . '</td>
                                                <td>' . $kapasitet . '</td>
                                                <td>' . $rader . '</td>
                                                <td>' . $bredde . '</td>
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
                        <input type="submit" name="slett" href="#" class="btn btn-danger" value="Slett"/>
                    </div>
                </form>
        </div>
        <!-- Innhold -->
        ';

    




    include_once ("end.php");
?>