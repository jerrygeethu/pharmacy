<script type="text/javascript">
	function add()
	{

	var a=1;
	var b=parseInt(document.getElementById('num').value);  
	document.getElementById('num').value=a+b;

	}

	function minus()
	{

	var a=1;
	var b=parseInt(document.getElementById('num').value);  
	document.getElementById('num').value=b-a;

	}
	function submitform()
	{
		document.forms["cart"].submit();
	}
</script>
<?php 
		$arr=explode("+",$this->session->userdata('prod'));
		$arr2=implode(" ", $arr);
		foreach($itemdetails as $itemdetails1){		
			$this->session->set_userdata('internetdesc', $itemdetails1['internetdesc']); 	
	?>
<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop">Online Shop</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $this->session->userdata('category_id');?>"><?php echo $this->session->userdata('category_name');?></a> &rsaquo;&rsaquo;  <a href="<?php echo $base;?>index.php/onlineshop/product_fetch/<?php echo $this->session->userdata('finest_id');?>/<?php echo $this->session->userdata('prod');?>"><?php echo $arr2;?></a> &rsaquo;&rsaquo; <?php echo $this->session->userdata('internetdesc');?></div>
<?php }?>
<div class="clear"></div>
<div id="frame" style="display:none;"></div>
<div id="consultation_outer">
	<div id="refill_outer">
	<?php 
		foreach($itemdetails as $itemdetails1){		
			$arr=explode($itemdetails1['brand'],$itemdetails1['internetdesc']);				
	?>
		<div id="createaccount_head"><?php echo ucwords($itemdetails1['internetdesc']);//echo ucwords($arr[1]);?></div>
		<div id="createaccount_line"></div>
		<div id="createaccount_desc"></div>

		<div id="online_outer">
			<div id="left_online01">
				<div id="drug_img" align="center"><img src="<?php echo $base;?>images/products/<?php echo $this->uri->segment(3).'.Jpg';?>">
					
				</div>

				<div id="cart_add"><!--<img src="images/addsp.gif" />--></div>
			</div>
			<div id="cart_right">   
				<div id="item_outer">
						<div class="item_name"><?php echo ucwords($itemdetails1['internetdesc']);//echo ucwords($arr[1]);?></div>
						<div class="item_price"><?php echo "Size:".$itemdetails1['productsize'].$itemdetails1['unitofmeasure']?></div>
						<div class="item_price"><?php echo "Brand:".$itemdetails1['brand'];?></div>
					<?php }?>
					<div class="item_price">
						<div id="quantity_outer">
						
						<div id="quantity_minus"><input name="minus" id="minus" onClick="minus();" value="-" type="image" src="<?php echo $base;?>images/qty-minus1.jpg" /></div>
						<form name="cart" id="cart" action="<?php echo $base;?>index.php/onlineshop/update_cart/<?php echo $this->uri->segment(3);?>" method="post">
							<div id="quantity_value"><input name="num" id="num" value="1" class="qty_inputbox" type="text"/></div>
							</form>
						<div id="quantity_minus"><input onclick="add();" name="add" value="+" type="image" src="<?php echo $base;?>images/qty-plus2.jpg" /></div>
						</div>
						
						<div class="addtocart">
							<a href="#">
							<input name="submit" type="image" src="<?php echo $base;?>images/add-cart.gif" onclick="javascript:submitform()"/>
							</a>
					</div>
				</div>

			</div> 
			<div id="mycart">
				<div id="mycart_icon"></div>
				<div id="mycart_head">MY CART</div>
				<?php foreach($cart_count as $cart_count1)
				{?>
				<div id="mycart_items"><?php if(intval($cart_count1->noofitems)==0)
				{echo "No items";}else{echo intval($cart_count1->noofitems)." items";};?></div>
				<?php }?>
			</div>
			<div id="detail_drugright">
				<div class="clear"></div>
				<ul class="tabs">
					<li><a href="#tab1">Ingredients</a></li>
					<li><a href="#tab2">Precaution</a></li>
					<li><a href="#tab3">Uses</a></li>
					<li><a href="#tab4">How to use	</a></li>
				</ul>
				<div class="tab_container">
					<?php foreach($itemdetails as $itemdetails1){?>
						<!--<div id="tab1" class="tab_content"><h2>Side effects</h2><p></p></div>-->
						<div id="tab1" class="tab_content"><h2>Ingredients</h2><p><?php if(!empty($itemdetails1['activeingred'])){ echo $itemdetails1['activeingred'];}else{echo "No more Uses available.it will be update soon";}?></p></div>
						<div id="tab2" class="tab_content"><h2>Precautions</h2><p><?php if(!empty($itemdetails1['warnings'])){ echo $itemdetails1['warnings'];}else{echo "No more Uses available.it will be update soon";}?></p></div>
						<div id="tab3" class="tab_content"><h2>Uses</h2><p><?php if(!empty($itemdetails1['uses'])){ echo $itemdetails1['uses'];}else{echo "No more Uses available.it will be update soon";}?></p></div>
						<div id="tab4" class="tab_content"><h2>How to use</h2><p><?php if(!empty($itemdetails1['directions'])){ echo $itemdetails1['directions'];}else{echo "No more Uses available.it will be update soon";}?></p></div>
					<?php }?>
				</div>
				<div class="clear"></div>
				<div class="newcomment">
					<div id="newcomment_head"><?php echo $feedback_count['totalrows'];?> Comments <!--to “Entry Title”--></div>
					<?php
						$val="";
						foreach($feedback_lst['result'] as $value)
						{
					?>
							<div class="newcomment_inner">
								<div class="newcomment_photo">
									<div class="comment_side"></div>
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
					<div id="tnt_pagination">
						<?php echo $link;?>
					</div>
					<div id="comments_btnouter">
						<div class="comment_btn">
							<input type="submit" name="button2" value="Post comments" class="comment_btn01" />
						</div>
						<div class="comment_btn">
							<a class="comment_btn01"  href="<?php  echo $base;?>/index.php/home/view_all_comments" style="text-decoration:none;height:12px;";>View all comments</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div></div> 

<div class="clear"></div>
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
</script
