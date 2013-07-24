     <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
	 <?php 
				
				foreach($drug->result() as $dr)
				{ }  

				?>
	 <form id="frmcat" name="frmcat" method="post" action="#" enctype="multipart/form-data">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">Edit Drug</td>
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
							<input type="text" name="category" id="category" value="<?php if(!empty($dr->category)) { echo  $dr->category; } else { echo set_value('category'); } ?>"  class="textarea" >
						<?php echo form_error('category'); ?>
							  &nbsp;</td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="44">
                     
                         <td>Drug Name:<span class="red">*</span></td>
                            <td>
							<input name="name" id="name" class="textarea" value="<?php echo $dr->medication;?>" ></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="41">
                       
                        <td>Featured:<span class="red">*</span></td>
                            <td><label>
                        <select name="featured" id="featured" class="dropdown">
						<option value="" <?php if($dr->featured=="") { echo "selected" ;} ?>>Select </option>
						<option value="yes" <?php if($dr->featured=="yes") { echo "selected" ;} ?> >Yes </option>
						<option value="no" <?php if($dr->featured=="no") { echo "selected" ;} ?>>No </option>
						</select>                            </label>							</td>
                      </tr>
                     
                   
                   
                      <tr style="cursor: move;" class="td2" id="41">
                       
                        <td>Active:<span class="red">*</span></td>
                            <td><label>
                       <input type="checkbox" name="active"  id="active" value="1"  <?php if($dr->is_active=="1") { ?> checked <?php } ?>   />                      </label>							</td>
                      </tr>
                     
                    
                    
                     
                      <tr style="cursor: move;" class="td2" id="43">
                       
                       <td>Image:<span class="red">*</span></td>
                            <td>
                           <input name="userfile" id="userfile"  type="file" value="" />
						    <?php if($dr->image!=""){ ?>
							<img src="<?php echo $base;?>drugupload/<?php echo $dr->image;?>  width="20" height="20" />
							<?php } ?>
						   <?php if(!empty($message)){ echo $message; } ?>
                            </td>
                   
                       </tr>
                 <tr style="cursor:move;" class="td2" id="43">
                     
                        <td>&nbsp;</td>
                            <td><label>
                          <input type="submit" name="edit" class="edit" value="Edit" />
                           
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
     
