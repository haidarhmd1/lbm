<!DOCTYPE html>
<html>
<head>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700,700i,800,900" rel="stylesheet">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="custom/css/bootstrapOverride.css">
	<!-- In <head> after the Bootstrap CSS. -->
	<link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">

	<link rel="stylesheet" type="text/css" href="custom/css/main.css">
	<title>ExtremeMindz</title>
	<script src="custom/js/main/jquery-3.3.1.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- <script src="custom/js/pres/main.js"></script> -->
	<!-- <script src="custom/js/pres/scrollspy.js"></script> -->
</head>
<body>

	<div class="container-fluid">
		<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
		<div class="container">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>                        
				      </button>
				      <a class="navbar-brand" href="#banner"><img src="pics/Logo.png" width="85%" ></a>
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav navbar-right">
				        <li class="text-uppercase navFonts"><a href="index.php#Profile">Profile</a></li>
				        <!-- <li class=""><a href="index.php#HotDestinations">Destinations</a></li> -->
					      <li class="active navFonts dropdown">
					        <a class="dropdown-toggle text-uppercase" data-toggle="dropdown" href="#">Destinations
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu" id="ddlLocations">
					        </ul>
					      </li>
				        <li class="text-uppercase navFonts"><a href="index.php#Careers">Careers</a></li>
				        <li class="text-uppercase navFonts"><a href="index.php#ContactUs">Contact</a></li>
				      </ul>
	    		</div>
	  		</div>
		</nav>
	</div>