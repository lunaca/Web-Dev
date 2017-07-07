<!DOCTYPE html>
<html>
	<head>
	
	<style> 
	
	.logoimage{
		 width: 340px;
		margin-top: auto;
		overflow:hidden;
		margin-left: 30px;
		border: 3px solid;
		
	}
	
	body{
	background-image: url("CREPES.jpg");
	background-size: 100% 100%;
	background-repeat: no-repeat;
	background-attachment: fixed;
	margin: 0;
	padding: 0;
	width: 100%;
	
	
	}
	.flexcontainer
	{display:flex;
	 width:100%;
	height:100%;
	
	align-items: center;
	padding-top:50px;
	}
	.allflexcontainer{
	display:flex;
	 width:100%;
	height:100%;

	margin-left: 30px;
	}
	.contentflexcontainer
	{display:flex;
	 width:100%;
	height:100%;
	
	
	font-family: "Lantinghei SC";
	flex-direction: column;
	}
	/* Add a black background color to the top navigation */
	.topnav { display: flex;
		background-color: #333;
		overflow: hidden;
		opacity: 0.9;
		height:60px;
		width: 100%;
		flex-wrap: wrap;
	
	}

	/* Style the links inside the navigation bar */
	.topnav a {
		
		float: left;
		color: #f2f2f2;
		font-family: "DIN Condensed";
		padding: 20px 30px;
		text-decoration: none;
		font-size: 25px;
		flex-wrap: wrap;
		
		
	}

	/* Change the color of links on hover */
	.topnav a:hover {
		background-color: #ddd;
		color: black;
	}

	/* Add a color to the active/current link */
	.topnav a.active {
		background-color: #4CAF50;
		color: white;
	}
	
	.details{
	background: white;
	margin-left: 30px;
	margin-right: 40px;
	width: 250px;
	height: 800px;	
	opacity: 0.8;
	border: 2px solid;
	text-align: center;
	font-family: "Avenir Next";
	
	}
	.content{
	background: rgba(0, 0, 0, 0.8);
	max-width: 1000px;
	display:flex;
	margin-left: 100px;
	display: -ms-flex;
	display: -webkit-flex;
	margin-right: 50px;
	}
	.ourmenu
	{display: inherit;
	width: 300px;
	height: 100px;
	font-size: 30px;
	background: white;
	border: 2px solid;
	text-align: center;
	align-items: center;
	justify-content: center;
	align-self: center;
	
	}
	

	
	h1 { font-weight:normal; 
	}
	.menu-body {
			max-width: 1000px;
			margin: 0 auto;
			display: block;
			color: white;
			margin-left: 30px;
			margin-right: 20px;
			flex-grow: 1;
			flex-basis: 0;
		}
		 
		
		 
		.menu-section-title {
			font-family: "Lantinghei SC";
			font-size: 30px;
			display: block;
			font-weight:normal;
			margin: 20px 0; 
			margin-left: 15px;
		}
		 
		.menu-item {
			margin: 35px 0;
			font-size: 18px;
		}
		 
		.menu-item-name{
			font-family: "Lantinghei SC";
			font-size: 19px;
			
		}
		 
		.menu-item-description {
		
			font-size: .8em;
			line-height: 1.5em;
		}
		 
		.menu-item-price{
			float: right;
			font-weight: bold;
			font-family: arial;
			margin-top: -22px;
		}
		.menu-item-picture{
		overflow: hidden;
		margin-right: 30px;
		border: 2px solid;
		border-color: white;
		}
	</style>
	
	</head>
	
	<body>
	
	
	<div class = "flexcontainer" >
	<div class="logoimage"><img src = "streetsidelogo.jpg" style='height: 100%; width: 100%; object-fit: contain'/>
	</div>
	<div class="topnav" id="myTopnav" >
		<a href="#home">HOME</a>
		<a href="#about">ABOUT</a>
		<a href="#ourteam">OUR TEAM</a>
		<a href="#menu"><u>MENU</u></a>
		<a href="#reviews">REVIEWS</a>
	</div>
	</div>
	<div class = "allflexcontainer">
		<div class= "details"> </br></br></br>
		<hr width= 70%>1321 Oak Street </br>
		Conway, Arkansas<hr width= 70%></br>
		<a href = "https://maps.google.com?saddr=Current+Location&daddr=Streetside+Creperie">Directions to Us!</a>
		</div>
		
	<div class = "contentflexcontainer">
	<div class = "ourmenu"> OUR MENU
	
		</div>
	<div class= "content">
	
	
	<div class="menu-body">
		<!-- Section starts: Appetizers -->
		<div class="menu-section">
			<h2 class="menu-section-title">Sweet</h2>
			<h2 class="menu-item-price"><u>$</u></h2> 
			<br style="clear:both;" />
			<hr width= 30% align="left">
			
			<div class="menu-item">
			<?php

					

				 
					$csvFile = file('sweet.txt');
						$menudata = [];
						foreach ($csvFile as $line) {
							$menudata[] = str_getcsv($line, ";");
						}

					 foreach ($menudata as list($a, $b, $c, $d)) {
						// $a contains the first element of the nested array,
						// and $b contains the second element.
						
						     echo '<div class="menu-item-name"><u>' . 
							$a . '</div></u></br>';
						echo '<div class="menu-item-price">' . $c .'</div>';
						echo '<div class= "menu-item-picture"><img src =' .  $d  .' style="height: 100%; width: 100%; object-fit: contain"/ ></div>';
						echo '<div class="menu-item-description">'. $b . '</div>';
						echo " <hr >";		
						   
						    
						
					}
				?>

			
						
		</div>
		</div>
		</div>
	<div class="menu-body">
			<!-- Section starts: Appetizers -->
			<div class="menu-section">
				<h2 class="menu-section-title">Savory</h2>
				<h2 class="menu-item-price"><u>$</u></h2> 
				<br style="clear:both;" />
				<hr>
				
				<div class="menu-item">
				<?php

						

					 
						$csvFile = file('savory.txt');
							$menudata = [];
							foreach ($csvFile as $line) {
								$menudata[] = str_getcsv($line, ";");
							}

						 foreach ($menudata as list($a, $b, $c)) {
							// $a contains the first element of the nested array,
							// and $b contains the second element.
							
							     echo '<div class="menu-item-name">' . 
								$a . '</div></br>';
							echo '<div class="menu-item-price">' . $c .'</div>';
							echo '<div class="menu-item-description">'. $b . '</div>';
							echo " <hr >";		
							   
							    
							
						}
					?>

				
							
			</div>
			</div>
			</div>

		
		</div>
	</div>
			
</html>
		