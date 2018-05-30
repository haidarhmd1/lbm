<?php include 'header.php'  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .profile-section a{
    background: white;
    color: black !important;
    }
</style>
<link rel="stylesheet" href="css/homepagelayout.css">

<div class="maincontent">
    <!-- Content goes here -->

                   <div class="col-xs-12">
                <h3><span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Advertise Text</span></h3>
            </div>

            <div id="pofileTable">

                     <textarea class="profileTxt content" style="width: 100%; height: 350px;" ></textarea>

                    <div id="Title-text" style="display: none;">
                        <label>
                    <span class="glyphicon glyphicon-chevron-right" style="color: orange; padding-right: 5px;"></span>Edit Title
                        </label><br>
                    <input style="padding:14px 16px; margin: 15px auto;" type="text" name="text-title" id="text-title" placeholder="Enter Title">
                    </div>
                    <label style="display: none;">
                        <span class="glyphicon glyphicon-chevron-right" style="color: orange; padding-right: 5px;"></span>Edit Body Text</label>
                    <!--<div style="height: 400px;" id="editor"></div>-->


                     <br>
                     <button class="btn btn-warning btnEdit">Edit</button>

            </div>


            <div class="col-xs-12">
                <h3>
                    <span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Team</span>
                </h3>
            </div>
            <div class="col-xs-12">
                    <button class="btn btn-primary" id="insertPrice">Create</button>
            </div>

            <div>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Banner Size</th>
                            <th width="30%">Homepage Price</th>
                            <th width="30%">Insidepage Price</th>
                            <th width="10%" style="text-align: center;">
                                <span class="glyphicon glyphicon-pencil" style="color: orange;"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-hover" id="tableData2">
                    </tbody>
                </table>
            </div>
        </div>

    <!--update modal Owners -->

    <div id="ownersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Image</h4>
            </div>
            <div class="modal-body">
                <form id="ownerForm_update" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Image: <small>H: 78px and W: 78px</small></label>
                            <input type="file" name="oUploadImg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Full Name: </label>
                            <input type="text" id="oName" name="oName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Position: </label>
                            <input type="text" id="oTitle" name="oTitle" class="form-control">
                        </div>
                    <br />
                    <input type="hidden" name="oId" id="oId" value="" />
                    <input type="hidden" name="action" value="setOwners" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>



    <!--upload modal Owners -->

    <div id="ownersInsertModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Price</h4>
            </div>
            <div class="modal-body">
                <form id="ownerForm_insert" method="post" enctype="multipart/form-data">
                        <!-- <div class="form-group">
                            <label class="form-control">Image: <small>H: 78px and W: 78px</small></label>
                            <input type="file" name="oUploadImgNew" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label class="form-control">Banner Size: </label>
                            <input type="text" id="bannersize" name="bannersize" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">homepageprice: </label>
                            <input type="text" id="homepageprice" name="homepageprice" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">insideprice: </label>
                            <input type="text" id="insideprice" name="insideprice" class="form-control">
                        </div>
                    <br />
                    <input type="hidden" name="action" value="setTable" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>


    <script type="text/javascript">

