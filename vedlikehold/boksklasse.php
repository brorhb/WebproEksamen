<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "SELECT * FROM klasse;";
    $result = connectDB()->query($sql);
    $antallRader = mysqli_num_rows($sqlResultat);
    
    for ($r = 1; $r <= $antallRader; $r++) {
        $rad = mysqli_fetch_array($sqlResultat);
        $klasse = $rad["klasse"];
        
        
        print("<option value='$klasse'></option>");
    }
?>