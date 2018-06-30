<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>IBM počasí</title>

		<!-- Loading third party fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


    <script type="text/javascript">
    $(document).ready(function($){
      $('#weatherForm').submit(function(event){
          event.preventDefault();
          var weatherCity = $('#weatherCity').val();

          $.ajax({
              type: 'POST',
              url: "../backend/Forcast.php",
              data: {data: weatherCity},
              //data: weatherData,
              //dataType: "html",
              success: function(data){
                  $('#forecastTable').replaceWith(data)
              }
          });
        });

var arr = [];
$.getJSON("../backend/cities.json", function(data) {
    $.each(data, function(key, value) {
        if ($.inArray(value.name, arr) === -1) {
            arr.push(value.name)
        }
    })
});
$("#weatherCity").autocomplete({
    source: arr
});


    });
    </script>

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
							<li class="menu-item current-menu-item"><a href="index.html">Domů</a></li>
							<li class="menu-item"><a href="first.php">Oblíbená města</a></li>
							<li class="menu-item"><a target="_blank" href="cws.php">Cloud weather screen</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="images/banner.png">
				<div class="container">
					<form id="weatherForm" class="find-location">
						<input id="weatherCity" list="json-datalist" type="text" placeholder="Vyhledat město pomocí názvu nebo PSČ">
                        <datalist id="json-datalist"></datalist>
						<input type="submit" value="Vyhledat">
					</form>
				</div>
			</div>

			<div id="forecastTable" class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day">Pondělí</div>
								<div class="date">25. června</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location">Brno</div>
								<div class="degree">
									<div class="num">26<sup>o</sup>C</div>
									<div class="forecast-icon">
										<img src="images/icons/icon-1.svg" alt="" width=90>
									</div>
								</div>
								<span><img src="images/icon-umberella.png" alt="">10%</span>
								<span><img src="images/icon-wind.png" alt="">18km/h</span>
								<span><img src="images/icon-compass.png" alt="">Západní</span>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Úterý</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/icon-3.svg" alt="" width=48>
								</div>
								<div class="degree">24<sup>o</sup>C</div>
								<small>17<sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Středa</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/icon-5.svg" alt="" width=48>
								</div>
								<div class="degree">25<sup>o</sup>C</div>
								<small>18<sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Čtvrtek</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/icon-7.svg" alt="" width=48>
								</div>
								<div class="degree">27<sup>o</sup>C</div>
								<small>20<sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Pátek</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/icon-12.svg" alt="" width=48>
								</div>
								<div class="degree">28<sup>o</sup>C</div>
								<small>23<sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Sobota</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/icon-13.svg" alt="" width=48>
								</div>
								<div class="degree">27<sup>o</sup>C</div>
								<small>20<sup>o</sup></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Neděle</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/icon-14.svg" alt="" width=48>
								</div>
								<div class="degree">26<sup>o</sup>C</div>
								<small>20<sup>o</sup></small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<main class="main-content">


				 <!-- .main-content -->

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