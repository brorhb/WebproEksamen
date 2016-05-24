<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Alle Bestillinger</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Valgt</th>
                <th>LandID</th>
                <th>Navn</th>
                <th>Landskode</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <div class="col-md-1">
        <a href="endreland.php" class="btn btn-info">Endre</a>
    </div>
    <div class="col-md-1 col-md-offset-4 text-center">
        <a href="leggtilland.php" class="btn btn-success">Legg til</a>
    </div>
    <div class="col-md-1 col-md-offset-4 pull-right">
        <a href="slettland.php" class="btn btn-danger">Slett</a>
    </div>
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>