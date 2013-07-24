<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Refill Prescriptions</div>
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>

<div id="refill_outer">
<div id="createaccount_head">Refill Using Your Prescriptions Label</div>
<div id="createaccount_line"></div>
<div id="refill_box">

<div id="refill_head">Prescription Information</div>
<div id="refill_inner">
<div id="refill_text">You can refill the prescription by filling the form given below 
</div>

<form name="frm" method="post" action="<?php echo $base;?>index.php/prescription/refillprescription/">
<div class="refill_outerinput">


<select name="sno" id="sno" class=" small_select_box02">

<?php  

$query=$this->db->get('pharmacy');

foreach($query->result() as $row)
{

?>
		<option value="<?php echo $row->id;?>"><?php echo $row->pharmacy;?></option>
<?php }?>
</select>

</div>  



<!-- sheepIt Form -->

<div id="sheepItForm">

<!-- Form template-->
<div id="sheepItForm_template">

<div class="refill_outerinput">
<!--<input type="text" name="rxno[#index#][phone]" id="sheepItForm_#index#_phone1" class="createaccount_textarea" value="" onblur="if (this.value=='') { this.value='Rx number[#index#]'; }" onfocus="if (this.value=='Rx number[#index#]') { this.value=''; }" /> -->
<input type="text" name="rxno[#index#][phone]" id="sheepItForm_#index#_phone1" class="createaccount_textarea" value="" /> 


<div class="refill_outerinput">
</div>
<a id="sheepItForm_remove_current" style="margin-left:5px; margin-top:2px;"><img class="delete" src="<?php echo $base;?>images/close.gif" width="16" height="16" border="0"></a>
<?php echo form_error('rxnumber[#index#]'); ?>

</div> 

</div>



<!-- No forms template -->

<div id="sheepItForm_noforms_template">No Datas</div>



<div class="patient_input01">
<div id="sheepItForm_controls">
<div id="sheepItForm_add"  class="addnext"><img style="float:left;" src="<?php echo $base;?>/images/plus.gif" alt="" />Add Next</div>
</div>
</div>
<!-- /Controls -->

</div>
<!--<div id="sheepItForm">
	<div id="sheepItForm_template">
		<input type="text" name="rxno[#index#]" id="rxno[#index#]" class="createaccount_textarea" value="Rx number1" onblur="if (this.value=='') { this.value='Rx number1'; }" onfocus="if (this.value=='Rx number1') { this.value=''; }" /> 
		<a id="sheepItForm_remove_current"><img class="delete"  src="<?php //echo $base;?>images/close.gif" width="16" height="16" border="0"></a>
		<?php //echo form_error('rxno1'); ?>
	</div>
	<div id="sheepItForm_noforms_template"></div>
	<div id="sheepItForm_controls">
		<div id="sheepItForm_add"  class="addnext"><img style="float:left;" src="<?php //echo $base;?>images/plus.gif" alt=""/>Add Next</div>
	</div>
</div>-->




<div class="refill_outerinput">
  <label for="radio"><input type="radio" name="delivary" id="delivary" value="home" /></label>
Home Delivary 
<label for="radio2"><input type="radio" name="delivary" id="delivary" value="store" /></label>
Pick up from store
<?php echo form_error('delivary');?>
</div>

<div class="error01">

<?php /*if($message!="")
{
echo $message;
}*/ ?>

 </div>
<div class="refill_outerinput">
<div class="form_outer4" ></div> 
<div class="button_outer01"><input type="hidden" name="count" id="count" value="">
<a href="#"><input type="submit" name="button" id="button" value="Submit" class="button" /></a>
</div>
<div class="button_outer01">
<a href="<?php echo $base;?>"><input type="submit" name="button" id="button" value="Cancel" class="button" /></a>
</div>

</div></form> 

</div>
</div>
<div class="refill_adds">
<div class="refill_add01"></div>
<div class="label"></div>
</div>
</div>
</div>
</div>




<script type="text/javascript">

$(document).ready(function() {

    var sheepItForm = $('#sheepItForm').sheepIt({

        separator: '',

        allowRemoveLast: true,

        allowRemoveCurrent: true,

        allowRemoveAll: true,

        allowAdd: true,

        allowAddN: true,

        maxFormsCount: 200,

        minFormsCount:1,

        iniFormsCount: 6

    }); 

});
</script>
