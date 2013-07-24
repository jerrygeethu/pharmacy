// JavaScript Document

$(document).ready(function(){
	$("#nav ul li").hover(function()
	{	$(this).children("ul.subnav").slideDown('fast').show(); 
		$(this).children("ul").prev("a").addClass("subnav"); 
	},function()
	{	$(this).children("ul.subnav").slideUp('fast'); 
		$(this).children("a").removeClass("nav-active");
	});
});
