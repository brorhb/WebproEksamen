<?php
	include_once("lib/funksjoner.php");
	krevInnlogging("0");
	include_once("head.php");

	
	if ($_POST['slett']) {
		$id = @$_POST['id'];
		if(slettBestillinger($id)) {
			echo "Informasjonen ble slettet.";
		}
		else {
			echo "Noe galt skjedde...";
		}
	}
	elseif ($_POST['lagre']) {
		$id = @$_POST['id'];
		$rute_id = @$_POST['rute_id'];
		$passasjertype_id = @$_POST['passasjertype_id'];
		$fornavn = @$_POST['fornavn'];
		$etternavn = @$_POST['etternavn'];
		$date = @$_POST['date'];

		if(oppdaterBestillinger($id, $rute_id, $passasjertype_id, $fornavn, $etternavn, $date)) {
			echo "Informasjonen ble oppdatert.";
		}
		else {
			echo "Noe galt skjedde...";
		}
	}
	elseif (@$_POST['ny'] || @$_POST['endre']) {
		// Hvis endre eller ny er trykket ned
		$id = @$_POST['id'];

		echo'
			<!-- Innhold -->
			<form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post">
			<div class="col-md-12">';
				if (@$_POST['ny']) {
					echo '<h2>Ny bestilling</h2>';
					echo '
						<div class="col-md-12">
								<label for="Flyvning">Flyvning</label>
							';
								echo ruteliste(@$rute);
							echo '
							</div>
							<div class="col-md-6">
								<label for="Rute">Rute</label>
							';
								echo passasjertypeListe();
							echo '
							</div>
							<div class="col-md-6">
								<label="">Fornavn</label>
								<input class="form-control" type="text" name="" id="" value="">
							</div>
							<div class="col-md-6">
								<label="">Etternavn</label>
								<input class="form-control" type="text" name="" id="" value="">
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label requiredField" for="date">Fødselsdato<span class="asteriskField">*</span></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar">
											</i>
										</div>
										<input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text" value="' . @$fodselsdato . '"/>
									</div>
								</div>
							</div>
							';
				}
				elseif (@$_POST['endre']) {
					echo '<h2>Endre bestilling</h2>';
					echo '
							<div class="col-md-12">
								<label for="Flyvning">Rute</label>
							';
								echo ruteliste(@$rute);
							echo '
							</div>
							<div class="col-md-6">
								<label for="Rute">Rute</label>
							';
								echo passasjertypelist();
							echo '
							</div>
							<div class="col-md-6">
								<label="">Fornavn</label>
								<input class="form-control" type="text" name="" id="" value="">
							</div>
							<div class="col-md-6">
								<label="">Etternavn</label>
								<input class="form-control" type="text" name="" id="" value="">
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label requiredField" for="date">Fødselsdato<span class="asteriskField">*</span></label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar">
											</i>
										</div>
										<input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text" value="' . @$fodselsdato . '"/>
									</div>
								</div>
							</div>
						</div>
							';
				}
		echo '
			<div class="col-md-6">';
				
					connectDB();
					$sql = "SELECT * FROM klasse WHERE id='$id';";
					$result = connectDB()->query($sql);

					if($result->num_rows > 0 ) {
						while ($row = $result->fetch_assoc()) {
							$id = utf8_encode($row["id"]);
							$rute = utf8_encode($row["type"]);
							$navn = utf8_encode($row["beskrivelse"]);
							$avgang = utf8_encode($row[""]);
						echo '
							
							';
						}
					}
					else {
						echo '
							
							';
					}
					connectDB()->close();
			echo'
			</div>
				<div class="col-md-12">
					<input type="submit" id="lagre" name="lagre" class="btn btn-info" value="lagre">
				</div>
			</div>
			</form>
			<!-- Innhold -->';
	}
	

		echo'<div class="col-md-12">
			<form method="post" action="' . $_SERVER['PHP_SELF'] . '">
			<h2>Alle bestillinger</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Valgt</th>
						<th>Referanse/ID</th>
						<th>Strekning</th>
						<th>Avgang<br><span style="font-size:0.7em;">(MM/DD/YYYY HH:MM)</span></th>
						<th>Navn på bestiller</th>
					</tr>
				</thead>
					<tbody>
		';
							connectDB();
							$sql = "SELECT bf.id AS bestilling_flyvning_id, bf.bestilling_id, bf.flyvning_id, b.bruker_id, p.fornavn, p.etternavn, f.rute_kombinasjon_id, f.avgang, f.gate, rk.rute_id, rk.flyplass_id_fra, rk.flyplass_id_til, (SELECT navn FROM flyplass WHERE flyplass.id = rk.flyplass_id_fra) AS flyplass_fra, (SELECT navn FROM flyplass WHERE flyplass.id = rk.flyplass_id_til) AS flyplass_til FROM bestilling_flyvning bf LEFT JOIN bestilling b ON bf.bestilling_id = b.id LEFT JOIN person p ON p.id = (SELECT bruker.person_id FROM bruker WHERE bruker.id = b.bruker_id) LEFT JOIN flyvning f ON f.id = bf.flyvning_id LEFT JOIN rute_kombinasjon rk ON rk.id = f.rute_kombinasjon_id;";
							$result = connectDB()->query($sql);

							if($result->num_rows > 0 ) {
								while ($row = $result->fetch_assoc()) {

									$bestilling_flyvning_id = utf8_encode($row["bestilling_flyvning_id"]);
									$bestilling_id = utf8_encode($row["bestilling_id"]);
									$flyvning_id = utf8_encode($row["flyvning_id"]);
									$bruker_id = utf8_encode($row["bruker_id"]);
									$fornavn = utf8_encode($row["fornavn"]);
									$etternavn = utf8_encode($row["etternavn"]);
									$rute_kombinasjon_id = utf8_encode($row["rute_kombinasjon_id"]);
									$avgang = utf8_encode($row["avgang"]);
									$gate = utf8_encode($row["gate"]);
									$rute_id = utf8_encode($row["rute_id"]);
									$flyplass_fra = utf8_encode($row["flyplass_id_fra"]);
									$flyplass_fra = utf8_encode($row["flyplass_id_til"]);
                                    $flyplass_fra = utf8_encode($row["flyplass_fra"]);
                                    $flyplass_til = utf8_encode($row["flyplass_til"]);

                                    $dato = regnUtDatoFraUnixtime($avgang);
                                    $klokkeslett = regnUtKlokkeslettFraUnixtime($avgang);

									echo '
									<tr><td><input type="radio" name="id" value="' . $bestilling_id . '"></td>
                                    <td>' . $bestilling_id . '</td>
									<td>' . $flyplass_fra . ' - ' . $flyplass_til . '</td>
									<td>' . $dato . ' ' . $klokkeslett . '</td>
                                    <td>' . $fornavn .  ' ' . $etternavn . '</td></tr>';
								}
							}
						
		echo '
					</tbody>
					</table>
					<div class="col-md-1">
						<input type="submit" name="endre" class="btn btn-info" value="Endre" />
					</div>
					<div class="col-md-1 col-md-offset-4 text-center">
						<input type="submit" name="ny" class="btn btn-success" value="Legg til" />
					</div>
					<div class="col-md-1 col-md-offset-4 pull-right">
						<input type="submit" name="slett" href="#" class="btn btn-danger" value="Slett"/>
					</div>
				</form>
		</div>
		<!-- Innhold -->
		';

include_once ("end.php"); ?>