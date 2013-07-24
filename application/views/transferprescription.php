<style type="text/css">
<link href="<?php echo $base;?>css/jquery.datepick.css" rel="stylesheet" type="text/css"/>
</style>
<script type="text/javascript" src="<?php echo $base;?>js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
	$('#dob').datepick();
	
});

</script>
<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Transfer prescription</div>
<div class="clear"></div>

<div id="frame" style="display:none;">
</div>

<div id="createaccount_outer">
<div id="refill_outer"> 
<div id="createaccount_head">Transfer prescription</div>
<div id="createaccount_line"></div>
<div id="createaccount_desc">You can transfer the prescription to any other branches of Main Street Pharmacy. </div>
<div id="transfer_box">
<div id="refill_head">Enter Prescription Details</div>

<form action="<?php echo $base;?>index.php/prescription/transferprescription" id="frm1" method="post">

<div id="transfer_inner">
	<!---<div class="transfer_head">
    	Personal Information
    </div>
    <div class="transfer_box01">
    	<div class="transfer_box02">
        	<input type="text" name="firstname" id="firstname" class="createaccount_textarea" value="Firstname" onblur="if (this.value=='') { this.value='Firstname'; }" onfocus="if (this.value=='Firstname') { this.value=''; }" /> 
        </div>
        <div class="transfer_box02">
        	<input type="text" name="lastname" id="lastname" class="createaccount_textarea" value="Lastname" onblur="if (this.value=='') { this.value='Lastname'; }" onfocus="if (this.value=='Lastname') { this.value=''; }" /> 
        </div>
        
        <div class="transfer_box02">
        	<input type="text" name="phone" id="phone" class="createaccount_textarea" value="Phone No" onblur="if (this.value=='') { this.value='Phone No'; }" onfocus="if (this.value=='Phone No') { this.value=''; }" /> 
        </div>
        <div class="transfer_box02">
        	<input type="text" name="age" id="age" class="patientinformation_dob" value="Your Age" onblur="if (this.value=='') { this.value='Your Age'; }" onfocus="if (this.value=='Your Age') { this.value=''; }" />
        </div>
    </div> -->
    <div class="transfer_head">
    	Pharmacy Information
    </div>
    <div class="transfer_box01">
    	<div class="transfer_box02">
        	<input type="text" name="pharmacy" id="pharmacy" class="createaccount_textarea" value="Current Pharmacy" onblur="if (this.value=='') { this.value='Current Pharmacy'; }" onfocus="if (this.value=='Current Pharmacy') { this.value=''; }" /> 
        	 <?php echo form_error('pharmacy'); ?>
        </div>
        <div class="transfer_box02">
        	<input type="text" name="city" id="city" class="createaccount_textarea" value="City" onblur="if (this.value=='') { this.value='City'; }" onfocus="if (this.value=='City') { this.value=''; }" /> 
        	 <?php echo form_error('city'); ?>
        </div>
        
        <div class="transfer_box02">
        	<input type="text" name="state" id="state" class="createaccount_textarea" value="State / Territory" onblur="if (this.value=='') { this.value='State / Territory'; }" onfocus="if (this.value=='State / Territory') { this.value=''; }" /> 
        	 <?php echo form_error('state'); ?>
        </div>
        <div class="transfer_box02">
        	<input type="text" name="pharmacyphone" id="pharmacyphone" class="createaccount_textarea" value="Phone Number" onblur="if (this.value=='') { this.value='Phone Number'; }" onfocus="if (this.value=='Phone Number') { this.value=''; }" /> 
        	 <?php echo form_error('pharmacyphone'); ?>
        </div>
    </div>
 <div class="transfer_head">
    	Prescription Information    </div>
    <div class="transfer_box01">
    <div class="transfer_box02">
        	<input type="text" name="firstname" id="firstname" class="createaccount_textarea" value="Prescriber First Name" onblur="if (this.value=='') { this.value='Prescriber First Name'; }" onfocus="if (this.value=='Prescriber First Name') { this.value=''; }" /> 
        	 <?php echo form_error('firstname'); ?>
        </div>
        <div class="transfer_box02">
        	<input type="text" name="lastname" id="lastname" class="createaccount_textarea" value="Prescriber Last Name" onblur="if (this.value=='') { this.value='Prescriber Last Name'; }" onfocus="if (this.value=='Prescriber Last Name') { this.value=''; }" /> 
        	 <?php echo form_error('firstname'); ?>
        </div>
         <div class="transfer_box02">
        	<input type="text" name="phone" id="phone" class="createaccount_textarea" value="Prescriber Phone Number" onblur="if (this.value=='') { this.value='Prescriber Phone Number'; }" onfocus="if (this.value=='Prescriber Phone Number') { this.value=''; }" /> 
        	 <?php echo form_error('phone'); ?>
        </div>
        <div class="transfer_box02">
        	<input type="text" name="rxno" id="rxno" class="createaccount_textarea" value="RX number (optional)" onblur="if (this.value=='') { this.value='RX number (optional)'; }" onfocus="if (this.value=='RX number (optional)') { this.value=''; }" /> 
        </div>
    	<div class="transfer_box02">
        	<input type="text" name="drug" id="drug" class="createaccount_textarea" value="Drug Name" onblur="if (this.value=='') { this.value='Drug Name'; }" onfocus="if (this.value=='Drug Name') { this.value=''; }" /> 
        	 <?php echo form_error('drug'); ?>
        </div>
        <div class="transfer_box02">
        	<input type="text" name="quantity" id="quantity" class="createaccount_textarea" value="Quantity" onblur="if (this.value=='') { this.value='Quantity'; }" onfocus="if (this.value=='Quantity') { this.value=''; }" /> 
        	 <?php echo form_error('quantity'); ?>
        </div>
        
        <!--
        
        <div class="transfer_box02">
        	<input type="text" name="textfield" id="textfield" class="createaccount_textarea" value="Drug Name" onblur="if (this.value=='') { this.value='Drug Name'; }" onfocus="if (this.value=='Drug Name') { this.value=''; }" /> 
        </div>
        <div class="transfer_box02">
        	<input type="text" name="textfield" id="textfield" class="createaccount_textarea" value="RX number" onblur="if (this.value=='') { this.value='RX number'; }" onfocus="if (this.value=='RX number') { this.value=''; }" /> 
        </div> -->
        
        
    </div>   
  <div class="refill_outerinput">
<!--<div class="addnext"></div>
Add next  -->
</div>
<div class="transfer_box01">
	 <div class="cart_method"><input type="submit" name="cancel" id="cancel" value="Cancel" class="newbutton" /></div>
      <div class="cart_method"><input type="submit" name="submit" id="submit" value="Submit" class="newbutton" /></div>
</div>
</div>
</form>


</div>
	<div class="transfer_adds">
   <div id="mostpopular">Advertise Here</div>
   <div class="advertise">Advertise Here</div>
       <div class="advertise">Advertise Here</div>
       <div class="advertise">Advertise Here</div>
       <div class="advertise">Advertise Here</div>
        <div class="advertise">Advertise Here</div>
       <div class="advertise">Advertise Here</div>
   </div>
   </div>
</div>
</div>
<div class="clear"></div>
