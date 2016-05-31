<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "SELECT * FROM klasse;";
    $result = connectDB()->query($sql);

    if ($_POST['endre']) {
        # code...
    }

    elseif ($_POST['slett']) {
        # code...
    }

    elseif ($_POST['ny']) {
        # code...
    }
    
    else {
        echo '
        <!-- Innhold -->
        <div class="col-md-12">
            <form method="post" action=" ' . $_SERVER['PHP_SELF'] . ' ">
            <h2>Alle Klasser</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Klassenavn</th>
                    </tr>
                </thead>
                    <tbody>';

                        
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
        <!-- Innhold -->';   
    }


?>



<?php
    include_once ("end.php");
?>