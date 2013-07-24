     <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
	 <form id="frmcat" name="frmcat" method="post" action="<?php echo $base;?>admin.php/category/drugadd" enctype="multipart/form-data">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">Add New Drug  & Details</td>
              </tr>
              <tr>
                <td align="center" height="10"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top"><table border="0" cellpadding="0" cellspacing="0" height="35" width="100%">
                    <tbody>
                   
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td align="center"><font color="#ff0000"></font></td>
              </tr>
              <tr>
                <td valign="top">
				
				<table id="table-1" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="nodrag nodrop" style="background-color: rgb(184, 184, 185);">                       
                       
                        <td align="right" width="0%"></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="45">
                      
                        <td>Category:<span class="red">*</span></td>
                        <td>  
						<select name="category" id="category" class="dropdown">
						<option value="">Select category</option>
						<?php foreach($cat->result() as $ct)
						{ ?>
						
                           <option value="<?php echo $ct->id;?>"><?php echo $ct->drugcategory;?></option>
							  
							  <?php } ?>
							   </select>  	<?php echo form_error('category'); ?>
							 </td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="44">
                     
                         <td>Drug Name:<span class="red">*</span></td>
                            <td>
							<input name="name" id="name" class="textarea" ><?php echo form_error('name'); ?></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="41">
                       
                        <td>Featured:<span class="red">*</span></td>
                            <td><label>
                        <select name="featured" id="featured" class="dropdown">
						<option value="">Select </option>
						<option value="yes">Yes </option>
						<option value="no">No </option>
						</select>    <?php echo form_error('featured'); ?>                        </label>							</td>
                      </tr>
                     
                   
                   
                       <tr style="cursor: move;" class="td2" id="41">
                       
                        <td>Active:</td>
                            <td><label>
                       <input type="checkbox" name="active"  id="active" value="1"  />                      </label>							</td>
                      </tr>
                     
                    
                    
                     
                      <tr style="cursor: move;" class="td2" id="43">
                       
                       <td>Image:<span class="red">*</span></td>
                            <td>
                           <input name="userfile" id="userfile"  type="file" value="" />
						   <?php if(!empty($message)){ echo $message; } ?>
                            </td>
                   
                      
                 <tr style="cursor: move;" class="td2" id="43">
                     
                        <td>&nbsp;</td>
                            <td><label>
                          <input type="submit" name="button" class="button" value="Submit" />
                           
                            </label></td>
                      </tr>
                      <tr class="nodrag nodrop">
                        
                        <td width="0%" colspan="2" valign="bottom" style="text-align: left;"><br />
                           
                          </td>
                      </tr>
                    </tbody>
                </table>
				
				</form>
				
				
				
				</td>
              </tr>
            </tbody>
          </table>
      
		
		</td>
      </tr>
     
