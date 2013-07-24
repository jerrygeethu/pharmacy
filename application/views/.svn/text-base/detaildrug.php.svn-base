<div class="clear"></div>

<div id="frame" style="display:none;">
</div>

<div id="createaccount_outer">
<div id="refill_outer">
<div id="createaccount_head">Search Results</div>
<div id="createaccount_line"></div>
<div id="createaccount_desc">
	
    <div class="druglink01"><a href="<?php echo $base;?>index.php/drugs/druginformation">Druginformation</a></div>
</div>

<div class="clear"></div>
<?php foreach($drugs->result() as $dr)
{ } ?>
	<div id="detail_drug">
    	<div id="detail_drugleft">
       	  <div id="drug_img">
            	<div id="drug_imginner"></div>
          </div>
         
            
           
             
          
                
           
        </div>
        
        <div id="detail_drugright">
        	<div id="drug_name"> <?php echo $dr->drugname;?></div>
<div class="clear"></div>

	
    <ul class="tabs">
        <li><a href="#tab1">Side effects</a></li>
        <li><a href="#tab2">Ingredients</a></li>
        <li><a href="#tab3">Precaution</a></li>
        <li><a href="#tab4">How to use	</a></li>

    </ul>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <h2>Side effects</h2>
            
           
            <p> <?php echo $dr->sideffects;?> </p>

            
          
        </div>
        <div id="tab2" class="tab_content">
            <h2>Ingredients</h2>
           
             <p><?php echo $dr->ingredients;?> </p>
			 </div>
        <div id="tab3" class="tab_content">
            <h2>Precaution</h2>
          	
       <p><?php echo $dr->precaution;?> </p>            
        </div>
        <div id="tab4" class="tab_content">
            <h2>How to use</h2>
			  <p><?php echo $dr->howtouse ;?> </p>       
          
        </div>
    </div>
		</div>
		
		<div class="clear"></div>
		
		<div class="page">
		
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
				
				<div style="margin-top:5px;float:right;">
					<?php echo $link;?>
				</div>
				
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
      	 <?php  if($this->session->userdata('memberid')!=""){?>
         <div id="postcomment">
         	<div id="write_review">
            <div id="review_icon"></div>
            <div id="review">Write a review</div>
            </div>
            <div id="review01">
         	<form name="detaildrug" class="form" id="detaildrug" method="post" action="<?php echo $base;?>index.php/drugs/detaildrug/<?php echo $id;?>">
         	
						<div>
							<?php	
								if(!empty($message))
								{
									echo $message;
								}
							?>
						</div>
         	
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
             
        </div>
    </div>

</div>
</div>

<div class="clear"></div>


</div>

<script type="text/javascript">

$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});

</script>

