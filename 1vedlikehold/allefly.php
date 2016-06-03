<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    
    if ($_POST['slett']) {
        $id = @$_POST['id'];
        if(slettLuftfartoy($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif ($_POST['lagre']) {
        $id = @$_POST['id'];
        $modell_id = $_POST['modell_id'];
        $tailnr = $_POST['tailnr'];

        if(oppdaterLuftfartoy($LuftfartoyID, $modell_id, $tailnr)) {
            echo "Informasjonen ble oppdatert.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif ($_POST['ny'] || $_POST['endre']) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" name="oppdater" method="post" onsubmit="return validerLuftfartoy()">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Nytt fly</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre fly</h2>';
                }
        echo '
            <div class="col-md-6">';
                
                    connectDB();
                    $sql = "SELECT * FROM luftfartoy WHERE id='$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $modell_id = utf8_encode($row["modell_id"]);
                            $tailnr = utf8_encode($row["tailnr"]);
                            echo '

                        <div class="form-group">
                                <input class="form-control" type="hidden" placeholder="id" name="id" id="id" value="' . @$id . '" required>'; modellListe(@$modell_id);
                            echo '
                            </div>
                            <div class="form-group">
                                <lable for="tailnr">tailnr</lable>
                                <input class="form-control" type="text" placeholder="tailnr" name="tailnr" id="tailnr" value="' . @$tailnr . '" required>
                            </div>';
                        }
                    }
                    else {
                        echo '
                                <div class="form-group">
                                <lable for="modell">Velg modell</label>
                                <input class="form-control" type="hidden" placeholder="id" name="id" id="id" value="' . @$id . '" required>'; modellListe(@$modell_id);
                            echo '
                            </div>
                            <div class="form-group">
                                <lable for="tailnr">tailnr</lable>
                                <input class="form-control" type="text" placeholder="tailnr" name="tailnr" id="tailnr" value="' . @$tailnr . '" required>
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
            <h2>Alle fly</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>modell_id</th>
                        <th>tailnr</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT * FROM luftfartoy;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $modell_id = utf8_encode($row["modell_id"]);
                                    $tailnr = utf8_encode($row["tailnr"]);
                                    echo '<tr><td><input type="radio" name="id" value="' . $id . '"></td><td>' . $modell_id . '</td><td>' . $tailnr . '</td></tr>';
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