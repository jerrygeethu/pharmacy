<div class="clear"></div>
<link href="<?php echo $base;?>css/style.css" rel="stylesheet" type="text/css" />
<?php $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); ?>
<div id="frame" style="display:none;">
</div>
<form name="drug_suggestion1" id="drug_suggestion1" method="post" action="<?php echo $base;?>index.php/home/drug_suggestion/">
<div id="createaccount_outer_popup">
<div id="refill_outer"> 
<div id="createaccount_head">Suggest a Product</div>
<!--<div id="createaccount_line"></div>-->
<div id="createaccount_desc">
If you weren't able to find what you were looking for, we want to
know how we can help.<br/> Your inquiry will be routed to a store
inventory specialist. Online Privacy &amp; Security Policy</div>
<div id="drug_suggestion">
<div id="transfer_inner">
<div class="drug_suggestion_head">
    	Name the product you are looking for</div>
<div class="drug_suggestion_cmnt1">
		<input type="text" name="product_name" id="product_name" value="Drug Name" onblur="if (this.value=='') { this.value='Drug Name'; }" onfocus="if (this.value=='Drug Name') { this.value=''; }"  >
	</div>
<div class="drug_suggestion_head">
    	Describe the product you are looking for</div>
    <div class="drug_suggestion_cmnt1">
	
      <div class="transfer_box03">
        	<textarea name="Product_sugg" id="Product_sugg" cols="10" rows="10" class="drug_suggestion_txtarea"></textarea>
			<?php echo form_error('Product_sugg');?>
        </div>
        <div class="suggestion_checkbox">
        <input name="check1" type="checkbox" value="checked" />Please do not contact me about this matter.
          
        </div>
    </div>
    <div class="drug_suggestion_head">
    	To receive a response, enter your information below before sending this form.</div>
    <div class="transfer_box01">
    	<div class="transfer_box04">First Name
        	<input type="text" name="firstname" id="textfield" class="createaccount_textarea1" value="First Name" onblur="if (this.value=='') { this.value='First Name'; }" onfocus="if (this.value=='First Name') { this.value=''; }"  /> 
			<?php echo form_error('firstname');?>
        </div>
        <div class="transfer_box04">Last Name
        	<input type="text" name="lastname" id="textfield" class="createaccount_textarea1" value="Last Name" onblur="if (this.value=='') { this.value='Last Name'; }" onfocus="if (this.value=='Last Name') { this.value=''; }"  /> 
			<?php echo form_error('lastname');?>
        </div>
        
        <div class="transfer_box04">Email Address
        	<input type="text" name="email" id="email" class="createaccount_textarea1" value="Email Address" onblur="if (this.value=='') { this.value='Email Address'; }" onfocus="if (this.value=='Email Address') { this.value=''; }" /> 
			<?php echo form_error('email');?>
        </div>
        </div>
       
    <div class="transfer_box01">
     <!-- <div class="cart_method"><a href="#"><input type="submit" name="button" id="button" value="Submit" class="newbutton" /></a></div>-->
	   <div class="cart_method"><input type="submit" name="button" id="button" value="Submit" class="newbutton" /></div>
	   <?php 
	   	if(!empty($res['ins']))
		{
			echo "Your request is posted successfully";
		}
	   ?>
</div>
</div>
</div>
   </div>
</div>

</div></form>
<div class="clear"></div>
