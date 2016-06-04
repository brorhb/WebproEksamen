<?php 
		$sql2 = "SELECT (SELECT p.passasjertype_id FROM pris p WHERE p.flyvning_id = f.id) AS passasjertype, p.fra_dato AS fraDato, p.til_dato AS tilDato FROM pris p LEFT JOIN flyvning f ON p.flyvning_id = f.id LIMIT 1;";
        $result2 = connectDB()->query($sql2);

        if ($result2->num_rows > 0 ) {
        	while ($row2 = $result2->fetch_assoc()) {
             	$passasjertype2 = utf8_encode($row2["passasjertype"]);
				$fraDato2 = utf8_encode($row2["fraDato"]);
				$tilDato2 = utf8_encode($row2["tilDato"]);
?>
				<div class="form-group col-md-12">
					<lable for="passasjertype">Passasjer Type</lable>
					<?php echo passasjertypeListe($passasjertype2); ?>
				</div>
				<div class="form-group col-md-6">
					<lable for="fraDato">Fra Dato</lable>
					<input class="form-control" type="text" placeholder="Fra Dato Nr" name="fraDato" id="dpd1" value="<?php echo @$fraDato2; ?>" required>
				</div>
				<div class="form-group col-md-6">
					<lable for="tilDato">Til Dato</lable>
					<input class="form-control" type="text" placeholder="Til Dato Nr" name="tilDato" id="dpd2" value="<?php echo @$tilDato2; ?>" required>
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
							<tbody>
<?php 
									$sql3 = "SELECT k.id, k.type FROM klasse k;";
									$result3 = connectDB()->query($sql3);
									
									if ($result3->num_rows > 0 ) {
										while ($row3 = $result3->fetch_assoc()) {
											$id3 = utf8_encode($row3["id"]);
											$type3 = utf8_encode($row3["type"]);
?>
											<tr>
												<td>
													<input type="checkbox" name="id" value="<?php echo $id3; ?>">
												</td>
												<td><?php echo $type3; ?></td>
												<td>
													<input class="form-control type="text" name="pris" value="testPris" placeholder="Pris">
												</td>
												<td>
													<input class="form-control type="text" name="valuta" value="testValuta" placeholder="Valuta">
												</td>
											</tr>
<?php 
										}
									}
?>
							</tbody>
						</table>
					</div>
<?php
			}
		}
?>