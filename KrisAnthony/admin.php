<html>
<head>

<title>Appointment Manager </title>
<h3> Appointment Manager</h3>
</head>

<style>

body {
		font-family: Avenir;
		position: relative;

}
h3{
	font-size: 80pt;
	color: teal;
	text-align: center;
	background: silver;
}
h1 {
	margin: 0;
	font-size: 20pt;
	 text-align: center;
	clear: both;
	color: white;
	background: black;
}
h2 {
	 text-align: center;
	padding: 5px;
	width: 100%;
	background: gray;
	clear: both;
	overflow:auto;
	display: block;
  margin: 0;
}
img {
	border-radius: 8px;
	width: 600px;
	height: 300px;
	display:block;
	margin-left:auto;
	margin-right:auto;
		}
p{
	font-size: 10pt;
  text-align: center;


	border-style: solid;
	clear: both;
	overflow:auto;
	display: block;
	width: 100% ;
}

</style>
<body>

<?php




	$csvFile = file('appointments.txt');
		$appointments = [];
		foreach ($csvFile as $line) {
			$appointments[] = str_getcsv($line, ";");
		}

	 foreach ($appointments as list($a, $b, $c, $d , $e, $f, $g, $h)) {
		// $a contains the first element of the nested array,
		// and $b contains the second element.
    echo "< div class = "appt">";
    echo "<p> request made on $e</p>";
		echo "<h1> $a   </br> $b  </br> $c </h1>";
		echo "<h2> Appointment Request = $f at $g for $h </h2></br>";
    echo  "</div";


		echo " <hr>";



	}
?>
</body>
</html>
