<style type="text/css">
<link href="<?php echo $base;?>css/jquery.datepick.css" rel="stylesheet" type="text/css"/>
</style>
<script type="text/javascript" src="<?php echo $base;?>js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
	$('#dob').datepick();
	
});

</script>

<div class="clear"></div>
<div id="frame" style="display:none;">
</div>
<div class="error01">
<?php if($message!="")
{
echo $message;
 } ?>
 </div>

<form  action="<?php echo $base;?>index.php/prescription/transferprescription" id="frm1" method="post">

<div id="createaccount_outer">

<div id="refill_outer">

<div id="createaccount_head">Transfer prescription</div>

<div id="createaccount_line"></div>

<div id="createaccount_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>



<div id="patientinformation_head">Patient Information</div>

<div id="patientinformation">



<div class="patient_input">

 <input type="text" name="firstname" id="firstname" class="patientinformation_textarea" value="First name" onblur="if (this.value=='') { this.value='First name'; }" onfocus="if (this.value=='First name') { this.value=''; }" />

<?php echo form_error('firstname'); ?>

</div>



<div class="patient_input">

 <input type="text" name="initial" id="initial" class="patientinformation_intial" value="Initial" onblur="if (this.value=='') { this.value='Initial'; }" onfocus="if (this.value=='Initial') { this.value=''; }" />

</div>


<div class="patient_input">

 <input type="text" name="lastname" id="lastname" class="patientinformation_textarea" value="Last name" onblur="if (this.value=='') { this.value='Last name'; }" onfocus="if (this.value=='Last name') { this.value=''; }" />

<?php echo form_error('lastname'); ?>

</div>



<div class="patient_input">

 <input type="text" name="dob" id="dob" class="patientinformation_dob" onclick="displayDatePicker('dob');"  value="Date of birth" onblur="if (this.value=='') { this.value='Date of birth'; }" onfocus="if (this.value=='Date of birth') { this.value=''; }" />

<?php echo form_error('dob'); ?>

</div>



<div class="patient_input">

 <input type="text" name="phone" id="phone" class="patientinformation_dob" value="Phone number" onblur="if (this.value=='') { this.value='Phone number'; }" onfocus="if (this.value=='Phone number') { this.value=''; }" />

<?php echo form_error('phone'); ?>

</div>

</div>
<div id="patientinformation_head">Current Pharmacy</div>

<div id="frame" style="display:none;">

</div>

<div id="patientinformation">



<div class="patient_input">

  <select name="pharmacy" class="small_select_box01">

 <option>Pharmacy Name</option>

 <?php foreach($pharm->result() as $ph) 

       {

		   ?>

		 <option value="<?php echo $ph->id;?>"><?php echo $ph->pharmacy;?></option>

		   

	<?php   }



?>

 </select>

  <?php echo form_error('pharmacy'); ?>

</div>



<div class="patient_input">

 <input type="text" name="city" id="city" class="patientinformation_textarea" value="City" onblur="if (this.value=='') { this.value='City'; }" onfocus="if (this.value=='City') { this.value=''; }" />

<?php echo form_error('city'); ?>

</div>



<div class="patient_input">

  <select name="state" class="small_select_box01">

 <option>State / Territory</option>

 </select>

 <?php echo form_error('state'); ?>

</div>



<div class="patient_input01">

 <input type="text" name="pharmacyphone" id="pharmacyphone" class="patientinformation_dob" value="Phone number" onblur="if (this.value=='') { this.value='Phone number'; }" onfocus="if (this.value=='Phone number') { this.value=''; }" />



</div>

</div>




<div id="patientinformation_head">Prescription Information</div>

<div id="patientinformation" >
<div id="prescription_outer">
<!-- sheepIt Form -->
<div id="sheepItForm">


  <!-- Form template-->
  <div id="sheepItForm_template">
  <div class="patient_input01">
   <select name="medication" class="small_select_box01" id="medication">
  <option>Select your medication</option>

 <?php foreach($med->result() as $md) 

       {
	 ?>
		 <option value="<?php echo $md->id;?>"><?php echo $md->medication;?></option>
	<?php   }

?>

 </select>

  <?php echo form_error('medication'); ?>

</div>

 

 
  <div class="patient_input01">
 <input type="text" name="rxnumber" id="rxnumber" class="patientinformation_textarea" value="Rx number" onblur="if (this.value=='') { this.value='Rx number'; }" onfocus="if (this.value=='Rx number') { this.value=''; }" />

  <?php echo form_error('rxnumber0'); ?>
  
  <a id="sheepItForm_remove_current" style="margin-left:5px; margin-top:2px;"><img class="delete" src="<?php echo $base;?>images/close.gif" width="16" height="16" border="0"></a>
</div>

  </div>
  <!-- /Form template-->
  <!-- No forms template -->

<div id="sheepItForm_noforms_template">No Datas</div>

<!-- /No forms template-->


  <!-- Controls -->

<div class="patient_input01">
<div id="sheepItForm_controls">
<div id="sheepItForm_add" class="addnext">Add Next</div>
 </div>
 </div>
 </div>

<div class="clear"></div>
</div>
</div>

</div>
</div>



<div class="clear"></div>



<div class="btn_outer">
<div class="button_outer01">
<input type="hidden" name="count" id="count" value="">
<input type="submit" name="button" id="button" value="Submit" class="button" /></div>

<div class="button_outer01">
<a href="<?php echo $base;?>"><input type="submit" name="button" id="button" value="Cancel" class="button" /></a>
</div>
</div>

</div>


<div class="clear"></div>

</form>

</div>
</div>
</div>
