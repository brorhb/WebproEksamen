<?php
    $host = "localhost";
    $user = "web-is-gr04p";
    $password = "39845";
    $database = "web-is-gr04p";

    $db = mysqli_connect($host, $user, $password, $database) or die ("Ikke forbindelse med databasen");
    /*$conn = new mysqli($host, $user, $password, $database);
    
    if ($conn -> connect_error) {
        die ("Ikke forbindelse med databasen: " . $conn -> connect_error);
    }*/
?>