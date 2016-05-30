<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "SELECT * FROM type_luftfartoy;";
    $result = connectDB()->query($sql);
?>





<!-- Innhold -->
<div class="col-md-12">
    <h2>Alle typer</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Valgt</th>
                <th>ID</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <form>
                <?php
                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = uff8_encode($row["id"]);
                            $type = utf8_encode($row["type"]);
                            echo '<tr><td><input type="radio" name="id" value="' . $id . '"></td><td>' . $type . '</td></tr>';
                        }
                    }
                ?>
            </form>    
            
        </tbody>
    </table>
    <div class="col-md-1">
        <a href="endretype.php" class="btn btn-info">Endre</a>
    </div>
    <div class="col-md-1 col-md-offset-4 text-center">
        <a href="leggtiltype.php" class="btn btn-success">Legg til</a>
    </div>
    <div class="col-md-1 col-md-offset-4 pull-right">
        <a href="#" class="btn btn-danger">Slett</a>
    </div>
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>