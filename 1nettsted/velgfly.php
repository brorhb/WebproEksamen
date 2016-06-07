<?php include_once("head.php"); ?>


<!-- Reise info -->
<div class="col-md-12 reiseInfo">
	<div class="row">
		<div class="col-md-12">

				<?php $fraLand = @$_GET["fraFlyplass_id"];
				$tilLand = @$_GET["tilFlyplass_id"];
				$fraDato = @$_GET["fraDato"];
				$tilDato = @$_GET["tilDato"];
				$antallVoksene = @$_GET["antallVoksene"];
				$antallUnge = @$_GET["antallUnge"];
				$reisevalg = @$_GET["reisevalg"];

				connectDB();

				$sql = "SELECT id AS fraID, navn AS fraNavn, (SELECT id FROM flyplass WHERE id='$tilLand') AS tilID, (SELECT navn FROM flyplass WHERE id='$tilLand') AS tilNavn FROM flyplass WHERE id='$fraLand';";
				$result = connectDB()->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$fraID = utf8_encode($row["fraID"]);
						$fraNavn = utf8_encode($row["fraNavn"]);
						$tilID = utf8_encode($row["tilID"]);
						$tilNavn = utf8_encode($row["tilNavn"]); ?>

						<h2><?php echo $fraNavn; ?> til <?php echo $tilNavn; ?></h2>


						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="bestillReiseSkjema" name="bestillReiseSkjema" onsubmit="return validerBestilling()">
							<div class="row" id="reiseEndring">
								<div class="col-md-6">

									<!-- Fra/til land -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="Fra"><h4>Fra</h4></label>
												<?php echo fraFlyplassListe($fraID); ?>
											</div>
										</div>

										<div class="col-md-6" id="retur">
											<div class="form-group">
												<label for="Til"><h4>Til</h4></label>
												<?php echo tilFlyplassListe($tilID); ?>
											</div>
										</div>
									</div> <!-- /row -->
									<!-- Fra/til land -->

									<!-- antall reisende -->
									<div class="row">
										<div class="col-md-12">
										<?php
										$sql = "SELECT * FROM `passasjertype`";
										$result = connectDB()->query($sql);

										if ($result->num_rows > 0 ) {
											while ($row = $result->fetch_assoc())  {
												$id = utf8_encode($row["id"]);
												$type = utf8_encode($row["type"]);
												$beskrivelse = utf8_encode($row["beskrivelse"]);
													?>
												<div class="col-md-3" id="reisende">
												<?php
													echo '<label>' . $type . '</label>
													<input class="form-control" type="textfield" name="reisende[' . $id . ']" id="reisende[' . $id . ']" placeholder="' . $type . '" value="' . $_GET['reisende'][$id ] . '" >';
													?>
												</div>
												<?php
											}
										}
											?>
									</div>
									</div>
									<!-- antall reisende -->

									<!-- Radio knapper -->
									<div class="row">
										<div class="col-md-6" style="margin-top:30px;">
											<div class="radio" name="reiseType" id="reiseType">
												<div class="col-md-6">
													<label><input type="radio" name="reisevalg" id="turRetur" value="1" <?php if ($reisevalg == '1') { echo 'checked'; } ?> >Tur/Retur</label>
												</div>
												<div class="col-md-6">
													<label><input type="radio" name="reisevalg" id="enVei" value="2" <?php if ($reisevalg == '2') { echo 'checked'; } ?> >En vei</label>
												</div>
											</div>
										</div>
									</div>
									<!-- Radio knapper -->

									<!-- Dato -->
									<div class="row">
										<div class="col-md-6" id="fraDato">
											<div class="form-group" id="fraDato">
												<label for="Fra"><h4>Fra dato</h4></label>
												<input class="form-control" type="text" class="span2" value="<?php echo $fraDato; ?>" id="dpd1" name="fraDato" required>
											</div>
										</div>
										<div class="col-md-6" id="tilDato">
											<div class="form-group" id="tilDato">
												<label for="Til"><h4>Til dato</h4></label>
												<input class="form-control" type="text" class="span2" value="<?php echo $tilDato; ?>" id="dpd2" name="tilDato" required>
											</div>
										</div>
									</div>
									<!-- Dato -->

								</div>  
							</div>
							<div class="knapp">
								<input type="button" id="endreReise" class="btn btn-default pull-right" value="Endre reisen"/>
							</div>
						</form>
		</div>
					<?php }
				} ?>
	</div>
</div>
<!-- Reise info -->


