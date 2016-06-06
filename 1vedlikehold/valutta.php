<?php
    include_once("lib/funksjoner.php");
    krevInnlogging('0');
    include_once("head.php");


    if (@$_POST['slett']) {
        $ValutaID = @$_POST['id'];
        if (slettValuta($ValutaID)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $ValutaID = @$_POST['id'];
        $valuta_navn = $_POST['valuta_navn'];
        $forkortelse = $_POST['forkortelse'];

        if(validerValuta($valuta_navn,$forkortelse)){
            oppdaterValuta($ValutaID, $valuta_navn, $forkortelse);
            echo "Informasjonen ble oppdatert.";
            $feiletPHPvalidering=false;
        }
        else {
            $feiletPHPvalidering = true;
        }
    }
    if (@$_POST['ny'] || @$_POST['endre'] || $feiletPHPvalidering) {
        // Hvis endre eller ny er trykket ned
        $ValutaID = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerOppdaterValuta ();">
            <div class="col-md-12">';
                if (@$_POST['ny']) {
                    echo '<h2>Ny valuta</h2>';
                }
                elseif (@$_POST['endre']) {
                    echo '<h2>Endre valuta</h2>';
                }
        echo '
            <div class="col-md-6">';

                    connectDB();
                    $sql = "SELECT * FROM valuta WHERE id='$ValutaID';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $ValutaID = utf8_encode($row["id"]);
                            $valuta_navn = utf8_encode($row["valuta_navn"]);
                            $forkortelse = utf8_encode($row["forkortelse"]);
                            echo '
                            <div class="form-group">
                                <lable for="valuta">navn</lable>
                                <input class="form-control" type="text" placeholder="valuta" name="valuta_navn" id="valuta_navn" value="' . @$valuta_navn . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$ValutaID . '">
                            </div>
                            <div class="form-group">
                                <lable for="forkortelse">forkortelse</lable>
                                <input class="form-control" type="text" placeholder="forkortelse" name="forkortelse" id="forkortelse" value="' . @$forkortelse . '" required>
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group">
                                <lable for="valuta">valuta</lable>
                                <input class="form-control" type="text" placeholder="valuta" name="valuta_navn" id="valuta_navn" value="' . @$valuta_navn . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$ValutaID . '">
                            </div>
                            <div class="form-group">
                                <lable for="forkortelse">forkortelse</lable>
                                <input class="form-control" type="text" placeholder="forkortelse" name="forkortelse" id="forkortelse" value="' . @$forkortelse . '" required>
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
            <h2>Valuta</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Valuta</th>
                        <th>Forkortelse</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT * FROM valuta;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $ValutaID = utf8_encode($row["id"]);
                                    $valuta_navn = utf8_encode($row["valuta_navn"]);
                                    $forkortelse = utf8_encode($row["forkortelse"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $ValutaID . '"></td>
                                                <td>' . $valuta_navn . '</td>
                                                <td>' . $forkortelse . '</td>
                                          </tr>';
                                }
                            }

        echo '
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endre" class="btn btn-info" value="Endre" onclick="this.form.submited=this.name;"/>
                    </div>
                    <div class="col-md-1 col-md-offset-4 text-center">
                        <input type="submit" name="ny" class="btn btn-success" value="Legg til" onclick="this.form.submited=this.name;"/>
                    </div>
                    <div class="col-md-1 col-md-offset-4 pull-right">
                        <input type="submit" name="slett" class="btn btn-danger" value="Slett" onclick="this.form.submited=this.name;"/>
                    </div>
                </form>
        </div>
        <!-- Innhold -->
        ';






    include_once ("end.php");
?>
