<?php
    include_once ("head.php");
?>



<!-- Innhold -->
<div class="col-md-12">
    <h2>Alle brukere</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Valgte</th>
                <th>BrukerID</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Født</th>
                <th>Epost</th>
                <th>Mobil</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <div class="col-md-1">
        <a href="endrebruker.php" class="btn btn-info">Endre</a>
    </div>
    <div class="col-md-1 col-md-offset-4 text-center">
        <a href="leggtilbruker.php" class="btn btn-success">Legg til</a>
    </div>
    <div class="col-md-1 col-md-offset-4 pull-right">
        <a href="slettbruker.php" class="btn btn-danger">Slett</a>
    </div>
</div>
<!-- Innhold -->


<?php
    include_once ("end.php");
?>