<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Cloud weather screen</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3 {
  position: relative;
  opacity: 0.65;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("brno.jpg");
  height: 100%;
}

.caption {
  position: absolute;
  left: 0;
  top: 80%;
  width: 100%;
  text-align: left;
  color: #000;
}

.caption span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 20px "Lato", sans-serif;
  color: #111;
}
</style>
<body>
<span>   Zde budou zobrazeny informace o počasí ve Vámi vybraném městě.</span>

<div class="bgimg-1">
  <div class="caption">
		<?php

		    $key = "52c736a22dea47b1810101240181505";
		    $city = "Brno";
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
				foreach ($days as $day){
						if($i == 0){
									echo '<span class="border">COMPANY LOGO | '.$day->date.' | Teplota: '.$weather->current->temp_c.'°C | <img src="'.$day->day->condition->icon.'" alt="" width=30> | Dnes: '.$weather->forecast->forecastday[0]->day->mintemp_c.'-'.$weather->forecast->forecastday[0]->day->maxtemp_c.'°C </span><br>';
									echo '<span class="border"> '.$weather->forecast->forecastday[1]->date' | '.$weather->forecast->forecastday[1]->day->mintemp_c.' - '.$weather->forecast->forecastday[1]->day->avgtemp_c.' - '.$weather->forecast->forecastday[1]->day->maxtemp_c.'°C | <img src="'.$weatherforecast->forecastday[1]->day->condition->icon.'" alt="" width=30></span>';
										/*
										echo '<span><img src="images/icon-umberella.png" alt="">20%</span>';
										echo '<span><img src="images/icon-wind.png" alt="">'.$weather->current->wind_kph.'&nbsp;km/h</span>';
										echo '<span><img src="images/icon-compass.png" alt="">'.$weather->current->wind_degree.'<sup>o</sup></span>';
										*/
								$i++;
						}}

				?>
  </div>
</div>



		<script src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
