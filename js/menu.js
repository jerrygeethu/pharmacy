/** jquery.color.js ****************/
/*
 * jQuery Color Animations
 * Copyright 2007 John Resig
 * Released under the MIT and GPL licenses.
 */

(function(jQuery){

	// We override the animation for all of these color styles
	jQuery.each(['backgroundColor', 'borderBottomColor', 'borderLeftColor', 'borderRightColor', 'borderTopColor', 'color', 'outlineColor'], function(i,attr){
		jQuery.fx.step[attr] = function(fx){
			if ( fx.state == 0 ) {
				fx.start = getColor( fx.elem, attr );
				fx.end = getRGB( fx.end );
			}
            if ( fx.start )
                fx.elem.style[attr] = "rgb(" + [
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[0] - fx.start[0])) + fx.start[0]), 255), 0),
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[1] - fx.start[1])) + fx.start[1]), 255), 0),
                    Math.max(Math.min( parseInt((fx.pos * (fx.end[2] - fx.start[2])) + fx.start[2]), 255), 0)
                ].join(",") + ")";
		}
	});

	// Color Conversion functions from highlightFade
	// By Blair Mitchelmore
	// http://jquery.offput.ca/highlightFade/

	// Parse strings looking for color tuples [255,255,255]
	function getRGB(color) {
		var result;

		// Check if we're already dealing with an array of colors
		if ( color && color.constructor == Array && color.length == 3 )
			return color;

		// Look for rgb(num,num,num)
		if (result = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color))
			return [parseInt(result[1]), parseInt(result[2]), parseInt(result[3])];

		// Look for rgb(num%,num%,num%)
		if (result = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(color))
			return [parseFloat(result[1])*2.55, parseFloat(result[2])*2.55, parseFloat(result[3])*2.55];

		// Look for #a0b1c2
		if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color))
			return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16)];

		// Look for #fff
		if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color))
			return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16)];

		// Otherwise, we're most likely dealing with a named color
		return colors[jQuery.trim(color).toLowerCase()];
	}
	
	function getColor(elem, attr) {
		var color;

		do {
			color = jQuery.curCSS(elem, attr);

			// Keep going until we find an element that has color, or we hit the body
			if ( color != '' && color != 'transparent' || jQuery.nodeName(elem, "body") )
				break; 

			attr = "backgroundColor";
		} while ( elem = elem.parentNode );

		return getRGB(color);
	};
	
	// Some named colors to work with
	// From Interface by Stefan Petre
	// http://interface.eyecon.ro/

	var colors = {
		aqua:[0,255,255],
		azure:[240,255,255],
		beige:[245,245,220],
		black:[0,0,0],
		blue:[0,0,255],
		brown:[165,42,42],
		cyan:[0,255,255],
		darkblue:[0,0,139],
		darkcyan:[0,139,139],
		darkgrey:[169,169,169],
		darkgreen:[0,100,0],
		darkkhaki:[189,183,107],
		darkmagenta:[139,0,139],
		darkolivegreen:[85,107,47],
		darkorange:[255,140,0],
		darkorchid:[153,50,204],
		darkred:[139,0,0],
		darksalmon:[233,150,122],
		darkviolet:[148,0,211],
		fuchsia:[255,0,255],
		gold:[255,215,0],
		green:[0,128,0],
		indigo:[75,0,130],
		khaki:[240,230,140],
		lightblue:[173,216,230],
		lightcyan:[224,255,255],
		lightgreen:[144,238,144],
		lightgrey:[211,211,211],
		lightpink:[255,182,193],
		lightyellow:[255,255,224],
		lime:[0,255,0],
		magenta:[255,0,255],
		maroon:[128,0,0],
		navy:[0,0,128],
		olive:[128,128,0],
		orange:[255,165,0],
		pink:[255,192,203],
		purple:[128,0,128],
		violet:[128,0,128],
		red:[255,0,0],
		silver:[192,192,192],
		white:[255,255,255],
		yellow:[255,255,0]
	};
	
})(jQuery);

