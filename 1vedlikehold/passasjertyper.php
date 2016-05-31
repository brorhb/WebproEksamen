<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "SELECT * FROM passasjertype;";
    $result = connectDB()->query($sql);

    if ($_POST['endre']) {
?>
            <!-- Innhold -->
            <form action="<?php $_SERVER['PHP_SELF']; ?>" id="passasjertype" method="GET">
            <div class="col-md-12">
                <h2>Endre passasjertype</h2>
                    <div class="col-md-6">
                        <div class="form-group">
                            <lable for="passasjertype">passasjertype</lable>
                            <input class="form-control" type="text" placeholder="passasjertype" name="passasjertype" id="passasjertype" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <lable for="fraAlder">Fra alder</lable>
                            <input class="form-control" type="text" placeholder="10" name="fraAlder" id="fraAlder" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <lable for="tilAlder">Tra alder</lable>
                            <input class="form-control" type="text" placeholder="20" name="tilAlder" id="tilAlder" required>
                        </div>
                    </div>
               <div class="col-md-12">
                    <input type="submit" name="endrepassasjertype" class="btn btn-info" value="Endre">
                </div>
            </div>
            </form>
            <!-- Innhold -->
<?php
        @$endrepassasjertypeknapp = $_POST["endrepassasjertype"];
        if ($endreklasseknapp) {
            $passasjertype = $_POST["passasjertype"];

            if (!$passasjertype) {
                echo "Alle feltene må fylles ut";
            }
            else {

            }
        }

    }

    elseif ($_POST['slett']) {

        # code...
    }

    elseif ($_POST['ny']) {
?>       
            <div class="col-md-12">
            <form method="post" action=" <?php $_SERVER['PHP_SELF']; ?> "?id="klasse">
             <h2>Legg til passasjertype</h2>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="Passasjertype">Passasjertype</lable>
                    <input type="text" class="form-control" name="passasjertype" id="passasjertype">
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
            <form method="post" action=" <?php $_SERVER['PHP_SELF']; ?> ">
            <h2>Alle passasjertyper</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Passasjertype</th>
                    </tr>
                </thead>
                    <tbody>

                        <?php
                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $type = utf8_encode($row["type"]);
                                    $beskrivelse = utf8_encode($row["beskrivelse"]);
                                    echo '<tr><td><input type="radio" name="id" value="' . $id . '"></td><td>' . $type . '</td><td>' . $beskrivelse . '</td></tr>';
                                }
                            }
                        ?>
                    
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
    <?php  
    }
    ?>


<?php
    include_once ("end.php");
?>