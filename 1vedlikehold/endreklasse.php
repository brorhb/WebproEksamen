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
<form action="alleklasser.php">
<div class="col-md-12">
    <h2>Alle Klasser</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <div class="col-md-12">
            <input type="submit" class="btn btn-info" value="Endre">
    </div>
</div>
</form>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>