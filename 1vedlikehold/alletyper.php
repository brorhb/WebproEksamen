<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    
    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettType_luftfartoy($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $id = @$_POST['id'];
        $type = $_POST['type'];

        if(validerType($type)) {
            oppdaterType_luftfartoy($id, $type);
            echo "Informasjonen ble oppdatert.";
            $feiletPHPvalidering=false;
        }
        else {
            $feiletPHPvalidering = true;
        }
    }
    if (@$_POST['ny'] || @$_POST['endre'] || $feiletPHPvalidering) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" name="oppdater" method="post" onsubmit="return validerTypeLuftfartoy()">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Ny type</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre type</h2>';
                }
        echo '
            <div class="col-md-6">';
                
                    connectDB();
                    $sql = "SELECT * FROM type_luftfartoy WHERE id='$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $type = utf8_encode($row["type"]);
                            echo '
                            <div class="form-group">
                                <lable for="type">type</lable>
                                <input class="form-control" type="text" placeholder="type" name="type" id="type" value="' . @$type . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '">
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group">
                                <lable for="type">type</lable>
                                <input class="form-control" type="text" placeholder="type" name="type" id="type" value="' . @$type . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '">
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
            <h2>Alle typer</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Type</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT * FROM type_luftfartoy;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $type = utf8_encode($row["type"]);
                                    echo '<tr><td><input type="radio" name="id" value="' . $id . '"></td><td>' . $type . '</td></tr>';
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