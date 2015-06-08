$(document).ready(function(){

	$('.emotion .owl-carousel').owlCarousel({
		autoPlay: 3000,
		loop: true,
		margin: 0,
		nav: true,
		responsive:{
			0 : {
				items: 1
			},
			600 : {
				items: 1
			},
			1000 : {
				items: 1
			}
		}
	});

});