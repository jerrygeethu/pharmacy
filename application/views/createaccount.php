<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/home/signin">Sign In</a> &rsaquo;&rsaquo; Create an Account</div>
<div class="clear"></div>

<div id="frame" style="display:none;">
</div>


		<form name="createaccout" id="createaccout" method="post" action="<?php echo $base;?>index.php/home/accountconfirmation">
			<div id="createaccount_outer">
				<div id="createaccount_content">
				
				<div id="createaccount_head">Create an Account</div>
				<div id="createaccount_line"></div>
				<div id="createaccount_desc">
					You can be a registered user just by filling the form given below. Being a registered user of Main Street Pharmacy helps you to avail of its complete services like <b>buy/transfer/refill prescriptions</b>.</div>
				</div>
				
				<div id="createaccount_red">Account Details</div>
				
				<div id="createaccount_middile">
					<div class="createaccount_1st">
					
						<div id="createaccount_create">
							To create an account, Please fill out the informations Given.
						</div>
							
						<div class="createaccount_box">
								
							<?php $this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');?>
								
					<input type="text" name="firstname" id="firstname" class="createaccount_textarea" onblur="if (this.value=='') { this.value='First name'; }" onfocus="if (this.value=='First name') { this.value=''; }" value="<?php if(empty($firstname)){ ?>First name<?php } else { print set_value('firstname'); } ?>" /><?php echo form_error('firstname'); ?>
               
	                <input type="text" name="lastname" id="lastname" class="createaccount_textarea" onblur="if (this.value=='') { this.value='Last name'; }" onfocus="if (this.value=='Last name') { this.value=''; }" value="<?php if(empty($lastname)){ ?>Last name<?php } else { print set_value('lastname'); } ?>"/><?php echo form_error('lastname'); ?>
	                
	                <input type="text" name="loc" id="loc" class="createaccount_textarea" onblur="if (this.value=='') { this.value='Location'; }" onfocus="if (this.value=='Location') { this.value=''; }" value="<?php if(empty($location)){ ?>Location<?php } else { print set_value('loc'); } ?>"/><?php echo form_error('loc'); ?> 
	                
	                <input type="text" name="emailid" id="emailid" class="createaccount_textarea" onblur="if (this.value=='') { this.value='E-mail id'; }" onfocus="if (this.value=='E-mail id') { this.value=''; }" value="<?php if(empty($email)){ ?>E-mail id<?php } else { print set_value('emailid'); } ?>"/><?php echo form_error('emailid','<div class="error_msg">', '</div>'); ?>     
	                
	                <input type="text" name="pwd" id="pwd" class="createaccount_textarea" onfocus="javascript:change('pwd');" onblur="if (this.value=='') { this.value='Password'; }" onfocus="if (this.value=='Password') { this.value=''; }" value="<?php if(empty($password)){ ?>Password<?php }  ?>"/><?php echo form_error('pwd'); ?>
              
                    <input type="text" name="passconf" id="passconf" onfocus="javascript:change('passconf');" class="createaccount_textarea" onblur="if (this.value=='') { this.value='Confirm Password'; }" onfocus="if (this.value=='Confirm Password') { this.value=''; }" value="<?php if(empty($passconf)){ ?>Confirm Password<?php } ?>" /><?php echo form_error('passconf'); ?>

		   <!--<input type="text" name="currpharmacy" id="currpharmacy" onfocus="javascript:change('currpharmacy');" class="createaccount_textarea" onblur="if (this.value=='') { this.value='Current Pharmacy'; }" onfocus="if (this.value=='Current Pharmacy') { this.value=''; }" value="<?php if(empty($currpharmacy)){ ?>Current Pharmacy<?php } ?>" /><?php echo form_error('currpharmacy'); ?>-->
		<select class="createaccount_textarea" style="height:30px;width:243px;" name="currpharmacy" id="currpharmacy">
			<?php foreach($pharmacy as $pharmacy1)
			{?>
			<option value="<?php echo $pharmacy1['pharmacyNo'];?>"><?php echo $pharmacy1['pharmacy'];?></option>
			<?php }?>
		</select>
                  
						</div>
					</div>
					          
          <div class="createaccount_sep"></div> 
           
          <div class="createaccount_2">
          
						<div id="createaccount_create"></div>
						
						<div class="createaccount_box2">
							<div class="form_outer">
								Security question?
								<select name="ques" id="ques" class="small_select_box01">
									<option value="What is the name of your first teacher?">What is the name of your first teacher?</option>
									<option value="what is your favorite hobby?">what is your favorite hobby?</option>
									<option value="What is your favorite food?">What is your favorite food?</option>
									<option value="What was your mothers maiden name?">What was your mothers maiden name?</option>
									<option value="What was your first phone number?">What was your first phone number?</option>
								</select>
							</div>

							<div class="form_outer">
								Security Answer
								<input type="text" name="securityanswer" id="securityanswer" class="createaccount_textarea"  value="<?php set_value('securityanswer');?>" />
								<?php echo form_error('securityanswer'); ?>
						</div>

							<div class="form_outer">
								Date of birth<br />
									<select name="date" id="date" class="small_select_box">
										<?php 
											for($i=1;$i<32;$i++)
											{
												echo "<option value='".$i."'>".$i."</option>";
											}
										?>
									</select>

									<select name="month" id="month" class="small_select_box">
										<option value='01'>January</option>
										<option value='02'>February</option>
										<option value='03'>March</option>
										<option value='04'>April</option>
										<option value='05'>May</option>
										<option value='06'>June</option>
										<option value='07'>July</option>
										<option value='08'>August</option>
										<option value='09'>September</option>
										<option value='10'>October</option>
										<option value='11'>November</option>
										<option value='12'>December</option>
									</select>

									<select name="year" id="year" class="small_select_box">
										<?php 
											for($i=1900;$i<2010;$i++)
											{
												echo "<option value='".$i."'>".$i."</option>";
											}
										?>
									</select>
							</div>

							<div class="form_outer2">
								<input type="radio" name="sex" value="male" checked />Male
								<input type="radio" name="sex" value="female" />Female
							</div>

							<div class="form_outer">Health card number
								<input type="text" name="healthcard" id="healthcard" class="createaccount_textarea"  value="<?php set_value('healthcard');?>" />
								
							</div>

							<div class="form_outer3">
								<input type="radio" name="accept" id="accept" value="" /><a href="<?php echo $base;?>index.php/home/terms" target="_blank">Yes, I accept the terms of Use and health Content Disclaimer</a>
							</div>
							
							<div class="button_outer01">
								<input type="submit" name="addBtn" id="addBtn" value="Submit" class="button" />
							</div>
							
							<div class="button_outer01">
								<a href="<?php echo $base;?>"><input type="reset" name="cancelbtn" id="cancelbtn" value="Cancel" class="button" /></a>
							</div>
							
						</div>
						
					</div> 
					        
				</div>
					</div>
				</div>
			</div>
		</form>
<script type="text/javascript">
function change(val)
{
	if(val=="pwd")
	{
	document.getElementById('pwd').type="password";
	document.getElementById('pwd').value="";
    }
	else if(val=="passconf")
	{
		document.getElementById('passconf').type="password";
		document.getElementById('passconf').value="";
	}
	
}

</script>
