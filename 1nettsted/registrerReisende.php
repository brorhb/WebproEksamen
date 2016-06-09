<?php include_once ('head.php'); ?>
<div class="container" style="margin-top:55px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<h2>Registrer reisende</h2>
		</div>

		<div class="col-md-10 col-md-offset-1">
			<form method="post" action="prisside.php" name="registrerReisende" id="registrerReisende" onsubmit="return valideReigstrerReisende()">
				<div class="form-group">
<?php
					$fraLand = @$_POST["fraFlyplass_id"];
					$tilLand = @$_POST["tilFlyplass_id"];
					$fraDato = @$_POST["fraDato"];
					$tilDato = @$_POST["tilDato"];
					$reisevalg = @$_POST["reisevalg"];
					$reisende = @$_POST["reisende"];
					$passasjertype = @$_POST["passasjertype"];
                    $sql = "SELECT * FROM passasjertype;";
                    $result = connectDB() -> query($sql);

?>
<?php					
					if ($result->num_rows > 0) {
                        $teller = 1;
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $passasjertype_type = utf8_encode($row["type"]);
                            $passasjertype_beskrivelse = utf8_encode($row["beskrivelse"]);

							$PassasjertypeKey = array_search($id, $passasjertype);

							$antall_reisende = $reisende[$PassasjertypeKey];

							echo '<h2>' . $passasjertype_type . '</h2>';

							for ($i=0; $i < $antall_reisende; $i++) { 
								$antallet = $i + 1;
								echo '
								<div class="row">
								<h4>' . $passasjertype_type .' '. $antallet .'</h4>
									<div class="col-md-6">
										<label for="fornavn">Fornavn</label>
										<input type="text" class="form-control" name="fornavn" id="fornavn[' . $id . '][' . $i . ']" placeholder="Fornavn" required /> 
									</div>
									<div class="col-md-6">
										<label for="etternavn">Etternavn</label>
										<input type="text" class="form-control" name="etternavn" id="etternavn[' . $id . '][' . $i . ']" placeholder="Etternavn" required />
									</div>
									<div class="col-md-6">
										<label for="epost">Epost</label>
										<input type="email" class="form-control" name="email" id="email[' . $id . '][' . $i . ']" placeholder="eksempel@bjarnum.no" required />
									</div>
									<div class="col-md-6">
										<label for="kjonn">Kjønn</label>
										<select class="form-control" name="kjonn" id="kjonn[' . $id . '][' . $i . ']">
										<option disabled selected value="">Kjønn</option>
										<option value="1">Mann</option>
										<option value="2">Kvinne</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="mobilnummer">Mobilnummer</label>
										<input type="text" class="form-control" name="mobilnummer" id="mobilnummer[' . $id . '][' . $i . ']" placeholder="99999999" required />
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="control-label requiredField" for="date">Fødselsdato<span class="asteriskField">*</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar">
													</i>
												</div>
												<input class="form-control" id="date[' . $id . '][' . $i . ']" name="date" placeholder="DD/MM/YYYY" type="text" value=""/>
											</div>
										</div>
									</div>
								</div>
								';
							}
                        }
                    }	
?>
				<input type="hidden" name="reisevalg" value="<?php echo $reisevalg; ?>" required/>
				<input type="hidden" name="fraLand" value="<?php echo $fraLand; ?>" required/>
				<input type="hidden" name="tilLand" value="<?php echo $tilLand; ?>" required/>
				<input type="hidden" name="fraDato" value="<?php echo $fraDato; ?>" required/>
				<input type="hidden" name="tilDato" value="<?php echo $tilDato; ?>" required/>
				<input type="hidden" name="antallReisende" value="5" required/>

				<input type="submit" class="btn btn-default pull-right" value="Bekreft">
			</form>
		</div>
	</div>
</div>
<?php include_once ('end.php'); ?>