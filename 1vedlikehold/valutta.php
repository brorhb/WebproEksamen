<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "SELECT * FROM valuta;";
    $result = connectDB()->query($sql);
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Alle Bestillinger</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Valgt</th>
                <th>Navn</th>
                <th>Forkortelse</th>
            </tr>
        </thead>
        <tbody>
            <form>
                <?php
                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $valuta_navn = utf8_encode($row["valuta_navn"]);
                            $forkortelse = utf8_encode($row["forkortelse"]);
                            echo '<tr><td><input type="radio" name="id" value="' . $id . '"></td><td>'. $valuta_navn . '</td><td>' . $forkortelse . '</td></tr>';
                    }
                }
                ?>
            </form>
        
        </tbody>
    </table>
    <div class="col-md-1">
        <a href="endrevalutta.php" class="btn btn-info">Endre</a>
    </div>
    <div class="col-md-1 col-md-offset-4 text-center">
        <a href="leggtilvalutta.php" class="btn btn-success">Legg til</a>
    </div>
    <div class="col-md-1 col-md-offset-4 pull-right">
        <a href="slettvalutta.php" class="btn btn-danger">Slett</a>
    </div>
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>