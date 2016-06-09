<?php
	include_once ('head.php');
?>

<?php
	$fraLand = @$_POST["fraFlyplass_id"];
	$tilLand = @$_POST["tilFlyplass_id"];
	$fraDato = @$_POST["fraDato"];
	$tilDato = @$_POST["tilDato"];
	$reisevalg = @$_POST["reisevalg"];
	$antallReisende = @$_POST["antallReisende"];
?>

<!-- innhold -->
<div class="container">
	<div class="prisboks">
		<div class="col-md-6 col-md-offset-3">
			<h1>Total pris</h1>
			<h3>Reisen består av totalt <?php echo $antallReisende; ?> reisende, totalt blir prisen 999,- på reisen til <?php echo $tilLand; ?></h3>
			<a class="btn btn-default pull-right" href="bekreftelsereise.php">Bekreft</a>
		</div>
	</div>
</div>
<!-- innhold -->

<?php
	include_once ('end.php');
?>