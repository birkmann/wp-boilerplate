(function ($) {
	// VERTICALLY ALIGN FUNCTION
	$.fn.vAlign = function() {
		return this.each(function(i){
		var ah = $(this).height();
		var ph = $(this).parent().height();
		var mh = Math.ceil((ph-ah) / 2);
		$(this).css('margin-top', mh);
		});
	};
})(jQuery);

function animate404(){

	if( $(window).width() > 960) {
		$('.page-wrapper').mousemove(function(e){
			var amountMovedX = (e.pageX * -1 / 100);
			var amountMovedY = (e.pageY * -1 / 100);
			$('.wrapper-404').css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
		});
	} 

}

$(document).ready(function(){

	animate404();

	$('.emotion .owl-carousel').owlCarousel({
		autoPlay: 3000,
		loop: true,
		margin: 0,
		nav: false,
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

	$(".search-toggle").click(function(){
		$(".search-wrapper").toggle();
		$(".search-toggle.close").toggle();
		$(".search-toggle.open").toggle();
		$(".nav-main").hide();
	});

	$(".menu-toggle").click(function(){
		$(".menu-wrapper").toggle();
		$(".nav-main").toggle();
		$(".search-wrapper").hide();
	});

	$('.emotion img').vAlign();

});

$(window).resize(function() {
	animate404();
	$('.emotion img').vAlign();
});