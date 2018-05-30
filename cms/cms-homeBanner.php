<?php include 'header.php'  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .mainBanner-section a{
    background: white;
    color: black !important;
    }
</style>
<link rel="stylesheet" href="css/homepagelayout.css">

<div class="maincontent">
    <!-- Content goes here -->

                   <div class="col-xs-12">
                <h3><span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Main Site Banner</span></h3> 
            </div>
            
            <button class="btn btn-primary upBanner">Upload New Banner</button>
            <div id="committeeTbl">
                     
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Image</th>
                            <th width="10%" style="text-align: center;">
                                <span class="glyphicon glyphicon-pencil" style="color: orange;"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-hover" id="tableData">
                    </tbody>
                </table>
            </div>
        </div>

    <!--update modal BANNER -->

    <div id="mainBannerModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Image</h4>
            </div>
            <div class="modal-body">
                <form id="mainBanner_update" method="post" enctype="multipart/form-data">
                    <p>
                        <label>
                            Select an Image
                        </label>
                        <input type="file" name="bImgUpload[]" multiple id="bImgUpload" />
                        <br>
                        <br>
                        <!--<input type="hidden" name="bId" id="bImg_id" value="" />-->
                    </p>
                    <br />
                    <input type="hidden" name="action" value="setBannerItem" />
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

            getBanner();


            $("#mainBanner_update").submit(function(e){
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
                            alert("Image Uploaded!");
                            $("#mainBannerModal").modal("hide");
                            getBanner();
                        }else{
                            alert("error occurred!");
                        }
                    }
                })

            })

        })

    function getBanner(){
        $.ajax({
            url: '../config/logic/phpSelectors.php',
            method: 'GET',
            data: { action: 'getBannerItem' },
            success: function(data){
                var jsResp = JSON.parse(data);
                // $(".imgBanner").attr('src', '../'+jsResp[0].bImg);
                var tableData = '';
        if(jsResp !== null){
            
            for (let i = 0; i < jsResp.length; i++){
                    tableData += '<tr>'+
                    '<td>'+jsResp[i].bId+'</td>'+
                    '<td><img src="../'+jsResp[i].bImg+'" width="125px"></td>'+
                    '<td><button class="btn btn-danger removeBanner" id="'+jsResp[i].bId+'">Remove</button></td>'+
                    '</tr>';
                }
            
        }else{
            tableData = 'No Data';
        }
                $("#tableData").html(tableData);


            },error: function(){
                alert("error");
            }
        });
    }

    $(".upBanner").click(function(e){
        e.preventDefault();
        
        $("#mainBannerModal").modal("show");
       
        
        
    });

    $(document).on("click", ".removeBanner", function(e){
        e.preventDefault();

        var id = $(this).attr("id");
        
        $.ajax({
            url: 'php/deletefnctns/phpDelete.php',
            method: 'GET',
            data: { action: 'bannerDel' , id: id },
            success: function(data){
                var jsResp = JSON.parse(data);
                if(jsResp.status === 'success'){
                    alert("successfully removed!");
                    getBanner();
                }else{
                    alert("error occurred!");
                }
                
            }
        })
        
        // $("#mainBannerModal").modal("show");
        // $("#bImg_id").attr("value", id);

    })

    // function setBanner(id){



    // }

    </script>

    <?php include 'footer.php' ?>