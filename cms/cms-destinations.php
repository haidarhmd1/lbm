<?php include 'header.php'  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .dest-section a{
    background: white;
    color: black !important;
    }
    
    .wysihtml5-sandbox{
        width: 100% !important;
        height: 400px !important;
    }
    
    .wysihtml5-toolbar{
        width: 70%;
        padding-top: 45px;
        margin: auto;
    }
</style>
<link rel="stylesheet" href="css/homepagelayout.css">

<div class="maincontent">
    <!-- Content goes here -->

            <div class="col-xs-12">
                <h3>
                    <span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Destination Category</span>
                </h3> 
            </div>
            <div class="col-xs-12">
                    <button class="btn btn-primary" id="insertCategory">Create</button>
            </div>
    
            <div>
                     
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Category</th>
                            <th width="10%" style="text-align: center;">
                                <span class="glyphicon glyphicon-pencil" style="color: orange;"></span>
                            </th>
                            <th width="10%" style="text-align: center;">
                                <span class="glyphicon glyphicon-pencil" style="color: red;"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-hover" id="tableData">
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12">
                <h3>
                    <span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Destinations</span>
                </h3> 
            </div>
            <div class="col-xs-12">
                    <button class="btn btn-primary" id="insetDestination">Create</button>
            </div>
    
            <div>
                     
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Image</th>
                            <th width="30%">Title</th>
                            <th width="10%" style="text-align: center;">
                                <span class="glyphicon glyphicon-pencil" style="color: orange;"></span>
                            </th>
                            <th width="10%" style="text-align: center;">
                                <span class="glyphicon glyphicon-pencil" style="color: red;"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-hover" id="tableData2">
                    </tbody>
                </table>
            </div>


        </div>

    <!--update modal -->

    <div id="destModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 59%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <img id="imgPreview" class="img-thumbnail" src="" width="250px" >
                    </div>
                </div>
                <form id="destForm_update" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Image: </label>
                            <input type="file" name="dUploadImg" class="form-control">
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label class="form-control">Image Banner: </label>-->
                        <!--    <input type="file" name="specUpdateImgBanner" class="form-control">-->
                        <!--</div>-->
                        <div class="form-group">
                            <label class="form-control">Title: </label>
                            <input type="text" id="dTitle" name="dTitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Description: </label>
                            <textarea type="text" id="dDescription" name="dDescription" class="form-control hotDestEdit"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control">Category: </label>
                            <select class="form-control" name="dCategoryEdit" id="dCategoryEdit">
                               <!--  <option value="1">Kiev</option>
                                <option value="2">Lebanon</option>
                                <option value="3">Berlin</option>
                                <option value="4">Milan</option>
                                <option value="5">Barcelona</option> -->
                            </select>
                        </div>
                    <br />
                    <input type="hidden" name="dId" id="dId" value="" />
                    <input type="hidden" name="action" value="updateDestinationBoxes" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>



    <!--upload modal -->
    
    <div id="destInsertModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 59%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload a Destination</h4>
            </div>
            <div class="modal-body">
                <form id="destForm_Insert" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Image: </label>
                            <input type="file" name="dUploadImgs" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Image Banner: </label>
                            <input type="file" name="specUploadImgBanner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Title: </label>
                            <input type="text" id="dTitles" name="dTitles" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Description: </label>
                            <textarea type="text" id="dDescriptions" name="dDescriptions" class="form-control hotDest"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control">Category: </label>
                            <select class="form-control" name="dCategory" id="dCategory">
                               <!--  <option value="1">Kiev</option>
                                <option value="2">Lebanon</option>
                                <option value="3">Berlin</option>
                                <option value="4">Milan</option>
                                <option value="5">Barcelona</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control">Multiple Images: </label>
                            <input type="file" id="dMultImgs" name="dMultImgs[]" multiple class="form-control">
                        </div>
                    <br />
                    <input type="hidden" name="action" value="setDestinationBoxes" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>


    <!-- --------------------------- Destination Categories --------------------------- -->
    <!--update modal -->

    <div id="catModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 59%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Destination</h4>
            </div>
            <div class="modal-body">
                <form id="catForm_update" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Destination Name: </label>
                            <input type="text" id="cEditName" name="cEditName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Destination Description: </label>
                            <textarea type="text" id="cEditDesc" name="cEditDesc" class="content"></textarea>
                        </div>
                        <div class="form-group" style="padding-top: 45px;">
                            <label class="form-control">Banner: </label>
                            <input type="file" name="dUploadImgBannerUpdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Current Banner: </label>
                            <img id="bannerCurrent" src="" style="width: 100%;">
                        </div>
                    <br />
                    <input type="hidden" name="cId" id="cId" value="" />
                    <input type="hidden" name="action" value="updateCategory" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>



    <!--upload modal -->
    
    <div id="catInsertModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 59%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload a Destination Name</h4>
            </div>
            <div class="modal-body">
                <form id="catForm_Insert" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Destination Name: </label>
                            <input type="text" id="cName" name="cName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Destination Description: </label>
                            <textarea type="text" id="cDesc" name="cDesc" class="content2"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control">Banner: </label>
                            <input type="file" name="dUploadImgBanner" class="form-control">
                        </div>
                    <br />
                    <input type="hidden" name="action" value="setDestinationMenu" />
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
            
