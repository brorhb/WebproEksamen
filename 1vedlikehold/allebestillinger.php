<?php
    include_once("lib/funksjoner.php");
    krevInnlogging("0");
    include_once("head.php");

    
    if ($_POST['slett']) {
        $id = @$_POST['id'];
        if(slettKlasse($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif ($_POST['lagre']) {
        $id = @$_POST['id'];
        $klassenavn = $_POST['klassenavn'];
        $beskrivelse = $_POST['beskrivelse'];

        if(oppdaterKlasse($id, $klassenavn, $beskrivelse)) {
            echo "Informasjonen ble oppdatert.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['ny'] || @$_POST['endre']) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    
            <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post">
            <div class="col-md-12">';
                if (@$_POST['ny']) {
                    echo '<h2>Ny bestilling</h2>';
                    echo '
                        <div class="col-md-12">
                                <label for="Flyvning">Flyvning</label>
                            ';
                                echo ruteliste(@$rute) ;
                            echo '
                            </div>
                            <div class="col-md-6">
                                <label for="Rute">Rute</label>
                            ';
                                echo passasjertypeListe() ;
                            echo '
                            </div>
                            <div class="col-md-6">
                                <label="">Fornavn</label>
                                <input class="form-control" type="text" name="" id="" value=""> 
                            </div>
                            <div class="col-md-6">
                                <label="">Etternavn</label>
                                <input class="form-control" type="text" name="" id="" value=""> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="date">Fødselsdato<span class="asteriskField">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar">
                                            </i>
                                        </div>
                                        <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text" value="' . @$fodselsdato . '"/>
                                    </div>
                                </div>
                            </div>
                            ';                 
                }
                elseif (@$_POST['endre']) {
                    echo '<h2>Endre bestilling</h2>';
                    echo '
                            <div class="col-md-12">
                                <label for="Flyvning">Rute</label>
                            ';
                                echo ruteliste(@$rute) ;
                            echo '
                            </div>
                            <div class="col-md-6">
                                <label for="Rute">Rute</label>
                            ';
                                echo passasjertypelist() ;
                            echo '
                            </div>
                            <div class="col-md-6">
                                <label="">Fornavn</label>
                                <input class="form-control" type="text" name="" id="" value=""> 
                            </div>
                            <div class="col-md-6">
                                <label="">Etternavn</label>
                                <input class="form-control" type="text" name="" id="" value=""> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="date">Fødselsdato<span class="asteriskField">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar">
                                            </i>
                                        </div>
                                        <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text" value="' . @$fodselsdato . '"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                }
        echo '
            <div class="col-md-6">';
                
                    connectDB();
                    $sql = "SELECT * FROM klasse WHERE id='$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $rute = utf8_encode($row["type"]);
                            $navn = utf8_encode($row["beskrivelse"]);
                            $avgang = utf8_encode($row[""]);
                        echo '
                            
                            ';
                        }
                    }
                    else {
                        echo '
                            
                            ';
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
            <h2>Alle bestillinger</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Referanse/ID</th>
                        <th>Rute</th>
                        <th>Navn</th>
                        <th>Avgang</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT * FROM klasse;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $rute = utf8_encode($row["type"]);
                                    $navn = utf8_encode($row["beskrivelse"]);
                                    $avgang = utf8_encode($row[""]);
                                    echo '<tr><td><input type="radio" name="id" value="' . $klasseID . '"></td><td>' . $type . '</td><td>' . $beskrivelse . 'required</td></tr>';
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