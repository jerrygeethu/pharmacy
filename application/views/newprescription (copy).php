<div class="clear"></div>
<div id="frame" style="display:none;">
</div>
<div class="error01">
<?php if($message!="")
{
echo $message;
 } ?>
 </div>
<div id="createaccount_outer">
<div id="refill_outer">
<div id="createaccount_head">New Prescription by Mail</div>
<div id="createaccount_line"></div>
<div id="createaccount_desc">Congratulations text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</div>


<form action="<?php echo $base;?>index.php/home/newprescription" id="frm1" method="post">
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
 <input type="text" name="dob" id="dob"  class="patientinformation_dob" value="Date of birth" onclick="displayDatePicker('dob');" onblur="if (this.value=='') { this.value='Date of birth'; }" onfocus="if (this.value=='Date of birth') { this.value=''; }" />
<?php echo form_error('dob'); ?>
</div>

<div class="patient_input">
 <input type="text" name="phone" id="phone" class="patientinformation_dob" value="Phone number" onblur="if (this.value=='') { this.value='Phone number'; }" onfocus="if (this.value=='Phone number') { this.value=''; }" />
<?php echo form_error('phone'); ?>
</div>
</div>


<div id="patientinformation_head">Prescription Information</div>

<div id="patientinformation" >

<!-- sheepIt Form -->
<div id="sheepItForm">


  <!-- Form template-->
  <div id="sheepItForm_template">
  <div class="patient_input01">
   <select name="medication" id="medication" class="small_select_box01"   >

 <option value="Select your medication">Select your medication</option>
 
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
  <select name="pharmacy" id="pharmacy" class="small_select_box01">
 <option value="Select your Pharmacy">Select your Pharmacy</option>
 <?php foreach($pharm->result() as $ph) 
       {
		  
		   ?>
		 <option value="<?php echo $ph->id;?>"><?php echo $ph->pharmacy;?></option>
		   
	<?php   }

?>
 </select>
  <?php echo form_error('medication'); ?>

</div>

  <div class="patient_input01">
 <input type="text" name="prescriber" id="prescriber" class="patientinformation_textarea" value="Prescriber’s Name" onblur="if (this.value=='') { this.value='Prescriber’s Name'; }" onfocus="if (this.value=='Prescriber’s Name') { this.value=''; }" />


</div>

 
  <div class="patient_input">
 <input type="text" name="prescriberphone" id="prescriberphone" class="patientinformation_dob" value="Phone number" onblur="if (this.value=='') { this.value='Phone number'; }" onfocus="if (this.value=='Phone number') { this.value=''; }" />
  
  <a id="sheepItForm_remove_current" style="margin-left:5px; margin-top:2px;"><img class="delete" src="<?php echo $base;?>images/close.gif" width="16" height="16" border="0"></a>

	  </div>

  </div>
  <!-- /Form template-->



  <!-- No forms template -->

<div id="sheepItForm_noforms_template">No Datas</div>

<!-- /No forms template-->

<div class="clear"></div>
  <!-- Controls -->

<div class="patient_input">
<div id="sheepItForm_controls">
<div id="sheepItForm_add" class="addnext">Add Next</div>
 </div>

<?php /*?><div class="addnext" ></div><?php */?>

</div>

<!-- /Controls -->

</div>
<!-- /sheepIt Form -->


<div class="clear"></div>

</div>
<div class="btn_outer">
<div class="button_outer01">
<input type="hidden" name="count" id="count" value="">
<a href="#"><input type="submit" name="button" id="button" value="Submit" class="button" /></a>

</div>

<div class="button_outer01">

<a href="<?php echo $base;?>"><input type="submit" name="button" id="button" value="Cancel" class="button" /></a>

</div>
</div>

</form>
</div>
</div>
</div>


<script language="JavaScript" type="text/javascript">


function medicate(name)
{

	var id=document.getElementById('medication').value;
	var id=document.getElementById('medication').value;
}

</script>

