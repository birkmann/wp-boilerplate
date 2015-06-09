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

$(document).ready(function(){

	$('.emotion img').vAlign();

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
	});

});

$(window).resize(function() {
	$('.emotion img').vAlign();
});