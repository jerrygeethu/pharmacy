<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/prescription/refillprescription">Refill Prescriptions</a> &rsaquo;&rsaquo; Home Delivery</div>
<div class="clear"></div>
<form id="homedelivary" id="homedelivary" action="<?php echo $base;?>index.php/prescription/homedelivery/<?php echo $id;?>" method="post">
<div id="frame" style="display:none;">
</div>
<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">Home Delivery Detais</div>
<div id="createaccount_line"></div>
<div id="online_outer">
    <div id="profile_outer">
    	<div id="myaccount_box" style="width:640px;">
        	<!--<div id="box_head">Personal Information</div>-->
            <div class="account_main">
            	<div class="account">
                	<div class="account_left">Name:</div>
                    <div class="account_right"><input type="text" name="name" id="name" class="createaccount_textarea" value="<?php if(!empty($userexdata['name'])){echo set_value('name',$userexdata['name']);}else{echo set_value('name',"");}?>" /><?php echo form_error('name');?></div>
                </div>
                
                <div class="account">
                	<div class="account_left">Phone Number:</div>
                    <div class="account_right"><input type="text" name="phonenumber" id="phonenumber" class="createaccount_textarea" value="<?php if(!empty($userexdata['phone'])){echo set_value('phonenumber',$userexdata['phone']);}else{echo set_value('phonenumber','');}?>" /> <?php echo form_error('phonenumber');?></div>
                </div>
                
                <div class="account">
                	<div class="account_left">Email:</div>
                    <div class="account_right"><input type="text" name="email" id="email" class="createaccount_textarea" value="<?php if(!empty($userexdata['email'])){echo set_value('email',$userexdata['email']);}else{echo set_value('email','');}?>" /> <?php echo form_error('email');?></div>
                </div>
                
                <div class="account">
                	<div class="account_left">Address:</div>
                    <div class="account_right"><textarea name="address" id="address" rows="6" style="width:230px; max-width:230px; height:auto;" class="createaccount_textarea"><?php if(!empty($userexdata['address'])){echo set_value('address',$userexdata['address']);}else{echo set_value('address','');}?></textarea><?php echo form_error('address');?>
                  </div>
              </div>

            </div>
            <?php 
				if(!empty($userexdata['id']))
				{
			?>
					<div class="edit_btn"><input type="submit" name="button" id="button" value="Update" class="editbutton" /></div>
			<?php		
				}
				else
				{
			?>
					<div class="edit_btn"><input type="submit" name="button" id="button" value="Submit" class="editbutton" /></div>
			<?php
				}
			?>
        </div>
                  <p><?php echo $message;?></p>
        </div>
	</div>
</div>
</div>
<p>&nbsp;</p>
</div>
</form>
<div class="clear">
                
                </div>
