<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    
    if ($_POST['slett']) {
        $id = @$_POST['id'];
        if(slettBruker($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif ($_POST['lagre']) {
        $id = @$_POST['id'];
        $passord = $_POST['passord'];
        $fornavn = $_POST['fornavn'];
        $etternavn = $_POST['etternavn'];
        $dob = $_POST['fodselsdato'];
        $land = $_POST['land_id'];
        $epost = $_POST["epost"];
        $mobil = $_POST["mobilnr"];

        if(oppdaterBruker($id, $passord, $fornavn, $etternavn, $dob, $land, $epost, $mobil)) {
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
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post">
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
                    $sql = "SELECT b.id, b.passord, p.fornavn, p.etternavn, p.fodselsdato, b.land_id, l.navn, b.epost, b.mobilnr FROM bruker b LEFT JOIN person p ON b.person_id = p.id LEFT JOIN land l ON b.land_id = l.id WHERE b.id = '$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["b.id"]);
                            $passord = utf8_encode($row["passord"]);
                            $fornavn = utf8_encode($row["fornavn"]);
                            $etternavn = utf8_encode($row["etternavn"]);
                            $dob = utf8_encode($row["fodselsdato"]);
                            $land = utf8_encode($row["navn"]);
                            $epost = utf8_encode($row["epost"]);
                            $mobil = utf8_encode($row["mobilnr"]);
                            echo '
                            <div class="form-group col-md-6">
                                <lable for="id">Bruker ID</lable>
                                <input class="form-control" type="text" placeholder="Bruker ID" name="id" id="id" value="' . @$id . '" disabled required>
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
                                <input class="form-control" type="text" placeholder="DDMMYYYY" name="fodselsdato" id="fodselsdato" value="' . @$dob . '">
                                <lable for="land">Land</lable>
                                <select required value="" class="form-control" name="land" id="land">
                                    <option disabled selected>Velg land</option>
                                    ' . landliste() . '
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="epost">E-post</lable>
                                <input class="form-control" type="text" placeholder="E-post" name="epost" id="epost" value="' . @$epost . '">
                                <lable for="mobil">Mobilnummer</lable>
                                <input class="form-control" type="text" placeholder="Mobilnummer" name="mobil" id="mobil" value="' . @$mobil . '" required>
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group col-md-6">
                                <lable for="id">Bruker ID</lable>
                                <input class="form-control" type="text" placeholder="Bruker ID" name="id" id="id" value="' . @$id . '" disabled required>
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
                                <input class="form-control" type="text" placeholder="DDMMYYYY" name="fodselsdato" id="fodselsdato" value="' . @$dob . '">
                                <lable for="land">Land</lable>
                                <input class="form-control" type="text" placeholder="Land" name="land" id="land" value="' . @$land . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="epost">E-post</lable>
                                <input class="form-control" type="text" placeholder="E-post" name="epost" id="epost" value="' . @$epost . '">
                                <lable for="mobil">Mobilnummer</lable>
                                <input class="form-control" type="text" placeholder="Mobilnummer" name="mobil" id="mobil" value="' . @$mobil . '" required>
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
                        <th>Bruker ID</th>
                        <th>Fornavn</th>
                        <th>Etternavn</th>
                        <th>Født</th>
                        <th>Land</th>
                        <th>Epost</th>
                        <th>Mobil</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT b.id, b.passord, p.fornavn, p.etternavn, p.fodselsdato, b.land_id, l.navn, b.epost, b.mobilnr FROM bruker b LEFT JOIN person p ON b.person_id = p.id LEFT JOIN land l ON b.land_id = l.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $passord = utf8_encode($row["passord"]);
                                    $fornavn = utf8_encode($row["fornavn"]);
                                    $etternavn = utf8_encode($row["etternavn"]);
                                    $dob = utf8_encode($row["fodselsdato"]);
                                    $land = utf8_encode($row["navn"]);
                                    $epost = utf8_encode($row["epost"]);
                                    $mobil = utf8_encode($row["mobilnr"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $id . '"></td>
                                                <td>' . $id . '</td>
                                                <td>' . $fornavn . '</td>
                                                <td>' . $etternavn . '</td>
                                                <td>' . $dob . '</td>
                                                <td>' . $land . '</td>
                                                <td>' . $epost . '</td>
                                                <td>' . $mobil . '</td>
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