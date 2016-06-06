<?php
	include_once ("head.php");
?>

<!-- Reise info -->
<div class="col-md-12 reiseInfo">
	<div class="row">
		<div class="col-md-12">
			<?php
				$fraLand = $_GET["fraFlyplass_id"];
				$tilLand = $_GET["tilFlyplass_id"];
				$fradato = $_GET["fradato"];
				$tildato = $_GET["tildato"];
				$antallVoksene = $_GET["antallVoksene"];
				$antallUnge = $_GET["antallUnge"];
				$reisevalg = $_GET["reisevalg"];

				connectDB();

				$sql = "SELECT id AS fraID, navn AS fraNavn, (SELECT id FROM flyplass WHERE id='$tilLand') AS tilID, (SELECT navn FROM flyplass WHERE id='$tilLand') AS tilNavn FROM flyplass WHERE id='$fraLand';";
				$result = connectDB()->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$fraID = utf8_encode($row["fraID"]);
						$fraNavn = utf8_encode($row["fraNavn"]);
						$tilID = utf8_encode($row["tilID"]);
						$tilNavn = utf8_encode($row["tilNavn"]);

						echo '<h2>' . $fraNavn . ' til ' . $tilNavn . '</h2>';
				?>

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="bestillReiseSkjema" name="bestillReiseSkjema" onsubmit="return validerBestilling()">
					<div class="row" id="reiseEndring">
						<div class="col-md-6">

						<!-- Fra/til land -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="Fra"><h4>Fra</h4></label>
											<?php fraFlyplassListe($fraID); ?>
										</div>
									</div>

									<div class="col-md-6" id="retur">
										<div class="form-group">
											<label for="Til"><h4>Til</h4></label>
											<?php tilFlyplassListe($tilID); ?>
										</div>
									</div>
								</div><!-- /row -->
						<!-- Fra/til land -->


						<!-- antall voksene -->
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<h4>Antall Voksene</h4>
									<select class="form-control" name="antallVoksene" id="antallVoksene">
										<option selected value='<?php echo $antallVoksene; ?>'><?php echo $antallVoksene . ' Voksene'; ?></option>
										<option value="0">0 Voksene</option>
										<option value="1">1 Voksen</option>
										<option value="2">2 Voksene</option>
										<option value="3">3 Voksene</option>
										<option value="4">4 Voksene</option>
										<option value="5">5 Voksene</option>
										<option value="6">6 Voksene</option>
										<option value="7">7 Voksene</option>
										<option value="8">8 Voksene</option>
										<option value="9">9 Voksene</option>
									</select>
								</div>
							</div>
						<!-- antall voksene -->

						<!-- antall unge -->
						<div class="col-md-3">
							<div class="form-group">
								<h4>Antall Unge</h4>
								<select class="form-control" name="antallUnge" id="antallUnge">
									<option selected value='<?php echo $antallUnge; ?>'><?php echo $antallUnge . ' Unge'; ?></option>
									<option value="0">0 Unge(0-25)</option>
									<option value="1">1 Unge</option>
									<option value="2">2 Unge</option>
									<option value="3">3 Unge</option>
									<option value="4">4 Unge</option>
									<option value="5">5 Unge</option>
									<option value="6">6 Unge</option>
									<option value="7">7 Unge</option>
									<option value="8">8 Unge</option>
									<option value="9">9 Unge</option>
								</select>
							</div>
						</div>
						<!-- antall unge -->

						<!-- Radio knapper -->
									
								<?php
									echo '
									<div class="col-md-6" style="margin-top:30px;">
										<div class="radio" name="reiseType" id="reiseType">
											<div class="col-md-6">
												<label><input type="radio" name="reisevalg" id="turRetur" value="1"';
												if ($reisevalg == '1') {
												   echo 'checked';
												}
												echo'
												>Tur/Retur</label>
											</div>
											<div class="col-md-6">
												<label><input type="radio" name="reisevalg" id="enVei" value="2"';
												if ($reisevalg == '2') {
												   echo 'checked';
												}
												echo'
												>En vei</label>
											</div>
										</div>
									</div>
									';

								?>
						</div>
						<!-- Radio knapper -->

						<div class="row">
						<!-- Dato -->
								<div class="col-md-6" id="fraDato">
									<div class="form-group" id="fraDato">
										<label for="Fra"><h4>Fra dato </h4></label>
										<input class="form-control" type="text" class="span2" value="<?php echo $fradato; ?>" id="dpd1" name="fradato" required>
									</div>
								</div>
								<div class="col-md-6" id="tilDato">
									<div class="form-group" id="tilDato">
										<label for="Til"><h4>Til dato </h4></label>
										<input class="form-control" type="text" class="span2" value="<?php echo $tildato; ?>" id="dpd2" name="tildato" required>
									</div>
								</div>

						<!-- Dato -->
						</div>
						</div>  
					</div>
					
					<div class="knapp">
						<input type="button" id="endreReise" class="btn btn-default pull-right" value="Endre reisen"/>
					</div>
					</form>
				</div>
				<!-- Reise info -->

				<?php
					}
				}

			?>
		</div>
	</div>



