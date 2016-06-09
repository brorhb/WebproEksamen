<!doctype html>
<html lang="no">
<head>

	<!-- meta -->

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- meta -->

	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jqueryFunc.js"></script>
	<script type="text/javascript" src="js/valideringer.js"></script>
	<script type="text/javascript" src"http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
	<!-- Scripts -->

	<!-- stilark -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- SweetAlert -->
	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

	<!-- font awesome -->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

	<!-- datepicker -->
	<script src="datepicker/js/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" href="datepicker/css/datepicker.css">
	<link rel="stylesheet/less" href="datepicker/less/datepicker.less">
	<!-- datepicker -->

	<link rel="stylesheet" href="css/style.css">

	
	<?php  include_once ('../vedlikehold/lib/funksjoner.php'); ?>
	<!-- stilark -->
	<!-- <noscript><meta http-equiv="refresh" content="0; url=nojs.html" /></noscript> -->

	<title>Bjarum Airlines</title>	
</head>
	<body>
		<nav class="navbar navbar-default col-md-12">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">
						<h4>Bjarnum Airlines</h2>
					</a>
				</div>

				<!-- søkefelt -->
				<div class="col-md-3 pull-right sokfelt">
					<form class="input-group" action="referansesok.php" method="GET" name="sokefelt" id="sokefelt">
						<input type="text" class="form-control" placeholder="Referansenummer..." name="sok" id="sok"/>
						<input class="btn btn-default" type="submit" value="søk" style="float: right; margin-right: -49px;"/>
					</form>
				</div>
				<!-- søkefelt -->

			</div>
		</nav>