$('.content').wysihtml5();
$('.content2').wysihtml5();


$('.hotDest').wysihtml5();
$('.hotDestEdit').wysihtml5();


            getDestMenu();
            getDestImageBoxes();

            $("#destForm_update").submit(function(e){
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
                            alert("Destination Info Changed!");
                            $("#destModal").modal("hide");
                            getDestImageBoxes();
                        }else{
                            alert("error occurred!");
                        }
                    }
                });
            });


            $("#destForm_Insert").submit(function(e){
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
                            alert("Destination Added!");
                            $("#destInsertModal").modal("hide");
                            $('#destForm_Insert')[0].reset();
                            getDestImageBoxes();
                        }else{
                            alert("error occurred!");
                        }
                    }
                });
            });

            $("#catForm_Insert").submit(function(e){
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
                            alert("Destination Category Inserted!");
                            $("#catInsertModal").modal("hide");
                            getDestMenu();
                        }else{
                            alert("error occurred!");
                        }
                    }
                });

            });

            $("#catForm_update").submit(function(e){
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
                            alert("Destination Category Updated!");
                            $("#catModal").modal("hide");
                            getDestMenu();
                        }else{
                            alert("error occurred!");
                        }
                    }
                })

            });
        });


    function getDestMenu(){

        $.ajax({
            url: '../config/logic/phpSelectors.php',
            method: 'GET',
            data: { action: 'getDestinationMenu' },
            success: function(data){
                var jsResp = JSON.parse(data);

                var destMenu = '';
                var categoryDDL = '';

            if(jsResp !== null){ 
                for(let i=0; i < jsResp.length; i++){
                    destMenu += '<tr><td>'+jsResp[i].dest_id+'</td><td>'+jsResp[i].menu+'</td><td><button class="btn btn-warning btnCategoryEdit" id="'+jsResp[i].dest_id+'">Edit</button></td>'+
                    '<td><button class="btn btn-danger btnCategoryRemove" id="'+jsResp[i].dest_id+'">Remove</button></td>'+
                    '</tr>';
                }
                for(let j=0; j < jsResp.length; j++){
                    categoryDDL += '<option value="'+jsResp[j].dest_id+'">'+jsResp[j].menu+'</option>';
                }

            }
            else{
                destMenu = "No Data";
            }

                $("#tableData").html(destMenu);
                $("#dCategory").html(categoryDDL);
                $("#dCategoryEdit").html(categoryDDL);

            },error: function(){
                alert("error");
            }

        });
    }

    function getDestImageBoxes(){

        $.ajax({
            url: '../config/logic/phpSelectors.php',
            method: 'GET',
            data: { action: 'getDestinationBoxes', limitNum: 20 },
            success: function(data){
                var jsResp = JSON.parse(data);
                    
                    var destBoxes = '';

                    
            if(jsResp !== null){
                for(let i=0; i < jsResp.length; i++){
                    
                    destBoxes += '<tr>'+
                    '<td><h4>'+ jsResp[i].destination_id+'</h4></td>'+
                    '<td><img src="../'+ jsResp[i].destination_mainPic +'" width="250px"></td>'+
                    '<td>'+ jsResp[i].destination_title +'</td>'+
                    '<td><button class="btn btn-warning btnEditDest" id="'+ jsResp[i].destination_id+'">Edit</button></td>'+
                    '<td><button class="btn btn-danger btnRemoveDest" id="'+ jsResp[i].destination_id+'">Remove</button></td>'+
                    '</tr>';

                }

                
            }else{
                destBoxes = "No Data";
            }
                $("#tableData2").html(destBoxes);
            },error: function(){
                alert("error");
            }

        });
    }

    function populateDestination(id){
        $.ajax({
            url: 'php/editfnctns/phpEdits.php',
            method: 'GET',
            data: { action: 'getDestinationViaId', dId: id },
            success: function(data){
                var jsResp = JSON.parse(data);

                $("#dTitle").val(jsResp.destination_title);
                // $("#dDescription").val(jsResp.destination_desc);
                $('iframe').contents().find('.wysihtml5-editor').html(jsResp.destination_desc);
                // $(".wysihtml5-editor").html(jsResp.destination_desc);
                $("#dCategoryEdit").val(jsResp.menuId);
                $("#imgPreview").attr("src", "../"+jsResp.destination_mainPic);
                $("#dId").attr("value", jsResp.destination_id);
            }
        });
    }

    $(document).on("click", ".btnEditDest", function(e){
        e.preventDefault();

        var dId = $(this).attr("id");
        populateDestination(dId);
        $("#destModal").modal("show");
        $("#dId").attr("value", dId);

    });


    $("#insetDestination").click(function(e){
        e.preventDefault();
                $('iframe').contents().find('.wysihtml5-editor').html('');
        $("#destInsertModal").modal("show");
    });

    $(document).on("click", ".btnRemoveDest", function(e){
        e.preventDefault();
        var dId = $(this).attr("id");

        $.ajax({
            url: 'php/deletefnctns/phpDelete.php',
            method: 'GET',
            data: { action: 'delDestination', dId: dId },
            success: function(data){
                var jsResp = JSON.parse(data);

                if(jsResp.status === "success"){
                    alert("Destination Info and Data Removed!");
                    getDestImageBoxes();
                }else{
                    alert("Error Occurred!");
                }
            }
        });

    });

    $("#insertCategory").on("click", function(e){
        e.preventDefault();

                $('iframe').contents().find('.wysihtml5-editor').html('');
        $("#catInsertModal").modal("show");

    });

    function populateCategory(id){

        $.ajax({
            url: 'php/editfnctns/phpEdits.php',
            method: 'GET',
            data: { action: 'getDestinationMenuViaId', cId: id },
            success: function(data){
                var jsResp = JSON.parse(data);
                console.log(jsResp);
                $("#cEditName").val(jsResp.menuName);
                $('iframe').contents().find('.wysihtml5-editor').html(jsResp.cDesc);
                $("#bannerCurrent").attr("src", "../"+jsResp.cbanner);
                // $("#cEditDesc").val(jsResp.cDesc);
            }
        })

    }

    $(document).on("click", ".btnCategoryEdit", function(e){
        var cId = $(this).attr("id");
        populateCategory(cId);
        $("#cId").attr("value", cId);
        $("#catModal").modal("show");

    });

    $(document).on("click", ".btnCategoryRemove", function(e){
        e.preventDefault();

        var dId = $(this).attr("id");

        $.ajax({
            url: 'php/deletefnctns/phpDelete.php',
            method: 'GET',
            data: { action: 'delDestinationMenu', dId: dId },
            success: function(data){
                jsResp = JSON.parse(data);

                if(jsResp.status === "success"){
                    alert("Destination Menu and Data Successfully Deleted!");
                    getDestMenu();
                    getDestImageBoxes();
                }else{
                    alert("error occurred!");
                }
            }
        })

    })

    </script>

    <?php include 'footer.php' ?>