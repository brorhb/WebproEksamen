<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    connectDB();
    $sql = "SELECT * FROM klasse;";
    $result = connectDB()->query($sql);

?>




<!-- Innhold -->
<form action="alleklasser.php">
<div class="col-md-12">
    <h2>Endre Klasser</h2>
<table class="table table-striped"> 
    <form action="alleklasser.php">
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="fraKlasse">Fra klasse</lable>
                    <input class="form-control" type="text" placeholder="Klassetype" name="fraKlasse" id="fraKlasse" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="tilKlasse">Til klasse</lable>
                    <input class="form-control" type="text" placeholder=" " name="tilKlasse" id="tilKlasse" required>
                </div>
            </div>
<!--
       <thead>
            <tr>
                <th>Type</th>
              
            </tr>
        </thead> 
        <tbody>
            
        </tbody>
    </table> -->
   <div class="col-md-12">
            <input type="submit" class="btn btn-info" value="Endre">
    </div>
</div>
</form>
<!-- Innhold -->


<?php
    include_once ("end.php");
?> -->