<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Appointment Submitted</title>

	<style>
	a{
	font-size: 60;
	}
	.container{
	width: 500;
	height: 2000;
	background: gray;
	}
	body {
	color: white;
	background: black;

	}
	h1 {
	font-family: Avenir;
	color: aqua;
	text-align: center;
	font-size: 40pt;
	}

	</head>
	</style>
	<body>


<?php
  $apmonth = $_POST['month'];
  $apdate = $_POST['date'];
  $aptime = $_POST['time'];
$today = date('m.d.y');
  $service = $_POST['service'];
  $servicelength = substr($service , 0, 2);
  $intservicelength =floatval($servicelength);
  $servicehours = $intservicelength * 60;

$startdate = '2017' . '-' . $apmonth . '-' . $apdate ;
$format = 'H:i';
$start = DateTime::createFromFormat($format, $aptime);
$starttime = $start->format('H:i');
echo $starttime;

$endtime = $start->add(new DateInterval("PT{$servicehours}M"));
$end_time = $endtime->format('H:i');

echo $end_time;

	$contact = $_POST['name'] . ';' . $_POST['number'] . ';' . $_POST['email'] . ';' . $_POST['comments'] . ';' .  $today . ';';

  $data = $contact . $startdate . ';' . $starttime . ';' . $service . ';' .  $end_time .  ';' . PHP_EOL;
	echo $data;
	$ret = file_put_contents('appointments.txt', $data, FILE_APPEND | LOCK_EX);
	if($ret === false) {
		die('There was an error saving your post');
	}
	else {
		echo "Your blog data has been saved";
	}



			$link_address = "index.html";
			echo "<a href='".$link_address."'>Back to Home Page</a>";