<!-- innhold -->
<div class="container">

	<!-- Avgang -->
	<form action="registrerReisende.php" method="get">
		<?php
			$sql = "SELECT * FROM `passasjertype`";
			$result = connectDB()->query($sql);

			if ($result->num_rows > 0 ) {
				while ($row = $result->fetch_assoc())  {
					$id = utf8_encode($row["id"]);
					$type = utf8_encode($row["type"]);
					$beskrivelse = utf8_encode($row["beskrivelse"]);

					echo '<input class="form-control" type="hidden" name="reisende[' . $id . ']" id="reisende[' . $id . ']" placeholder="' . $type . '" value="' . $_GET['reisende'][$id ] . '" >';

				}
			}
		?>
		<?php
			$sql = "SELECT * FROM `passasjertype`";
			$result = connectDB()->query($sql);

			if ($result->num_rows > 0 ) {
				while ($row = $result->fetch_assoc())  {
					$id = utf8_encode($row["id"]);
					$type = utf8_encode($row["type"]);
					$beskrivelse = utf8_encode($row["beskrivelse"]);
		?>
					<div class="col-md-3" id="reisende">
		<?php
						echo '<input class="form-control" type="hidden" name="reisende[' . $id . ']" id="reisende[' . $id . ']" placeholder="' . $type . '" value="' . $_GET['reisende'][$id ] . '" >';
						?>
					</div>
					<?php
				}
			}
		?>
		<input type="hidden" name="reisevalg" value="<?php echo $reisevalg; ?>"/>
		<input type="hidden" name="fraLand" value="<?php echo $fraLand; ?>"/>
		<input type="hidden" name="tilLand" value="<?php echo $tilLand; ?>"/>
		<input type="hidden" name="fraDato" value="<?php echo $fraDato; ?>"/>
		<input type="hidden" name="tilDato" value="<?php echo $tilDato; ?>"/>


		<!-- Avgang -->
		<div class="col-md-10 col-md-offset-1">
			<h2><span class="glyphicon glyphicon-plane"></span>Avganger</h2>
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
					
					$fraLand = @$_GET["fraFlyplass_id"];
					$fraDato = @$_GET["fraDato"];
					$tilLand = @$_GET["tilFlyplass_id"];
					$tilDato = @$_GET["tilDato"];
					$reisevalg = @$_GET["reisevalg"];
					
					connectDB();
					$sql = "SELECT f.id AS flyvningNr, (SELECT fp.navn FROM flyplass fp WHERE fp.id = rk.flyplass_id_fra) AS fraFlyplass, f.avgang AS avgang, (SELECT fp.navn FROM flyplass fp WHERE fp.id = rk.flyplass_id_til) AS tilFlyplass, (SELECT r.reisetid FROM rute AS r WHERE r.id = (SELECT rk.rute_id FROM rute_kombinasjon AS rk WHERE rk.id = (SELECT f.rute_kombinasjon_id FROM flyvning AS f WHERE f.id = '$fraLand') ) ) AS reiseTid FROM flyvning f LEFT JOIN rute_kombinasjon rk ON f.rute_kombinasjon_id = rk.id LEFT JOIN rute r ON r.id = rk.rute_id;";
					$result = connectDB()->query($sql);

					if($result->num_rows > 0 ) {
						while ($row = $result->fetch_assoc()) {
							$flyvningNr = utf8_encode($row["flyvningNr"]);
							$fraFlyplass = utf8_encode($row["fraFlyplass"]);
							$avgang = utf8_encode($row["avgang"]);
							$tilFlyplass = utf8_encode($row["tilFlyplass"]);
							$reiseTid = utf8_encode($row["reiseTid"]); ?>

							<tr>
								<td><?php echo $flyvningNr; ?></td>
								<td><?php echo $fraFlyplass; ?></td>
								<td><?php echo $avgang; ?></td>
								<td><?php echo $tilFlyplass; ?></td>
								<td><?php echo $avgang + $reiseTid ?></td>
								<td><input type="radio" name="id" value="<?php echo $flyvningNr; ?>"></td>
							</tr>

						<?php }
					} ?>
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
				<tbody>

					<?php 
					
					
					connectDB();
					$sql = "SELECT f.id AS flyvningNr, (SELECT fp.navn FROM flyplass fp WHERE fp.id = rk.flyplass_id_fra) AS fraFlyplass, f.avgang AS avgang, (SELECT fp.navn FROM flyplass fp WHERE fp.id = rk.flyplass_id_til) AS tilFlyplass, (SELECT r.reisetid FROM rute AS r WHERE r.id = (SELECT rk.rute_id FROM rute_kombinasjon AS rk WHERE rk.id = (SELECT f.rute_kombinasjon_id FROM flyvning AS f WHERE f.id = '$fraLand') ) ) AS reiseTid FROM flyvning f LEFT JOIN rute_kombinasjon rk ON f.rute_kombinasjon_id = rk.id LEFT JOIN rute r ON r.id = rk.rute_id;";
					$result = connectDB()->query($sql);

					if($result->num_rows > 0 ) {
						while ($row = $result->fetch_assoc()) {
							$flyvningNr = utf8_encode($row["flyvningNr"]);
							$fraFlyplass = utf8_encode($row["fraFlyplass"]);
							$avgang = utf8_encode($row["avgang"]);
							$tilFlyplass = utf8_encode($row["tilFlyplass"]);
							$reiseTid = utf8_encode($row["reiseTid"]); ?>

							<tr>
								<td><?php echo $flyvningNr; ?></td>
								<td><?php echo $fraFlyplass; ?></td>
								<td><?php echo $avgang; ?></td>
								<td><?php echo $tilFlyplass; ?></td>
								<td><?php echo $avgang + $reiseTid ?></td>
								<td><input type="radio" name="id" value="<?php echo $flyvningNr; ?>"></td>
							</tr>

						<?php }
					} ?>
				</tbody>
			</table>
			<h3 class="pull-right">Pris</h3>
		</div>
		<!-- Retur -->

		<div class="col-md-10 col-md-offset-1">
			<input type="submit" class="btn btn-default pull-right" value="Bekreft" />
		</div>
	</form>
</div>
<!-- innhold -->

<?php include_once("end.php"); ?>