<script type="text/javascript">
	function box()
	{ 
		if (confirm("Delete your item?"))
		{  
			alert ("Agreed and hence True value returned");
			return true ;
		}
		else
		{ 
			alert ("Not Agree and hence False value returned");
			return false ;
		}
	}
</script> 


<td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
	<form id="pharmacy" name="pharmacy" method="post" action="#">
		<table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
			<tbody>
				<tr>
					<td class="titles">List Pharmacy</td>
				</tr>
				<tr>
					<td align="center" height="10"><font color="#ff0000"></font></td>
				</tr>
				<tr>
					<td valign="top">
						<table border="0" cellpadding="0" cellspacing="0" height="35" width="100%">
							<tbody>
								<tr class="td3">
									<td class="td1" width="28%">
										<a href="<?php echo $base;?>admin.php/home/add_pharmacy" > <strong style="color:#12849E;">Add New pharmacy</strong>&nbsp;&nbsp;&nbsp;<img src="<?php echo  $base;?>images/admin/add.png" border="0"></a>                       
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center"><font color="#ff0000"></font></td>
				</tr>
				<tr>
					<td valign="top">
						<table id="table-1" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tbody>
								<tr class="nodrag nodrop" style="background-color: rgb(184, 184, 185);">
									<td class="headings" align="left" width="6%">Sl No.</td>
									<td class="headings" align="left" width="12%"><a href="#"> Name</a></td>
									<td class="headings" align="left" width="27%">Address</td>
									<td class="headings" align="left" width="27%">Phone Number</td>
									<td class="headings" align="left" width="14%">Email</td>
									<td class="headings" align="left" width="14%">City</td>
									<td class="headings" align="left" width="14%">State</td>
									<td class="headings" align="left" width="14%">Latitude</td>
									<td class="headings" align="left" width="14%">Longitude</td>
									<td class="headings" align="left" width="14%">Edit</td>
									<td class="headings" align="left" width="18%">Delete </td>
									<td align="right" width="0%"></td>
								</tr>
							<?php 
								$i=1+$limit;
								foreach($pharmacy->result() as $ph)
								{ 
							?>
									<tr style="cursor: move;" class="td2" id="45">
										<td><?php echo $i; ?></td>
										<td><?php echo $ph->pharmacy; ?></td>
										<td><?php echo $ph->address; ?></td>
										<td><?php echo $ph->phone; ?></td>
										<td><?php echo $ph->email; ?></td>
										<td><?php echo $ph->city; ?></td>
										<td><?php echo $ph->state; ?></td>
										<td><?php echo $ph->latitude; ?></td>
										<td><?php echo $ph->longitude; ?></td>
										<td align="right"><a href="<?php echo $base;?>admin.php/home/edit_pharmacy/<?php echo $ph->id;?>"><img src="<?php echo  $base;?>images/admin/edit.gif" alt="" border="0" height="14" width="14" /></a>&nbsp;</td>
										<td align="right"><a href="<?php echo $base.'admin.php/home/listpharmacy/'.$limit.'/'.$ph->id;?>" onclick="box();"><img src="<?php echo  $base;?>images/admin/trash.gif" border="0" /></a>&nbsp;</td>
									</tr>
							<?php 
									$i++;
								} 
							?>
								<tr class="nodrag nodrop">
									<td colspan="6">
										<div id="innerText"><div align="right" class="pagination_main"><div id="tnt_pagination"><?php print_r($page);?></div></div></div>
										<table border="0" cellpadding="3" cellspacing="0" width="97%"><tbody><tr class="nodrag"><td align="center" width="11%"></td><td align="center" width="54%"></td><td align="center" width="25%"></td><td align="right" width="11%"></td></tr></tbody></table>
									</td>
									<td colspan="2" valign="bottom" style="text-align: left;"><br /><br /><br /></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</td>
</tr>    

