<?php
    include_once('lib/funksjoner.php');

    // For å videresende til riktig side
    if (erLoggetInn()) {
        //header("Location: index.php");
        echo '<head><meta http-equiv="refresh" content="0; url=index.php" /></head>';
        echo "hei";
    }
    elseif (@$_POST['referer'])
    {
        $referer = $_POST['referer'];
    }
    else
    {
        // Sender brukeren til riktig side etter at man har logget inn
        if (strpos($_SERVER['REQUEST_URI'],'login.php') == false) {
            $referer = $_SERVER['REQUEST_URI'];
        }
        elseif (strpos($_SERVER['SCRIPT_NAME'],'login.php') == false) {
            $referer = $_SERVER['SCRIPT_NAME'];
        }
        elseif (strpos($_SERVER['PHP_SELF'],'login.php') == false) {
            $referer = $_SERVER['PHP_SELF'];
        }
        elseif (strpos($_SERVER['HTTP_REFERER'],'login.php') == false AND isset($_SERVER['HTTP_REFERER'])) {
            $referer = $_SERVER['HTTP_REFERER'];
        }
        else {
            $referer = 'index.php';
        }
    }

    $loggInnKnapp = @$_POST['loggInnKnapp'];

    if ($loggInnKnapp) {
        /* Trykket på logg inn knapp */


        $brukernavn = $_POST['brukernavn'];
        $passord = $_POST['passord'];
        $kryptertPassord = md5($passord);
        
        connectDB();
        $sqlSetning = "SELECT * FROM bruker WHERE brukernavn = '$brukernavn' AND passord = '$kryptertPassord';";
        $result = connectDB()->query($sqlSetning);

        if ($result->num_rows == 0) {
            $tilbakemelding = "Feil brukernavn eller passord";
        }
        elseif ($result->num_rows == 1) {

            while($rad = $result->fetch_assoc()) {
                $id = $rad["id"];

                @session_start();
                $_SESSION['brukerID'] = $id;

                echo '<head><meta http-equiv="refresh" content="0; url=' . $referer . '" /></head>';
                header("Location: " . $referer);
            }
        }
        else {
            // To brukere har samme brukernavn.
            $tilbakemelding = "Ukjent feil. Kontakt systemadministrator";
        }
        connectDB()->close();

    }
    if (!$loggInnKnapp OR @$tilbakemelding) {

        echo '
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
    <script src="js/jqueryFunc.js"></script>
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
    
    <title>Bjarvin Airlines</title>
    
</head>
    <body>
        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <div class="login text-center">
                    <form action="login.php" method="post">';

                    echo '<p style="color:#FFFFFF;">' . @$tilbakemelding . '</p>';
                    echo '<input type="hidden" name="referer" value="' . $referer . '" required/>';

                    echo '
                    <h4>Logg inn</h4>
                    <div class="input-group" required>
                        <span class="input-group-addon" id="sizing-addon2">@</span>
                        <input type="text" class="form-control" placeholder="Epost" aria-describedby="sizing-addon2" name="brukernavn" required>
                    </div>
                    <div class="input-group margin8top">
                        <span class="input-group-addon" id="sizing-addon2">*</span>
                        <input type="password" class="form-control" placeholder="Passord" aria-describedby="sizing-addon2" name="passord" required>
                    </div>
                    <div class="margin16top">
                        <input type="submit" class="btn btn-success" value="Logg inn" name="loggInnKnapp">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        ';
    }
?>
