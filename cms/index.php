<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS ExtremeMindz | LOGIN</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
</head>
<body>
    
    <div class="wrapper">
        <div class="banner-above">
            <div class="banner-container">
                <img id="logo1" src="imgs/1Login.png" width="200px" style="margin-left: 50px; margin-top: 10px;">
                <img id="logo2" src="imgs/powered.png">
            </div>
        </div>
    </div>
        <div class="main-content">
            <div class="login-container">
                <div id="welcome-login">
                    <p>
                        Welcome to your CMS
                    </p>
                </div>
                <div class="input-fields">
                    <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input style="background: white;" id="user" type="text" class="form-control input-form" name="user" placeholder="Username">
                            </div>
                            
                                <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                      <input style="background: white;" id="userpass" type="password" class="form-control input-form" name="userpass" placeholder="Password">
                                    </div>
                </div>
                <button class="cms-button">Sign In</button>
            </div>

        </div>
         <script>
            // $(".cms-button").click(function(){
            //   window.location.href = "cms-homeBanner.php";
            // });
         </script>
</body>
</html>