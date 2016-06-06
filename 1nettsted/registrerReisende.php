<?php
	include_once ('head.php');
?>
<div class="container" style="margin-top:55px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<h2>Registrer reisende</h2>
		</div>
		
		<div class="col-md-10 col-md-offset-1">
			<form method="" action="prisside.php" name="registrerReisende" id="registrerReisende" onsubmit="return validerReisende()">
				<div class="form-group">
<?php
					$fraLand = $_GET["fraFlyplass_id"];
					$tilLand = $_GET["tilFlyplass_id"];
					$fradato = $_GET["fradato"];
					$tildato = $_GET["tildato"];
					$antallVoksene = $_GET["antallVoksene"];
					$antallUnge = $_GET["antallUnge"];
					$reisevalg = $_GET["reisevalg"];
					$antallReisende = $antallUnge + $antallVoksene;
					
					if ($antallReisende != 0) {
						$x = 1;
						while ( $x <= $antallReisende) {
?>

					<div class='reisende'>
						<div class='col-md-12'>
							<h3>Reisende nummer: <?php print($x); ?></h3>
						</div>
						<div class='col-md-6'>
							<label for='fornavn'>Fornavn</label>
							<input type='text' class='form-control' name='fornavn' id='fornavn' placeholder='Fornavn' required /> </div>
						<div class='col-md-6'>
							<label for='etternavn'>Etternavn</label>
							<input type='text' class='form-control' name='etternavn' id='etternavn' placeholder='Etternavn' required /> </div>
						<div class='col-md-6'>
							<label for='epost'>Epost</label>
							<input type='email' class='form-control' name='email' id='email' placeholder='eksempel@bjarvin.no' required /> </div>
						<div class='col-md-6'>
							<label for='kjonn'>Kjønn</label>
							<select class='form-control' name='kjonn' id='kjonn'>
							<option disabled selected value=''>Kjønn</option>
							<option value='1'>Mann</option>
							<option value='2'>Kvinne</option>
							</select>
						</div>
						<div class='col-md-6'>
							<label for='mobilnummer'>Mobilnummer</label>
							<input type='text' class='form-control' name='mobilnummer' id='mobilnummer' placeholder='99999999' required /> </div>
						<div class='col-md-6'>
							<label for='dob'>Fødselsdato</label>
							<input type='text' class='form-control' name='dob' id='dob' placeholder='mm/dd/yyyy' required /> </div>
						</div>
<?php 
							$x++;
							} //end while loop
					} // end if
 ?>					
					
				</div>
				
				<input type="hidden" name="antallVoksene" value="<?php echo $antallVoksene; ?>"/>
				<input type="hidden" name="antallUnge" value="<?php echo $antallUnge; ?>"/>
				<input type="hidden" name="reisevalg" value="<?php echo $reisevalg; ?>"/>
				<input type="hidden" name="fraLand" value="<?php echo $fraLand; ?>"/>
				<input type="hidden" name="tilLand" value="<?php echo $tilLand; ?>"/>
				<input type="hidden" name="fraDato" value="<?php echo $fraDato; ?>"/>
				<input type="hidden" name="tilDato" value="<?php echo $tilDato; ?>"/>
				
				<input type="submit" class="btn btn-default pull-right" value="Bekreft">
			</form>
		</div>
	</div>
</div>
<?php
	include_once ('end.php');
?>