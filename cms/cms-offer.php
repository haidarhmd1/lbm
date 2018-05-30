<?php include 'header.php'  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .offer-section a{
    background: white;
    color: black !important;
    }
</style>
<link rel="stylesheet" href="css/homepagelayout.css">

<div class="maincontent">
    <!-- Content goes here -->

                   <div class="col-xs-12">
                <h3><span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Offer</span></h3> 
            </div>
        <br>
            <div id="offerContainer">
                     <div class="form-group">
                        <label>Offer Title</label>
                        <input type="text" id="offerTitle" class="form-control" placeholder="Insert Offer Title">
                     </div>
                     <div class="form-group">
                        <label>Offer Date Detail</label>
                        <input type="text" id="offerDetails" class="form-control" placeholder="Insert Offer Details">
                     </div>
                     <div class="form-group">
                        <label>Offer Description</label>
                        <textarea id="offerDesc"  class="form-control offerText" rows="5" placeholder="Insert Offer Description" ></textarea>
                     </div>
                     <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" id="offerPrice" class="form-control" placeholder="Insert Offer Title">
                     </div>
                     <button class="btn btn-warning btnEdit">Change Offer</button>

            </div>

    
            <div>
                     
            </div>
        </div>




    <script type="text/javascript">
        
        $(document).ready(function(){
            $(".offerText").wysihtml5();
            getOffer();
        });

        
    function getOffer(){

        $.ajax({
            url: '../config/logic/phpSelectors.php',
            method: 'GET',
            data: { action: 'getOffers' },
            success: function(data){
                var jsResp = JSON.parse(data);

                // offerTitle
                // offerDates
                // offerDesc
                // offerPrice

                $("#offerTitle").val(jsResp.offerTitle);
                $("#offerDetails").val(jsResp.offerDates);
                // $("#offerDesc").val(jsResp.offerDescription);
                $('iframe').contents().find('.wysihtml5-editor').html(jsResp.offerDescription);
                $("#offerPrice").val(jsResp.offerPrice);
                $(".btnEdit").attr("id", jsResp.offerId);

            },error: function(){
                alert("error");
            }

        });
    }

    $(".btnEdit").on("click", function(e){
        e.preventDefault();

        var offerId = $(this).attr("id");
        $.ajax({
            url: 'php/editfnctns/phpEdits.php',
            method: 'POST',
            data: { action: 'setOffers', offerId: offerId, offerTitle: $("#offerTitle").val(), offerDates: $("#offerDetails").val(), offerDescription: $("#offerDesc").val(),offerPrice: $("#offerPrice").val() },
            success: function(data){
                var jsResp = JSON.parse(data);

                if(jsResp.status === "success"){
                    alert("Offer Changed!");
                    getOffer();
                }else{
                    alert("Error Occurred!");
                }
            }
        })

    })

    </script>

    <?php include 'footer.php' ?>