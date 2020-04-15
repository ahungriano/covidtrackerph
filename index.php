<?php
/*
worldwide covid19 count (start)
*/
$covid19_data = file_get_contents("https://www.worldometers.info/coronavirus/#countries");

$infected_start = explode('<span style="color:#aaa">', $covid19_data);
$infected_end = explode('<div style="text-align:center ">', $infected_start[1]);

$mortality_start = explode('<h1>Deaths:</h1>', $covid19_data);
$mortality_end = explode('</div>', $mortality_start[1]);

$recovery_start = explode('<div class="maincounter-number" style="color:#8ACA2B ">', $covid19_data);
$recovery_end = explode('</div>', $recovery_start[1]);

$world_infected_data = $infected_end[0];
$world_mortality_data = $mortality_end[0];
$world_recovery_data = $recovery_end[0];

// for testing purposes
// echo $world_infected_data;
// echo $world_mortality_data;
// echo $world_recovery_data;
/*
worldwide covid19 count (end)

==============================================================================================================

phil covid19 count (start)
*/
$covid19_ph = file_get_contents("https://www.worldometers.info/coronavirus/country/philippines/");

$infected_ph_start = explode('<div class="maincounter-number">', $covid19_ph);
$infected_ph_end = explode('</div>', $infected_ph_start[1]);

$mortality_ph_start = explode('<span>', $covid19_ph);
$mortality_ph_end = explode('</div>', $mortality_ph_start[1]);

$recovery_ph_start = explode('<h1>Recovered:</h1>', $covid19_ph);
$recovery_ph_end = explode('<div style="margin-top:50px;">', $recovery_ph_start[1]);

$ph_infected_data = $infected_ph_end[0];
$ph_mortality_data = $mortality_ph_end[0];
$ph_recovery_data = $recovery_ph_end[0];

// for testing purposes
// echo $ph_infected_data;
// echo $ph_mortality_data;
// echo $ph_recovery_data;
/*
phil covid19 count (end)
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="15">
		<title>Covid Tracker PH</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="48x48">
	</head>
	<body onload=display_ct();>
		<div class="container">
			<p align="center" style="font-size: 40px; font-weight: bold;">COVID-19 LIVE UPDATE</p>
			<table class="table table-responsive" border="0" align="center" width="100%">
				<thead>
					<center><p style="font-size: 38px; font-weight: bold;">Worldwide</p></center>
				</thead>
				<tbody>
					<tr>
						<td align="center" width="33%">
							<p style="font-size: 36px;">Infection:</p> <!--#B2B2B2-->
							<h1 style="font-size: 48px; color: #FEAA2A; font-weight: bold;"><?php echo $world_infected_data; ?></h1>
						</td>
						<td align="center" width="33%">
							<p style="font-size: 36px;">Mortality:</p>
							<h1 style="font-size: 48px; color: #A60000; font-weight: bold;"><?php echo $world_mortality_data; ?></h1>
						</td>
						<td align="center" width="33%">
							<p style="font-size: 36px;">Recovery:</p>
							<h1 style="font-size: 48px; color: #8ACA2B; font-weight: bold;"><?php echo $world_recovery_data; ?></h1>
						</td>
					</tr>
				</tbody>
			</table>
<!--==========================================================================================================================-->
			<table class="table table responsive" border="0" align="center" width="100%">
				<thead>
					<center><p style="font-size: 38px; font-weight: bold;">Philippines</p></center>
				</thead>
				<tbody>
					<tr>
						<td align="center" width="33%">
							<p style="font-size: 36px;">Infection:</p>
							<h1 style="font-size: 48px; color: #B2B2B2; font-weight: bold;"><?php echo $ph_infected_data; ?></h1>
						</td>
						<td align="center" width="33%">
							<p style="font-size: 36px;">Mortality:</p>
							<h1 style="font-size: 48px; color: #A60000; font-weight: bold;"><?php echo $ph_mortality_data; ?></h1>
						</td>
						<td align="center" width="33%">
							<p style="font-size: 36px;">Recovery:</p>
							<h1 style="font-size: 48px; color: #8ACA2B; font-weight: bold;"><?php echo $ph_recovery_data ?></h1>
						</td>
					</tr>
				</tbody>
			</table>
			<hr/>
			<center>
				<h2><span id='ct' ></span></h2>
			</center>
		</div>
		<script type="text/javascript"> 
			function display_c(){
			var refresh=1000; // Refresh rate in milli seconds
			mytime=setTimeout('display_ct()',refresh)
			}

			function display_ct() {
			var x = new Date()
			document.getElementById('ct').innerHTML = x;
			display_c();
			 }
		</script>
	</body>
</html>
