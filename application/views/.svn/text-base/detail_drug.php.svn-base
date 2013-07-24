<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/druginformation">Drug Information</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/alphadrug/<?php echo $this->session->userdata('string'); ?>"><?php echo ucfirst($this->session->userdata('medication'));?></a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/dosage/<?php echo $this->session->userdata('dosageid'); ?>"><?php echo ucfirst($this->session->userdata('prod_name'));?></a> &rsaquo;&rsaquo; Dosage</div>
<div class="clear"></div>
<div class="clear"></div>

<div id="frame" style="display:none;"></div>

<div id="createaccount_outer">
	<div id="refill_outer">
		<div id="createaccount_head">Search Results</div>
		<div id="createaccount_line"></div>
		<div id="createaccount_desc">
			<!--<div class="druglink01"><a href="druginformation.html">Druginformation</a></div>-->
		</div>

		<div class="clear"></div>
		<div id="detail_drug">
			<div id="detail_drugleft">
				<div id="drug_img">
				<?php foreach($drugname as $drugname1)
				{
				?>
					<div id="drug_imginner"><img src="<?php echo $base;?>images/oncounterimages/<?php echo $drugname1['GENERIC_PRODUCT_NAME'].".jpg";?>" alt="Drug Image" width="189" height="186" /></div>
				<?php }?>
				</div>
			</div>
			<div id="detail_drugright">
				 <img src="<?php echo $base;?>images/arrow_sm_purpleonwhite.gif" /><a href="<?php echo $base;?>index.php/prescription/newprescription" class="requestprescription" style="text-decoration:none;color:#223131"> Request a prescription now</a>
				 <?php  foreach($drugname as $drugname1){?>
				<div id="drug_name">Drug Information for: <span class="coloredsmall"><?php echo $drugname1['GENERIC_PRODUCT_NAME'];?></span></div>
				<?php }?>

				<div class="clear"></div>
				<div class="tab_container">

						<h5 style="padding-left:5px;">Side effects</h5>
					<?php
						if(!empty($sideeffect))
						{ 
						foreach($sideeffect as $sideeffect1)
						{
						?>		
						<p style="padding-left:12px;margin-top:10px;"><?php echo $sideeffect1['sideeffect_text'];?></p>
					<?php }
						}
						else
						{
					?>	
						<p style="padding-left:12px;margin-top:10px;"><?php echo "There is no more sideeffects Listed";?></p>
						<?php }?>
						<h5 style="padding-left:12px;">Ingredients</h5>
						<?php
						if(!empty($drugs))
						{
						foreach($drugs as $drugs1)
						{
						?>		
						<p style="padding-left:12px;margin-top:10px;"><?php echo $drugs1['ACTIVE_INGRED_NAME'];?></p>
						<?php }
						}
						else
						{
						?>
						<p style="padding-left:12px;margin-top:10px;"><?php echo "There is no more Ingredients Listed";?></p>
						<?php }?>
						<h5 style="padding-left:12px;">Precaution</h5>
						<?php 
						if(!empty($precaution))
						{
						 foreach($precaution as $precaution1)
						{?>
						<p style="padding-left:12px;margin-top:10px;"><?php echo $precaution1['warning_text'];?></p>
						<?php }
						}
						else
						{?>
						<p style="padding-left:12px;margin-top:10px;"><?php echo "There is no more Precautions Listed";?></p>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
				<form name="comments" id="comments" method="post" action="<?php echo $base;?>index.php/home/view_all_comments/a">
						<div class="comment_outer">
			
				<?php
					foreach($reviewlst['result'] as $value)
					{
				?>
						<div class="comment_name"><?php echo ucwords($value->name);?></div>
						<!--<div class="comment_name"><?php //echo ucfirst($value->posted);?></div>-->
						<div class="comment_name"><?php echo ucfirst($value->email);?></div>
						<div class="comment_dotted"></div>
						<div class="comments">
							&quot;<?php echo ucfirst($value->comments);?>&quot; 
							<br/><br/>
							
							<div align="right" style="font-family:Arial;font-size:10px;color:#838383;">Posted on  
								<?php 
									$date = date_create($value->posted); 
									echo date_format($date, 'd / m / Y , l');
								?>
							</div>
						</div>
				<?php
					}
				?>
				<div id="tnt_pagination" style="margin-top:5px;float:right;"><?php echo $link;?></div>
				
			</div>
				
		</div>
    
    <div id="comments_btnouter">
    	<div class="comment_btn">
	<?php  if($this->session->userdata('memberid')!=""){?>
    	  <input type="submit" name="button2" value="Post comments"  class="comment_btn01" />
		  <?php } else { ?>
		  
		      	  <a href="<?php echo $base;?>index.php/home/signin"><input type="submit" name="button2" value="Post comments"  class="comment_btn01" /></a>

		  
		  <?php } ?>    	</div>
    	<div class="comment_btn">
        <input type="submit" name="button2" value="View all comments" class="comment_btn01" />
        </div>
    </div>
</form>
				 <?php  if($this->session->userdata('memberid')!=""){?>
         <div id="postcomment">
         	<div id="write_review">
            <div id="review_icon"></div>
            <div id="review">Write a review</div>
            </div>
            <div id="review01">
            
         	<form name="detaildrug" class="form" id="detaildrug" method="post" action="<?php echo $base;?>index.php/drugs/detaildrug/<?php echo $id;?>">
         	
         	<?php $this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');?>

			<p class="name">
			<input type="text" name="name" id="name" class="input_comment" value="<?php if(empty($member)){ print set_value('name');}else echo '';?>" />
			<label for="name">Name</label>
			<?php echo form_error('name'); ?>
			</p>

			<p class="email">
			<input type="text" name="email" id="email" class="input_comment" value="<?php if(empty($member)){ print set_value('email');}else echo '';?>" />
			<label for="email">E-mail</label>
			<?php echo form_error('email'); ?>
			</p>

			<p class="web">
			<input type="text" name="web" id="web" class="input_comment" value="<?php if(empty($member)){ print set_value('web');}else echo '';?>" />
			<label for="web">Website</label>
			<?php echo form_error('email'); ?>
			</p>

			<p class="text">
	  		<textarea name="comments" id="comments" class="textarea_comment"><?php if(empty($member)){ print set_value('comments');}else echo '';?></textarea>
     		 <label for="comments">Comments</label>
     		 <?php echo form_error('comments'); ?>
			</p>

			<p class="submit">
			<input type="submit" name="sendBtn" id="sendBtn" value="Send" />
			</p>

			</form>
		 </div>
         </div> 
             <?php } ?>

						<div>
							<?php	
								if(!empty($message))
								{
									echo $message;
								}
							?>
						</div>
					</form>
				</div>
			</div> 
		</div>          

	</div>
</div>
</div>
</div>
