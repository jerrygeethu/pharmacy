       	    <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207"><form id="frmcat" name="frmcat" method="post" action="#">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">List All Feedbacks</td>
              </tr>
              <tr>
                <td align="center" height="10"><font color="#ff0000"></font></td>
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
                        <td class="headings" align="left" width="25%"><a href="#"> Name</a></td>
                        <td class="headings" align="left" width="39%">Comments</td>
                        
                        <td class="headings" align="left" width="14%">Valid</td>
                        <td class="headings" align="left" width="16%">Delete </td>
                        <td align="right" width="0%"></td>
                      </tr>
					  
					 <?php $i=1;foreach($row->result() as $ro) {  ?>
                      <tr style="cursor: move;" class="td2" id="45">
                        <td><?php echo $i++;?></td>
                        <td><?php echo $ro->name;?></td>
                        <td><?php echo truncate($ro->comments,0,120);?></td>
                       
                        <td align="right">
						<a href="<?php echo $base;?>admin.php/home/valid/<?php echo $ro->reviewerid;?>">
						<img src="<?php echo $base;?>images/admin/valid.jpeg" alt="" border="0" height="16" width="16" />
						</a>&nbsp;</td>
						
                        <td align="right"><a href="" onclick="return confirm('Are you sure to delete category?');"><img src="<?php echo $base;?>images/admin/trash.gif" border="0" /></a>&nbsp;</td>
                      </tr>
                 <?php   } ?>
                     
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
