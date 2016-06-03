<?php include_once("head.php");
    //krevInnlogging('0');
    

    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettBruker($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $brukerID = @$_POST['brukerID'];
        $personID = @$_POST['personID'];
        $brukernavn = $_POST['brukernavn'];
        $ukryptertPassord = $_POST['passord'];
        $fornavn = $_POST['fornavn'];
        $etternavn = $_POST['etternavn'];
        $fodselsdato = $_POST['fodselsdato'];
        $landID = $_POST['land_id'];
        $epost = $_POST['epost'];
        $mobilnr = $_POST['mobilnr'];

        if (oppdaterPersonBruker($brukerID, $personID, $brukernavn, $ukryptertPassord, $fornavn, $etternavn, $fodselsdato, $landID, $epost, $mobilnr)) {
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
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerPersonBruker()">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Ny klasse</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre klasse</h2>';
                }
        echo '
            <div class="col-md-12">';
                
                    connectDB();
                    $sql = "SELECT b.id AS brukerID, b.brukernavn, b.passord, p.id AS personID, p.fornavn, p.etternavn, p.fodselsdato, b.land_id, l.navn, b.epost, b.mobilnr FROM bruker b LEFT JOIN person p ON b.person_id = p.id LEFT JOIN land l ON b.land_id = l.id WHERE b.id = '$id';";
                    $result = connectDB()->query($sql);

                    if ($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $brukerID = utf8_encode($row["brukerID"]);
                            $personID = utf8_encode($row["personID"]);
                            $brukernavn = utf8_encode($row["brukernavn"]);
                            $passord = utf8_encode($row["passord"]);
                            $fornavn = utf8_encode($row["fornavn"]);
                            $etternavn = utf8_encode($row["etternavn"]);
                            $fodselsdato = utf8_encode($row["fodselsdato"]);
                            $land = utf8_encode($row["navn"]);
                            $landID = utf8_encode($row["land_id"]);
                            $epost = utf8_encode($row["epost"]);
                            $mobilnr = utf8_encode($row["mobilnr"]);
                            
                            echo '
                            <div class="form-group col-md-6">
                                <input class="form-control" type="hidden" placeholder="Bruker ID" name="brukerID" id="brukerID" value="' . @$brukerID . '" disabled required>
                                <input class="form-control" type="hidden" placeholder="Person ID" name="personID" id="personID" value="' . @$personID . '" disabled required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="brukernavn">Brukernavn</lable>
                                <input class="form-control" type="text" placeholder="Brukernavn" name="brukernavn" id="brukernavn" value="' . @$brukernavn . '" required>
                                <lable for="passord">Passord</lable>
                                <input class="form-control" type="text" placeholder="Passord" name="passord" id="passord" value="' . @$passord . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="fornavn">Fornavn</lable>
                                <input class="form-control" type="text" placeholder="Fornavn" name="fornavn" id="foravn" value="' . @$fornavn . '">
                                <lable for="etternavn">Etternavn</lable>
                                <input class="form-control" type="text" placeholder="Etternavn" name="etternavn" id="etternavn" value="' . @$etternavn . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="fodselsdato">Fodselsdato</lable>
                                <input class="form-control" type="text" placeholder="Fodselsdato" name="fodselsdato" id="fodselsdato" value="' . @$fodselsdato . '">
                                <lable for="land">Land</lable>
                                '; 
                            echo landListe($landID);
                            echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="epost">E-post</lable>
                                <input class="form-control" type="text" placeholder="E-post" name="epost" id="epost" value="' . @$epost . '">
                                <lable for="mobilnr">Mobilnummer</lable>
                                <input class="form-control" type="text" placeholder="Mobilnummer" name="mobilnr" id="mobilnr" value="' . @$mobilnr . '" required>
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group col-md-6">
                                <lable for="brukernavn">Brukernavn</lable>
                                <input class="form-control" type="text" placeholder="Brukernavn" name="brukernavn" id="brukernavn" value="' . @$brukernavn . '" required>
                                <lable for="passord">Passord</lable>
                                <input class="form-control" type="text" placeholder="Passord" name="passord" id="passord" value="' . @$passord . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="fornavn">Fornavn</lable>
                                <input class="form-control" type="text" placeholder="Fornavn" name="fornavn" id="foravn" value="' . @$fornavn . '">
                                <lable for="etternavn">Etternavn</lable>
                                <input class="form-control" type="text" placeholder="Etternavn" name="etternavn" id="etternavn" value="' . @$etternavn . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="fodselsdato">Fodselsdato</lable>
                                <input class="form-control" type="text" placeholder="Fodselsdato" name="fodselsdato" id="fodselsdato" value="' . @$fodselsdato . '">
                                <lable for="land">Land</lable>';
                        echo landListe();
                        echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="epost">E-post</lable>
                                <input class="form-control" type="text" placeholder="E-post" name="epost" id="epost" value="' . @$epost . '">
                                <lable for="mobilnr">Mobilnummer</lable>
                                <input class="form-control" type="text" placeholder="Mobilnummer" name="mobilnr" id="mobilnr" value="' . @$mobilnr . '" required>
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
            <h2>Alle Klasser</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Brukernavn</th>
                        <th>Fornavn</th>
                        <th>Etternavn</th>
                        <th>Født</th>
                        <th>Land</th>
                        <th>Epost</th>
                        <th>Mobilnr</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT b.id AS brukerID, b.brukernavn, b.passord, p.id AS personID, p.fornavn, p.etternavn, p.fodselsdato, b.land_id, l.navn, b.epost, b.mobilnr FROM bruker b LEFT JOIN person p ON b.person_id = p.id LEFT JOIN land l ON b.land_id = l.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $brukerID = utf8_encode($row["brukerID"]);
                                    $personID = utf8_encode($row["personID"]);
                                    $brukernavn = utf8_encode($row["brukernavn"]);
                                    $passord = utf8_encode($row["passord"]);
                                    $fornavn = utf8_encode($row["fornavn"]);
                                    $etternavn = utf8_encode($row["etternavn"]);
                                    $fodselsdato = utf8_encode($row["fodselsdato"]);
                                    $land = utf8_encode($row["navn"]);
                                    $epost = utf8_encode($row["epost"]);
                                    $mobilnr = utf8_encode($row["mobilnr"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $brukerID . '"></td>
                                                <td>' . $brukernavn . '</td>
                                                <td>' . $fornavn . '</td>
                                                <td>' . $etternavn . '</td>
                                                <td>' . $fodselsdato . '</td>
                                                <td>' . $land . '</td>
                                                <td>' . $epost . '</td>
                                                <td>' . $mobilnr . '</td>
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