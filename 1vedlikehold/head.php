<!DOCTYPE html>
<html lang="no">
    <head>
        <title>Bjarum Airlines</title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- meta -->

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="js/jqueryFunc.js"></script>
        <script src="js/validering.js"></script>
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
        <!-- stilark -->

        <?php include_once("lib/funksjoner.php"); ?>
    </head>

    <body>
        <div class="col-md-12 topheader">
            <h4 class="brandname">Bjarum Airlines adminpanel</h4>
            <a href="login.php" class="logout"><h5 class="pull-right">Logg ut</h5></a>
        </div>
        <div id="wrapper">
            <div class="overlay"></div>

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav">
                    <li class="sidebar-brand"><a href="#">Bjarum Airlines</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Flytype <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Flytype</li>
                            <li><a href="allefly.php">Alle fly</a></li>
                            <li><a href="allemodeller.php">Alle fly modeller</a></li>
                            <li><a href="alletyper.php">Alle typer</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Flyvninger<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Flyvninger</li>
                            <li><a href="alleruter.php">Alle ruter</a></li>
                            <li><a href="alleavganger.php">Alle avganger</a></li>
                        </ul>
                    </li>
                    <li><a href="allebestillinger.php">Alle bestillinger</a></li>
                    <li><a href="allebrukere.php">Alle brukere</a></li>
                    <li><a href="alleflyplasser.php">Flyplass</a></li>
                    <li><a href="valutta.php">Valutta</a></li>
                    <li><a href="land.php">Land</a></li>
                    <li><a href="alleklasser.php">Alle klasser</a></li>
                    <li><a href="passasjertyper.php">Passasjertype</a></li>
                    <li>
                        <footer>
                            <div class="col-md-12 text-center">
                                <h4>Eksamen av Thomas Iversen Ramm, Bror Brurberg, Marius Wetterlin, Emilie Borch og Iselin Gjestland</h4>
                            </div>
                        </footer>
                    </li>
                </ul>
            </nav>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper" class="forside_bg">
                <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                    <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span>
                </button>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
