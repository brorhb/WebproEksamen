<?php
    include_once ('head.php');
?>
<div class="container" style="margin-top:55px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h2>Registrer reisende</h2>
        </div>
        <div class="col-md-2 inline">
            <h3><div class="totaltReisende">0</div><button class="glyphicon glyphicon-plus legg_til_reisende" style="background:none; border:none;"></button></h3>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form method="" action="prisside.php" name="registrerReisende" id="registrerReisende" onsubmit="return validerReisende()">
                <div class="form-group">
                    <div class="formWrapper">
                        
                    </div>
                </div>
                <input type="submit" class="btn btn-default pull-right" value="Bekreft">
            </form>
        </div>
    </div>
</div>
<?php
    include_once ('end.php');
?>