<!-- innhold -->
<div class="container">
	<!-- Avgang -->
	<form action="registrerReisende.php" method="get">
	<input type="hidden" name="antallVoksene" value="<?php echo $antallVoksene; ?>"/>
	<input type="hidden" name="antallUnge" value="<?php echo $antallUnge; ?>"/>
	<input type="hidden" name="reisevalg" value="<?php echo $reisevalg; ?>"/>
	<input type="hidden" name="fraLand" value="<?php echo $fraLand; ?>"/>
	<input type="hidden" name="tilLand" value="<?php echo $tilLand; ?>"/>
	<input type="hidden" name="fraDato" value="<?php echo $fraDato; ?>"/>
	<input type="hidden" name="tilDato" value="<?php echo $tilDato; ?>"/>

		<div class="col-md-10 col-md-offset-1">
			<h2><span class="glyphicon glyphicon-plane"></span> Avganger</h2>
			<table class="table">
				<thead>
					<tr>
						<th><h4>Flight</h4></th>
						<th><h4>Fra</h4></th>
						<th><h4>Avgang</h4></th>
						<th><h4>Til</h4></th>
						<th><h4>Landing</h4></th>
						<th><h4>Valgt</h4></th>
					</tr>
				</thead>
				<tbody>
<?php
					connectDB();
					$sql = "SELECT f.id AS flyvningNr, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fraFlyplass, f.avgang AS avgang, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS tilFlyplass FROM flyvning f LEFT JOIN rute_kombinasjon rk ON f.rute_kombinasjon_id = rk.id LEFT JOIN luftfartoy l ON f.luftfartoy_id = l.id;";
					$result = connectDB()->query($sql);

						if($result->num_rows > 0 ) {
							while ($row = $result->fetch_assoc()) {
								$flyvningNr = utf8_encode($row["flyvningNr"]);
								$fraFlyplass = utf8_encode($row["fraFlyplass"]);
								$avgang = utf8_encode($row["avgang"]);
								$tilFlyplass = utf8_encode($row["tilFlyplass"]);
?>
					<tr>
						<td><?php echo $flyvningNr; ?></td>
						<td><?php echo $fraFlyplass; ?></td>
						<td><?php echo $avgang; ?></td>
						<td><?php echo $tilFlyplass; ?></td>
						<td></td>
						<td><input type="radio" name="id" value="<?php echo $flyvningNr; ?>"></td>
					</tr>
<?php
							}
						}
?>
				</tbody>
			</table>
			<h3 class="pull-right">Pris</h3>
		</div>
		<!-- Avgang -->

		<!-- Retur -->
		<div class="col-md-10 col-md-offset-1">
			<h2><span class="glyphicon glyphicon-plane"></span> Retur</h2>
			<table class="table">
				<thead>
					<tr>
						<th><h4>Flight</h4></th>
						<th><h4>Fra</h4></th>
						<th><h4>Avgang</h4></th>
						<th><h4>Til</h4></th>
						<th><h4>Landing</h4></th>
						<th><h4>Valgt</h4></th>
					</tr>
				</thead>
			</table>
			<h3 class="pull-right">Pris</h3>
		</div>
		<!-- Retur -->
		<div class="col-md-10 col-md-offset-1">
			<input type="submit" class="btn btn-default pull-right" value="Bekreft"/>
		</div>
	</form>
	</div>
<!-- innhold -->

<?php include_once ("end.php"); ?>
	