<?php
    include_once("lib/funksjoner.php");
    krevInnlogging('0');
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
        $Passasjertype = @$_POST['Passasjertype'];
        $beskrivelse = @$_POST['beskrivelse'];


        if(validerPassasjertype($Passasjertype, $beskrivelse)) {
            oppdaterPassasjertype($id, $Passasjertype, $beskrivelse); 
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
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerOppdaterPassasjertype()">
            <div class="col-md-12">';
                if (@$_POST['ny']) {
                    echo '<h2>Ny passasjertype</h2>';
                }
                elseif (@$_POST['endre']) {
                    echo '<h2>Endre passasjernavn</h2>';
                }
        echo '
            <div class="col-md-6">';
                
                    connectDB();
                    $sql = "SELECT * FROM Passasjertype WHERE id='$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $Passasjertype = utf8_encode($row["type"]);
                            $beskrivelse = utf8_encode($row["beskrivelse"]);
                            echo '
                            <div class="form-group">
                                <lable for="Passasjertype">Passasjertype</lable>
                                <input class="form-control" type="text" placeholder="Passasjertype" name="Passasjertype" id="Passasjertype" value="' . @$Passasjertype . '" required>
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
                                <lable for="Passasjertype">Passasjertype</lable>
                                <input class="form-control" type="text" placeholder="Passasjertype" name="Passasjertype" id="Passasjertype" value="' . @$Passasjertype . '" required>
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
                    <input type="submit" id="lagre" name="lagre" class="btn btn-info" value="lagre">
                </div>
            </div>
            </form>
            <!-- Innhold -->';
    }
    

        echo'<div class="col-md-12">
            <form method="post" action="' . $_SERVER['PHP_SELF'] . '" onsubmit="return validerSubmitKnapp(this.submited);">
            <h2>Alle passasjertyper</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Passasjertype</th>
                        <th>Beskrivelse</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT * FROM Passasjertype;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $Passasjertype = utf8_encode($row["type"]);
                                    $beskrivelse = utf8_encode($row["beskrivelse"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $id . '"required></td>
                                                <td>' . $Passasjertype . '</td>
                                                <td>' . $beskrivelse . '</td>
                                          </tr>';
                                }
                            }
                        
        echo '
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endre" class="btn btn-info" value="Endre" onclick="this.form.submited=this.name;" />
                    </div>
                    <div class="col-md-1 col-md-offset-4 text-center">
                        <input type="submit" name="ny" class="btn btn-success" value="Legg til" onclick="this.form.submited=this.name;" />
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