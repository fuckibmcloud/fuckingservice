<style type="text/css">
  table {
    border-collapse: collapse;
    width: 50%;
    border-top: 3px solid !important;
}

table, th, td {
    border: 1px solid black;
    text-align: center;
}
</style>
<?php

    $key = "52c736a22dea47b1810101240181505";
    $city = $_POST['data'];
    $forcast_days = '7';
    $url ="http://api.apixu.com/v1/forecast.json?key=$key&q=$city&days=$forcast_days&=";
    
    // demo url = http://api.apixu.com/v1/forecast.json?key=52c736a22dea47b1810101240181505&q=trencin&days=7&=

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $json_output=curl_exec($ch);
    $weather = json_decode($json_output);


    $days = $weather->forecast->forecastday;
    $i = 0;
    
    echo '<div id="forecastTable" class="forecast-table">';
      echo '<div class="container">';
        echo '<div class="forecast-container">';
        
    foreach ($days as $day){
        if($i == 0){
          echo '<div class="today forecast">';
            echo '<div class="forecast-header">';
  						echo '<div class="day">Today</div>';
  						echo '<div class="date">'.$day->date.'</div>';
  					echo '</div>';
            echo '<div class="forecast-content">';
								echo '<div class="location">'.$weather->location->name.',&nbsp;'.$weather->location->country.'</div>';
								echo '<div class="degree">';
									echo '<div class="num">'.$weather->current->temp_c.'<sup>o</sup>C</div>';
									echo '<div class="forecast-icon">';
										echo '<img src="'.$day->day->condition->icon.'" alt="" width=90>';
									echo '</div>';
								echo '</div>';
                /*
								echo '<span><img src="images/icon-umberella.png" alt="">20%</span>';
								echo '<span><img src="images/icon-wind.png" alt="">'.$weather->current->wind_kph.'&nbsp;km/h</span>';
								echo '<span><img src="images/icon-compass.png" alt="">'.$weather->current->wind_degree.'<sup>o</sup></span>';
                */
							echo '</div>';
						echo '</div>';
            $i++;
        }
        else {
            echo '<div class="forecast">';
							echo '<div class="forecast-header">';
								echo '<div class="day">'.$day->date.'</div>';
							echo '</div> <!-- .forecast-header -->';
							echo '<div class="forecast-content">';
								echo '<div class="forecast-icon">';
									echo '<img src="'.$day->day->condition->icon.'" alt="" width=48>';
								echo '</div>';
								echo '<div class="degree">'.$day->day->maxtemp_c.'<sup>o</sup>C</div>';
								echo '<small>'.$day->day->mintemp_c.'<sup>o</sup></small>';
							echo '</div>';
						echo '</div>';
        }
      /*
        echo "<tr><td colspan='4' border='0'><h2>{$day->date}</h2> Sunrise: {$day->astro->sunrise} <br> Sunset: {$day->astro->sunset}"
        . "<br> condition: {$day->day->condition->text} <img src=' {$day->day->condition->icon}'/></td></tr>";

        echo "<tr><td>&nbsp;</td><td>Max.<br>Temprature</td><td>Min.<br>Temprature</td><td>Avg.<br>Temprature</td></tr>";

        echo "<tr><td>&deg;C</td><td>{$day->day->maxtemp_c}</td><td>{$day->day->mintemp_c}</td><td>{$day->day->avgtemp_c}</td></tr>";
        echo "<tr><td>&deg;F</td><td>{$day->day->maxtemp_f}</td><td>{$day->day->mintemp_f}</td><td>{$day->day->avgtemp_f}</td></tr>";

        echo "<tr><td><h4>Wind</h4></td><td colspan='3'>{$day->day->maxwind_mph}Mph <br> {$day->day->maxwind_kph}kph </td></tr>";
          foreach ($day->hour as $hr){
  
              echo "<tr><td colspan='4' border='0'>";
              echo "<table style='width:100%;'>";
  
              echo "<tr><td>Time</td><td>Temprature</td><td>Wind</td><td>Humidity</td></tr>";
              echo "<tr><td><div>{$hr->time}<img src=' {$hr->condition->icon}'/></div></td><td>{$hr->temp_c}&deg;C<br>{$hr->temp_f}&deg;F</td><td>{$hr->wind_mph}Mph <br> {$hr->wind_kph}kph</td><td>$hr->humidity</td></tr>";
  
              echo "</table></tr></td>";
          }*/
    }
    
        echo "</div>";
      echo "</div>";
    echo "</div>";