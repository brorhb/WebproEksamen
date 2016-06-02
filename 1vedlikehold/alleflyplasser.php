<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    
    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettFlyplass($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $id = @$_POST['id'];
        $navn = $_POST['navn'];
        $flyplasskode = $_POST['flyplasskode'];
        $latitude= $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $ftidssone_gmt = $_POST['tidssone_gmt'];
        $land_id = $_POST['land_id'];


        if(oppdaterflyplass($id, $navn, $flyplasskode, $latitude, $longitude, $tidssone_gmt, $land_id)) {
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
                    echo '<h2>Ny flyplass</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre flyplass</h2>';
                }
        echo '
            <div class="col-md-6">';
                
                    connectDB();
                    $sql = "SELECT * FROM flyplass WHERE id='$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $type = utf8_encode($row["type"]);
                            $beskrivelse = utf8_encode($row["beskrivelse"]);
                            echo '
                            <div class="form-group">
                                <lable for="Flyplassnavn">Flyplassnavn</lable>
                                <input class="form-control" type="text" placeholder="flyplass" name="flyplassnavn" id="flyplassnavn" value="' . @$type . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '">
                            </div>
                            <div class="form-group">
                                <lable for="Beskrivelse">Beskrivelse</lable>
                                <input class="form-control" type="text" placeholder="Beskrivelse" name="beskrivelse" id="beskrivelse" value="' . @$beskrivelse . '" required>
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group">
                                <lable for="Flyplassnavn">Flyplassnavn</lable>
                                <input class="form-control" type="text" placeholder="Flyplassnavn" name="flyplassnavn" id="flyplassnavn" value="' . @$type . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '">
                            </div>
                            <div class="form-group">
                                <lable for="Beskrivelse">Beskrivelse</lable>
                                <input class="form-control" type="text" placeholder="Beskrivelse" name="beskrivelse" id="beskrivelse" value="' . @$beskrivelse . '" required>
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
            <h2>Alle flyplasser</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Navn</th>
                        <th>Flyplasskode</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Tidssone</th>
                        <th>Landid</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT * FROM flyplass;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $FlyplassID = utf8_encode($row["id"]);
                                    $navn = utf8_encode($row["navn"]);
                                    $flyplasskode = utf8_encode($row["flyplasskode"]);
                                    $latitude = utf8_encode($row["latitude"]);
                                    $longitude = utf8_encode($row["longitude"]);
                                    $tidssone_gmt = utf8_encode($row["tidssone_gmt"]);
                                    $land_id = utf8_encode($row["land_id"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $FlyplassID . '"></td>
                                                <td>' . $navn . '</td>
                                                <td>' . $flyplasskode . '</td>
                                                <td>' . $latitude . '</td>
                                                <td>' . $longitude . '</td>
                                                <td>' . $tidssone_gmt . '</td>
                                                <td>' . $land_id . '</td>
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