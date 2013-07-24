<script type="text/javascript">
	function submitform(val)
	{
		var subm="cart"+val;
		document.forms[subm].submit();
	}
</script>
<?php 
	$arr=explode("+",$this->session->userdata('prod'));
	$arr2=implode(" ", $arr);
?>
<div class="navigation">
	<?php 
		//if($this->uri->segment(3)==$this->session->userdata('newhamcode'))
		//{
	?>
			<a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop">Online Shop</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $this->session->userdata('category_id');?>"><?php echo $this->session->userdata('category_name');?></a> &rsaquo;&rsaquo;  <a href="<?php echo $base;?>index.php/onlineshop/product_fetch/<?php echo $this->session->userdata('finest_id');?>/<?php echo $this->session->userdata('prod');?>"><?php echo $arr2;?></a> &rsaquo;&rsaquo;  <a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $this->session->userdata('newhamcode');?>"><?php echo $this->session->userdata('internetdesc');?></a> &rsaquo;&rsaquo; Shopping Cart
	<?php
		//}
		//else
		//{
	?>
			<!--<a href="<?php //echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Shopping Cart-->
	<?php
		//}
	?>
	
</div>
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>

<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">Shopping Cart</div>
<div id="createaccount_line"></div>
<div id="online_outer">

<?php
        if(!empty($item_details_lst['result']))
        {
?>

	<div id="viewcart">
    	<div id="viewcart_head">
        	<div id="viewcart_product">Product</div>
            <div id="viewcart_size">Size</div>
            <div id="viewcart_price">Price</div>
            <div id="viewcart_qty">Quantity</div>
            <div id="viewcart_total">Total</div>
        </div>
        <?php
        $formNmae=1;
        foreach($item_details_lst['result'] as $itemdetails1)
        {
			$msg="";
			?>
        <div class="productname">
        	<div class="product_photo" align="center"><img src="<?php echo $base;?>images/products/<?php echo $itemdetails1->hamcode.".Jpg";?>" alt="Item image" height="50px" width="50px"/></div>
            <div class="product_name"><a href="#"><?php echo $itemdetails1->internetdesc;?></a><br/>
           </div>
        </div>
        <div class="productsize"><?php echo $itemdetails1->productsize.$itemdetails1->unitofmeasure;?></div>
        <div class="productprice"><?php echo $itemdetails1->rate;?></div>
        
        <div class="productqty">
        
        <form name="cart<?php echo $formNmae;?>" id="cart<?php echo $formNmae;?>" action="<?php echo $base;?>index.php/onlineshop/update_crts/<?php echo $itemdetails1->cartdtlid;?>" method="post">
			<div id="qty_outerbox"><input name="qty" id="qty" value="<?php if(!empty($itemdetails1->quantity)){echo ($itemdetails1->quantity); }else{echo set_value('qty');}?>" class="qty_inputbox" type="text"/></div>
		
         	
            <div class="qty_btn">
            	<div class="qty_btn01"><a href="#" onclick="javascript:submitform(<?php echo $formNmae;?>)">Update </a></div>
                <div class="qty_btn01"><a href="<?php echo $base;?>index.php/onlineshop/remove_category/<?php echo $itemdetails1->cartdtlid?>">Remove</a></div>
			</div>
			<?php echo $msg;?>
		</form>
        </div>
	<?php 	/*$grant_total=0;
		$total=intval($itemdetails1->rate)*intval($itemdetails1->quantity);
		$grant_total=$grant_total+$total;*/	
	?>
        <div class="producttotal"><?php echo $itemdetails1->total;?></div>
        <div class="cartline"></div>
		<?php $formNmae++; }?>
			
  <div id="cart_total">
	<?php if(!empty($total)==TRUE)
	{
	foreach($total as $tot){?>
  	<div id="subtotal">Sub Total  :<?php echo $tot->grandtotal;?></div>
	<?php }}?>    
    <div id="cart_btns">
    	<div class="cart_btnsinner"><a href="<?php echo $base;?>index.php/onlineshop/"><input type="submit" name="button" id="button" value="Continue Shopping" class="newbutton" /></a></div>
        
        <div class="cart_btnsinner"><a href="<?php echo $base;?>index.php/onlineshop/checkout"><input type="submit" name="button" id="button" value="Checkout" class="newbutton" /></a></div>
    </div>
  </div>
  <div id="tnt_pagination">
		<?php echo $link;?>
	</div>
  </div> 
</div>
    <?php
		}
		else
		{
			echo "Your cart is empty";
		}
    ?>
</div>
</div>
</div>
