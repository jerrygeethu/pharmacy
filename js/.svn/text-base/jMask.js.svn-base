(function($) {
		  
$.fn.jMask = function(options){
	var defaults = {time:7000,width:652,height:265,bg:'#ffffff',border:'1px solid #ffffff',callback:function(){  } };
	var options = $.extend(defaults, options);
	var root = $(this);
	
	
	
	var ul = root.find("ul:first");
	var li = ul.find("li");
	var images = li.find("img");
     
	 root.find("div").attr("id","jMask-stage");
		 
	 if($.browser.webkit)
	 {
		 $(window).load(function(){ proceed(); });
	 }
	else
	 proceed(); 				 
	
										 
	
	function proceed(){
			

	var list_array = $.makeArray(li);
	var image_timer,arr,index,block,w,h,src,parent,im;
	
		
	li.css({"width":options.width,height:options.height,display:"block"});
	$("#jMask-stage").css({"width":options.width,height:options.height});
	
	 $(list_array[list_array.length-1]).find("span , h1,p").show();
	 
	 function incrementz()
	 {
				
		var th,sr,temp =  list_array.pop();
		list_array.unshift(temp);
		if($(list_array[0]).hasClass('active'))
			$(list_array[0]).toggleClass('active reset');
			$(list_array[0]).find("span , h1,p").hide();
			$("#ribbon-left").hide();
			
			$(list_array[list_array.length-1]).toggleClass('active reset');
				$(list_array[list_array.length-1]).find("span , h1,p").show();
				$("#ribbon-left").show();
			$(list_array[list_array.length-2].firstChild).css({display:"block",opacity:1.0});
			$(list_array[list_array.length-1].firstChild).css({display:"block",opacity:1.0});
			
		options.callback(list_array[list_array.length-1].firstChild);	
	 };
	 
		
	 
	 function effects()
	 {
		 
		 cubeout(list_array[list_array.length-1].firstChild);
	 };
	
		  
	 
	
	function cubeout(image)
	{
		 im = $(image);
		 w = Math.floor(options.width/7);
		 h = Math.floor(options.width/7);
		 parent = im.parent();
		 arr = new Array();
		 i =0;
		 j =0;
		 var index = 0;
		 src = im.attr("src");
		 block = $("<div />",{
					css:{
						position:"absolute",
						width:w,
						height:h,
						'background-image':'url('+src+')',
						'background-color':options.bg,
						'border':options.border
						
						}
							
							});
		 var temp,mask = block.clone();
		 mask.css({'background-image':'',display:"none"});
		 while(i<options.width)
		 {
			
		    j=0;
			while(j<options.height)
			{
				
				arr[index] = block.clone().css({left:i ,top:j,backgroundPosition:-i+"px "+-j+"px" });
				parent.append(arr[index++]);
			j = j + h;
			}
			
			i = i + w;
		 }
		
	    i=0;
		var pos;
		parent.append(mask);
		setTimeout(function(){ im.hide(); doit(); },500);
		
		 var random_no = random_array(arr.length);
		function doit(){
		
		var timer = setInterval(function(){
		 
		 if(i>=arr.length)
			{
				
				clearInterval(timer);
						setTimeout(function(){ 
																			incrementz(); 
																		
									},2000)
			
						image_timer = setTimeout(function() {
														 
												  		  effects(); },options.time); 
				 
				
				 
			}
			
		 
		  pos = $(arr[random_no[i]]).position();
		
		 if(pos!=null){
		 temp = mask.clone().css({top:pos.top,left:pos.left});
		 temp.fadeIn(300,function(){
										   $(arr[random_no[i]]).css('background-image','');
										   $(this).remove();
										   $(arr[random_no[i++]]).fadeOut(652,function(){
														  
														 $(this).remove(); 
																					
														 
														  }); 
										   
										   });
		
		
		 }
		 
									 },90);
		
		};
	};	
	

		
	image_timer = setTimeout(function() {   effects(); },4000); 
	
	}
	
} 


function random_array(maxn)
 {
	
    var array = new Array();
	var temp,i,flag=true;
	var index =0;
	 while(index<maxn)
	 {
		 flag = true;
		 temp = Math.floor(Math.random() * maxn);
		 for(i=0;i<array.length;i++)
		 {
			 if(temp==array[i])
			 {
				flag=false;
				break;
			 }
		 }
		 
		 if(flag==true)
		 array[index++] = temp;
	 }
	 
	 return array;
 };

		  })(jQuery);