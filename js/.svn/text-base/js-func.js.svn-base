function mycarousel_initCallback(carousel) {
    
    $('.slider-nav a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
        return false;
    });

};

function mycarousel_itemFirstInCallback(carousel, item, idx, state) {
	$('.slider-nav a').removeClass('active');
	$('.slider-nav a').eq(idx-1).addClass('active');
	
};


$(function(){
	
		//Horizontal Carousel
		$('.slider-left ul, .slider-right ul').jcarousel({
			auto: 5,
			wrap: "last",
			scroll: 1,
			visible: 1,
			initCallback: mycarousel_initCallback,
			itemFirstInCallback:mycarousel_itemFirstInCallback, 
	        buttonNextHTML: null,
	        buttonPrevHTML: null
		});
		
		//Blink Fields
		$('.blink').
		    focus(function() {
		        if(this.title==this.value) {
		            this.value = '';
		        }
		    }).
		    blur(function(){
		        if(this.value=='') {
		            this.value = this.title;
		        }
		    });
	    
	    //Navigation
	    
		$('#navigation ul li').hover(function() {
			
			if( $(this).find('.dd-holder').length > 0 ) {
				
				$(this).find('span').addClass('link');
				$(this).find('a:eq(0)').addClass('hover');
				$(this).find('a.hover').append('<span class="hide">&nbsp;</span>');
				
				var hide_width = $('.hover').outerWidth() -8;
					$(this).find('.hide').css({
					width : hide_width,
					display : "block"
				});
				
				$(this).find('.dd-holder:eq(0)').show();
				
				$('.dd-holder ul li').hover(function(){
					if( $(this).find('.dd-holder').length > 0) {
						$(this).find('a:eq(0)').addClass('subhover');
					}
					},
					function(){
						$(this).find('a:eq(0)').removeClass('subhover');	
					});	
			}
		
		},
		function(){
			$(this).find('a').removeClass('hover');
			$(this).find('.dd-holder:eq(0)').hide();
			$(this).find('span').removeClass('link');
			$(this).find('.hide').remove();
		});
		
		//PNG Fix for IE 6 
		if( $.browser.msie && $.browser.version.substr(0,1) == 6 ){
			DD_belatedPNG.fix('.dd, .dd-t, .dd-b');
		}
	
	});