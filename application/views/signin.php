<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Sign In</div>
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>
<div id="createaccount_outer">
<div id="signin_outer">
<div id="createaccount_head">Sign In Or Create account</div>
<div id="createaccount_line"></div>
<div id="forgotpw_desc">You can be a registered user just by filling the form given below. Being a registered user of Main Street Pharmacy helps you to avail of its complete services like <b>buy/transfer/refill prescriptions.</b> </div>

<form action="<?php echo $base;?>index.php/home/signin" method="post">
<div class="sign_in">
<div class="sign_in_head">ALREADY HAVE AN ACCOUNT? </div>
<div class="sign_in_inner">
<Div class="sign_in_form1">
<input name="email" password="email"  type="text" class="sign_in_textarea" value="E-mail id" onblur="if (this.value=='') { this.value='E-mail id'; }" onfocus="if (this.value=='E-mail id') { this.value=''; }" /> 
</Div>
<Div class="sign_in_form1">
<input name="password" id="password" type="password" class="sign_in_textarea" value="Password" onblur="if (this.value=='') { this.value='Password'; }" onfocus="if (this.value=='Password') { this.value=''; }" />
</Div>
<div class="sign_in_outerbtn">
<div class="button_outer01">
<input type="submit" name="button" id="button" value="Submit" class="button" />

</div>

<div class="signin_forgotpassword"><a href="#" class="forgot_link">Help</a> </div>
<div class="signin_forgotpassword"><a href="<?php echo $base;?>index.php/home/forgotpassword" class="forgot_link">Forgot password?</a> </div>
<div class="clear"></div>
<?php  if($message!="")
{ ?>
<div class="error"><?php echo $message; ?>
</div>
<?php }
?>
</div>

</div>
</div>
</form>
<div class="signin_adds">
	<div id="futuretopic_outer">
    	<div id="futuretopic">Featured Topics</div>
        <div id="future_list">
       <a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link"> Children's Health</a><br />
	<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">Cold and Flu</a><br />
	<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">Diabetes</a><br />
	<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">Ear Care</a><br />
	<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">Pain Management</a><br />
	<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">High Blood Pressure</a><br />
	<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">Weight Loss</a><br />
	<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">Women's Health</a>
	</div>
    <div id="button_topic"><b>&nbsp;&nbsp;&nbsp;<a href="<?php echo $base;?>/index.php/healthinfo/comming_soon" class="forgot_link">View All Topic</a></b></div>
    
    </div>
    <div id="ad"></div>
    
</div>
<div class="clear"></div>
<div class="sign_in">
<div class="sign_in_head">NEW TO OUR PHARMACY?</div>
<div class="sign_in_inner">
<p>Register today for our online account.</p>

  <p>- Manage your prescriptions<br />
    - View and print your prescription records<br />
    - Set up Auto Refills for medications you take regularly<br />
    - Ability to save your shopping cart<br />
	

	<div class="button_outer01">
<a href="<?php echo $base;?>index.php/home/createaccount"><input type="submit" name="button" id="button" value="Create a new account" class="create_btn" /></a>
</div>
	
   
</div>
</div>


<div class="signin_adds">
<span class="black01">Create an Account FAQs</span>
  <br /><br /><div id="box1"><p><b><i>Q. How can I create an account?</i></b><br>
    
    A. Go to CREATE AN ACCOUNT page, fill the details and submit. You will get an instant confirmation message on your registration. </p></div>
  <div id="box2"><p><b><i>Q. What are the benefits of being a registered member?</i></b><br />
    A. A registered member can do online shopping at Main Street Pharmacy. Being a registered member helps you to buy/refill/transfer prescriptions. A registered member can also avail of other services like online consultation.  </p></div>
    
    <div id="box1"><p><b><i>Q. What should I do if I forgot my password? </i></b><br>
    
    A. If you forgot your password, just reach UPDATE PASSWORD page and give your email id. The password will be sent to your email id. </p></div>
</div>


</div>
</div>
</div>

<div class="clear"></div>
