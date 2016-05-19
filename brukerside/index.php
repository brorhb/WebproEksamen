<?php
    include_once "head.php"
?>

<!-- Header bilde -->
    <div class="row headerBilde"></div>
<!-- Header bilde -->

<!-- Innhold -->
<div class="container">
    
    <!-- Bestille reise -->
    <form method="GET" role="form" id="bestillReiseSkjema" name="bestillReiseSkjema" onsubmit="return validerBestilling()">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 bestillReiseBoks">
                
                <div class="row">
                    <!-- Radio knapper -->
                    <div class="col-md-6">
                        <div class="radio" name="reiseType" id="reiseType">
                            <div class="col-md-6">
                                <label><input type="radio" name="reisevalg" id="turRetur" checked>Tur/Retur</label>
                            </div>
                            <div class="col-md-6">
                                <label><input type="radio" name="reisevalg" id="enVei">En vei</label>
                            </div>
                        </div>
                    </div>
                    <!-- Radio knapper -->
                    
                    <!-- Antall reisende -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="antallVoksene" id="antallVoksene">
                                <option value="0">0 Voksene</option>
                                <option selected value="1">1 Voksen</option>
                                <option value="2">2 Voksene</option>
                                <option value="3">3 Voksene</option>
                                <option value="4">4 Voksene</option>
                                <option value="5">5 Voksene</option>
                                <option value="6">6 Voksene</option>
                                <option value="7">7 Voksene</option>
                                <option value="8">8 Voksene</option>
                                <option value="9">9 Voksene</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="antallUnge" id="antallUnge">
                                <option selected value="0">0 Unge(0-25)</option>
                                <option value="1">1 Unge</option>
                                <option value="2">2 Unge</option>
                                <option value="3">3 Unge</option>
                                <option value="4">4 Unge</option>
                                <option value="5">5 Unge</option>
                                <option value="6">6 Unge</option>
                                <option value="7">7 Unge</option>
                                <option value="8">8 Unge</option>
                                <option value="9">9 Unge</option>
                            </select>
                        </div>
                    </div>
                    <!-- Antall reisende -->
                </div> <!-- /row -->
                
                <!-- Fra/til land -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Fra"><h4>Fra</h4></label>
                            <select class="form-control" name="fraLand" id="fraLand">
                                <option selected disabled value="0">---</option>
                                <option value="Norge">Norge</option>
                                <option value="Sverige">Sverige</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6" id="retur">
                        <div class="form-group">
                            <label for="Til"><h4>Til</h4></label>
                            <select class="form-control" name="tilLand" id="tilLand">
                                <option selected disabled value="0">---</option>
                                <option value="Norge">Norge</option>
                                <option value="Sverige">Sverige</option>
                            </select>
                        </div>
                    </div>
                </div><!-- /row -->
                <!-- Fra/til lanf -->
                
                <!-- Dato -->
                <div class="row">
                    <div class="col-md-6" id="fraDato">
                        <div class="form-group" name="fraDato" id="fraDato">
                            <label for="Fra"><h4>Fra dato </h4></label>
                            <input class="form-control" type="text" class="span2" value="" id="dpd1">
                        </div>
                    </div>
                    <div class="col-md-6" id="tilDato">
                        <div class="form-group" name="tilDato" id="tilDato">
                            <label for="Til"><h4>Til dato </h4></label>
                            <input class="form-control" type="text" class="span2" value="" id="dpd2">
                        </div>
                    </div>
                </div>
                <!-- Dato -->
                
                <input type="submit" class="btn btn-default" value="Bekreft"/>
            </div>
        </div>
    </form>
    <!-- Bestille reise -->
    
    <!-- Populære reiser -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Populære reiser</h2>
            <p>I tvil på hvor du vil reise? Her en liten oversikt over populære reisemål</p>
            <table class="table">
                <thead>
                    <tr>
                        <th><h4>Land</h4></th>
                        <th><h4>Flyplass</h4></th>
                        <th><h4>Pris</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Polen</strong></td>
                        <td>Krakow</td>
                        <td>fra 499,-</td>
                    </tr>
                    <tr>
                        <td><strong>Polen</strong></td>
                        <td>Krakow</td>
                        <td>fra 499,-</td>
                    </tr><tr>
                        <td><strong>Polen</strong></td>
                        <td>Krakow</td>
                        <td>fra 499,-</td>
                    </tr><tr>
                        <td><strong>Polen</strong></td>
                        <td>Krakow</td>
                        <td>fra 499,-</td>
                    </tr><tr>
                        <td><strong>Polen</strong></td>
                        <td>Krakow</td>
                        <td>fra 499,-</td>
                    </tr><tr>
                        <td><strong>Polen</strong></td>
                        <td>Krakow</td>
                        <td>fra 499,-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Populære reiser -->
</div>
<!-- Innhold -->


<?php
    include_once "end.php"
?>