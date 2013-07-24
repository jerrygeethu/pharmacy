<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/myaccount_controller/account_details">My Account</a> &rsaquo;&rsaquo; Edit Account</div>
<form name="editaccount" id="editaccount" action="#" method="POST">
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>


<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">Edit Account</div>
<div id="createaccount_line"></div>
<div id="online_outer">
    <div id="profile_outer">

    	<div id="myaccount_box" style="width:641px;">
        	<!--<div id="box_head">Personal Information</div>-->
            <div class="account_main">
            	<div class="account">
            	<?php foreach($userdata as $userdata1)
            	{
					?>
                	<div class="account_left">Email:</div>
                    <div class="account_right"><input type="text" name="email" id="email" class="createaccount_textarea" value="<?php echo set_value('email',$userdata1['email']);?>" />
                    <?php echo form_error('email');?>
                     </div>
                </div>
                 <?php
				}
                ?>
                <div class="account">
                	<div class="account_left">Old Password:</div>
                    <div class="account_right"><input type="password" name="oldpassword" id="oldpassword" class="createaccount_textarea" value="" /> 
                    <?php echo form_error('oldpassword');?>
                    </div>
                </div>
                
                 <div class="account">
                	<div class="account_left">New Password:</div>
                    <div class="account_right"><input type="password" name="newpassword" id="newpassword" class="createaccount_textarea" value="" /> <?php echo form_error('newpassword');?></div>
                    
                </div>
                
                 <div class="account">
                	<div class="account_left">Confirm Password:</div>
                    <div class="account_right"><input type="password" name="confirmpassword" id="confirmpassword" class="createaccount_textarea" value="" /> <?php echo form_error('confirmpassword');?> </div>
                   
                </div>
                
                <div class="account">
                	<div class="account_left">Security Question:</div>
                  <div class="account_right">
                    <select name="securityquest" class="small_select_box02" id="securityquest" name="securityquest">
                     <!--<option><?php //echo set_value('securityquest',$userdata1['securityquest']);?></option>-->
									<option value="What is the name of your first teacher?">What is the name of your first teacher?</option>
									<option value="what is your favorite hobby?">what is your favorite hobby?</option>
									<option value="What is your favorite food?">What is your favorite food?</option>
									<option value="What was your mothers maiden name?">What was your mothers maiden name?</option>
									<option value="What was your first phone number?">What was your first phone number?</option>
                    </select>
                    <?php //echo form_error('securityquest');?>
                  </div>
                  
              </div>
                
                <div class="account">
                	<div class="account_left">Security Answer:</div>
                    <div class="account_right"><input type="password" name="securityanswer" id="securityanswer" class="createaccount_textarea" value="" /> <?php echo form_error('securityanswer');?></div>
                    
                </div>
            </div>
            <div class="edit_btn"><input type="submit" name="button" id="button" value="Submit" class="editbutton" /></div>
            <p style="color:#FF0000"><?php echo $message;?></p>
        </div>
        
        </div>
	</div>
</div>
</div>

<p>&nbsp;</p>
</div>
</form>
<div class="clear">
