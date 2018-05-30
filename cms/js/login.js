$(document).ready(function(){

    $(".cms-button").click(function(e){
        e.preventDefault();
        user
        userpass
        if($("#user").val() !== '' || $("#userpass").val() !== ''){

            $.ajax({
                url: 'php/login.php',
                method: 'POST',
                data: { action: 'login', user_name: $("#user").val(), pass: $("#userpass").val() },
                success:function(data){
                    var resp = JSON.parse(data);

                    if(resp.status === 'success'){
                        alert("successfully logged in!");
                        window.location.href = "cms-homeBanner.php";
                    }else{
                        alert("Please insert a valid username or password!");
                    }
                }
            })

        }else{
            alert("You must enter a value");
        }

    })


});