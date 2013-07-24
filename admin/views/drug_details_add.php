     <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
	 <form id="frmcat" name="frmcat" method="post" action="<?php echo $base;?>admin.php/category/adddrugdet" enctype="multipart/form-data">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">Add Drug Details</td>
              </tr>
              <tr>
                <td align="center" height="10"></td><font color="#ff0000"></font></td>
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

                        <td>Drugname:<span class="red">*</span></td>
                        <td>  
						<select name="drugname" id="drugname" class="dropdown">
						<option value="">Select Drug</option>
						<?php foreach($drugname as $dn)
						{ 
							?>
                           <option value="<?php echo $dn['drugsid'];?>"><?php echo $dn['medication'];?></option>						  
						<?php 
						} 
						?>
							   </select>  
							   	<?php echo form_error('drugname'); ?>
					
							 </td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="44">
                     
                         <td>Dosage:<span class="red">*</span></td>
                            <td>
							<input name="dosage" id="dosage" class="textarea" ><?php echo form_error('dosage'); ?></td>
                      </tr>
                      
                      
                      
                     <tr style = "cursor:move;" class="td2" >
						<td>Price:<span class="red">*</span></td>
						<td><input type="text" name="price" value="" class="textarea"><?php echo form_error('price'); ?></td>
                     </tr>
					<tr style = "cursor:move;" class="td2" >
						<td>Sideeffects</td>
						<td><textarea class="td2" id = "sideeffect" name="sideeffect"></textarea><?php echo form_error('sideeffect'); ?></td>
					</tr>
                   <tr style = "cursor:move;" class="td2" >
						<td>Ingredients:</td>
						<td><textarea class="td2" id = "ingredients" name="ingredients"></textarea><?php echo form_error('ingredients'); ?></td>
					</tr>
					<tr style = "cursor:move;" class="td2" >
						<td>Precautions:</td>
						<td><textarea class="td2" id="precautions" name="precautions"></textarea><?php echo form_error('precautions'); ?></td>
					</tr>
					<tr style = "cursor:move;" class="td2" >
						<td>Howtouse:</td>
						<td><textarea class="td2" id="howtouse" name="howtouse"></textarea><?php echo form_error('dosage'); ?></td>
					</tr>
                       <!--<tr style="cursor: move;" class="td2" id="41">
                       
                        <td>Active:</td>
                            <td><label>
                       <input type="checkbox" name="active"  id="active" value="1"  />                      </label>							</td>
                      </tr>-->
                     
                    
                    
                     
                      <tr style="cursor: move;" class="td2" id="43">
                       
                       <td>Image:<span class="red">*</span></td>
                            <td>
                           <input name="userfile" id="userfile"  type="file" value="" />
						   <?php if(!empty($error)){ echo $error; } ?>
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
     
