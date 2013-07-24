     <td style="padding-top: 20px;" id="right-bg" align="LEFT" valign="top" width="1207">
	 <form id="frmcat" name="frmcat" method="post" action="<?php echo $base;?>admin.php/category/additem" enctype="multipart/form-data">
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
						
                           <option value="<?php echo $ct->id;?>"><?php echo $ct->category;?></option>
							  
							  <?php } ?>
							   </select>  
							  &nbsp;</td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="44">
                     
                         <td>Name:<span class="red">*</span></td>
                            <td>
							<input name="name" id="name" class="textarea" ></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="41">
                       
                        <td>Description:<span class="red">*</span></td>
                            <td><label>
                              <textarea name="description" id="description"  class="textfield-02 "></textarea>
                            </label>							</td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                        
                       <td>Price:<span class="red">*</span></td>
                            <td>
							<input name="price" id="price" class="textarea" >                            </td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                       
                       <td>Weight:<span class="red">*</span></td>
                            <td width="82%"><label><input name="weight" id="weight" class="textarea" ></label></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                       
                         <td>Details:<span class="red">*</span></td>
                            <td>
							<textarea name="details" id="details" class="textfield-02 "></textarea>                            </td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                       
                        <td>Ingredients:</td>
                         <td ><label><textarea name="ingredients"  id="ingredients" class="textfield-02 "></textarea></label></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                        
                        <td>Directions:<span class="red">*</span></td>
                            <td> <textarea name="directions" id="directions"  class="textfield-02 "></textarea></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                      
                        <td>Warning:<span class="red">*</span></td>
                            <td>
							  <textarea name="warning" id="warning"  class="textfield-02 "></textarea></td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                       
                        <td>Location:<span class="red">*</span></td>
                            <td>
							<textarea name="location" id="location"  class="textfield-02 "></textarea>                            </td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                       
                       <td>Image1:<span class="red">*</span></td>
                            <td>
                           <input name="userfile" id="userfile"  type="file" value="" />
						   <?php if(!empty($message)){ echo $message; } ?>
                            </td>
                      </tr>
                      <tr style="cursor: move;" class="td2" id="43">
                     
                        <td>Image2:</td>
                            <td><label>
                            <input type="file" name="userfile1" id="userfile1" />
                            </label></td>
                      </tr>
                      
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
     
