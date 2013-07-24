       	    <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207"><form id="frmcat" name="frmcat" method="post" action="#">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">List Drug Categories <span style="float:right;margin-right:20px;"><a href="<?php echo $base;?>admin.php/category/drugcatadd" class="tdlink">Add New Category</a></span></td>
              </tr>
              <tr>
                <td align="center" height="10"><font color="#ff0000"><?php if(!empty($message)) { echo $message;} ?> </font></td>
              </tr>
             <!-- <tr>
                <td valign="top">
			
				<table border="0" cellpadding="0" cellspacing="0" height="35" width="100%">
                    <tbody>
                      <tr class="td3">
                  <td class="td1" height="35" width="30%"><strong>Search by name</strong>&nbsp;&nbsp;
                        <input name="searchText" class="textfield1" id="search" >
                        &nbsp;<a href="#" ><img src="<?php echo  $base;?>images/admin/images/search.gif" border="0"></a></td>
                        
                      <td class="td1" width="42%">
                        	<strong>Search by category</strong>&nbsp;&nbsp;
							
                        <select name="select" class="textfield-01">
                        </select>
                         
                       
                         <a href="#" ><img src="<?php echo  $base;?>images/admin/search.gif" border="0"></a>                        </td>
                      <td class="td1" width="28%">
					  <a href="<?php echo  $base;?>admin.php/category/addcat">
                       <strong>Add New Item</strong></a>  &nbsp;&nbsp;
                        &nbsp;<a href="<?php echo  $base;?>admin.php/category/addcat">
						<img src="<?php echo  $base;?>images/admin/add.png" border="0"></a>                       </td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>--->
              <tr>
                <td align="center"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top">
				<table id="table-1" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="nodrag nodrop"  style="background-color: rgb(184, 184, 185);">
                        <td class="headings" align="left" width="8%">Sl No.</td>
                        <td class="headings" align="left" width="55%"><a href="#"> Category</a></td>
                       
                        
                        <td class="headings" align="left" width="14%">Edit</td>
                        <td class="headings" align="left" width="16%">Delete </td>
                        <td align="right" width="0%"></td>
                      </tr>
					  
					  <?php 
					  $i=1+$limit;
					  foreach($cat->result() as $ct)
					  {   ?>
                      <tr style="cursor: move;" class="td2" id="45">
                        <td><?php echo $i;?></td>
                        <td><?php echo $ct->drugcategory;?></td>
                        
                       
                        <td align="right"><a href="<?php echo  $base;?>admin.php/category/drugcatedit/<?php echo $ct->id;?>/<?php echo $limit;?>"><img src="<?php echo  $base;?>images/admin/edit.gif" alt="" border="0" height="14" width="14" /></a>&nbsp;</td>
                        <td align="right"><a href="<?php echo  $base;?>admin.php/category/deletedrugcat/<?php echo $ct->id;?>/<?php echo $limit;?>" onclick="return confirm('Are you sure to delete drug category?');"><img src="<?php echo  $base;?>images/admin/trash.gif" border="0" /></a>&nbsp;</td>
                      </tr>
                     <?php $i++; } ?>          
                     
                      <tr class="nodrag nodrop">
                        <td colspan="6"><div id="innerText">
						
						 <div align="right" class="pagination_main">
						<div id="tnt_pagination">
						
						<?php print_r($page);?>
						
						
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
                        <td width="0%" colspan="2" valign="bottom" style="text-align: left;"><br />
                            <br />
                            <br /></td>
                      </tr>
                    </tbody>
                </table>
				</td>
              </tr>
            </tbody>
          </table>
        </form></td>
      </tr>     
