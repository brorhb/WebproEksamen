<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "INSERT INTO type_luftfartoy (type)
VALUES ('John', 'Doe', 'john@example.com')";

if ($connectDB()->query($sql) === TRUE) {
    echo "Flytype er registrert";
} else {
    echo "Feil: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Nytt Fly</h2>
        <form action="allefly.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="type">Flytype</lable>
                    <input class="form-control" type="text" placeholder="Helikopter" name="type" id="modell" required>
                </div>
            </div>
        <div class="col-md-12">
            <input type="submit" class="btn btn-info" value="Endre">
        </div>
    </form>
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>