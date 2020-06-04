// JavaScript Document
$(function(){
$('.Wheel').slick({
		dots: false,
		dotsClass: 'slider_dots',
	     customPaging: function(slider, i) {
    return '<span data-role="none">0' + (i + 1) + '</span>';
	}, 
		autoplay: true,
		arrows: true,
		prevArrow: '<big href="" data-role="none" class="prog_prev">Previous</big>',
		nextArrow: '<big href="" data-role="none" class="prog_next">Next</big>',
		infinite: true,
		speed: 500,
		cssEase: 'linear',
		slide: 'li',
		slidesToShow:3,
		slidesTo:1,
		responsive: [
   
	
	{
      breakpoint:1030,
      settings: {
      slidesToShow:2,
		slidesTo:2,
	  //arrows: false,

      }
    },
	{
      breakpoint:800,
      settings: {
      slidesToShow:1,
		slidesTo:1,
	  //arrows: false,

      }
    }
  ]
	});




 $('.select_info').on('click',function(){
	  $(this).next().slideToggle();
	  e.stopPropagation();
	 })
	 
// $('.size_select li ').on('click',function(){
//	   $(this).parents(".size_select").slideUp();
//	  $(this).parents(".size_select").prev(".select_info").text($(this).find('a').text())
//	 })
//		

$(document).click(function (e) {
    if (!$(e.target).hasClass("select_info") 
        && $(e.target).parents(".size_select").length === 0) 
    {
        $(".size_select").slideUp();
    }
});
	
	
})//ready function end

