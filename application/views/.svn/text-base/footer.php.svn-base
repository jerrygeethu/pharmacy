
<div class="clear"></div>
<div id="footer">
<div id="footer_inner">
<div class="footerlinks">
<div class="footerhead">Pharmacy Services</div>
<div class="footerlink">
<div class="icon"></div>
<?php if($this->session->userdata('memberid')!="")
					{ ?>
<a href="<?php echo $base;?>index.php/prescription/refillprescription"  <?php if($menu=="refill") { ?> class="active_nav" <?php } ?> >Refill Prescription</a>
<?php } 
else
{
?><a href="<?php echo $base;?>index.php/home/signin">Refill Prescription</a>

<?php } ?>
</div>
<div class="footerlink">
<div class="icon"></div>
<?php if($this->session->userdata('memberid')!="")
					{ ?>
<a href="<?php echo $base;?>index.php/prescription/transferprescription"  <?php if($menu=="refill") { ?> class="active_nav" <?php } ?>>Transfer Prescription</a>
<?php } else { ?>
<a href="<?php echo $base;?>index.php/home/signin">Transfer Prescription</a>

<?php } ?>
</div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/consultation">Consultation Corner</a>
</div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/healthinfo/healthinformation">Health Information Center</a>
</div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/drugs/druginformation">Drug Information Center</a>
</div>

</div>

<div class="footerlinks">
<div class="footerhead">Pharmacy Information</div>
<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/home/signin">Sign In</a>
</div>
<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/services">Services</a>
</div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/healthinfo/comming_soon"">Activities</a></div>

<div class="footerlink">
<div class="icon"></div>
<?php if($this->session->userdata('memberid')!="")
					{ ?>
<a href="<?php echo $base;?>index.php/onlineshop/viewcart">Shopping Cart</a>

<?php } else {?>
					
<a href="<?php echo $base;?>index.php/home/signin">Shopping Cart</a>
<?php } ?>
</div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/onlineshop">Online shopping</a></div>
</div>


<div class="footerlinks">
<div class="footerhead">Help</div>
<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/home/contactus">Contact Us</a></div>

<div class="footerlink">
<div class="icon"></div>
<a href="#">Sitemap</a></div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/home/privacy">Privacypolicy</a></div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/home/terms">Terms&amp;condtion</a></div>

<div class="footerlink">
<div class="icon"></div>
<a href="<?php echo $base;?>index.php/healthinfo/comming_soon">Shipping Information</a></div>
</div>


<div class="footerlinks">
<div class="footerhead">Get in Touch</div>
<div class="footerlink">

<div class="footer_icons"><img src="<?php echo $base;?>images/phone.png" alt="img" /></div>
+971 (0)4 446 2629

</div>


<div class="footerlink">
<div class="footer_icons">
<a href="mailto:mainst.rx4@gmail.com">
<img src="<?php echo $base;?>images/mail.jpg" alt="img" />
</a>
</div>
<a href="mailto:mainst.rx4@gmail.com">
mainst.rx4@gmail.com</a></div>
<div class="footerlink">
<div class="footer_icons"><img src="<?php echo $base;?>images/link.png" alt="img" /></div>
mainst.rx@gmail.com</div>
<div class="footerlink">
<div class="footer_icons"><img src="<?php echo $base;?>images/follows.png" alt="img" /></div>
<div class="follows"><a href="http://www.rss.com/"><img src="<?php echo $base;?>images/rss.png" alt="img" /></a></div>
<div class="follows"><a href="http://www.twitter.com/"><img src="<?php echo $base;?>images/twitter.png" alt="img" /></a></div>
<div class="follows"><a href="http://www.facebook.com/mainstreetpharmacy/"><img src="<?php echo $base;?>images/facebook.png" alt="img" /></a></div>
<div class="follows"><a href="#"><img src="<?php echo $base;?>images/in.png" alt="img" /></a></div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>

<script type="text/javascript">
	jQuery(document).ready(function($){
		
$(".news-slider").jCarouselLite({
    btnNext: ".next",
    btnPrev: ".prev",
    vertical: true,
	visible: 2,
	circular: true
});

$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
	
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
	
		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	
	});	 
	
	
</script>
