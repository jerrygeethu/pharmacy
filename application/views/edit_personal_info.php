<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/myaccount_controller/account_details">My Account</a> &rsaquo;&rsaquo; Edit Personal Information</div>
<form name="editpersonal" id="editpersonal" action="#" method="POST">
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>

<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">Edit Personal Information</div>
<div id="createaccount_line"></div>
<?php  foreach($userdata as $user)
{
	?>
<div id="online_outer">
    <div id="profile_outer">
    	<div id="myaccount_box" style="width:640px;">
        	<!--<div id="box_head">Personal Information</div>-->
            <div class="account_main">
            	<div class="account">
                	<div class="account_left">First Name:</div>
                    <div class="account_right"><input type="text" name="firstname" id="firstname" class="createaccount_textarea" value="<?php echo set_value('firstname',$user['firstname'])?>" /><?php echo form_error('firstname');?></div>
                </div>
                
                <div class="account">
                	<div class="account_left">Last Name:</div>
                    <div class="account_right"><input type="text" name="lastname" id="lastname" class="createaccount_textarea" value="<?php echo set_value('lastname',$user['lastname'])?>" /><?php echo form_error('lastname');?></div>
                </div>
                
                <div class="account">
                	<div class="account_left">Phone Number:</div>
                    <div class="account_right"><input type="text" name="phone" id="phone" class="createaccount_textarea" value="<?php echo set_value('phone',$user['phone'])?>" /><?php echo form_error('phone');?></div>
                </div>
                
                 <div class="account">
                	<div class="account_left">Mobile:</div>
                    <div class="account_right"><input type="text" name="mobile" id="mobile" class="createaccount_textarea" value="<?php echo set_value('mobile',$user['mobile'])?>" /><?php echo form_error('mobile');?></div>
                  </div>
              
                
                <div class="account">
                	<div class="account_left">Email:</div>
                    <div class="account_right"><input type="text" name="email" id="email" class="createaccount_textarea" value="<?php echo set_value('email',$user['email'])?>" /><?php echo form_error('email');?></div>
                </div>
                <p style="color:#FF0000"><?php echo $msg;?></p>
                </div>  
               
              
             <!-- <div class="account">
                	<div class="account_left">Prefered Contact Method:</div>
                    <div class="account_right">
                    <select name="contact_method">
						<option>Email</option>
						<option>Phone</option>
						<option>Mobile</option>
                    </select>
                  </div>
              </div>-->
              <?php }?>
                
            </div>
            <div class="edit_btn"><input type="submit" name="button" id="button" value="Submit" class="editbutton" /></div>
        </div>   
        </div>  	
	</div>
</div>
</div>
<p>&nbsp;</p>
</div>
</form>
<div class="clear">
                
                </div>
