<?php
    include_once('funksjoner.php');

    // For å videresende til riktig side
    if (erLoggetInn()) {
        header("Location: index.php");
    }
    /*elseif (@$_POST['referer'])
    {
        $referer = $_POST['referer'];
    }*/
    else
    {
        // Sender brukeren til riktig side etter at man har logget inn
        /*if (strpos($_SERVER['REQUEST_URI'],'login.php') == false) {
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
        else {*/
            $referer = 'index.php';
        //}
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

                //echo "Referer: " . $referer;
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

        echo'
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <br>
                    <h3>Logg inn</h3>
                    <form role="form" method="post" id="logginn" action="logg-inn.php" onsubmit="">
        ';
                        echo '<p style="color:red;">' . @$tilbakemelding . '</p>';
                        echo '<input type="hidden" name="referer" value="' . $referer . '" />';
        echo '
                        <label for="brukernavn" class="h4">Brukernavn</label>
                        <input placeholder="Skriv inn brukernavn" type="text" class="form-control" id="brukernavn" name="brukernavn" required>
                        <label for="passord" class="h4">Passord</label>
                        <input placeholder="Skriv inn passord" type="password" class="form-control" id="passord" name="passord" required>
                        <p>Ikke bruker? <a href="registrer-bruker.php">Registrer bruker</a></p>
                        <button type="submit" class="btn btn-success pull-right btn-lg" value="Logg inn" id="loggInnKnapp" name="loggInnKnapp">
                            <h4>Logg inn</h4>
                        </button>
                        <button type="reset" class="btn btn-danger pull-left btn-lg" value="Nullstill" id="nullstill" name="nullstill">
                            <h4>Nullstill</h4>
                        </button>
                    </form>
                    <div id="feilmeldinger"></div>
                </div>
            </div>
        ';
    }
?>
