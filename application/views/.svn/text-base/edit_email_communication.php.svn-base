<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/myaccount_controller/account_details">My Account</a> &rsaquo;&rsaquo; Email Communication</div>
<form name="emailcommunication" id="emailcommunication" action="#" method="post">
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>

<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">Email Communication</div>
<div id="createaccount_line"></div>
<?php foreach($userdata as $user)
{
	?>
<div id="online_outer">
    <div id="profile_outer">
    	<div id="myaccount_box" style="width:640px;">
        	<!--<div id="box_head">Personal Information</div>-->
            <div class="account_main">
            	<div class="account">
                	<div class="account_left">Name:</div>
                    <div class="account_right"><input type="text" name="name" id="name"  readonly="readonly" class="createaccount_textarea" value="<?php echo set_value('name',$user['firstname']);?>" /><?php echo form_error('name');?> </div>
                </div>
                
                <div class="account">
                	<div class="account_left">Email:</div>
                    <div class="account_right"><input type="text" name="email" id="email"   readonly="readonly" class="createaccount_textarea" value="<?php echo set_value('name',$user['email']);?>" /> <?php echo form_error('email');?></div>
                </div>
                
                <div class="account_emailcommunication">
                <?php 
					if($user['subscribed']=='subscribed')
					{
                ?>
					  <label><input type="radio" id="radio2" name="radio2" value="subscribed"  checked="checked"/>
					Subscribe</label> 
					<label><input type="radio" id="radio2" name="radio2" value="unsubscribed" />
					Unsubscribe</label>
					<?php 
					}
					else
					{
					?>
						<label><input type="radio" id="radio2" name="radio2" value="subscribed"/>
					Subscribe</label> 
					<label><input type="radio" id="radio2" name="radio2" value="unsubscribed" checked="checked"/>
					Unsubscribe</label>
       <?php
			}
        }
        ?>  
                </div>
            </div>
            <div class="edit_btn"><input type="submit" name="button" id="button" value="Submit" class="editbutton" /></div>
            <p style="color:red;"><?php echo $msg;?></p>
        </div>
        
        </div>
	</div>
</div>
</div>
<p>&nbsp;</p>
</div>
</form>s
<div class="clear">
                
                </div>