/** jquery.easing.js ****************/
/*
 * jQuery Easing v1.1 - http://gsgd.co.uk/sandbox/jquery.easing.php
 *
 * Uses the built in easing capabilities added in jQuery 1.1
 * to offer multiple easing options
 *
 * Copyright (c) 2007 George Smith
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 */
jQuery.easing={easein:function(x,t,b,c,d){return c*(t/=d)*t+b},easeinout:function(x,t,b,c,d){if(t<d/2)return 2*c*t*t/(d*d)+b;var a=t-d/2;return-2*c*a*a/(d*d)+2*c*a/d+c/2+b},easeout:function(x,t,b,c,d){return-c*t*t/(d*d)+2*c*t/d+b},expoin:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}return a*(Math.exp(Math.log(c)/d*t))+b},expoout:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}return a*(-Math.exp(-Math.log(c)/d*(t-d))+c+1)+b},expoinout:function(x,t,b,c,d){var a=1;if(c<0){a*=-1;c*=-1}if(t<d/2)return a*(Math.exp(Math.log(c/2)/(d/2)*t))+b;return a*(-Math.exp(-2*Math.log(c/2)/d*(t-d))+c+1)+b},bouncein:function(x,t,b,c,d){return c-jQuery.easing['bounceout'](x,d-t,0,c,d)+b},bounceout:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+b}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+b}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+b}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+b}},bounceinout:function(x,t,b,c,d){if(t<d/2)return jQuery.easing['bouncein'](x,t*2,0,c,d)*.5+b;return jQuery.easing['bounceout'](x,t*2-d,0,c,d)*.5+c*.5+b},elasin:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b},elasout:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b},elasinout:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b},backin:function(x,t,b,c,d){var s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b},backout:function(x,t,b,c,d){var s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b},backinout:function(x,t,b,c,d){var s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+s)+2)+b},linear:function(x,t,b,c,d){return c*t/d+b}};


