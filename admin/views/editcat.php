        <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207"><form id="frmcat" name="frmcat" method="post" action="#">
          <table class="table" border="0" cellpadding="0" cellspacing="0" width="90%">
            <tbody>
              <tr>
                <td class="titles">Add New Categories</td>
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
				<?php foreach($cat->result() as $ct) {  } ?>
				
				<form action="<?php echo $base;?>admin.php/category/editcat" method="post">
				<table id="table-1" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="nodrag nodrop" style="background-color: rgb(184, 184, 185);">
                        
                        
                       
                        <td align="right" width="0%"></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="45">
                      
                        <td>Category:<span class="red">*</span></td>
                        <td> 
						<input type="text" name="category" id="category" value="<?php if(!empty($ct->category)) { echo  $ct->category; } else {  echo set_value('category'); } ?>"  class="textarea" >
						<?php echo form_error('category'); ?></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="44">
                     
                         <td>Sub Category:<span class="red">*</span></td>
                            <td>
							<input type="text" name="subcategory" id="subcategory" value="<?php if(!empty($ct->subcategory)) { echo  $ct->subcategory; } else {  echo set_value('subcategory'); } ?>"  class="textarea" >
						
							<?php echo form_error('subcategory'); ?>
						</td>
                      </tr>
                 <tr style="cursor: move;" class="td2" id="44">
                     
                         <td>Finest Category:<span class="red">*</span></td>
                            <td>
							<input type="text" name="finestcategory" id="finestcategory" value="<?php if(!empty($ct->finestcategory)) { echo  $ct->finestcategory; } else { echo set_value('finestcategory'); } ?>"  class="textarea" >
						
							<?php echo form_error('finestcategory'); ?>
						</td>
                      </tr>
                      
                 <tr style="cursor: move;" class="td2" id="43">
                     
                        <td>&nbsp;</td>
                            <td><label>
                            <a href="#"><input type="submit" name="edit" id="edit" class="button" value="Edit" /></a>
                           
                            </label></td>
                      </tr>
                      <tr class="nodrag nodrop">
                        
                        <td width="0%" colspan="2" valign="bottom" style="text-align: left;"><br />
                           
                          </td>
                      </tr>
                    </tbody>
                </table></form>
				
				
				</td>
              </tr>
            </tbody>
          </table>
        </form></td>
      </tr>
