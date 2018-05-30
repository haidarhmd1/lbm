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
	<?php $id = $_GET['idPlace']; echo "<input type='hidden' class='getValue' value='".$id."' >"; ?>
<!-- ------------------------------------------------------------------------------------------- -->

<div class="container-fluid" style="margin-bottom: 25px;">
	<div class="row">
		<div class="col-xs-12 text-center" id="colHeader">
			<h1 id="headerDest"></h1>
		</div>
	</div>
</div>

<div class="container text-center"> 
                        
                        <div id="imageSlider">
                          <div id="myCarousel" class="carousel slide">
                              <!-- Indicators -->
                              <ol class="carousel-indicators" id="indicators">
                              </ol>
                              <div class="carousel-inner" id="homepageItems">
                              </div>
                              <div class="carousel-controls"> 
                                <button class="carousel-control left" href="#myCarousel" data-slide="prev" style="border: none;"> 
                                  <span class="glyphicon glyphicon-menu-left"></span> 
                                </button>
                                <button class="carousel-control right" href="#myCarousel" data-slide="next" style="border: none;"> 
                                  <span class="glyphicon glyphicon-menu-right"></span> 
                                </button>
                              </div>
                            </div>
                        </div>
		  <!-- <img id="destImg" src="" width="80%">  -->
</div>
<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-xs-12">
			<p id="descriptionTxt"></p>
		</div>
	</div>
</div>
<div class="container">
		<div class="row" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="col-xs-12 text-right">
			<a href="index.php" style="font-weight: 800; text-decoration: none; color: darkorange;">Back</a>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){
		
		getDestMenu();
		
		var id = $(".getValue").attr("value");

		$.ajax({
			url: 'config/logic/phpSelectors.php',
			method: 'GET',
			data: { action: 'getDestinationBoxesSpecId', id: id },
			success: function(data){
				var jsResp = JSON.parse(data);

				$("#headerDest").html(jsResp.mainItems.destination_title);
				// $("#destImg").attr("src", jsResp.mainItems.destination_mainPic);
				$("#descriptionTxt").html(jsResp.mainItems.destinationText);
				$("#colHeader").css('background', 'url('+ jsResp.mainItems.destination_mainPic +')');

			    var response = "";
                var indicator = "";

				for(let i=0 ; i < jsResp.imgSlides.length; i++){
					response += '<div class="item"><img style="margin: auto;" src="'+jsResp.imgSlides[i].destPics+'"></div>';
            		indicator += '<li data-target="#myCarousel" data-slide-to="'+i+'"></li>';
				}

				$('#homepageItems').append(response);
                $('#indicators').append(indicator);
                $('.item').first().addClass('active');
                $('.carousel-indicators > li').first().addClass('active');
                $("#myCarousel").carousel();

			}
		});
                

	});


	function getDestMenu(){

		$.ajax({
			url: 'config/logic/phpSelectors.php',
			method: 'GET',
			data: { action: 'getDestinationMenu' },
			success: function(data){
				var jsResp = JSON.parse(data);
				console.log(jsResp);
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