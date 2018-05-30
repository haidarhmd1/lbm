<?php include 'header.php'  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .service-section a{
    background: white;
    color: black !important;
    }
</style>
<link rel="stylesheet" href="css/homepagelayout.css">

<div class="maincontent">
    <!-- Content goes here -->


            <div class="col-xs-12">
                <h3>
                    <span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Services</span>
                </h3> 
            </div>
            <div class="col-xs-12">
                    <button class="btn btn-primary" id="insertNewService">Create</button>
            </div>
    
            <div>
                     
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Image</th>
                            <th width="30%">Service Title</th>
                            <th width="30%">Service Description</th>
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

    <div id="serviceModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Image</h4>
            </div>
            <div class="modal-body">
                <form id="serviceForm_update" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Image: </label>
                            <input type="file" name="sUploadImg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Service Title: </label>
                            <input type="text" id="sTitle" name="sTitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Service Description: </label>
                            <textarea type="text" id="sDescription" name="sDescription" class="form-control sDescContent"></textarea>
                        </div>
                    <br />
                    <input type="hidden" name="sId" id="sId" value="" />
                    <input type="hidden" name="action" value="setServices" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>



    <!--upload modal Owners -->

    <div id="serviceModalCreate" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Image</h4>
            </div>
            <div class="modal-body">
                <form id="serviceForm_create" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Image: </label>
                            <input type="file" name="sUploadImgs" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Service Title: </label>
                            <input type="text" id="sTitles" name="sTitles" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Service Description: </label>
                            <textarea type="text" id="sDescriptions" name="sDescriptions" class="form-control sDescContentUp"></textarea>
                        </div>
                    <br />
                    <input type="hidden" name="action" value="insertService" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>


    <script type="text/javascript">
        
        $(document).ready(function(){
            $(".sDescContent").wysihtml5();
            $(".sDescContentUp").wysihtml5();
            getServices();

            $("#serviceForm_update").submit(function(e){
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
                            alert("Service Info Changed!");
                            $("#serviceModal").modal("hide");
                            getServices();
                        }else{
                            alert("error occurred!");
                        }
                    }
                });
            });


            $("#serviceForm_create").submit(function(e){
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
                            alert("Service Added!");
                            $("#serviceModalCreate").modal("hide");
                            getServices();
                        }else{
                            alert("error occurred!");
                        }
                    }
                });
            });
        });


    function getServices(){

        $.ajax({
            url: '../config/logic/phpSelectors.php',
            method: 'GET',
            data: { action: 'getServices' },
            success: function(data){
                var jsResp = JSON.parse(data);
                    
                    var serviceBoxes = '';

                    

                for(let i=0; i < jsResp.length; i++){
                    
                    serviceBoxes += '<tr>'+
                                     '<td><h4>'+jsResp[i].sId+'</h4></td>'+
                                     '<td><img src="../'+jsResp[i].sIcon+'" alt="..." width="125px;" ></td>'+
                                     '<td><h4>'+jsResp[i].sTitle+'</h4></td>'+
                                     '<td><p>'+jsResp[i].sDesc+'</p></td>'+
                                     '<td><button class="btn btn-warning btnServiceEdit" id="'+jsResp[i].sId+'">Edit</button></td>'+
                                     '<td><button class="btn btn-danger btnServiceDelete" id="'+jsResp[i].sId+'">Remove</button></td>'+
                                     '</tr>';

                }

                $("#tableData2").html(serviceBoxes);

            },error: function(){
                alert("error");
            }

        })
    }

    function populateService(id){

        $.ajax({
            url: 'php/editfnctns/phpEdits.php',
            method: 'GET',
            data: { action: 'getServiceViaId', sId: id },
            success: function(data){
                var jsResp = JSON.parse(data);

                $("#sTitle").val(jsResp.sTitle);
                // $("#sDescription").val(jsResp.sDesc);
                $('iframe').contents().find('.wysihtml5-editor').html(jsResp.sDesc);
                $("#sId").attr("value", jsResp.sId);
            }
        });
    }

    $(document).on("click", ".btnServiceEdit", function(e){
        e.preventDefault();

        var sId = $(this).attr("id");
        populateService(sId);
        $("#serviceModal").modal("show");
        $("#sId").attr("value", sId);


    });


    $("#insertNewService").click(function(e){
        e.preventDefault();
        
        $('iframe').contents().find('.wysihtml5-editor').html('');
        $("#serviceModalCreate").modal("show");
    })

    $(document).on("click", ".btnServiceDelete", function(e){
        e.preventDefault();
        var sId = $(this).attr("id");

        $.ajax({
            url: 'php/deletefnctns/phpDelete.php',
            method: 'GET',
            data: {action: 'delService', sId: sId},
            success: function(data){
                var jsResp = JSON.parse(data);

                if(jsResp.status === "success"){
                    alert("Service Info and Data Removed!");
                    getServices();
                }else{
                    alert("Error Occurred!");
                }
            }
        })

    });


    </script>

    <?php include 'footer.php' ?>