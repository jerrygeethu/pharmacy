<div class="clear"></div>
<div style="width:980px;border-bottom:2px dotted #D6D6D6;float:left;color:#4B494A;"><div style="width:200px;height:20px;float:left;color: #4B494A;" >Product Image</div>Product Name<div style="float:right;width:100px;height:20px;color: #4B494A;" >Price</div></div>
<div>
	<?php 
	echo $search;
	if(!empty($products)==TRUE)
	{
		foreach($products as $product_list1)
		{
			?>
			<div style="width:980px;border-bottom:2px dotted #D6D6D6;float:left;padding:5px;"><div style="width:180px;height:100px;float:left;padding:5px;" >
<a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $product_list1->hamcode;?>"><img src="<?php echo $base;?>images/products/<?php echo $product_list1->hamcode.".Jpg";?>"></a></div><a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $product_list1->hamcode;?>" style="text-decoration:none;color:#311010"><?php echo $product_list1->internetdesc;?></a><br/><br/><?php echo $product_list1->brand;?><div style="float :right;width:100px;height:100px;" ><?php echo $product_list1->price.".00";?></div></div>
			<?php 
		}
	}
	else
	{
		echo "hello";
		redirect($this->base."index.php/home/search_error/".$search,'refresh');
	}
	?>
</div>
<div id="tnt_pagination">
<?php echo $page;?>
</div>
<div class="clear"></div>
