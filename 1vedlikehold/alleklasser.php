<?php
    include_once("lib/funksjoner.php");
    krevInnlogging('0');
    include_once("head.php");

    
    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettKlasse($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $id = @$_POST['id'];
        $type = $_POST['klassenavn'];
        $beskrivelse = $_POST['beskrivelse'];

        if(validerKlasse($type, $beskrivelse)) {
            oppdaterKlasse($id, $type, $beskrivelse); 
            echo "Informasjonen ble oppdatert.";
            $feiletPHPvalidering=false;
        }
        else {
            $feiletPHPvalidering = true;
        }
    }
    if (@$_POST['ny'] || @$_POST['endre'] || @$feiletPHPvalidering) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerOppdaterKlasse()">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Ny klasse</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre klasse</h2>';
                }
        echo '
            <div class="col-md-6">';
                
                    connectDB();
                    $sql = "SELECT * FROM klasse WHERE id='$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $type = utf8_encode($row["type"]);
                            $beskrivelse = utf8_encode($row["beskrivelse"]);
                            echo '
                            <div class="form-group">
                                <lable for="Klassenavn">Klassenavn</lable>
                                <input class="form-control" type="text" placeholder="Klassenavn" name="klassenavn" id="klassenavn" value="' . @$type . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '" required>
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
                                <lable for="Klassenavn">Klassenavn</lable>
                                <input class="form-control" type="text" placeholder="Klassenavn" name="klassenavn" id="klassenavn" value="' . @$type . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '" required>
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
                    <input type="submit" id="lagre" name="lagre" class="btn btn-info" value="lagre" required>
                </div>
            </div>
            </form>
            <!-- Innhold -->';
    }
    

        echo'<div class="col-md-12">
            <form method="post" action="' . $_SERVER['PHP_SELF'] . '" onsubmit="return validerSubmitKnapp(this.submited);" >
            <h2>Alle Klasser</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Klassenavn</th>
                        <th>Beskrivelse</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT * FROM klasse;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $klasseID = utf8_encode($row["id"]);
                                    $type = utf8_encode($row["type"]);
                                    $beskrivelse = utf8_encode($row["beskrivelse"]);
                                    echo '<tr><td><input type="radio" name="id" id="radioknapp" value="' . $klasseID . '"></td><td>' . $type . '</td><td>' . $beskrivelse . '</td></tr>';
                                }
                            }
                        
        echo '
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endre" class="btn btn-info" onclick="this.form.submited=this.name;" value="Endre" onclick="this.form.submited=this.name;" />
                    </div>
                    <div class="col-md-1 col-md-offset-4 text-center">
                        <input type="submit" name="ny" class="btn btn-success" onclick="this.form.submited=this.name;" value="Legg til" onclick="this.form.submited=this.name;" />
                    </div>
                    <div class="col-md-1 col-md-offset-4 pull-right">
                        <input type="submit" name="slett" class="btn btn-danger" onclick="this.form.submited=this.name;" value="Slett" onclick="this.form.submited=this.name;"/>
                    </div>
                </form>
        </div>
        <!-- Innhold -->
        ';

    




    include_once ("end.php");
?>