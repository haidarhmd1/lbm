<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>CMS Extreme Mindz</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="richText/richtext.min.css">

	<link rel="stylesheet" href="bootstrapheditor/bootstrap3-wysihtml5.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--<script src="richText/jquery.richtext.min.js"></script>-->

    <script src="bootstrapheditor/bootstrap3-wysihtml5.min.js"></script>
    <script src="bootstrapheditor/bootstrap3-wysihtml5.all.min.js"></script>

    <style>
        .modal-dialog {
            background: white;
        }


        .passModal {
            width: 50%;
            text-align: center;
            margin: 50px auto;
        }

        .modal-header,
        .modal-body,
        .modal-footer {
            background: white;
        }

        .save-this {
            border: none;
            background: orange;
            color: black;
            padding: 10px 15px;
            margin: 15px 0px;
            border-radius: 3px;
        }

        #background-loader {
            display: none;
            width: 100%;
            height: 100%;
            position: absolute;
            background: #00000061;
        }

        #background-loader img {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <div id="background-loader">
        </div>
        <div class="banner-above">
            <div class="banner-container">
                <img id="logo1" src="../pics/lebmotorsLogoTP.png" width="200px" style="margin-left: 50px; margin-top: 10px;">
                <img id="logo2" src="imgs/powered.png">
            </div>
        </div>


        <div class="sidebar">
            <ul id="navigation-cms">
                <li class="mainBanner-section" >
                    <a href="cms-homeBanner.php">Main Banner</a>
                </li>
                <li class="profile-section" >
                    <a href="cms-profile.php">Profile</a>
                </li>
                <li class="offer-section" >
                    <a href="cms-offer.php">Offer</a>
                </li>
                <li class="dest-section" >
                    <a href="cms-destinations.php">Hot Destinations</a>
                </li>
                <li class="career-section" >
                    <a href="cms-jobOffers.php">Careers</a>
                </li>
                <li class="service-section" >
                    <a href="cms-services.php">Services</a>
                </li>
                <li class="contact-section" >
                    <a href="cms-contact.php">Contact</a>
                </li>
            </ul>

            <div class="profile-container">
                <ul id="setting-nav">
                    <li>
                        <a href="" data-toggle="modal" data-target="#password_modal">Account Settings</a>
                    </li>
                    <li>
                        <a id="logout-btn" href="#">Logout</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
