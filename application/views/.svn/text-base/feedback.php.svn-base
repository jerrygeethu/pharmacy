<?php
	if(!empty($id))
	{
?>
		<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/druginformation">Drug Information</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/alphadrug/<?php echo $this->session->userdata('string'); ?>"><?php echo ucfirst($this->session->userdata('medication'));?></a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/dosage/<?php echo $this->session->userdata('dosageid'); ?>"><?php echo ucfirst($this->session->userdata('prod_name'));?></a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/detaildrug/<?php echo $this->session->userdata('prod_id'); ?>">Dosage</a> &rsaquo;&rsaquo; Feedback/ Comments</div>
<?php
	}
	else
	{
?>
		<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Feedback/ Comments</div>
<?php
	}
?>
<div class="clear"></div>
<div id="frame" style="display:none;"></div>

	<div id="consultation_outer">
		<div id="refill_outer">
			<div id="createaccount_head">Feedback/ Comments</div>
			<div id="createaccount_line"></div>
			<div id="online_outer">
				<div id="cart_right">
					<div class="newcomment">
						<div id="newcomment_head"><?php echo $feedback_count['totalrows'];?> Comments <!--to “Entry Title”--></div>
						<?php
							$val="";
							foreach($feedback_lst['result'] as $value)
							{
						?>
								<div class="newcomment_inner">
									<div class="newcomment_photo">
										<div class="newcomment_img">
											<div class="newcomment_img1"></div>
										</div>
									</div>

									<div class="comment_text">
										<div class="user_name"><span class="black01"><?php echo $value->name;?></span>  says:</div>
										<?php 
											$date = date_create($value->posted); 											
										?>
										<div class="user_date"><?php echo date_format($date, 'F j , Y');?><!--April 13, 2010 at 4:57 pm--></div>
										<div class="comment_post"><i><?php echo '"'.$value->comments.'"';?></i></div>
									</div>
								</div>								
						<?php
							}
						?>
					</div>

					<div id="tnt_pagination">
						<?php echo $link;?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="clear">
