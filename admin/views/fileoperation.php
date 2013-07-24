<td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
	<form id="frmfile" name="frmfile" method="post" action="<?php echo $base;?>admin.php/home/fileoperation" enctype="multipart/form-data">
		<table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
			<tbody>
				<tr>
					<td class="titles">File Operation</td>
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
									<td>Table Name<span class="red">*</span></td>
									<td>
										<input type="text" name="name" class="textarea" value="<?php echo set_value('name');?>" /><?php echo form_error('name'); ?>
									</td>
								</tr>

								<tr style="cursor: move;" class="td2" id="43">
									<td>File Name<span class="red">*</span></td>
									<td>
										<input name="userfile" id="userfile" type="file"/>
									</td>
								</tr>
								
								<tr style="cursor: move;" class="td2" id="43"></tr>
								<tr style="cursor: move;" class="td2" id="43">
									<td>&nbsp;</td>
									<td><label><input type="submit" name="submit" id="" class="button" value="Submit" /></label></td>
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
