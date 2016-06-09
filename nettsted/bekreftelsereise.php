<?php
    include_once ('head.php');
?>

<!-- Reise info -->
<div class="col-md-12 reiseInfo">
    <div class="row">
        <div class="col-md-8">
            <?php
                $fornavn = @$_POST["fornavn"];
                $etternavn = @$_POST["etternavn"];
                $epost = @$_POST["epost"];
                $mobil = @$_POST["mobil"];
                $date = @$_POST["date"];

                echo '<h2>fornavn' . $fornavn . ' etternavn ' . $etternavn . ' epost ' . $epost . ' mobil ' . mobil . ' date ' . $date . '</h2>';
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