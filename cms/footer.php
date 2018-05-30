
 <!--password Changer-->
<div class="modal passModal" id="password_modal">
    <div class="modal-header">
        <h3>Edit Main User<span class="extra-title muted"></span></h3>
    </div>
    <div class="modal-body form-horizontal">

        <div class="control-group">
            <label for="current_user" class="control-label">Current User</label>
            <div class="controls">
                <input type="text" id="current_user" name="current_user">
            </div>
        </div>
        <div class="control-group">
            <label for="new_user" class="control-label">New username</label>
            <div class="controls">
                <input type="text" id="newuser" name="new_user">
            </div>
        </div>
        <button href="#" class="save-this" id="user_modal_save">Save changes</button>
        <hr>
        <div class="control-group">
            <label for="current_password" class="control-label">Current Password</label>
            <div class="controls">
                <input type="text" id="current_pass" name="current_password">
            </div>
        </div>
        <div class="control-group">
            <label for="new_password" class="control-label">New Password</label>
            <div class="controls">
                <input type="text" id="newPass" name="new_password">
            </div>
        </div>
        <div class="control-group">
            <label for="confirm_password" id="confirmPass" class="control-label">Confirm Password</label>
            <div class="controls">
                <input type="text" id="confirm_pass" name="confirm_password">
            </div>
        </div>
        <div>

        <button href="#" class="save-this" id="password_modal_save">Save changes</button>
        </div>
    </div>
    <div class="modal-footer">
        <button href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>


    </body>
    <!-- <script>
        // $(document).ready(function(){
        //     getPass();
        //     $("#newPass").val('');


        // });

        // function getPass(){

        //     $.ajax({
        //         url: 'php/login.php',
        //         method: 'GET',
        //         data: { action: 'getCurrentPass'},
        //         success: function(data){

        //             var jsResp = JSON.parse(data);
        //             $("#current_pass").val(jsResp.pass);

        //         }
        //     })

        // }

        //     $("#password_modal_save").on("click", function(e){
        //         e.preventDefault();
        //         $.ajax({
        //             url: 'php/login.php',
        //             method: 'POST',
        //             data: { action: 'changeCurrentPass', userPass: $("#current_pass").val() , newUserPass:  $("#newPass").val() },
        //             success: function(data){
        //                 var jsResp = JSON.parse(data);


        //                 if(jsResp.status === "success"){
        //                     alert("successfully changed !");
        //                     getPass();
        //                     $("#password_modal").modal("hide");
        //                     $("#newPass").val('');
        //                 }
        //                 if(jsResp.status === "error"){
        //                     alert("error");
        //                 }
        //                 if(jsResp.status === "wrongmatch"){
        //                     alert("Current Password doesnt match the old one!");
        //                 }
        //             }
        //         })


        //     });


$(document).ready(function(){
    getUser();
    getPass();
    var currentPass = $("#current_pass");
    var newPass = $("#newPass");
    var confirm_pass = $("#confirm_pass");

    $("#logout-btn").click(function(e){
        window.location.href = "index.php";
    });


    $("#password_modal_save").click(function(e){

        e.preventDefault();

            if(currentPass.val() !== "" && newPass.val() !== "" && confirm_pass !== ""){
                        if(newPass.val() !== confirm_pass.val()){
            swal("Warning", "Your passwords doesn't match!", "warning");
        }else{

            var action = "changePass";

            $.ajax({
                url:"php/login.php",
                method:"POST",
                data:{action: 'changePass',newPass: newPass.val()},
                success:function(data){
                    // console.log(data);
                    var jsonResponse = JSON.parse(data);

                    if(jsonResponse.status === "success"){
                        swal("Success", "Password changed!", "success");

                        $("#current_pass").val("");
                        newPass.val("");
                        confirm_pass.val("");
                            getPass();
                    }if(jsonResponse.status === "error"){
                        swal("Error!", "Something wen't wrong!", "error");
                    }


                }
            });
        }
            }else{
                swal("Warning!", "Please fill out all the fields!", "warning");
            }




    });

    $("#user_modal_save").click(function(e){

        e.preventDefault();


            $.ajax({
                url:"php/login.php",
                method:"POST",
                data:{ action: 'changeUser', newUser: $("#newuser").val() },
                success:function(data){
                    // console.log(data);
                    var jsonResponse = JSON.parse(data);

                    if(jsonResponse.status === "success"){
                        swal("Success", "Password changed!", "success");
                            getUser();

                    }if(jsonResponse.status === "error"){
                        swal("Error!", "Something wen't wrong!", "error");
                    }


                }
            });
        });

});


function getUser(){


        $.ajax({
                url:"php/login.php",
                method:"GET",
                data:{action: 'userSee'},
                success:function(data){
                    var jsonResponse = JSON.parse(data);

                    $("#current_user").val(jsonResponse.currentUser);

                }
            });

}

function getPass(){


        $.ajax({
                url:"php/login.php",
                method:"GET",
                data:{action: 'passSee'},
                success:function(data){
                    // console.log("passwords : " + data);
                    var jsonResponse = JSON.parse(data);

                    $("#current_pass").val(jsonResponse.currentPass);

                }
            });

}

    </script> -->
</html>
