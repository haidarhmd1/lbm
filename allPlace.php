<?php include('header2.php'); ?>
<style type="text/css">
html, body{
	padding: 0px;
	overflow-x: hidden;
	margin: 0px;
}
	#colHeader{
	    height: 150px;background: url('');
	    background-size: cover !important;
	    background-repeat: no-repeat !important;
	    background-position-y: center !important;
	}
	#headerDest{
		color: white;
		padding-top: 25px;
	}
</style>
<!-- To get the response header and echo it out, inorder to use it again and don't interrupt the n-tier structure used via php ajax -->
	<?php $id = $_GET['idCountry']; echo "<input type='hidden' class='getCountry' value='".$id."' >"; ?>
<!-- ------------------------------------------------------------------------------------------- -->

<div class="container" id="allCountryContainer">

</div>
<script type="text/javascript">

	$(document).ready(function(){
		
		getDestMenu();
		
		var id = $(".getCountry").attr("value");
		// alert(id);

		$.ajax({
			url: 'config/logic/phpSelectors.php',
			method: 'GET',
			data: { action: 'getDestinationBoxesSpec', id: id },
			success: function(data){
				var jsResp = JSON.parse(data);
				console.log(jsResp);

				countryCon = '';

				for(let i=0 ; i < jsResp.length; i++){

					countryCon += 	'<div class="row" style="padding-bottom: 25px;">'+
									'<div class="col-xs-12 col-sm-4">'+
									'<img src="'+jsResp[i].destination_mainPic+'" class="img-thumbnail" width="100%">'+
									'</div>'+
									'<div class="col-xs-12 col-sm-8">'+
									'<h2>'+jsResp[i].destination_title+'</h2>'+
									'<br>'+
									'<p>'+jsResp[i].destinationText+'</p>'+
									'<a href="javascript:void(0);" class="toSpecLocation" id="'+jsResp[i].destination_id+'">read more...</a>'+
									'</div>'+
									'</div>';
				}

				$("#allCountryContainer").html(countryCon);
			}
		});
                

	});


    $(document).on("click", ".toSpecLocation", function(e){

    	var boxId = $(this).attr("id");
    	window.location.href = "specPlace.php?idPlace="+boxId;

    });

	function getDestMenu(){

		$.ajax({
			url: 'config/logic/phpSelectors.php',
			method: 'GET',
			data: { action: 'getDestinationMenu' },
			success: function(data){
				var jsResp = JSON.parse(data);
				var destMenu = '';

				for(let i=0; i < jsResp.length; i++){
					destMenu += '<li><a class="destMenuLink"  id="'+jsResp[i].dest_id+'" href="#">'+jsResp[i].menu+'</a></li>';
				}

				$("#ddlLocations").html(destMenu);

			}

		})
	}


    $(document).on("click", ".destMenuLink", function(e){

    	var countryId = $(this).attr("id");
    	window.location.href = "allPlace.php?idCountry="+countryId;

    });

</script>

<?php include ('footer.php'); ?>