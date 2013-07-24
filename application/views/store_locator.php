<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Store Locator</div>
<div class="clear"></div>

<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">Store Locator</div>
<div id="createaccount_line"></div>

<div id="online_outer">
	 		<div id="left_online">
      		<div id="onlineshop_cate">
            	<div id="shop_cate">
                	<div id="shop_head">Product Categories</div>
                	<?php foreach($category->result() as $product_category)
                	{
						?>
                    <div class="cate_name"><a href="<?php echo $base;?>index.php/onlineshop/index/<?php echo $product_category->id;?>"><?php echo $product_category->category;?></a>  </div>
                    <?php 
					}
                    ?>
                </div>
            </div>
   </div>
   <div id="myaccount_box" style="width:690px;padding-bottom:20px;">
        <div id="box_head" style="width:680px;">Store Details</div>      
   			<?php 
   			$sh=1;
           	  foreach($pharmacys as $pharmacy)
           	  {
				  ?>
         
        	<div class="storelocator_left">

           	  <div class="store_dtls_left">
			<span>           	  

            	  <h2><?php echo $pharmacy['pharmacy'];?></h2><br />
						   <?php  $address = explode(',',$pharmacy['address']);
							for($i=0;$i<count($address);$i++)
							{
								echo $address[$i]."</br>";
							}
							?>
						  <?php  
							$phone = explode(',',$pharmacy['phone']);
							for($i=0;$i<count($phone);$i++)
							{
								echo $phone[$i]."</br>";
							}
						  ?>

<a href="<?php echo $pharmacy['email'];?>"><?php echo $pharmacy['email'];?></a><br /><br/>

<a href="<?php echo $base;?>index.php/home/store_details/<?php echo $pharmacy['id'];?>" style="color:#C8070d">Get Map &amp; Directions</a><br /><br />
<a onclick="showit(<?php echo $sh;?>);" title="store_details" >Full Store Details &nbsp; <img src="<?php echo $base;?>images/bullet.png" alt="" /></a>
</span>
 </div>           	  
         <div id="it_contantmain<?php echo $sh;?>" style="display:none;">     
         <div class="storedetails_time">
         <div class="store_dtls_left">
         <span><b>Store Hours</b><br />
					Mon-Fri: 08:30 AM - 06:30 PM<br />
					Sat:  08:30 AM - 01:30 PM 
		</span>
</div>
              </div> 
              </div>
              <?php $sh++?>
              </div>   
<?php 
}
?>           

            
           </div> 
 
            </div>

            </div>

            </div>
		<div id="offer"><img src="<?php echo $base;?>images/buy2.jpg" height="148" /></div>   
      
      
      </div>




</div>
</div>
<p>&nbsp;</p>
</div>
<div class="clear">
                
<script language="javascript" type='text/javascript'>
function showit(sh) 
{
	if(document.getElementById('it_contantmain'+sh).style.display=="block")
	{
	document.getElementById('it_contantmain'+sh).style.display="none";
	}
	else
	{
	document.getElementById('it_contantmain'+sh).style.display="block";
}
}


</script>
