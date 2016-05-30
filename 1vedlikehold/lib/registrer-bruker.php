<?php
	include_once("funksjoner.php");
	if (erLoggetInn()) {
        header("Location: index.php");
    }

    connectDB();
	$brukernavn = @connectDB()->real_escape_string(utf8_decode($_POST['brukernavn']));
	$passord = @connectDB()->real_escape_string(utf8_decode($_POST['passord']));
    $kryptertPassord = md5($passord);

    if ($brukernavn != "" AND $passord != "") {

    	$sqlSetning = "SELECT * FROM bruker WHERE brukernavn = '$brukernavn';";
		$result = connectDB()->query($sqlSetning);

		if ($result->num_rows != 0) {
            $tilbakemelding = "Velg et annet brukernavn";
        }
        else {
        	$sql = "INSERT INTO bruker (brukernavn, passord) VALUES ('$brukernavn', '$kryptertPassord');";

			if (connectDB()->query($sql) === TRUE) {
            	$tilbakemelding = 'Brukeren din er registrert. <a href="logg-inn.php">Logg inn</a>';
			} else {
				$tilbakemelding = 'Problemer med å registrere bruker. Prøv igjen.';
			}
        }
    }

	connectDB()->close();

?>

<html>
  <head>
	<title>Registrer bruker</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="css/style.css"/>
  </head>
  <body>
	<div class="row">
	  <div class="col-md-4 col-md-offset-3">
		<div class="loginbox">
		  <h2>Registrer bruker</h2>
		  <form role="form" method="post" class="form-signin" id="logginn" action="registrer-bruker.php" onsubmit="">
<?php
			echo '<p style="color:#FF7761;">' . @$tilbakemelding . '</p>';
?>

			<label for="brukernavn" class="sr-only">Brukernavn</label>
			<input id="brukernavn" type="text" placeholder="Brukernavn" name="brukernavn" required autofocus="" class="form-control" style="margin-bottom:8px;"/>
			<label for="passord" class="sr-only">Passord</label>
			<input id="passord" type="password" placeholder="Passord" name="passord" required class="form-control"/>
			<div class="checkbox"></div>
			<!--<label>
			  <input type="checkbox" value="remember-me"/> Husk meg
			</label>-->
			<input type="submit" class="btn btn-lg btn-default btn-block" value="Registrer bruker" id="registrerKnapp" name="registrerKnapp">
		  </form>
		</div>
	  </div>
	  <div class="col-md-5 hidden-sm hidden-xs">
		<div class="artboard">
		  <div class="bb8">
			<div class="bb8-body">
			  <div class="dot dot-1">
				<div class="line line-1"></div>
				<div class="line line-2"></div>
				<div class="line line-3"></div>
			  </div>
			  <div class="dot dot-2"></div>
			  <div class="circle circle-1"></div>
			  <div class="circle circle-2"></div>
			  <div class="circle circle-3"></div>
			</div>
			<div class="body-shadow-crop">
			  <div class="body-shadow"></div>
			</div>
			<div class="bb8-head">
			  <div class="head-bottom">
				<div class="head-side-1"></div>
				<div class="head-side-2"></div>
				<div class="head-bottom-base"></div>
			  </div>
			  <div class="head-top-crop">
				<div class="head-top"></div>
			  </div>
			  <div class="lens"></div>
			  <div class="freckle"></div>
			</div>
			<div class="speedlines">
			  <div class="one tail"></div>
			  <div class="two tail"></div>
			  <div class="three"></div>
			  <div class="four"></div>
			  <div class="five tail"></div>
			</div>
			<div class="sparkles">
			  <div class="one small pulse-1"></div>
			  <div class="two blue small pulse-2"></div>
			  <div class="three blue med pulse-3"></div>
			  <div class="four orange pulse-2"></div>
			  <div class="five orange pulse-1"></div>
			  <div class="six blue small pulse"></div>
			  <div class="seven blue small pulse"></div>
			  <div class="eight small pulse-3"></div>
			  <div class="nine pulse"></div>
			  <div class="ten orange small-1 pulse"></div>
			  <div class="eleven small pulse"></div>
			  <div class="twelve small pulse-2"></div>
			  <div class="thirteen orange small pulse"></div>
			  <div class="fourteen orange med pulse-3"></div>
			  <div class="fifteen small pulse-1"></div>
			  <div class="sixteen small pulse"></div>
			</div>
			<div class="ground">
			  <div class="one">
				<div class="bump move-1"></div>
			  </div>
			  <div class="two"></div>
			  <div class="three">
				<div class="bump move-2"></div>
			  </div>
			  <div class="four">
				<div class="bump"></div>
			  </div>
			  <div class="five"></div>
			  <div class="six">
				<div class="bump move-2"></div>
			  </div>
			  <div class="seven">
				<div class="bump"></div>
			  </div>
			  <div class="eight">
				<div class="bump move-1"></div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </body>
</html>


<?php
        //include_once("slutt.php");
?>
