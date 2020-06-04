// JavaScript Document

(function($) {
	"use strict";
  $.fn.krisSelect = function(options) {
	  
	  var settings = $.extend({
            dropMenuHeight:'',
			multiple:false,
			customClass:'',
			intText:'',
			krisSelectCallback:function(){}
            }, options);
			
    return this.each(function() {
		//
		//settings.krisSelect();
		var selectMenu = $(this);
		var selectoption = selectMenu.children();
		var selectoptionLength = selectoption.length;
		
		 if(selectMenu.length>0){
			 selectMenu.attr('multiple','multiple').css({'opacity':'0','visibility':'hidden'});
		selectMenu.wrap("<div class='krisSelectWrap "+settings.customClass+"'></div>");
		selectMenu.after("<strong>"+settings.intText+"</strong><div class='selectDropMenu' style='display:none'><div class='selectDropMenuScroll'><ul class=selectDmList></ul></div></div>");
		
		var $parentWrapper = selectMenu.parent('.krisSelectWrap');
		var $selectDropMenu= $parentWrapper.find('.selectDropMenu');
		var $selectDropMenuScroll= $parentWrapper.find('.selectDropMenuScroll');
		var $selectDmList= $parentWrapper.find('.selectDmList');
		
		if(settings.multiple==true){
			$selectDmList.addClass('multiselect');
			selectMenu.children().prop('selected',false);
			}
			
			if($selectDropMenuScroll.height()<settings.dropMenuHeight){
			$selectDropMenuScroll.css({'height':settings.dropMenuHeight+'px','overflow':'auto'});
			}
		
		for(var i=0; i<selectoptionLength; i++){
			$selectDmList.append("<li>"+selectMenu.children(':eq('+i+')').text()+"</li>");
			//alert(selectoptionLength);
			}
		
		var $findLi = $selectDmList.children('li');
		}
		settings.krisSelectCallback();
		

		$findLi.bind('click',function(){
			
			if(settings.multiple==true){
				if(selectMenu.children(':eq('+$(this).index()+')').prop('selected')==true){
			 selectMenu.children(':eq('+$(this).index()+')').prop('selected',false);
				}else{
					selectMenu.children(':eq('+$(this).index()+')').prop('selected',true);
					}
			$(this).toggleClass('msActive');
			if(selectMenu.next('strong').find('samp').length>0){
				if(selectMenu.next('strong').find('samp[data-index='+$(this).index()+']').length==0){
				selectMenu.next('strong').append("<samp data-index='"+$(this).index()+"'>"+$(this).text()+"</samp>");	
				}else{
					selectMenu.next('strong').find('samp[data-index='+$(this).index()+']').remove();
					if(selectMenu.next('strong').find('samp').length==0){
						selectMenu.next('strong').text(settings.intText);
					}
					}
				}else{					 
					selectMenu.next('strong').html("<samp data-index='"+$(this).index()+"'>"+$(this).text()+"</samp>");
					}
				
			}else{
				selectMenu.children().prop('selected',false);
			    selectMenu.children(':eq('+$(this).index()+')').prop('selected',true)
				$findLi.removeClass('msActive');
				$(this).addClass('msActive');
				selectMenu.next('strong').html($(this).text());
				$selectDropMenu.slideUp();
				}
			//
			}) 
			
			    selectMenu.next('strong').bind('click',function(){
				$selectDropMenu.slideToggle();
				})
				
				$(document).on('click',function(event){
				if(!$(event.target).closest($parentWrapper).length){
				$selectDropMenu.slideUp();
				}
				})
		
    });
	
     }
})(jQuery);