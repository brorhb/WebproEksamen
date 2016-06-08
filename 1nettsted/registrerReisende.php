<?php include_once ('head.php'); ?>
<div class="container" style="margin-top:55px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<h2>Registrer reisende</h2>
		</div>

		<div class="col-md-10 col-md-offset-1">
			<form method="get" action="prisside.php" name="registrerReisende" id="registrerReisende" onsubmit="return valideReigstrerReisende()">
				<div class="form-group">
<?php
					$fraLand = @$_GET["fraFlyplass_id"];
					$tilLand = @$_GET["tilFlyplass_id"];
					$fraDato = @$_GET["fraDato"];
					$tilDato = @$_GET["tilDato"];
					$reisevalg = @$_GET["reisevalg"];
					$reisende = @$_GET["reisende"];
                    $sql = "SELECT * FROM passasjertype;";
                    $result = connectDB() -> query($sql);
					echo print_r($reisende);
					echo "<br><br>";

					
					if ($result->num_rows > 0) {
                        $teller = 1;
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $passasjertype_type = utf8_encode($row["type"]);
                            $passasjertype_beskrivelse = utf8_encode($row["beskrivelse"]);

                            echo '
                                <div class="col-md-12">
                                    <h4>' . $passasjertype_type . '</h4>
                                    <div class="col-md-6">
                                        <input type="text" name="passasjertype_id[' . $teller . ']" value="' . $reisende[$teller][$id] . '" /><br/>
                                        <p>Noe stuff: 
                                            ' . print_r($reisende[$teller]) . '
                                        </p>
                                    </div>
                                </div>';
                            $teller++;
                        }
                    }	



                    /*for ($i=1; $i <= count($reisende); $i++) {
									echo "<h3>Reisetype " . $i . "</h3><br>";
									$antall_reisende = $reisende[$i];
									for ($j=0; $j < $reisende[$i]; $j++) {
										echo  $antall_reisende . "</h4><br/>";
									}
								}*/




							

					if ($antall_reisende != 0) {
						$x = 1;
						while ( $x <= $antall_reisende) {
?>

					<div class='reisende'>
						<div class='col-md-12'>
							<h3>Reisende nummer: <?php print($x); ?></h3>

							

						</div>

						<div class='col-md-6'>
							<label for='fornavn'>Fornavn</label>
							<input type='text' class='form-control' name='fornavn[<?php echo $x; ?>]' id='fornavn[<?php echo $x; ?>]' placeholder='Fornavn' required /> </div>
						<div class='col-md-6'>
							<label for='etternavn'>Etternavn</label>
							<input type='text' class='form-control' name='etternavn[<?php echo $x; ?>]' id='etternavn[<?php echo $x; ?>]' placeholder='Etternavn' required /> </div>
						<div class='col-md-6'>
							<label for='epost'>Epost</label>
							<input type='email' class='form-control' name='email[<?php echo $x; ?>]' id='email[<?php echo $x; ?>]' placeholder='eksempel@bjarnum.no' required /> </div>
						<div class='col-md-6'>
							<label for='kjonn'>Kjønn</label>
							<select class='form-control' name='kjonn[<?php echo $x; ?>]' id='kjonn[<?php echo $x; ?>]'>
							<option disabled selected value=''>Kjønn</option>
							<option value='1'>Mann</option>
							<option value='2'>Kvinne</option>
							</select>
						</div>
						<div class='col-md-6'>
							<label for='mobilnummer'>Mobilnummer</label>
							<input type='text' class='form-control' name='mobilnummer[<?php echo $x; ?>]' id='mobilnummer[<?php echo $x; ?>]' placeholder='99999999' required /> </div>
						<div class='col-md-6'>
							<label for='dob'>Fødselsdato</label>
							<input type='text' class='form-control' name='dob' id='dob[]' placeholder='mm/dd/yyyy' required /> </div>
						</div>
<?php 
							$x++;
							} //end while loop
					} // end if
 ?>					

				</div>

				<input type="hidden" name="antallVoksene" value="<?php echo $antallVoksene; ?>" required/>
				<input type="hidden" name="antallUnge" value="<?php echo $antallUnge; ?>" required/>
				<input type="hidden" name="reisevalg" value="<?php echo $reisevalg; ?>" required/>
				<input type="hidden" name="fraLand" value="<?php echo $fraLand; ?>" required/>
				<input type="hidden" name="tilLand" value="<?php echo $tilLand; ?>" required/>
				<input type="hidden" name="fraDato" value="<?php echo $fraDato; ?>" required/>
				<input type="hidden" name="tilDato" value="<?php echo $tilDato; ?>" required/>

				<input type="submit" class="btn btn-default pull-right" value="Bekreft">
			</form>
		</div>
	</div>
</div>
<?php include_once ('end.php'); ?>