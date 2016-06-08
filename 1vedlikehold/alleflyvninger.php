<?php 
	include_once("lib/funksjoner.php");
	krevInnlogging("0");
	include_once("head.php");


	if (@$_POST['slett']) {
		$id = @$_POST['id'];
		if(slettFlyvning($id)) {
			echo "Informasjonen ble slettet.";
		}
		else {
			echo "Noe galt skjedde...";
		}
	}
	elseif (@$_POST['lagre']) {
		$flyvning_id = $_POST["flyvning_id"];
		$luftfartoy_id = $_POST["luftfartoy_id"];
		$rute_kombinasjon_id = $_POST["rute_kombinasjon_id"];
		$gate = $_POST["gate"];
		$dato = $_POST["dpd1"];
		$klokkeslett = $_POST["klokkeslett"];
		
		$passasjertype_id = $_POST["passasjertype_id"];
		$pris = $_POST["pris"];
		$valuta_id = $_POST["valuta_id"];

		$validering = true;

		if ($validering) {
			oppdaterFlyvning($flyvning_id, $luftfartoy_id, $rute_kombinasjon_id, $dato, $klokkeslett, $gate, $passasjertype_id, $pris, $valuta_id);
			echo "Informasjonen ble oppdatert.";
			$feiletPHPvalidering = false;
		}
		else {
			// PHP-validering ikke godkjent, feilmeldinger skrives ut og skjemaet for å fylle ut info vises:
			$feiletPHPvalidering = true;
		}

		/*if (oppdaterFlyvning($brukerID, $personID, $brukernavn, $ukryptertPassord, $fornavn, $etternavn, $fodselsdato, $landID, $epost, $mobilnr)) {
		
			// Valideringen gogdkjent, oppdater databasen
			oppdaterPersonBruker($brukerID, $personID, $brukernavn, $ukryptertPassord, $fornavn, $etternavn, $fodselsdato, $landID, $epost, $mobilnr);
			echo "Informasjonen ble oppdatert.";
			$feiletPHPvalidering = false;
		}
		else {
			// PHP-validering ikke godkjent, feilmeldinger skrives ut og skjemaet for å fylle ut info vises:
			$feiletPHPvalidering = true;
		}*/
	}
	if (@$_POST['ny'] || @$_POST['endre'] || @$feiletPHPvalidering) {
		// Hvis endre eller ny er trykket ned
		$id = @$_POST['id'];

		echo'	<!-- Innhold -->
			<form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerFlyvning()">
			<div class="col-md-12">';
				if (@$_POST['ny']) {
					echo '<h2>Ny flyvning</h2>';
				}
				elseif (@$_POST['endre']) {
					echo '<h2>Endre flyvning</h2>';
				}
		echo '
			<div class="col-md-12">';

					connectDB();
					$sql = "SELECT * FROM flyvning WHERE flyvning.id = '$id';";
					$result = connectDB()->query($sql);

					if ($result->num_rows > 0 ) {
						while ($row = $result->fetch_assoc()) {
							$flyvning_id = utf8_encode($row["id"]);
							$flyvning_luftfaryoy_id = utf8_encode($row["luftfartoy_id"]);
							$flyvning_rute_kombinasjon_id = utf8_encode($row["rute_kombinasjon_id"]);
							$flyvning_avgang = utf8_encode($row["avgang"]);
							$flyvning_gate = utf8_encode($row["gate"]);

							$dato = regnUtDatoFraUnixtime($flyvning_avgang);
							$klokkeslett = regnUtKlokkeslettFraUnixtime($flyvning_avgang);

							echo '
							<div class="form-group col-md-6">
								<lable for="avgang">Dato</lable>
								<input type="hidden" name="flyvning_id" id="flyvning_id" value="' . @$flyvning_id . '" required>
								<input class="form-control" type="text" placeholder="MM/DD/YYYY" name="dpd1" id="dpd1" value="' . @$dato . '" required>
								<lable for="avgang">Klokkeslett</lable>
								<input class="form-control" type="text" placeholder="HH:MM" name="klokkeslett" id="klokkeslett" value="' . @$klokkeslett . '" required>
								<lable for="gate">Gate</lable>
								<input class="form-control" type="text" placeholder="Gate Nr" name="gate" id="gate" value="' . @$flyvning_gate . '" required>
							</div>
							<div class="form-group col-md-6">
								<lable for="ruteNr">Rute Nr</lable>';
							echo rute_kombinasjonListe($flyvning_rute_kombinasjon_id);
							echo '
								<lable for="luftfartoy">Tail Nr</lable>';
							echo luftfartoyListe($flyvning_luftfaryoy_id);
							echo '</div>';
							echo '<div class="col-md-12"><h2>Pris</h2></div>';

							$sql2 = "SELECT id, type, beskrivelse FROM passasjertype;";
							$result2 = connectDB()->query($sql2);



								echo '
								<div class="form-group col-md-12">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Passasjertype</th>
												<th>Pris</th>
												<th>Valuta</th>
											</tr>
										</thead>
										<tbody>';

											
								if ($result2->num_rows > 0 ) {
									$teller = 0;
									while ($row2 = $result2->fetch_assoc()) {
										$passasjertype_id = utf8_encode($row2["id"]);
										$passasjertype_type = utf8_encode($row2["type"]);
										$passasjertype_beskrivelse = utf8_encode($row2["beskrivelse"]);

								
													echo '
														<tr>
															<td>' . $passasjertype_type . ' (' . $passasjertype_beskrivelse . ')</td>
															<td>
																<input type="hidden" name="passasjertype_id[' . $teller . ']" value="' . $passasjertype_id . '" />
																<input class="form-control type="text" name="pris[' . $teller . ']" value="' . HentPrisFraFlyvning_idOgPassasjertype_id($flyvning_id, $passasjertype_id) . '" placeholder="Pris">
															</td>
															<td>'; 
															echo valutaListe(HentValuta_idFraFlyvning_idOgPassasjertype_id($flyvning_id, $passasjertype_id), $teller);
															echo '
															</td>
														</tr>';
										$teller++;
									}
												
											
												echo '</tbody>
											</table>
											Basisprisen til ruten velges hvis ingen annen pris fylles ut
										</div>';
								}
							}

							$sql2 = "SELECT (SELECT p.passasjertype_id FROM pris p WHERE p.flyvning_id = f.id) AS passasjertype, p.fra_dato AS fraDato, p.til_dato AS tilDato FROM pris p LEFT JOIN flyvning f ON p.flyvning_id = f.id LIMIT 5;";

							$result2 = connectDB()->query($sql2);

							if ($result2->num_rows > 0 ) {
								while ($row2 = $result2->fetch_assoc()) {
									$passasjertype2 = utf8_encode($row2["passasjertype"]);
									$fraDato2 = utf8_encode($row2["fraDato"]);
									$tilDato2 = utf8_encode($row2["tilDato"]);

									echo '
									<div class="form-group col-md-12">
										<lable for="passasjertype">Passasjer Type</lable>';
										echo passasjertypeListe($passasjertype2);
										echo '
									</div>
									<div class="form-group col-md-6">
										<lable for="fraDato">Fra Dato</lable>
										<input class="form-control" type="text" placeholder="Fra Dato Nr" name="fraDato" id="dpd1" value="' . @$fraDato2 . '" required>
									</div>
									<div class="form-group col-md-6">
										<lable for="tilDato">Til Dato</lable>
										<input class="form-control" type="text" placeholder="Til Dato Nr" name="tilDato" id="dpd2" value="' . @$tilDato2 . '" required>
									</div>
									<div class="form-group col-md-12">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Valgt</th>
													<th>Klasse</th>
													<th>Pris</th>
													<th>Valuta</th>
												</tr>
											</thead>
											<tbody>';

									$sql3 = "SELECT k.id, (SELECT k.type FROM klasse k WHERE k.id = p.klasse_id) AS type, p.pris, (SELECT v.id FROM valuta v WHERE v.id = p.valuta_id) AS valuta FROM pris p LEFT JOIN klasse k ON k.id = p.klasse_id LEFT JOIN valuta v ON v.id = p.valuta_id;";
									$result3 = connectDB()->query($sql3);

									if ($result3->num_rows > 0 ) {
										while ($row3 = $result3->fetch_assoc()) {
													$id3 = utf8_encode($row3["id"]);
													$type3 = utf8_encode($row3["type"]);
													$pris3 = utf8_encode($row3["pris"]);
													$valuta3 = utf8_encode($row3["valuta"]);

								
													echo '
														<tr>
															<td>
																<input type="checkbox" name="id" value="' . $id3 . '" required>
															</td>
															<td>' . $type3 . '</td>
															<td>
																<input class="form-control type="text" name="pris" value="' . $pris3 . '" placeholder="Pris" required>
															</td>
															<td>'; 
															echo valutaListe("", $passasjertype_id);
															echo '
															</td>
														</tr>';
										}
									}
											echo '</tbody>
										</table>
									</div>';
								}
							}

					}
					else {
						
							$flyvning_id = utf8_encode($row["id"]);
							$flyvning_luftfaryoy_id = utf8_encode($row["luftfartoy_id"]);
							$flyvning_rute_kombinasjon_id = utf8_encode($row["rute_kombinasjon_id"]);
							$flyvning_avgang = utf8_encode($row["avgang"]);
							$flyvning_gate = utf8_encode($row["gate"]);

							$dato = regnUtDatoFraUnixtime($flyvning_avgang);
							$klokkeslett = regnUtKlokkeslettFraUnixtime($flyvning_avgang);

							echo '
							<div class="form-group col-md-6">
								<lable for="avgang">Dato</lable>
								<input type="hidden" name="flyvning_id" id="flyvning_id" value="' . @$flyvning_id . '" required>
								<input class="form-control" type="text" placeholder="MM/DD/YYYY" name="dpd1" id="dpd1" value="' . @$dato . '" required>
								<lable for="avgang">Klokkeslett</lable>
								<input class="form-control" type="text" placeholder="HH:MM" name="klokkeslett" id="klokkeslett" value="' . @$klokkeslett . '" required>
								<lable for="gate">Gate</lable>
								<input class="form-control" type="text" placeholder="Gate Nr" name="gate" id="gate" value="' . @$flyvning_gate . '" required>
							</div>
							<div class="form-group col-md-6">
								<lable for="ruteNr">Rute Nr</lable>';
							echo rute_kombinasjonListe($flyvning_rute_kombinasjon_id);
							echo '
								<lable for="luftfartoy">Tail Nr</lable>';
							echo luftfartoyListe($flyvning_luftfaryoy_id);
							echo '</div>';
							echo '<div class="col-md-12"><h2>Pris</h2></div>';

							$sql2 = "SELECT id, type, beskrivelse FROM passasjertype;";
							$result2 = connectDB()->query($sql2);



								echo '
								<div class="form-group col-md-12">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Passasjertype</th>
												<th>Pris</th>
												<th>Valuta</th>
											</tr>
										</thead>
										<tbody>';

											
								if ($result2->num_rows > 0 ) {
									$teller = 0;
									while ($row2 = $result2->fetch_assoc()) {
										$passasjertype_id = utf8_encode($row2["id"]);
										$passasjertype_type = utf8_encode($row2["type"]);
										$passasjertype_beskrivelse = utf8_encode($row2["beskrivelse"]);

								
													echo '
														<tr>
															<td>' . $passasjertype_type . ' (' . $passasjertype_beskrivelse . ')</td>
															<td>
																<input type="hidden" name="passasjertype_id[' . $teller . ']" value="' . $passasjertype_id . '" />
																<input class="form-control type="text" name="pris[' . $teller . ']" value="' . HentPrisFraFlyvning_idOgPassasjertype_id($flyvning_id, $passasjertype_id) . '" placeholder="Pris">
															</td>
															<td>'; 
															echo valutaListe(HentValuta_idFraFlyvning_idOgPassasjertype_id($flyvning_id, $passasjertype_id), $teller);
															echo '
															</td>
														</tr>';
										$teller++;
									}
												
											
												echo '</tbody>
											</table>
											Basisprisen til ruten velges hvis ingen annen pris fylles ut
										</div>';
								}
							}

							$sql2 = "SELECT (SELECT p.passasjertype_id FROM pris p WHERE p.flyvning_id = f.id) AS passasjertype, p.fra_dato AS fraDato, p.til_dato AS tilDato FROM pris p LEFT JOIN flyvning f ON p.flyvning_id = f.id LIMIT 5;";

							$result2 = connectDB()->query($sql2);

							if ($result2->num_rows > 0 ) {
								while ($row2 = $result2->fetch_assoc()) {
									$passasjertype2 = utf8_encode($row2["passasjertype"]);
									$fraDato2 = utf8_encode($row2["fraDato"]);
									$tilDato2 = utf8_encode($row2["tilDato"]);

									echo '
									<div class="form-group col-md-12">
										<lable for="passasjertype">Passasjer Type</lable>';
										echo passasjertypeListe($passasjertype2);
										echo '
									</div>
									<div class="form-group col-md-6">
										<lable for="fraDato">Fra Dato</lable>
										<input class="form-control" type="text" placeholder="Fra Dato Nr" name="fraDato" id="dpd1" value="' . @$fraDato2 . '" required>
									</div>
									<div class="form-group col-md-6">
										<lable for="tilDato">Til Dato</lable>
										<input class="form-control" type="text" placeholder="Til Dato Nr" name="tilDato" id="dpd2" value="' . @$tilDato2 . '" required>
									</div>
									<div class="form-group col-md-12">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Valgt</th>
													<th>Klasse</th>
													<th>Pris</th>
													<th>Valuta</th>
												</tr>
											</thead>
											<tbody>';

									$sql3 = "SELECT k.id, (SELECT k.type FROM klasse k WHERE k.id = p.klasse_id) AS type, p.pris, (SELECT v.id FROM valuta v WHERE v.id = p.valuta_id) AS valuta FROM pris p LEFT JOIN klasse k ON k.id = p.klasse_id LEFT JOIN valuta v ON v.id = p.valuta_id;";
									$result3 = connectDB()->query($sql3);

									if ($result3->num_rows > 0 ) {
										while ($row3 = $result3->fetch_assoc()) {
													$id3 = utf8_encode($row3["id"]);
													$type3 = utf8_encode($row3["type"]);
													$pris3 = utf8_encode($row3["pris"]);
													$valuta3 = utf8_encode($row3["valuta"]);

								
													echo '
														<tr>
															<td>
																<input type="checkbox" name="id" value="' . $id3 . '" required>
															</td>
															<td>' . $type3 . '</td>
															<td>
																<input class="form-control type="text" name="pris" value="' . $pris3 . '" placeholder="Pris" required>
															</td>
															<td>'; 
															echo valutaListe("", $passasjertype_id);
															echo '
															</td>
														</tr>';
										}
									}
											echo '</tbody>
										</table>
									</div>';
								}
							

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
			<form method="post" action="' . $_SERVER['PHP_SELF'] . '" id="tabell" onsubmit="return validerSubmitKnapp(this.submited);">
			<h2>Alle Flyvninger</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Valgt</th>
						<th>Rute Nr</th>
						<th>Tail Nr (& type)</th>
						<th>Avgang<br><span style="font-size:0.7em;">(MM/DD/YYYY HH:MM)</span></th>
						<th>Fra Flyplass</th>
						<th>Fra Gate</th>
						<th>Til Flyplass</th>
					</tr>
				</thead>
					<tbody>
		';
							connectDB();
							$sql = "SELECT f.id AS flyvningNr, (SELECT rk.rute_id FROM rute_kombinasjon rk WHERE rk.id = f.rute_kombinasjon_id) AS ruteNr, l.tailnr AS tailNr, (SELECT m.navn FROM modell m WHERE l.modell_id = m.id) AS type, f.avgang, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_fra) AS fraFlyplass, f.gate, (SELECT f.navn FROM flyplass f WHERE f.id = rk.flyplass_id_til) AS tilFlyplass FROM flyvning f LEFT JOIN rute_kombinasjon rk ON f.rute_kombinasjon_id = rk.id LEFT JOIN luftfartoy l ON f.luftfartoy_id = l.id;";
							$result = connectDB()->query($sql);

							if($result->num_rows > 0 ) {
								while ($row = $result->fetch_assoc()) {
									$flyvningNr = utf8_encode($row["flyvningNr"]);
									$ruteNr = utf8_encode($row["ruteNr"]);
									$tailNr = utf8_encode($row["tailNr"]);
									$type = utf8_encode($row["type"]);
									$avgang = utf8_encode($row["avgang"]);
									$fraFlyplass = utf8_encode($row["fraFlyplass"]);
									$gate = utf8_encode($row["gate"]);
									$tilFlyplass = utf8_encode($row["tilFlyplass"]);

                                    $tid = regnUtDatoFraUnixtime($avgang) . " " . regnUtKlokkeslettFraUnixtime($avgang);
									echo '<tr>
												<td><input type="radio" name="id" value="' . $flyvningNr . '" required></td>
												<td>' . $ruteNr . '</td>
												<td>' . $tailNr . ' (' . $type . ')</td>
												<td>' . $tid . '</td>
												<td>' . $fraFlyplass . '</td>
												<td>' . $gate . '</td>
												<td>' . $tilFlyplass . '</td>
											</tr>';
								}
							}

		echo '
					 </tbody>
					</table>
					<div class="col-md-1">
						<input type="submit" name="endre" class="btn btn-info" value="Endre" onclick="this.form.submited=this.name;"/>
					</div>
					<div class="col-md-1 col-md-offset-4 text-center">
						<input type="submit" name="ny" class="btn btn-success" value="Legg til" onclick="this.form.submited=this.name;"/>
					</div>
					<div class="col-md-1 col-md-offset-4 pull-right">
						<input type="submit" name="slett" href="#" class="btn btn-danger" value="Slett" onclick="this.form.submited=this.name;"/>
					</div>
				</form>
		</div>
		<!-- Innhold -->
		';

include_once ("end.php"); ?>