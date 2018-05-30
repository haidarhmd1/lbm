$(document).ready(function(){

});

$("#banks").on("click",  function(e){ e.preventDefault(); getBankDDL(); });
$("#dealers").on("click", function(e){ e.preventDefault(); getDealersDDL(); });
$("#maintenance").on("click", function(e){ e.preventDefault(); getMaintenanceDDL(); });
$("#insurance").on("click", function(e){ e.preventDefault(); getInsuranceDDL(); });
$("#rental").on("click", function(e){ e.preventDefault(); getRentalDDL(); });


function getBankDDL(){
	// $.get( "site", { data: 'bankData' } , function( data ) {
	  $( "#collapse0" ).html('<div class="row">'+
					'<div class="col-xs-10 col-offset-xs-1">'+
						'<div class="form-group">'+
							'<label for="banks">Choose a Bank</label>'+
							'<select name="banks" class="form-control">'+
			   					'<option>Select</option>'+
			   					'<option>an</option>'+
			   					'<option>Option</option>'+
			   				'</select>'+
						'<hr>'+
						'</div>'+
	   				'</div>'+
				'</div>'+
				'<div class="row">'+
					'<div class="col-xs-12 mediaNewsContainer">'+
						'<div class="media">'+
						   ' <span class="media-left">'+
						       ' <img src="pics/pic1.jpg" class="imgNews" alt="...">'+
						    '</span>'+
						   ' <div class="media-body">'+
						       ' <h4 class="media-heading">Bank Name</h4>'+
						        '<ul>'+
						        	'<li>Address 1</li>'+
						        	'<li>Address 2</li>'+
						        	'<li>Address 3</li>'+
						        	'<li><stron>Tel: </stron><span></span></li>'+
						        	'<li><stron>Fax: </stron><span></span></li>'+
						        	'<li><stron>P.O.Box: </stron><span></span></li>'+
						        	'<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
						       ' <button class="btn btn-primary" id="bankBranches">Click here to list all the branches</button>'+
						    '</div>'+
						'</div>'+
					'</div>'+
	   				'</div>'+
	   				'<div class="col-xs-12" id="branchesDetails" style="display: none;">'+
	   							'<hr>'+
						      '  <ul>'+
						        '	<li>Address 1</li>'+
						        '	<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        '	<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						        '<ul>'+
						        '	<li>Address 1</li>'+
						        '	<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        '	<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						       ' <ul>'+
						        	'<li>Address 1</li>'+
						        	'<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        	'<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						       ' <ul>'+
						        '	<li>Address 1</li>'+
						        '	<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        '	<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						       ' <ul>'+
						        	'<li>Address 1</li>'+
						        	'<li>Address 2</li>'+
						        	'<li>Address 3</li>'+
						        	'<li><stron>Tel: </stron><span></span></li>'+
						        	'<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        	'<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
	   				'</div>'+
				'</div>');
	// });
}
function getDealersDDL(){
	// $.get( "site", { data: 'dealersData' } , function( data ) {
	  $( "#collapse0" ).html('<div class="row">'+
					'<div class="col-xs-12 col-sm-6">'+
							'<label for="sections">Search by Section</label>'+
							'<select name="sections" class="form-control section">'+
			   					'<option value="0">Select</option>'+
			   					'<option value="1">an</option>'+
			   					'<option value="2">Option</option>'+
			   				'</select>'+
	   				'</div>'+
					'<div class="col-xs-12 col-sm-6">'+
							'<label for="make">Make</label>'+
							'<select name="make" class="form-control make" disabled="true">'+
			   					'<option>Select</option>'+
			   					'<option>an</option>'+
			   					'<option>Option</option>'+
			   				'</select>'+
	   				'</div>'+
				'</div>'+
				'</div>'+
				'<div class="row">'+
					'<div class="col-xs-12">'+
						'<div class="form-group">'+
							'<label for="dealers">Search by Dealers</label>'+
							'<select name="dealers" class="form-control">'+
			   					'<option>Select</option>'+
			   					'<option>an</option>'+
			   					'<option>Option</option>'+
			   				'</select>'+
						'<hr>'+
						'</div>'+
	   				'</div>'+
				'</div>'+
				'<div class="row">'+
					'<div class="col-xs-12 mediaNewsContainer">'+
						'<div class="media">'+
						   ' <span class="media-left">'+
						       ' <img src="pics/pic1.jpg" class="imgNews" alt="...">'+
						    '</span>'+
						   ' <div class="media-body">'+
						       ' <h4 class="media-heading">Bank Name</h4>'+
						        '<ul>'+
						        	'<li>Address 1</li>'+
						        	'<li>Address 2</li>'+
						        	'<li>Address 3</li>'+
						        	'<li><stron>Tel: </stron><span></span></li>'+
						        	'<li><stron>Fax: </stron><span></span></li>'+
						        	'<li><stron>P.O.Box: </stron><span></span></li>'+
						        	'<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
						       ' <button class="btn btn-primary" id="bankBranches">Click here to list all the branches</button>'+
						    '</div>'+
						'</div>'+
					'</div>'+
	   				'</div>'+
	   				'<div class="col-xs-12" id="branchesDetails" style="display: none;">'+
	   							'<hr>'+
						      '  <ul>'+
						        '	<li>Address 1</li>'+
						        '	<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        '	<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						        '<ul>'+
						        '	<li>Address 1</li>'+
						        '	<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        '	<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						       ' <ul>'+
						        	'<li>Address 1</li>'+
						        	'<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        	'<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						       ' <ul>'+
						        '	<li>Address 1</li>'+
						        '	<li>Address 2</li>'+
						        '	<li>Address 3</li>'+
						        '	<li><stron>Tel: </stron><span></span></li>'+
						        '	<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        '	<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
								'<hr>'+
						       ' <ul>'+
						        	'<li>Address 1</li>'+
						        	'<li>Address 2</li>'+
						        	'<li>Address 3</li>'+
						        	'<li><stron>Tel: </stron><span></span></li>'+
						        	'<li><stron>Fax: </stron><span></span></li>'+
						        '	<li><stron>P.O.Box: </stron><span></span></li>'+
						        	'<li><stron>Wesbsite: </stron><span></span></li>'+
						       ' </ul>'+
	   				'</div>'+
				'</div>');
	// });
}
function getMaintenanceDDL(){
	// $.get( "site", { data: 'maintenanceData' } , function( data ) {
	  $( "#collapse0" ).html('<select class="form-control">'+
	   				'<option>Select</option>'+
	   				'<option>an</option>'+
	   				'<option>Option</option>'+
	   			'</select>');
	// });
}
function getInsuranceDDL(){
	// $.get( "site", { data: 'insuranceData' } , function( data ) {
	  $( "#collapse0" ).html(
	   			'<select class="form-control">'+
	   				'<option>Select</option>'+
	   				'<option>an</option>'+
	   				'<option>Option</option>'+
	   			'</select>' 
	   			);
	// });
}
function getRentalDDL(){
	// $.get( "site", { data: 'rentalData' } , function( data ) {
	  $( "#collapse0" ).html(
	   			'<select class="form-control">'+
	   				'<option>Select</option>'+
	   				'<option>an</option>'+
	   				'<option>Option</option>'+
	   			'</select>' 
	   			);
	// });
}

$(document).on("click", "#bankBranches", function(e){
	$("#branchesDetails").toggle();
});

$(document).on("change",".section", function(e){

	if($(this).val() !== "0"){
		$(".make").prop("disabled", false);
	}if($(this).val() === "0"){
		$(".make").prop("disabled", true);
	}

});