<?php
    include_once ("head.php");
    connectDB();

        $sqlSetning = "SELECT * FROM klasse ;";
        $sqlResultat = mysqli_query ($db, $sqlSetning) or die ("Kunne ikke hente data fra databasen ");
        $antallRader = mysqli_num_rows($sqlResultat);
?>
<p>Registrerte klasser</p>
        <table border="1">
           <tr>
               <th align="left">førsteklasse</th>
               <th aligin="left">buissnessklasse</th>
                <th aligin="left">økonimiklasse</th>
            </tr>
        
<?php
        include("db-tilkobling.php");
        for ($r = 1; $r <= $antallRader; $r++) {
            $rad = mysqli_fetch_array($sqlResultat);
            $førsteklasse = $rad["førsteklasse"];
            $buissnessklasse = $rad["buissnessklasse"];
            $økonomiklasse = $rad["økonomiklasse"];
            $filnavn = $rad["filnavn"];

            print ("
            <tr>
                <td>$førsteklasse</td>
                <td>$buissnessklasse</td>
            </tr>");
        }
?>

        </table>





<!-- Innhold -->
<div class="col-md-12">
    <h2>Alle Klasser</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Valgt</th>
                <th>Klassenavn</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <div class="col-md-1">
        <a href="endreklasse.php" class="btn btn-info">Endre</a>
    </div>
    <div class="col-md-1 col-md-offset-4 text-center">
        <a href="leggtilklasse.php" class="btn btn-success">Legg til</a>
    </div>
    <div class="col-md-1 col-md-offset-4 pull-right">
        <a href="#" class="btn btn-danger">Slett</a>
    </div>
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>