let urlString = 'cms/phpinc/classes/cmsFunctions.php';

        $(document).ready(function(){
            getAdvText();
            getPrice();
            $('.content').wysihtml5();

            // getOwner();

            // $("#ownerForm_update").submit(function(e){
            //     e.preventDefault();
            //
            //     $.ajax({
            //         url: 'php/editfnctns/phpEdits.php',
            //         method: 'POST',
            //         processData: false,
            //         contentType: false,
            //         data: new FormData(this),
            //         success: function(data){
            //             var jsResp = JSON.parse(data);
            //
            //             if(jsResp.status === "success"){
            //                 alert("Owners Info Changed!");
            //                 $("#ownersModal").modal("hide");
            //                 getOwner();
            //             }else{
            //                 alert("error occurred!");
            //             }
            //         }
            //     });
            // });
            //
            $("#ownerForm_insert").submit(function(e){
                e.preventDefault();

                $.ajax({
                    url: 'php/editfnctns/phpEdits.php',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),
                    success: function(data){
                        var jsResp = JSON.parse(data);

                        if(jsResp.status === "success"){
                            alert("Table Data Added!");
                            $("#ownersInsertModal").modal("hide");
                            // getOwner();
                        }else{
                            alert("error occurred!");
                        }
                    }
                });
            });

        });

        function getAdvText(){
      		$.get('phpinc/classes/cmsFunctions.php', { action: 'advText' }, function(data){
      				var jsResp = JSON.parse(data);
      				console.log(jsResp);
              $(".content").val(jsResp.advTxt);
              $(".content").attr("id", jsResp.advTxtId);
              $(".content").attr("id", jsResp.advTxtId);
              $('iframe').contents().find('.wysihtml5-editor').html(jsResp.advTxt);
      		});
        }


    $(".btnEdit").on("click", function(e){
        e.preventDefault();
        // console.log($(".profileTxt").val());
        console.log($(".content").val());
        $.ajax({
            url: 'phpinc/classes/cmsFunctions.php',
            method: 'POST',
            data: { action: 'setAdv', pId: $(".content").attr("id"), pText: $(".content").val() },
            success: function(data){
                var jsResp = JSON.parse(data);
                if(jsResp.status === "success"){
                    alert("Text Changed");
                    getAdvText();
                }else{
                    alert("Error");
                }

            }
        })
    })

    function getPrice(){

        $.ajax({
            url: 'phpinc/classes/cmsFunctions.php',
            method: 'GET',
            data: { action: 'getTable' },
            success: function(data){
                var jsResp = JSON.parse(data);

                var ownersProfile = '';

                for(let i=0; i < jsResp.length; i++){
                    ownersProfile += '<tr>'+
                                     '<td><h4>'+jsResp[i].priceTbl_id+'</h4></td>'+
                                     '<td><h4>'+jsResp[i].bannersize+'</h4></td>'+
                                     '<td><p>'+jsResp[i].homepagePrice+'</p></td>'+
                                     '<td><p>'+jsResp[i].insidepagePrice+'</p></td>'+
                                     '<td><button class="btn btn-warning btnOwnerEdit" id="'+jsResp[i].oId+'">Edit</button></td>'+
                                     '<td><button class="btn btn-danger btnOwnerDelete" id="'+jsResp[i].oId+'">Remove</button></td>'+
                                     '</tr>';
                }


                    $("#tableData2").html(ownersProfile);

            },error: function(){
                alert("error");
            }
        });
    }


    // function populateOwners(id){
    //
    //     $.ajax({
    //         url: 'php/editfnctns/phpEdits.php',
    //         method: 'GET',
    //         data: { action: 'getOwnersViaId', oId: id },
    //         success: function(data){
    //             var jsResp = JSON.parse(data);
    //
    //             $("#oName").val(jsResp.oName);
    //             $("#oTitle").val(jsResp.oTitle);
    //             $("#oId").attr("value", jsResp.oId);
    //         }
    //     });
    // }
    //
    // $(document).on("click", ".btnOwnerEdit", function(e){
    //     e.preventDefault();
    //
    //     var oId = $(this).attr("id");
    //     populateOwners(oId);
    //     $("#ownersModal").modal("show");
    //     $("#oId").attr("value", oId);
    //
    //
    // });

    //
    // $("#insetOwner").click(function(e){
    //     e.preventDefault();
    //     $("#ownersInsertModal").modal("show");
    // })

    // $(document).on("click", ".btnOwnerDelete", function(e){
    //     e.preventDefault();
    //     var oId = $(this).attr("id");
    //
    //     $.ajax({
    //         url: 'php/deletefnctns/phpDelete.php',
    //         method: 'GET',
    //         data: {action: 'delOwners', oId: oId},
    //         success: function(data){
    //             var jsResp = JSON.parse(data);
    //
    //             if(jsResp.status === "success"){
    //                 alert("Owner Info and Data Removed!");
    //                 getOwner();
    //             }else{
    //                 alert("Error Occurred!");
    //             }
    //         }
    //     })
    //
    // });


    </script>

    <?php include 'footer.php' ?>
