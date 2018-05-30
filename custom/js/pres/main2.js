
let urlString = 'cms/phpinc/classes/cmsFunctions.php';

	$(document).ready(function(){
			getContact();
			getAdvText();
	});

	function getContact(){

		$.get(urlString, { action: 'contactData' }, function(data){
				var jsResp = JSON.parse(data);
				$("#addressInfo").html(jsResp.contactAdress);
				$("#pobox").html(jsResp.pobox);
				$("#tel").html(jsResp.telefax);
				$("#email").html(jsResp.contactemail);
				$("#site").html(jsResp.website);

		})

	}

	function getAdvText(){
		$.get(urlString, { action: 'advText' }, function(data){
				var jsResp = JSON.parse(data);
				console.log(jsResp);
				$("#advTxt").html(jsResp.advTxt);
		})

		// $.ajax({
		// 	url: urlString,
		// 	method: 'GET',
		// 	data: {action: 'advText'},
		// 	success: function(data){
		// 		console.log(data);
		// 	}
		// })

	}
