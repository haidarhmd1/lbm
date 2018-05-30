<?php include 'header.php'  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .contact-section a{
    background: white;
    color: black !important;
    }
</style>
<link rel="stylesheet" href="css/homepagelayout.css">

<div class="maincontent">
    <!-- Content goes here -->

                   <div class="col-xs-12">
                <h3><span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Contact Info</span></h3>
            </div>
        <br>
            <div id="offerContainer">
              <form id="contactForm">
                <div class="form-group">
                   <label>Address</label>
                   <textarea id="addresss" name="addresss"  class="form-control" rows="5" placeholder="Insert Address" ></textarea>
                </div>
                <div class="form-group">
                  <label>P.O.Box</label>
                  <input type="text" id="pobox" name="pobox" class="form-control" placeholder="Insert P.O.Box">
                </div>
                <div class="form-group">
                  <label>Telefax</label>
                  <input type="text" id="telefax" name="telefax" class="form-control" placeholder="Insert Phone Number">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" id="email" name="email" class="form-control" placeholder="Insert Email">
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input type="text" id="website" name="website" class="form-control" placeholder="Insert Website">
                </div>
                <div class="form-group">
                  <input type="hidden" name="action" value="updateContact">
                </div>
                <button class="btn btn-warning btnEdit">Change Contact Info</button>
            </form>
            </div>


            <div>

            </div>
        </div>




    <script type="text/javascript">

        $(document).ready(function(){
            getContact();

            $("#contactForm").submit(function(e){
              e.preventDefault();
                $.ajax({
                  url: 'phpinc/classes/cmsFunctions.php',
                  method: "POST",
                  processData: false,
                  contentType: false,
                  data: new FormData(this),
                  success: function(data){
                      console.log(data);
                  }
                });
            });

        });


    function getContact(){

        $.ajax({
            url: 'phpinc/classes/cmsFunctions.php',
            method: 'GET',
            data: { action: 'contactData' },
            success: function(data){
                var jsResp = JSON.parse(data);

                $("#addresss").val(jsResp.contactAdress);
                $("#pobox").val(jsResp.pobox);
                $("#telefax").val(jsResp.telefax);
                $("#email").val(jsResp.contactemail);
                $("#website").val(jsResp.website);

            },error: function(){
                alert("error");
            }

        });
    }
    //
    // $(".btnEdit").on("click", function(e){
    //     e.preventDefault();
    //
    //     var contactId = $(this).attr("id");
    //     $.ajax({
    //         url: 'php/editfnctns/phpEdits.php',
    //         method: 'POST',
    //         data: { action: 'setContact', contactId: contactId, email: $("#email").val(), phone: $("#phone").val(), addresss: $("#addresss").val() },
    //         success: function(data){
    //             var jsResp = JSON.parse(data);
    //
    //             if(jsResp.status === "success"){
    //                 alert("Address Info Changed!");
    //                 getContact();
    //             }else{
    //                 alert("Error Occurred!");
    //             }
    //         }
    //     })
    //
    // })

    </script>

    <?php include 'footer.php' ?>
