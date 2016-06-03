<?php
    include_once("lib/funksjoner.php");
    //krevInnlogging('0');
    include_once("head.php");

    
    if (@$_POST['slett']) {
        $id = @$_POST['id'];
        if(slettFlyplass($id)) {
            echo "Informasjonen ble slettet.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['lagre']) {
        $id = @$_POST['id'];
        $navn = $_POST['navn'];
        $flyplasskode = $_POST['flyplasskode'];
        $latitude= $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $tidssone_gmt = $_POST['tidssone_gmt'];
        $land_id = $_POST['land_id'];


        if(oppdaterflyplass($id, $navn, $flyplasskode, $latitude, $longitude, $tidssone_gmt, $land_id)) {
            echo "Informasjonen ble oppdatert.";
        }
        else {
            echo "Noe galt skjedde...";
        }
    }
    elseif (@$_POST['ny'] || @$_POST['endre']) {
        // Hvis endre eller ny er trykket ned
        $id = @$_POST['id'];

        echo'    <!-- Innhold -->
            <form action="' . $_SERVER['PHP_SELF'] . '" id="oppdater" method="post" onsubmit="return validerOppdaterAlleFlyplasser()">
            <div class="col-md-12">';
                if ($_POST['ny']) {
                    echo '<h2>Ny flyplass</h2>';
                }
                elseif ($_POST['endre']) {
                    echo '<h2>Endre flyplass</h2>';
                }
        echo '
            <div class="col-md-12">';
                
                    connectDB();
                    $sql = "SELECT f.id, f.navn, f.flyplasskode, f.latitude, f.longitude, f.tidssone_gmt, f.land_id FROM flyplass f LEFT JOIN land l ON f.land_id=l.id WHERE f.id='$id';";
                    $result = connectDB()->query($sql);

                    if($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            $id = utf8_encode($row["id"]);
                            $navn = utf8_encode($row["navn"]);
                            $flyplasskode = utf8_encode($row["flyplasskode"]);
                            $latitude = utf8_encode($row["latitude"]);
                            $longitude = utf8_encode($row["longitude"]);
                            $tidssone_gmt = utf8_encode($row["tidssone_gmt"]);
                            $land_id = utf8_encode($row["land_id"]);
                            echo '
                            <div class="form-group col-md-6">
                                <lable for="navn">Navn</lable>
                                <input class="form-control" type="text" placeholder="Navn" name="navn" id="navn" value="' . @$navn . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="flyplasskode">Flyplasskode</lable>
                                <input class="form-control" type="text" placeholder="Flyplasskode" name="flyplasskode" id="flyplasskode" value="' . @$flyplassskode . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="land_id">Land ID</lable>';
                            
                            echo landListe($land_id);
                    
                            echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="latitude">Latitude</lable>
                                <input class="form-control" type="text" placeholder="Latitude" name="latitude" id="latitude" value="' . @$latitude . '" required>
                                <lable for="longitude">Longitude</lable>
                                <input class="form-control" type="text" placeholder="Longitude" name="longitude" id="longitude" value="' . @$longitude . '"required>
                            </div>
                            ';

                            echo ' 
                            <div class="form-group col-md-6">
                                <lable for="tidssone_gmt">Tidssone GMT</lable>
                                <select class="form-control" name="tidssone_gmt" id="tidssone_gmt">
                                    <option selected disabled value="' . @$tidssone_gmt . '">' . $tidssone_gmt . '</option>
                                    <option value="-12">(GMT-12:00) International Date Line West</option>
                                    <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                                    <option value="-10">(GMT-10:00) Hawaii</option>
                                    <option value="-9">(GMT-09:00) Alaska</option>
                                    <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                                    <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                                    <option value="-7">(GMT-07:00) Arizona</option>
                                    <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                    <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                                    <option value="-6">(GMT-06:00) Central America</option>
                                    <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                                    <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                    <option value="-6">(GMT-06:00) Saskatchewan</option>
                                    <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                    <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                                    <option value="-5">(GMT-05:00) Indiana (East)</option>
                                    <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                                    <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                                    <option value="-4">(GMT-04:00) Manaus</option>
                                    <option value="-4">(GMT-04:00) Santiago</option>
                                    <option value="-3.5">(GMT-03:30) Newfoundland</option>
                                    <option value="-3">(GMT-03:00) Brasilia</option>
                                    <option value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
                                    <option value="-3">(GMT-03:00) Greenland</option>
                                    <option value="-3">(GMT-03:00) Montevideo</option>
                                    <option value="-2">(GMT-02:00) Mid-Atlantic</option>
                                    <option value="-1">(GMT-01:00) Cape Verde Is.</option>
                                    <option value="-1">(GMT-01:00) Azores</option>
                                    <option value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                                    <option value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                                    <option value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                    <option value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                    <option value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                    <option value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                    <option value="1">(GMT+01:00) West Central Africa</option>
                                    <option value="2">(GMT+02:00) Amman</option>
                                    <option value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                                    <option value="2">(GMT+02:00) Beirut</option>
                                    <option value="2">(GMT+02:00) Cairo</option>
                                    <option value="2">(GMT+02:00) Harare, Pretoria</option>
                                    <option value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                    <option value="2">(GMT+02:00) Jerusalem</option>
                                    <option value="2">(GMT+02:00) Minsk</option>
                                    <option value="2">(GMT+02:00) Windhoek</option>
                                    <option value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                                    <option value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                    <option value="3">(GMT+03:00) Nairobi</option>
                                    <option value="3">(GMT+03:00) Tbilisi</option>
                                    <option value="3.5">(GMT+03:30) Tehran</option>
                                    <option value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
                                    <option value="4">(GMT+04:00) Baku</option>
                                    <option value="4">(GMT+04:00) Yerevan</option>
                                    <option value="4.5">(GMT+04:30) Kabul</option>
                                    <option value="5">(GMT+05:00) Yekaterinburg</option>
                                    <option value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                                    <option value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
                                    <option value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                    <option value="5.75">(GMT+05:45) Kathmandu</option>
                                    <option value="6">(GMT+06:00) Almaty, Novosibirsk</option>
                                    <option value="6">(GMT+06:00) Astana, Dhaka</option>
                                    <option value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
                                    <option value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                    <option value="7">(GMT+07:00) Krasnoyarsk</option>
                                    <option value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                    <option value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
                                    <option value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                    <option value="8">(GMT+08:00) Perth</option>
                                    <option value="8">(GMT+08:00) Taipei</option>
                                    <option value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                    <option value="9">(GMT+09:00) Seoul</option>
                                    <option value="9">(GMT+09:00) Yakutsk</option>
                                    <option value="9.5">(GMT+09:30) Adelaide</option>
                                    <option value="9.5">(GMT+09:30) Darwin</option>
                                    <option value="10">(GMT+10:00) Brisbane</option>
                                    <option value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                                    <option value="10">(GMT+10:00) Hobart</option>
                                    <option value="10">(GMT+10:00) Guam, Port Moresby</option>
                                    <option value="10">(GMT+10:00) Vladivostok</option>
                                    <option value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                                    <option value="12">(GMT+12:00) Auckland, Wellington</option>
                                    <option value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                    <option value="13">(GMT+13:00) Nukualofa</option>
                                </select>
                            </div>';
                        }
                    }
                    else {
                        echo '
                            <div class="form-group col-md-6">
                                <lable for="navn">Navn</lable>
                                <input class="form-control" type="text" placeholder="Navn" name="navn" id="navn" value="' . @$navn . '" required>
                                <input class="form-control" type="hidden" placeholder="ID" name="id" id="id" value="' . @$id . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="flyplasskode">Flyplassnavn</lable>
                                <input class="form-control" type="text" placeholder="Flyplasskode" name="flyplasskode" id="flyplasskode" value="' . @$flyplassskode . '" required>
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="land_id">Land ID</lable>';
                            
                            echo landListe($land_id);
                    
                            echo '
                            </div>
                            <div class="form-group col-md-6">
                                <lable for="latitude">Latitude</lable>
                                <input class="form-control" type="text" placeholder="Latitude" name="latitude" id="latitude" value="' . @$latitude . '" required>
                                <lable for="longitude">Longitude</lable>
                                <input class="form-control" type="text" placeholder="Longitude" name="longitude" id="longitude" value="' . @$longitude . '"required>
                            </div>
                            ';

                            echo ' 
                            <div class="form-group col-md-6">
                                <lable for="tidssone_gmt">Tidssone GMT</lable>
                                <select class="form-control" name="tidssone_gmt" id="tidssone_gmt">
                                    <option selected disabled value="' . @$tidssone_gmt . '">' . $tidssone_gmt . '</option>
                                    <option value="-12">(GMT-12:00) International Date Line West</option>
                                    <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                                    <option value="-10">(GMT-10:00) Hawaii</option>
                                    <option value="-9">(GMT-09:00) Alaska</option>
                                    <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                                    <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                                    <option value="-7">(GMT-07:00) Arizona</option>
                                    <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                    <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                                    <option value="-6">(GMT-06:00) Central America</option>
                                    <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                                    <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                    <option value="-6">(GMT-06:00) Saskatchewan</option>
                                    <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                    <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                                    <option value="-5">(GMT-05:00) Indiana (East)</option>
                                    <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                                    <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                                    <option value="-4">(GMT-04:00) Manaus</option>
                                    <option value="-4">(GMT-04:00) Santiago</option>
                                    <option value="-3.5">(GMT-03:30) Newfoundland</option>
                                    <option value="-3">(GMT-03:00) Brasilia</option>
                                    <option value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
                                    <option value="-3">(GMT-03:00) Greenland</option>
                                    <option value="-3">(GMT-03:00) Montevideo</option>
                                    <option value="-2">(GMT-02:00) Mid-Atlantic</option>
                                    <option value="-1">(GMT-01:00) Cape Verde Is.</option>
                                    <option value="-1">(GMT-01:00) Azores</option>
                                    <option value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                                    <option value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                                    <option value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                    <option value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                    <option value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                    <option value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                    <option value="1">(GMT+01:00) West Central Africa</option>
                                    <option value="2">(GMT+02:00) Amman</option>
                                    <option value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                                    <option value="2">(GMT+02:00) Beirut</option>
                                    <option value="2">(GMT+02:00) Cairo</option>
                                    <option value="2">(GMT+02:00) Harare, Pretoria</option>
                                    <option value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                    <option value="2">(GMT+02:00) Jerusalem</option>
                                    <option value="2">(GMT+02:00) Minsk</option>
                                    <option value="2">(GMT+02:00) Windhoek</option>
                                    <option value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                                    <option value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                    <option value="3">(GMT+03:00) Nairobi</option>
                                    <option value="3">(GMT+03:00) Tbilisi</option>
                                    <option value="3.5">(GMT+03:30) Tehran</option>
                                    <option value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
                                    <option value="4">(GMT+04:00) Baku</option>
                                    <option value="4">(GMT+04:00) Yerevan</option>
                                    <option value="4.5">(GMT+04:30) Kabul</option>
                                    <option value="5">(GMT+05:00) Yekaterinburg</option>
                                    <option value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                                    <option value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
                                    <option value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                    <option value="5.75">(GMT+05:45) Kathmandu</option>
                                    <option value="6">(GMT+06:00) Almaty, Novosibirsk</option>
                                    <option value="6">(GMT+06:00) Astana, Dhaka</option>
                                    <option value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
                                    <option value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                    <option value="7">(GMT+07:00) Krasnoyarsk</option>
                                    <option value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                    <option value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
                                    <option value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                    <option value="8">(GMT+08:00) Perth</option>
                                    <option value="8">(GMT+08:00) Taipei</option>
                                    <option value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                    <option value="9">(GMT+09:00) Seoul</option>
                                    <option value="9">(GMT+09:00) Yakutsk</option>
                                    <option value="9.5">(GMT+09:30) Adelaide</option>
                                    <option value="9.5">(GMT+09:30) Darwin</option>
                                    <option value="10">(GMT+10:00) Brisbane</option>
                                    <option value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                                    <option value="10">(GMT+10:00) Hobart</option>
                                    <option value="10">(GMT+10:00) Guam, Port Moresby</option>
                                    <option value="10">(GMT+10:00) Vladivostok</option>
                                    <option value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                                    <option value="12">(GMT+12:00) Auckland, Wellington</option>
                                    <option value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                    <option value="13">(GMT+13:00) Nukualofa</option>
                                </select>
                            </div>';
                    }
                    connectDB()->close();
            echo'
            </div>
               <div class="col-md-12">
                    <input type="submit" id="lagre" name="lagre" class="btn btn-info" value="lagre">
                </div>
            </div>
            </form>
            <!-- Innhold -->';
    }
    

        echo'<div class="col-md-12">
            <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
            <h2>Alle flyplasser</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Valgt</th>
                        <th>Navn</th>
                        <th>Flyplasskode</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Tidssone</th>
                        <th>Landid</th>
                    </tr>
                </thead>
                    <tbody>
        ';
                            connectDB();
                            $sql = "SELECT f.id, f.navn, f.flyplasskode, f.latitude, f.longitude, f.tidssone_gmt, f.land_id FROM flyplass f LEFT JOIN land l ON f.land_id=l.id;";
                            $result = connectDB()->query($sql);

                            if($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {

                                    $id = utf8_encode($row["id"]);
                                    $navn = utf8_encode($row["navn"]);
                                    $flyplasskode = utf8_encode($row["flyplasskode"]);
                                    $latitude = utf8_encode($row["latitude"]);
                                    $longitude = utf8_encode($row["longitude"]);
                                    $tidssone_gmt = utf8_encode($row["tidssone_gmt"]);
                                    $land_id = utf8_encode($row["land_id"]);
                                    echo '<tr>
                                                <td><input type="radio" name="id" value="' . $id . '"></td>
                                                <td>' . $navn . '</td>
                                                <td>' . $flyplasskode . '</td>
                                                <td>' . $latitude . '</td>
                                                <td>' . $longitude . '</td>
                                                <td>' . $tidssone_gmt . '</td>
                                                <td>' . $land_id . '</td>
                                          </tr>';
                                }
                            }
                        
        echo '
                     </tbody>
                    </table>
                    <div class="col-md-1">
                        <input type="submit" name="endre" class="btn btn-info" value="Endre" />
                    </div>
                    <div class="col-md-1 col-md-offset-4 text-center">
                        <input type="submit" name="ny" class="btn btn-success" value="Legg til" />
                    </div>
                    <div class="col-md-1 col-md-offset-4 pull-right">
                        <input type="submit" name="slett" href="#" class="btn btn-danger" value="Slett"/>
                    </div>
                </form>
        </div>
        <!-- Innhold -->
        ';

    




    include_once ("end.php");
?>