<?php 
	$arr=explode("+",$this->session->userdata('prod'));
	$arr2=implode(" ", $arr);
?>
<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop">Online Shop</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $this->session->userdata('category_id');?>"><?php echo $this->session->userdata('category_name');?></a> &rsaquo;&rsaquo;  <a href="<?php echo $base;?>index.php/onlineshop/product_fetch/<?php echo $this->session->userdata('finest_id');?>/<?php echo $this->session->userdata('prod');?>"><?php echo $arr2;?></a> &rsaquo;&rsaquo;  <a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $this->session->userdata('newhamcode');?>"><?php echo $this->session->userdata('internetdesc');?></a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop/update_cart/<?php echo $this->session->userdata('newhamcode');?>">Shopping Cart</a> &rsaquo;&rsaquo; Shipping Address</div>
<div class="clear"></div>
<div id="frame" style="display:none;"></div>
<form action="<?php echo $base;?>index.php/onlineshop/checkout" id="mem" name="mem" method="post">
	<?php $this->form_validation->set_error_delimiters('<div style="color:#8F0808;float:left;">', '</div>');?>
	<div id="consultation_outer">
		<div id="refill_outer">
			<div id="createaccount_head">Enter Shipping Address</div>
			<div id="createaccount_line"></div>
			<div id="createaccount_desc">Please enter the form below and let us know the prefered shipping address. Fields marks with an <span style="color:#BF0B0B;font-weight:bold;font-size:14px;">*</span> are required.</div>
			<div id="online_outer">	
				<div id="checkout">
					<div class="checkout_inner">
						<div class="check_outer">
							<div class="check_name">Last Name <span style="color:#BF0B0B;font-weight:bold;font-size:14px;"> * </span></div>
							<div class="check_input"><input type="text" id="lastname" name="lastname" class="textarea_check" value="<?php print !empty($memdet->lastname)? ($memdet->lastname) : set_value('lastname'); ?>"/> <?php echo form_error('lastname'); ?></div>
						</div>
						<div class="check_outer">
							<div class="check_name">City</div>
							<div class="check_input"><input type="text" name="city" id="city" class="textarea_check" value="<?php print !empty($memdet->city)? ($memdet->city) : set_value('city'); ?>"/></div>
						</div>
						<div class="check_outer">
							<div class="check_name">State/Territory</div>
							<div class="check_input"> 
								<?php
									if(!empty($memdet->memberid))
									{
								?>
										<input type="text" name="state" id="state" class="textarea_check" value="<?php print !empty($memdet->state)? ($memdet->state) : set_value('state'); ?>"/>
								<?php									
									}
									else
									{
								?>
										<select name="state" id="state" class="textarea_drop" >
											<?php
												$view="";											
												foreach($state as $value)
												{
													$view.= "<option value='".$value->id."'"; 
														if(($this->input->post('saveBtn')=='Continue') and ($this->input->post('state') == $value->id))
														{
															$view.= "selected=\"selected\"";
														}
													$view.= " title='".$value->abrivation."'>".$value->states."</option>";
												}
												
												echo $view;
											?>
											<option></option>
										</select>
								<?php
									}
								?>
							</div>
						</div>
						<div class="check_outer">
							<div class="check_name">Phone No <span style="color:#BF0B0B;font-weight:bold;font-size:14px;"> * </span></div>
							<div class="check_input"><input type="text" name="phone" id="phone" class="textarea_check" value="<?php print !empty($memdet->phone)? ($memdet->phone) : set_value('phone'); ?>"/><?php echo form_error('phone'); ?></div>
						</div>
					</div>
					<div class="checkout_inner">
						<div class="check_outer">
							<div class="check_name">First Name <span style="color:#BF0B0B;font-weight:bold;font-size:14px;"> * </span></div>
							<div class="check_input"><input type="text" name="firstname" class="textarea_check" id="firstname" value="<?php print !empty($memdet->firstname)? ($memdet->firstname) : set_value('firstname'); ?>"/><?php echo form_error('firstname'); ?></div>
						</div>
						<div class="check_outer">
							<div class="check_name">Address</div>
							<div class="check_input"><textarea name="address" class="textarea_address" id="address" /><?php print !empty($memdet->address)? ($memdet->address) : set_value('address'); ?></textarea></div>
						</div>
						<div class="check_outer">
							<div class="check_name">Zip Code</div>
							<div class="check_input"><input type="text" name="zip" class="textarea_check" id="zip"  value="<?php print !empty($memdet->zip)? ($memdet->zip) : set_value('zip'); ?>"/></div>
						</div>
						<div class="check_outer">
							<div class="check_name">email ID <span style="color:#BF0B0B;font-weight:bold;font-size:14px;"> * </span></div>
							<div class="check_input"><input type="text" name="email" class="textarea_check" id="email" value="<?php print !empty($memdet->email)? ($memdet->email) : set_value('email'); ?>"/><?php echo form_error('email'); ?></div>
						</div>
					</div>
					<div class="method" style="margin-top:30px;">
						<div class="check_name">Shipping method</div>
						<div class="method_input"> 
							<select name="" class="method_drop" >
								<option>Standard 5-10 business days (under 10 LBS) FREE With $49 Purchase</option>
							</select>
						</div>
					</div>
					<div class="method">
						<div class="cart_method">
							<?php
								if(!empty($memdet->memberid))
								{
							?>
									<a href="<?php echo $base;?>index.php/onlineshop/billing">
										<input type="submit" name="button" id="button" value="Continue" class="newbutton" />
									</a>
							<?php
								}
								else
								{
							?>								
									<input type="submit" name="saveBtn" id="saveBtn" value="Continue" class="newbutton" />
							<?php
								}
							?>
						</div>
					</div> 
				</div>
			
				<div class="getintouch">
					<div class="getintouch_head">Get In Touch</div>
					<div class="getintouch_des">To know more about Main Street Pharmacy, you can contact our Pharmacy. The details are given below.</div>
					<hr style="float:left; width:230px; border:1px #CCCCCC dashed; margin-bottom:15px;"/>
                    <div class="getintouch_inner">
						<div class="getintouch_img"><img src="<?php echo $base;?>images/phone.jpg" /></div>
						<div class="getintouch_text">PHONE<br />203.870.9901</div>
                        <div class="getintouch_img"></div>
						<div class="getintouch_text">203.870.9902</div>
					</div>
                    <div class="getintouch_inner">
						<div class="getintouch_img">
							<img src="<?php echo $base;?>images/fax.jpg"/>
						</div>
						<div class="getintouch_text">FAX<br />203.870.9903</div>
					</div>
					<div class="getintouch_inner">
						<div class="getintouch_img">
							<img src="<?php echo $base;?>images/email.jpg" />
						</div>
						<div class="getintouch_text">EMAIL<br />mainst.rx@gmail.com</div>
					</div>
					<div class="getintouch_inner">
						<div class="getintouch_img">
							<img src="<?php echo $base;?>images/home.jpg" />
						</div>
						<div class="getintouch_text">ADDRESS<br />1001 Main St. The Arcade Mall<br />
													Bridgeport, CT 06604</div>
					</div>
                                        
				</div>
				<div id="disclaimer">
					<p><span class="black">Disclaimer</span><br />
						If you have any questions or concerns about this statement, or about the way your information is collected and used, please Contact Us or call us toll-free at (888) 607-4287.<br />
						You can request the removal or modification of your Personal Information by sending an email to the appropriate area under &quot;Contact Us&quot;. You may also request that we not disclose your information. We will respond to accommodate your request in 30 days. It would be helpful to let us know the context in which you provided Personal Information
					</p><p></p>
				</div>      

			</div>		
		</div>
	</div>
</form>

</div>

