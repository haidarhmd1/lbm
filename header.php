<!DOCTYPE html>
<html>
<head>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600i,700,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,600i" rel="stylesheet">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="custom/css/bootstrapOverride.css">
	<!-- In <head> after the Bootstrap CSS. -->
	<link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">

	<link rel="stylesheet" type="text/css" href="custom/css/main.css">
	<title>Leb Motors</title>
	<script src="custom/js/main/jquery-3.3.1.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="custom/js/pres/main.js"></script>
	<script src="custom/js/pres/main2.js"></script>
	<script src="custom/js/pres/scrollspy.js"></script>
	<script src="custom/js/pres/animations.js"></script>
	<script>
		function startTime() {
				    var today = new Date();
				    var h = today.getHours();
				    var m = today.getMinutes();
				    var s = today.getSeconds();
				    m = checkTime(m);
				    s = checkTime(s);
				    document.getElementById('txt').innerHTML =
				    h + ":" + m + ":" + s;
				    var t = setTimeout(startTime, 500);
				}
				function checkTime(i) {
				    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
				    return i;
				}

		$(document).ready(function(){

			var mydate=new Date()
    		var year=mydate.getYear()
			if (year < 1000)
    			year+=1900

			var day=mydate.getDay() // Current Day of week - 2
			var month=mydate.getMonth() // Current Month 2
			var daym=mydate.getDate() // Current Date -24

			var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday",
                        "Friday","Saturday")
			var montharray=new Array("January","February","March","April","May","June",
                        "July","August","September","October","November","December")
			if (day === 1) {
				document.getElementById('date').innerHTML = dayarray[day]+", " + day + "st of "+montharray[month]+ " " + year;
			}else if(day === 2){
				document.getElementById('date').innerHTML = dayarray[day]+", " + day + "nd of "+montharray[month]+ " " + year;
			}else if(day === 3){
				document.getElementById('date').innerHTML = dayarray[day]+", " + day + "rd of "+montharray[month]+ " " + year;
			}else if (day > 3){
				document.getElementById('date').innerHTML = dayarray[day]+", " + day + "th of "+montharray[month]+ " " + year;
			}
		});

</script>
</head>
<body data-spy="scroll" data-target=".navbar" onload="startTime()" >

<div class="container-fluid" id="topLevel">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6" id="rightIcons" style="color: white;"><a style="padding-right: 5px;" href="#" target="_blank"><img src="pics/fbIcon.png"></a><a style="padding-left: 5px;" href="#" target="_blank"><img src="pics/youtubeIcon.png"></a></div>
			<div class="col-xs-12 col-sm-6 text-right" id="leftWeather"  style="color: white;"><span><img src="pics/hourIcon.png"></span><span style="padding-left: 5px;"><span id="date"></span> | <span id="txt">10:23 AM</span> <span><img src="pics/weather.png"></span>  Beirut, 21* </span></div>
		</div>
	</div>
</div>

<div class="container-fluid" id="Home" style="height: auto; position: relative;">
<div class="container-fluid" style="position: absolute; width: 100%; top: 15px;">
		<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
		<div class="container" id="navbarAll">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#Home" style="padding: 0px;"><img src="pics/lebmotorsLogoTP.png" width="85%" ></a>
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav navbar-right">
				        <li class="active text-uppercase navFonts"><a href="#Profile">home</a></li>
				        <li class="text-uppercase navFonts"><a data-toggle="modal" data-target="#advertiseModal" href="#">advertise with us</a></li>
<!-- 				        <li class="active navFonts dropdown">
					        <a class="dropdown-toggle text-uppercase" data-toggle="dropdown" href="#">Destinations
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu" id="ddlLocations">
					        </ul>
					      </li> -->
<!-- 				        <li class="text-uppercase navFonts"><a href="#Careers">Careers</a></li> -->
				        <li class="text-uppercase navFonts"><a data-toggle="modal" data-target="#contactUsModal" href="javascript:void(0)">Contact</a></li>
				      </ul>
	    		</div>
	  		</div>
		</nav>
	</div>
	<img class="imgBanner" src="pics/lebmotorsBanner.jpg" width="100%" >
</div>

</div>
