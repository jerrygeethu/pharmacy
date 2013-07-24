<td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
<form id="frmcat" name="frmcat" method="post" action="#">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">List Drug Details</td>
              </tr>
              <tr>
                <td align="center" height="10"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top"><table border="0" cellpadding="0" cellspacing="0" height="35" width="100%">
                    <tbody>
                      <tr class="td3">
                  <!--<td class="td1" height="35" width="30%"><strong>Search by name</strong>&nbsp;&nbsp;
                        <input name="searchText" class="textfield1" id="search" >
                        &nbsp;<a href="#" ><img src="<?php //echo  $base;?>images/admin/search.gif" border="0"></a></td>
                        
                      <td class="td1" width="42%">
                        	<strong>Search by category</strong>&nbsp;&nbsp;
                        <select name="select" class="textfield-01">
                        </select>
                         
                       
                         <a href="#" ><img src="<?php echo  $base;?>images/admin/search.gif" border="0"></a>                        </td>-->
                      <td class="td1" width="28%">
                      <a href="<?php echo $base;?>admin.php/category/adddrugdet"> <strong>Add New Drug</strong>&nbsp;&nbsp;
                        &nbsp;<img src="<?php echo  $base;?>images/admin/add.png" border="0"></a>                       </td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td align="center"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top"><table id="table-1" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="nodrag nodrop" style="background-color: rgb(184, 184, 185);">
                        <td class="headings" align="left" width="6%">Sl No.</td>
                        <td class="headings" align="left" width="25%"><a href="#">Drugname</a></td>
                        <td class="headings" align="left" width="23%">Sideeffects</td>
                        <td class="headings" align="left" width="14%">Ingredients</td>
						<td class="headings" align="left" width="14%">Precautions</td>
                        <td class="headings" align="left" width="14%">How to Use</td>
                        <td class="headings" align="left" width="18%">Price </td>
                        <td class="headings" align="left" width="20%">Edit </td>
                        <td class="headings" align="left" width="20%">Delete </td>
                        <td align="right" width="0%"></td>
                      </tr>
					 
						<?php  
							foreach($drug_details as $drug_details1)
							{ 
								$start = $start+1;
						?>
						<tr style="cursor: move;" class="td2" id="45">
						<td><?php echo $start;?></td>
						<td><?php echo $drug_details1['dosage'];?></td>
						<td><?php echo substr($drug_details1['sideffects'],0,25);?></td>
						<td><?php echo substr($drug_details1['ingredients'],0,25);?></td>
						<td><?php echo substr($drug_details1['precaution'],0,25);?></td>
						<td><?php echo substr($drug_details1['howtouse'],0,25);?></td>
						<td><?php echo substr($drug_details1['price'],0,25);?></td>
						<script type="text/javascript">
							function confirm_delete()
							{
								var message = confirm("Press ok to delete");

								if(message = true)
								{
									window.location.assign("<?php echo $base;?>admin.php/category/delete_drug");
								}

								else
								{
									alert('Not agree to delete');
								}
								
							}
						</script>
						<td align="right"><a href="<?php echo $base;?>admin.php/category/retrive_drug_details/<?php echo $drug_details1['id']; ?>"?><img src="<?php echo  $base;?>images/admin/edit.gif" alt="" border="0" height="14" width="14" style="margin-top:5px;" /></a>&nbsp;</td>
                        <td align="right"><a href="<?php echo $base;?>admin.php/category/delete_drug_details/<?php echo $drug_details1['id']; ?>" onclick="confirm_delete()"><img src="<?php echo  $base;?>images/admin/trash.gif" border="0" /></a>&nbsp;</td>
					  </tr>
                    <?
                   
                    }
                    ?>
                      <tr class="nodrag nodrop">
                        <td colspan="6"><div id="innerText">
						
						 <div align="right" class="pagination_main">
						<div id="tnt_pagination">
						
						<?php print_r($page_links);?>
						
						
						</div>
						 </div> 
						
						
						</div>
                            <table border="0" cellpadding="3" cellspacing="0" width="97%">
                              <tbody>
                                <tr class="nodrag">
                                  <td align="center" width="11%"></td>
                                  <td align="center" width="54%"></td>
                                  <td align="center" width="25%"></td>
                                  <td align="right" width="11%"></td>
                                </tr>
                              </tbody>
                            </table></td>
                        <td colspan="2" valign="bottom" style="text-align: left;"><br />
                            <br />
                            <br /></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
            </tbody>
          </table>
        </form></td>
      </tr>    
