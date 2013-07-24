// JavaScript Document
/*  jQuery Ghost Carousel
 *  Copyright (c) 2011 William Moynihan
 *  http://ghosttype.com
 *  Licensed under MIT
 *  http://www.opensource.org/licenses/mit-license.php
 *  May 31, 2011 -- v1.0
 */
$(function() {
    var content = '#ghostCarousel #content';
    var section = content + ' > div';
    
    function ghostCarousel() {
        
        var v = $(window).width();
        var w = $(section).width();
        var c = (w * $(section).length - v) / 2;
        
        $(content).width(w * $(section).length);
        $(content).css('margin-left', -c);

        $('#gcNav a.left').click(function(e) {
            e.preventDefault();
            if ($(content).is(':animated')) return false;
            $(content).animate({ marginLeft: '-=' +w }, 1000, function() {
                var first = $(section).eq(0);
                $(section).eq(0).remove();
                $(this).animate({ marginLeft: '+=' +w }, 0);
                $(this).append(first);
            });
        });
        $('#gcNav a.right').click(function(e) {
            e.preventDefault();
            if ($(content).is(':animated')) return false;
            $(content).animate({ marginLeft: '+=' +w }, 1000, function() {
                var end = $(section).length - 1;
                var last = $(section).eq(end);
                $(section).eq(end).remove();
                $(this).animate({ marginLeft: '-=' +w }, 0);
                $(this).prepend(last);
            });
        });
        
    }
    
    ghostCarousel();
    
    $(window).resize(function() {
        var v = $(window).width();
        var w = $(section).width();
        var c = (w * $(section).length - v) / 2;
        $(content).css('margin-left', -c);
    });   
});
/* end "jQuery Ghost Carousel" */
