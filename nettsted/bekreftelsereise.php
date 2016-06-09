<?php
    include_once ('head.php');
?>

<!-- Reise info -->
<div class="col-md-12 reiseInfo">
    <div class="row">
        <div class="col-md-8">
            <?php
                $fraLand = @$_GET["fraLand"];
                $tilLand = @$_GET["tilLand"];
                $fradato = @$_GET["fradato"];
                $tildato = @$_GET["tildato"];
                $antallVoksene = @$_GET["antallVoksene"];
                $antallUnge = @$_GET["antallUnge"];
                $reisevalg = @$_GET["reisevalg"];
                echo '<h2>' . $fraLand . ' til ' . $tilLand . '</h2>';
            ?>
        </div>
    </div>
</div>
<!-- Reise info -->

<!-- innhold -->
<div class="container">
    <div class="prisboks text-center">
        <h1 class="fa fa-thumbs-o-up fa-5" aria-hidden="true"></h1>
        <p>Takk, din bestilling er gjennomført. </br>
           Ditt referanse nummer er <strong>HFHG5422</strong>. </br>
           Dette blir også sendt til deg på epost.
        </p>
        <a href="index.php" class="btn btn-default">Send</a>   
    </div>
</div>
<!-- innhold -->

<?php
    include_once ('end.php');
?>