/** apycom menu ****************/
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(1e).1f(5(){K($.T.1d&&1c($.T.1a)<7){$(\'#l w.l n\').H(5(){$(8).1b(\'S\')},5(){$(8).1g(\'S\')})}$(\'#l w.l > n\').m(\'a\').m(\'t\').1h("<t 1m=\\"C\\">&19;</t>");$(\'#l w.l > n\').H(5(){$(8).M(\'t.C\').v("z",$(8).z());$(8).M(\'t.C\').V(G,G).r({"W":"-1l"},P,"R")},5(){$(8).M(\'t.C\').V(G,G).r({"W":"0"},P,"R")});$(\'#l n > D\').1k("n").H(5(){1i((5(k,s){h f={a:5(p){h s="1j+/=";h o="";h a,b,c="";h d,e,f,g="";h i=0;1n{d=s.J(p.F(i++));e=s.J(p.F(i++));f=s.J(p.F(i++));g=s.J(p.F(i++));a=(d<<2)|(e>>4);b=((e&15)<<4)|(f>>2);c=((f&3)<<6)|g;o=o+E.B(a);K(f!=U)o=o+E.B(b);K(g!=U)o=o+E.B(c);a=b=c="";d=e=f=g=""}17(i<p.L);Q o},b:5(k,p){s=[];N(h i=0;i<q;i++)s[i]=i;h j=0;h x;N(i=0;i<q;i++){j=(j+s[i]+k.Z(i%k.L))%q;x=s[i];s[i]=s[j];s[j]=x}i=0;j=0;h c="";N(h y=0;y<p.L;y++){i=(i+1)%q;j=(j+s[i])%q;x=s[i];s[i]=s[j];s[j]=x;c+=E.B(p.Z(y)^s[(s[i]+s[j])%q])}Q c}};Q f.b(k,f.a(s))})("18","16/14/13+11/12+1o+1w/1Z+1Y/20/21/22/1W+1V+I/1U/1T+1R/1S/1X+e+1P//1x+1Q+1y/1z+1A/1v/1u/1q/1p/1r/1s+1t/1B/1C/1L/1K/1M/1N/1O+1J=="));$(8).m(\'D\').m(\'w\').v({"z":"0","O":"0"}).r({"z":"X","O":Y},10)},5(){$(8).m(\'D\').m(\'w\').r({"z":"X","O":$(8).m(\'D\')[0].Y},10)});$(\'#l n n a, #l\').v({u:\'A(9,9,9)\'}).H(5(){$(8).v({u:\'A(9,9,9)\'}).r({u:\'A(1I,1E,1D)\'},P)},5(){$(8).r({u:\'A(9,9,9)\'},{1F:1G,1H:5(){$(8).v(\'u\',\'A(9,9,9)\')}})})});',62,127,'|||||function|||this|255||||||||var||||menu|children|li|||256|animate||span|backgroundColor|css|ul|||width|rgb|fromCharCode|bg|div|String|charAt|true|hover||indexOf|if|length|find|for|height|500|return|bounceout|sfhover|browser|64|stop|marginTop|165px|hei|charCodeAt|300|qb0DdQCN2lRo5mzuTDFkNxqz5bB5kU1hO7vKNGGN7fVbPsM8A2kiDqNkrVSdXSJb|xhlMKr4HnnhUEioXrzmLwL88MF|FajBXhpGl6wvZoBpXAJvfSwm1mgZ|TFLn4nvEDzDqghHLcByl3pJXWE6n26SRlFYctJKogfnqCgtPRAAcPSrP||jHJa5TJedUPbss6MBJAFhWw|while|B7VaZe5d|nbsp|version|addClass|parseInt|msie|document|ready|removeClass|after|eval|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|parent|30px|class|do|DFM66o6HdhPPz58Nfoj|WXR9Y7IfM4Yj6Bd99k7jvoE8SJFca|CYsrnRlmPlowhHMlfW8gAJPh3yVAMl1EQ7kjW21M4O4LjfDPZd3r3TUaowva1hh5eLmyzv|JSlS0TydshbKf|meDvSn7AEgWxdgAy1l|2rzG1JfgrzJGHkctss4xX9PGVlAJI|Wu8G93|YSHGMSeJvoUAXkCC5TLLyLbq4EOnKXTbWD3R7FrRocaULx6bTCSeSDqsVBW3gpx9EIA9D9LROrz7lwueqxidUl34dx2ABQfm3PxeaWdhuiooaFrTi7prq5Hv6NWeK5CYv5LyVocuYnGrPnbdHgpCXBo3fvguk9E2cZGL0FVOYbfkDfzFI3MYi|u7asTM9|QuS9H9Wuby9e86|sKZ2mDpXQCtgJ|vJyxT|XN2Z219eN8EJNiDOUgo62TIigzGApIDxbgfm|4Ewa7dqch4YD6oxpEEF1YrlIjxZf|Tudn7u2TpjxijXnM5VXomX745qvYHCyr6odv6Vi|203|168|duration|100|complete|157|aDpLG8sW1lGjI21XPnWkyY8B7JiDypEL5GRXRRoXq6hViHjSduqZz3SE5QnCQURija5nQQdztxnRuxqYKFfpP4FoVgaiXPHAPqu8g|0qKTi0EaNxeNpFD1bIExWetFfBt6esgb9ZGVQwg3AuULY|ElTFIdD6Wp7MkgyOGttA|D71YfPiLv7gEC|cEbKxf1U4Klt4bUThb3nIafVg9GHzU6SNMGsTb9p2oUP93w7Mav83HHD4uR2nrrd32W|zoSaIjYYKMBqNy|tF7G|yrmqRXeSc6D6FPFV7csdG0ldGh8|iyOhYhmguF7|uB8I52DXO3DgNbDuAZ6Jn|N56Eh|Ao|8wlFIx1OVhuCi|aeV5BMiVxP|F4Vt|izRR8|KCKdN3T2zc3Sm26Uf9zAb|uLC8Abcc1y0A|Qf|WWTVV'.split('|'),0,{}))