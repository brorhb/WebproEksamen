<?php
    include_once ("head.php");
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "web-is-gr02w";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected successfully";

        return $conn;
    }
?>



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