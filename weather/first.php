<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Oblíbená města</title>

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

		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">CloudWeather</h1>
							<small class="site-description">PA181 project</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.html">Domů</a></li>
							<li class="menu-item current-menu-item"><a href="first.php">Oblíbená města</a></li>
							<li class="menu-item"><a target="_blank" href="cws.php">Cloud weather screen</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="index.html">Domů</a>
						<span>Oblíbená města</span>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
							<div class="photo">
									<div class="photo-preview photo-detail" data-bg-image="images/photo-4.jpg"></div>
									<div class="photo-details">
										<h3 class="photo-title"><a href="#">Brno</a></h3>
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
																	echo '<p><ul><li>Dnes</li><li> Počasí: '.$weather->current->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$day->day->condition->icon.'" alt="" width=30> </li>
																	<li>Průměrná teplota:'.$weather->forecast->forecastday[0]->day->avgtemp_c.' </li>
																	<li>Srážky:'.$weather->current->precip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[0]->day->mintemp_c.'</li><li>Nejvyšší teplota:'.$weather->forecast->forecastday[0]->day->maxtemp_c.'°C</li></ul><br>';

																	echo 'Zítra:<ul><li>Počasí:'.$weather->forecast->forecastday[1]->day->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$weather->forecast->forecastday[1]->day->condition->icon.'" alt="" width=30> </li>
																	<li> Průměrná teplota:'.$weather->forecast->forecastday[1]->day->mintemp_c.'</li>
<li> Srážky:'.$weather->forecast->forecastday[1]->day->totalprecip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[1]->day->avgtemp_c.'</li><li>Nejvyšší teplota: '.$weather->forecast->forecastday[1]->day->maxtemp_c.'°C </li></ul></p>';
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
							<div class="photo">
									<div class="photo-preview photo-detail" data-bg-image="images/photo-4.jpg"></div>
									<div class="photo-details">
										<h3 class="photo-title"><a href="#">Třinec</a></h3>
										<?php

												$key = "52c736a22dea47b1810101240181505";
												$city = "Trinec";
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
																	echo '<p><ul><li>Dnes</li><li> Počasí: '.$weather->current->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$day->day->condition->icon.'" alt="" width=30> </li>
																	<li>Průměrná teplota:'.$weather->forecast->forecastday[0]->day->avgtemp_c.' </li>
																	<li>Srážky:'.$weather->current->precip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[0]->day->mintemp_c.'</li><li>Nejvyšší teplota:'.$weather->forecast->forecastday[0]->day->maxtemp_c.'°C</li></ul><br>';

																	echo 'Zítra:<ul><li>Počasí:'.$weather->forecast->forecastday[1]->day->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$weather->forecast->forecastday[1]->day->condition->icon.'" alt="" width=30> </li>
																	<li> Průměrná teplota:'.$weather->forecast->forecastday[1]->day->mintemp_c.'</li>
<li> Srážky:'.$weather->forecast->forecastday[1]->day->totalprecip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[1]->day->avgtemp_c.'</li><li>Nejvyšší teplota: '.$weather->forecast->forecastday[1]->day->maxtemp_c.'°C </li></ul></p>';
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
							</div>

							<div class="col-md-6">

								<div class="photo">
									<div class="photo-preview photo-detail" data-bg-image="images/photo-9.jpg"></div>
									<div class="photo-details">
										<h3 class="photo-title"><a href="#">Praha</a></h3>
										<?php

												$key = "52c736a22dea47b1810101240181505";
												$city = "Praha";
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
																	echo '<p><ul><li>Dnes</li><li> Počasí: '.$weather->current->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$day->day->condition->icon.'" alt="" width=30> </li>
																	<li>Průměrná teplota:'.$weather->forecast->forecastday[0]->day->avgtemp_c.' </li>
																	<li>Srážky:'.$weather->current->precip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[0]->day->mintemp_c.'</li><li>Nejvyšší teplota:'.$weather->forecast->forecastday[0]->day->maxtemp_c.'°C</li></ul><br>';

																	echo 'Zítra:<ul><li>Počasí:'.$weather->forecast->forecastday[1]->day->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$weather->forecast->forecastday[1]->day->condition->icon.'" alt="" width=30> </li>
																	<li> Průměrná teplota:'.$weather->forecast->forecastday[1]->day->mintemp_c.'</li>
<li> Srážky:'.$weather->forecast->forecastday[1]->day->totalprecip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[1]->day->avgtemp_c.'</li><li>Nejvyšší teplota: '.$weather->forecast->forecastday[1]->day->maxtemp_c.'°C </li></ul></p>';
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
								<div class="photo">
									<div class="photo-preview photo-detail" data-bg-image="images/photo-10.jpg"></div>
									<div class="photo-details">
										<h3 class="photo-title"><a href="#">Olomouc</a></h3>
										<?php

												$key = "52c736a22dea47b1810101240181505";
												$city = "Olomouc";
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
																	echo '<p><ul><li>Dnes</li><li> Počasí: '.$weather->current->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$day->day->condition->icon.'" alt="" width=30> </li>
																	<li>Průměrná teplota:'.$weather->forecast->forecastday[0]->day->avgtemp_c.' </li>
																	<li>Srážky:'.$weather->current->precip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[0]->day->mintemp_c.'</li><li>Nejvyšší teplota:'.$weather->forecast->forecastday[0]->day->maxtemp_c.'°C</li></ul><br>';

																	echo 'Zítra:<ul><li>Počasí:'.$weather->forecast->forecastday[1]->day->condition->text.'  '.$weather->current->temp_c.'°C  <img src="'.$weather->forecast->forecastday[1]->day->condition->icon.'" alt="" width=30> </li>
																	<li> Průměrná teplota:'.$weather->forecast->forecastday[1]->day->mintemp_c.'</li>
<li> Srážky:'.$weather->forecast->forecastday[1]->day->totalprecip_mm.' mm</li>
																	<li>Nejnižší teplota: '.$weather->forecast->forecastday[1]->day->avgtemp_c.'</li><li>Nejvyšší teplota: '.$weather->forecast->forecastday[1]->day->maxtemp_c.'°C </li></ul></p>';
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
							</div>
						</div>
					</div>
				</div>

			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">


					<p class="colophon">CloudWeather</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
