<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "SELECT * FROM klasse;";
    $result = connectDB()->query($sql);

    if ($_POST['endreklasse']) {
?>
            <!-- Innhold -->
            <form action="<?php $_SERVER['PHP_SELF']; ?>" id="klasse" method="GET">
            <div class="col-md-12">
                <h2>Endre Klasser</h2>
                    <div class="col-md-6">
                        <div class="form-group">
                            <lable for="klassenavn">klassenavn</lable>
                            <input class="form-control" type="text" placeholder="Klassetype" name="klassenavn" id="klassenavn" required>
                        </div>
                    </div>
               <div class="col-md-12">
                    <input type="submit" id="endre" name="endre" class="btn btn-info" value="lagre">
                </div>
            </div>
            </form>
            <!-- Innhold -->
<?php
        @$endre = $_POST["endre"];
        $type = $_POST["klassenavn"];

        if ($endre) {
            oppdaterKlasse($klasseID, $type);
            echo "Klassen ble endret";
        } else {
            echo "Noe gikk galt";
        }

    }


    elseif ($_POST['slett']) {

        # code...
    }

    elseif ($_POST['ny']) {
?>       
            <div class="col-md-12">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?> " id="klasse">
             <h2>Legg til klasse</h2>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Klassenavn">Klassenavn</lable>
                    <input type="text" class="form-control" name="klassenavn" id="klassenavn">
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-info" value="Legg til">
            </div>
            </form>
            </div>

<?php        
    }
    
    else {
?>

        <div class="col-md-12">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <h2>Alle Klasser</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Klassenavn</th>
                    </tr>
                </thead>
                    <tbody>

                        <?php
                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $klasseID = utf8_encode($row["id"]);
                                    $type = utf8_encode($row["type"]);
                                    echo '<tr><td><input type="radio" name="id" value="' . $klasseID . '"></td><td>' . $type . '</td></tr>';
                                }
                            }
                        ?>
                    
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endreklasse" class="btn btn-info" value="Endre" />
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
    <?php  
    }
    ?>


<?php
    include_once ("end.php");
?>