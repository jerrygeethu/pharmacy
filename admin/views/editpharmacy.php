<td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
	<form id="frmcat" name="frmcat" method="post" action="<?php echo $base;?>admin.php/home/edit_pharmacy">
		<table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
			<tbody>
				<tr>
					<td class="titles">Edit Pharmacy</td>
					</tr>
					<tr><td align="center" height="10"><font color="#ff0000"></font></td></tr>
					<tr><td valign="top"><table border="0" cellpadding="0" cellspacing="0" height="35" width="100%"><tbody></tbody></table></td></tr>
					<tr><td align="center"><font color="#ff0000"></font></td></tr>
					<tr>
					<td valign="top">
						<table id="table-1" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tbody>
								<tr class="nodrag nodrop" style="background-color: rgb(184, 184, 185);"><td align="right" width="0%"></td></tr>
								
								<tr style="cursor: move;" class="td2" id="45"></tr>
								<tr style="cursor: move;" class="td2" id="44">
									<td>Name<span class="red">*</span></td>
									<td>
										<input name="name" id="name" type="text" class="textarea" value="<?php if(!empty($listphar->pharmacy)){echo $listphar->pharmacy;}else{echo set_value('name');}?>"><?php echo form_error('name'); ?>
									</td>
								</tr>
								
								<tr style="cursor: move;" class="td2" id="41"></tr>
								<tr style="cursor: move;" class="td2" id="43">
									<td>Address<span class="red">*</span></td>
									<td width="82%">
										<label>
											<textarea name="address" cols="" id="address" class="textarea" rows=""><?php if(!empty($listphar->address)){echo $listphar->address;}else{echo set_value('address');}?></textarea>
										</label><?php echo form_error('address'); ?>
									</td>
								</tr>

								<tr style="cursor: move;" class="td2" id="44">
									<td>Phone Number<span class="red">*</span></td>
									<td>
									
									<!--
									
									<div id="sheepItForm">
											<div id="sheepItForm_template">
												<input id="phone" class="textarea" name="phone[#index#]" value="" type="text" size="15" maxlength="10" />
												<a id="sheepItForm_remove_current"><img class="delete" src="<?php //echo $base;?>images/cross.png" width="16" height="16" border="0"></a>
											</div>
											<div id="sheepItForm_noforms_template"></div>
											<div id="sheepItForm_controls">
												<div id="sheepItForm_add"><a><img style="float:left;" src="<?php //echo $base;?>images/plus.gif" alt="" /><span>Add Next</span></a></div>
											</div>
										</div>-->
									
									
									
									
									
									
										<div id="sheepItForm">

										 <!-- Form template-->
										  <div id="sheepItForm_template">


										<input type="text" name="phonenumber" id="phonenumber" class="createaccount_textarea" value="<?php if(!empty($listphar->phone)){echo $listphar->phone;}else{echo set_value('phonenumber');}?>"/> 
										  <a id="sheepItForm_remove_current" style="margin-left:5px; margin-top:2px;"><img class="delete" src="<?php echo $base;?>images/close.gif" width="16" height="16" border="0"></a>
										   <?php echo form_error('phonenumber'); ?>

										   
										  </div>
										  
										  
										  
										   <!-- No forms template -->

										<div id="sheepItForm_noforms_template">No Datas</div>

										  
										  
										<div class="patient_input01">
										<div id="sheepItForm_controls">
										<div id="sheepItForm_add"  class="addnext"><img style="float:left;" src="<?php echo $base;?>images/plus.gif" alt="" />Add Next</div>
										 </div>
										</div>
										<!-- /Controls -->

										</div>
									</td>
								</tr>

								<tr style="cursor: move;" class="td2" id="44">
									<td>Email<span class="red">*</span></td>
									<td>
										<input name="email" id="email" type="text" class="textarea" value="<?php if(!empty($listphar->email)){echo $listphar->email;}else{echo set_value('email');}?>"><?php echo form_error('email'); ?>
									</td>
								</tr>

								<tr style="cursor: move;" class="td2" id="43">
									<td>City<span class="red">*</span></td>
									<td width="82%">
										<input name="city" id="city" type="text" class="textarea" value="<?php if(!empty($listphar->city)){echo $listphar->city;}else{echo set_value('city');}?>"><?php echo form_error('city'); ?>
									</td>
								</tr>

								<tr style="cursor: move;" class="td2" id="43">
									<td>State<span class="red">*</span></td>
									<td width="82%">
										<input name="state" id="state" type="text" class="textarea" value="<?php if(!empty($listphar->state)){echo $listphar->state;}else{echo set_value('state');}?>"><?php echo form_error('state'); ?>
									</td>
								</tr>
								
								<tr style="cursor: move;" class="td2" id="43">
									<td>Latitude<span class="red">*</span></td>
									<td width="82%">
										<input name="latitude" id="latitude" type="text" class="textarea" value="<?php if(!empty($listphar->latitude)){echo $listphar->latitude;}else{echo set_value('latitude');}?>"><?php echo form_error('latitude'); ?>
									</td>
								</tr>
								
								<tr style="cursor: move;" class="td2" id="43">
									<td>Longitude<span class="red">*</span></td>
									<td width="82%">
										<input name="longitude" id="longitude" type="text" class="textarea" value="<?php if(!empty($listphar->longitude)){echo $listphar->longitude;}else{echo set_value('longitude');}?>"><?php echo form_error('longitude'); ?>
									</td>
								</tr>
								
								<tr style="cursor: move;" class="td2" id="43"></tr>
								<tr style="cursor: move;" class="td2" id="43">
									<td>&nbsp;</td>
									<td>
										<label>
											<input type="submit" name="update" id="update" class="button" value="Update" />
											<input type="hidden" name="editid" id="editid" value="<?php print !empty($listphar->id)? ($listphar->id) : $this->input->post('editid');?>"/>	
										</label>
									</td>
								</tr>
								
								<tr class="nodrag nodrop"><td width="0%" colspan="2" valign="bottom" style="text-align: left;"><br /></td></tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</td>
</tr>

<script type="text/javascript">

$(document).ready(function() {
     
    var sheepItForm = $('#sheepItForm').sheepIt({
        separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        allowRemoveAll: true,
        allowAdd: true,
        allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 1,
        iniFormsCount: 1
    });
 
});

</script>
<style>

a {
    text-decoration:none;
    color:#00F;
    cursor:pointer;
}

#sheepItForm_controls div, #sheepItForm_controls div input {
    float:left;    
    margin-right: 10px;
}


</style>
