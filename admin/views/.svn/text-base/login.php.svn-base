<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Mainstreetpharmacy Adminside</title>
<link href="<?php echo $base;?>css/admin/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="js/ddaccordion.js"></script>




<script type="text/javascript">


ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>
<style type="text/css">
<!--
.style4 {color: #333333}
.style5 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
<body>
  <div id="container_new">
  	<div id="login_outer">
    	<div class="logo"></div>
        <div id="login_area">
        	<div id="logo-tag"></div>
            <div id="inner_login">
			
			<?php if(!empty($message)) { echo $message; }?>
			
			<form method="post" action="<?php echo $base;?>admin.php/home/login">
            	<div class="login_username">Username:</div>
                <div class="login_input"><input name="username" id="username" type="text" class="input01" /></div>
                <div class="login_username">Password:</div>
                <div class="login_input"><input name="password" id="password" type="password" class="input01" /></div>
                <div class="login_btn"><input type="submit" name="button" id="button" value="Submit" class="newbutton" /></div>
           </form>
		    </div>
        </div>
</div>
</body>
</html>
