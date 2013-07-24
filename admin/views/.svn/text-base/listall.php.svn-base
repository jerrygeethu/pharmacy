        <script type="text/javascript">
 function box()
 { 
        if (confirm("Delete your item?"))
        {         

           alert ("Agreed and hence True value returned")

        }

        else

        {         

           alert ("Not Agree and hence False value returned")

        }
}
      </script> 
	   
	   
	    <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207"><form id="frmcat" name="frmcat" method="post" action="#">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">List Drugs</td>
              </tr>
              <tr>
                <td align="center" height="10"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top"><table border="0" cellpadding="0" cellspacing="0" height="35" width="100%">
                    <tbody>
                      <tr class="td3">
                  <td class="td1" height="35" width="30%"><strong>Search by name</strong>&nbsp;&nbsp;
                        <input name="searchText" class="textfield1" id="search" >
                        &nbsp;<a href="#" ><img src="<?php echo  $base;?>images/admin/search.gif" border="0"></a></td>
                        
                      <td class="td1" width="42%">
                        	<strong>Search by category</strong>&nbsp;&nbsp;
                        <select name="select" class="textfield-01">
                        </select>
                         
                       
                         <a href="#" ><img src="<?php echo  $base;?>images/admin/search.gif" border="0"></a>                        </td>
                      <td class="td1" width="28%">
                       <strong>Add New Item</strong>&nbsp;&nbsp;
                        &nbsp;<a href="#" ><img src="<?php echo  $base;?>images/admin/add.png" border="0"></a>                       </td>
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
                        <td class="headings" align="left" width="25%"><a href="#"> Name</a></td>
                        <td class="headings" align="left" width="23%">Category</td>
                        <td class="headings" align="left" width="14%">Featured</td>
                        <td class="headings" align="left" width="14%">Edit</td>
                        <td class="headings" align="left" width="18%">Delete </td>
                        <td align="right" width="0%"></td>
                      </tr>
					  <?php $i=1;
					  
					  foreach($drug->result() as $dr)
					  { ?>
					  
					    <tr style="cursor: move;" class="td2" id="45">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $dr->medication; ?></td>
                        <td><?php echo $dr->category; ?></td>
                        <td><?php echo $dr->featured; ?></td>
                        <td align="right"><a href="<?php echo $base;?>admin.php/category/editdrug/<?php echo $dr->did; ?>"><img src="<?php echo  $base;?>images/admin/edit.gif" alt="" border="0" height="14" width="14" /></a>&nbsp;</td>
                        <td align="right"><a href="#" onclick="box()"><img src="<?php echo  $base;?>images/admin/trash.gif" border="0" /></a>&nbsp;</td>
                      </tr>
                     <?php } ?>
                    
                      <tr class="nodrag nodrop">
                        <td colspan="6"><div id="innerText"></div>
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
