<?php include 'header.php'  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .career-section a{
    background: white;
    color: black !important;
    }
</style>
<link rel="stylesheet" href="css/homepagelayout.css">

<div class="maincontent">
    <!-- Content goes here -->

                   <div class="col-xs-12">
                <h3><span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Job Vacancies</span></h3> 
            </div>
            <button class="btn btn-primary createJob">Create</button>
        <br>
            <div>
                     
            </div>
            
            
        <div class="col-xs-12">
            <h3><span class="glyphicon glyphicon-play" style="color: darkblue; padding-right: 10px; font-size:12px;"></span><span style="color: #686868">Job Vacancies</span></h3> 
        </div>
        <br>
        <div id="offerContainer">  
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">Job Title</th>
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
            <div>
                     
            </div>
</div>

    <!--upload modal Owners -->

    <div id="jobModalCreate" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Job Vacancy</h4>
            </div>
            <div class="modal-body">
                <form id="jobform_create" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Job Title: </label>
                            <input type="text" id="offerTitleUpload" name="offerTitleUpload" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Job Description: </label>
                            <textarea type="text" id="offerDetailsUpload" name="offerDetailsUpload" class="form-control jobUploadText"></textarea>
                        </div>
                    <br />
                    <input type="hidden" name="action" value="setJob" />
                    <input type="submit" name="submit" value="submit" class="btn btn-info" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    
    
    <!--update modal Owners -->

    <div id="jobModalUpdate" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Job Vacancy</h4>
            </div>
            <div class="modal-body">
                <form id="jobform_update" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control">Job Title: </label>
                            <input type="text" id="offerTitleUpdate" name="offerTitleUpdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control">Job Description: </label>
                            <textarea type="text" id="offerDetailsUpdate" cols="4" name="offerDetailsUpdate" class="form-control jobUploadTextEdit"></textarea>
                        </div>
                    <br />
                    <input type="hidden" name="jobId" id="jobId" value="" />
                    <input type="hidden" name="action" value="editJob" />
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
            $('.jobUploadText').wysihtml5();
            $('.jobUploadTextEdit').wysihtml5();

            getJobOffer();
            
            
            $("#jobform_update").submit(function(e){
                e.preventDefault();
                
                $.ajax({
                    url: 'php/editfnctns/phpEdits.php',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),
                    success: function(data){
                        var jsResp = JSON.parse(data);
                        getJobOffer();
                        $("#jobModalUpdate").modal("hide");
                        
                    }
                })
                
            });
            
            
            
            $("#jobform_create").submit(function(e){
                e.preventDefault();
                
                $.ajax({
                    url: 'php/editfnctns/phpEdits.php',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),
                    success: function(data){
                        var jsResp = JSON.parse(data);
                        getJobOffer();
                        $("#jobModalCreate").modal("hide");
                        
                    }
                })
                
            });
            
            
            
        });

        
    function getJobOffer(){

        $.ajax({
            url: '../config/logic/phpSelectors.php',
            method: 'GET',
            data: { action: 'getJobs' },
            success: function(data){
                var jsResp = JSON.parse(data);
                console.log(jsResp);
                // offerTitle
                // offerDates
                // offerDesc
                // offerPrice

                // $("#offerTitle").val(jsResp.offerTitle);
                // $("#offerDetails").val(jsResp.offerDates);
                
                var jobTable = '';
                if(jsResp !== null){
                for(let i = 0 ; i < jsResp.length; i++){
                    
                    jobTable += '<tr>'+
                                '<td><h4>'+jsResp[i].jobId+'</h4></td>'+
                                '<td>'+jsResp[i].jobTitle+'</td>'+
                                '<td><button class="btn btn-warning btnView" id="'+jsResp[i].jobId+'">Edit</button></td>'+
                                '<td><button class="btn btn-danger btnRemove" id="'+jsResp[i].jobId+'">Remove</button></td>'+
                                '</tr>';
                    
                }
                
                }else{
                    jobTable = 'No Data';
                }
                $("#tableData").html(jobTable);

            },error: function(){
                alert("error");
            }

        });
    }
    
    function populateSpecJob(id){
        
        
        $.ajax({
            url: '../config/logic/phpSelectors.php',
            method: 'GET',
            data: { action: 'getJobID', id: id },
            success: function(data){
                var jsResp = JSON.parse(data);
                
                $("#jobId").val(jsResp.jobId);
                $("#offerTitleUpdate").val(jsResp.jobTitle);
                // $("#offerDetailsUpdate").val(jsResp.jobDescription);
                $('iframe').contents().find('.wysihtml5-editor').html(jsResp.jobDescription);
                
                
                
            }
        })
        
    }
    
    // $(".btnView").on("click", function(e){
    //     e.preventDefault();
        
    //     var jobId = $(this).attr("id");
    //     alert(jobId);
    //     // populateSpecJob(jobId);
        
    //     // $("#jobModalUpdate").modal("show");
        
    // });
    
    $(document).on("click", ".btnView", function(e){
        e.preventDefault();
        
        var jobId = $(this).attr("id");
        populateSpecJob(jobId);
        $("#jobModalUpdate").modal("show");
    })
    
    
    $(".createJob").on("click", function(e){
        e.preventDefault();
        
        $('iframe').contents().find('.wysihtml5-editor').html('');
        $("#jobModalCreate").modal("show");
        
    })
    
    
    $(document).on("click", ".btnRemove", function(e){
        e.preventDefault();
        
        var jobId = $(this).attr("id");
        
        
        $.ajax({
            url: 'php/deletefnctns/phpDelete.php',
            method: 'GET',
            data: { action: 'jobDel', id: jobId },
            success: function(data){
                var jsResp = JSON.parse(data);
                
                if(jsResp.status === "success"){
                    alert("Job vacancy Removed!");
                    getJobOffer();
                    
                }else{
                    alert("error occurred!");
                }
                
            }
        })
        
    })

    // $(".btnEdit").on("click", function(e){
    //     e.preventDefault();

    //     var offerId = $(this).attr("id");
    //     $.ajax({
    //         url: 'php/editfnctns/phpEdits.php',
    //         method: 'POST',
    //         data: { action: 'setOffers', offerId: offerId, offerTitle: $("#offerTitle").val(), offerDates: $("#offerDetails").val(), offerDescription: $("#offerDesc").val(),offerPrice: $("#offerPrice").val() },
    //         success: function(data){
    //             var jsResp = JSON.parse(data);

    //             if(jsResp.status === "success"){
    //                 alert("Offer Changed!");
    //                 getOffer();
    //             }else{
    //                 alert("Error Occurred!");
    //             }
    //         }
    //     })

    // })

    </script>

    <?php include 'footer.php' ?>