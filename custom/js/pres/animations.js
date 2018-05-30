$(document).ready(function(){

	$(document).on("click", ".circles", function(e){
		e.preventDefault();

		alert("clicked");
	})


	function myFunction(x) {
    if (x.matches) {

    } else {
		$(document).on("mouseenter", ".circles", function(e){
			e.preventDefault();

			$(this).addClass("editIts");
			$(this).siblings().fadeIn();

		})
		$(document).on("mouseleave", ".circles", function(e){
			e.preventDefault();

			$(this).removeClass("editIts");
			$(this).siblings().fadeOut();
		})
    }
}

var x = window.matchMedia("(max-width: 768px)")

myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes

});
