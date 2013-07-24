        <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
		<form id="frmcat" name="frmcat" method="post" action="<?php echo $base;?>admin.php/home/changepassword">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">Change Password</td>
              </tr>
              <tr>
                <td align="center" height="10"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top">
				<table border="0" cellpadding="0" cellspacing="0" height="35" width="100%">
                    <tbody>
                   
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td align="center"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top">
				<?php
				foreach($row->result() as $ro)
			   {
			   } ?>
			 
				<table id="table-1" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="nodrag nodrop" style="background-color: rgb(184, 184, 185);">
                        
                        
                       
                        <td align="right" width="0%"></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="45">
                      
                       
                      </tr>
                      <tr style="cursor: move;" class="td2" id="44">
                     
                         <td>User Id<span class="red">*</span></td>
                            <td>
							<input name="userid" id="userid" type="text" class="textarea" readonly="readonly" value="<?php echo $ro->loginid;?>"></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="41">
                       
                        
                      </tr>
                     
                      <tr style="cursor: move;" class="td2" id="43">
                       
                       <td>New Password<span class="red">*</span></td>
                            <td width="82%"><label>
							<input name="newpwd" id="newpwd" class="textarea" type="password" >
							</label>
							<?php echo form_error('newpwd'); ?></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                       
                       <td>Confirm Password<span class="red">*</span></td>
                            <td width="82%">
							<label>
							<input name="cfmpwd" id="cfmpwd" class="textarea" type="password" >
							</label>
								<?php echo form_error('cfmpwd'); ?>
							</td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                       
                         
                      </tr>
                       
                     
                     
                      
                      
                 <tr style="cursor: move;" class="td2" id="43">
                     
                        <td>&nbsp;</td>
                            <td><label>
                           <input type="submit" name="submit" class="button" value="Submit" />
                           
                            </label></td>
                      </tr>
                      <tr class="nodrag nodrop">
                        
                        <td width="0%" colspan="2" valign="bottom" style="text-align: left;"><br />
                           
                          </td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
            </tbody>
          </table>
        </form></td>
      </tr>
    
