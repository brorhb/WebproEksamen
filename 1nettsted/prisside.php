<?php
    include_once ('head.php');
?>


<!-- innhold -->
<div class="container">
    <div class="prisboks">
        <div class="col-md-6 col-md-offset-3">
            <h1>Total pris</h1>
            <h3>Reisen består av <?php echo $antallVoksene; ?> voksene og <?php echo $antallUnge; ?> unge, totalt blir prisen 999,- på reisen til <?php echo $tilLand; ?></h3>
            <a class="btn btn-default pull-right" href="bekreftelsereise.php">Bekreft</a>
        </div>
    </div>
</div>
<!-- innhold -->

<?php
    include_once ('end.php');
?>