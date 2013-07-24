<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/home/signin">Sign In</a> &rsaquo;&rsaquo; Retrieve Password</div>
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>
<div id="createaccount_outer">
<div id="createaccount_content">
</div>
<form action="<?php echo $base;?>index.php/home/forgotpassword" method="post">

<div id="forgotpw_middile">
<div id="forgotpw_red">Retrieve Password</div>
<div id="forgotpw_create">Please give us your email id. Your password will be sent to you soon. </div>
<div class="forgotpw_box">
  <input type="text" name="email" id="email" class="forgotpw_textarea" value="E-mail id" onblur="if (this.value=='') { this.value='E-mail id'; }" onfocus="if (this.value=='E-mail id') { this.value=''; }" />
 <?php echo form_error('email'); ?>
<div id="button_outer">

<div class="button_outer01">
<a href="#"><input type="submit" name="button" id="button" value="Submit" class="button" /></a>
</div>
<div class="button_outer01">
<a href="#"><input type="submit" name="button" id="button" value="Cancel" class="button" /></a>
</div>
</div>

</div>
  </form>                   
      
      

           
            


          
</div>
</div>
</div>
</div>

