<script type="text/javascript" src="<?php echo $base;?>js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 560;
  var slides = $('.slide');
  var numberOfSlides = slides.length;

  // Remove scrollbar in JS
  $('#slidesContainer').css('overflow', 'hidden');

  // Wrap all .slides with #slideInner div
  slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
	.css({
      'float' : 'left',
      'width' : slideWidth
    });

  // Set #slideInner width equal to total width of all slides
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // Insert controls in the DOM
  $('#slideshow01')
    .prepend('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="rightControl">Clicking moves right</span>');

  // Hide left arrow control on first load
  manageControls(currentPosition);

  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){
    // Determine new position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	// Hide / show controls
    manageControls(currentPosition);
    // Move slideInner using margin-left
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }	
});
</script>
<script>
	function submitform()
	{
		document.forms["Product_fetch"].submit();

	}
</script>  

<?php
	$arr=explode("+",$prod);
	$arr2=implode(" ", $arr);
?>

<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop">Online Shop</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $this->session->userdata('category_id');?>"><?php echo $this->session->userdata('category_name');?></a> &rsaquo;&rsaquo; <?php echo $arr2;?></div>
<div class="clear"></div>
<div id="frame" style="display:none;"></div>
<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head1"><?php echo $arr2;?></div>
<div id="createaccount_line"></div>
<div id="createaccount_desc">Looking for <?php echo $arr2;?> product? Browse the Main Street Pharmacy <?php echo $arr2;?> aisle.</div>
<form name="Product_fetch" id="Product_fetch" method="post" action="<?php echo current_url();?>">

<span style="padding-left:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;"> Sort by</span>
<select onchange="javascript:submitform()" name="sort_by">
<?php 
if($sort=="ASC")
{?>
	<option value="ASC" selected="selected">Name A-Z</option>
	<option value="DESC">Name Z-A</option>
<?php }
else if($sort=="DESC")
{?>
	<option value="ASC">Name A-Z</option>
	<option value="DESC" selected="selected">Name Z-A</option>
<?php }
else
{
?>
	<option value="ASC" selected="selected">Name A-Z</option>
	<option value="DESC">Name Z-A</option>
<?php }?>
</select>
<span style="padding-left:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">Items per page</span>
<select name="noperpage" onchange="javascript:submitform()">
<?php $number=array('12','24','48','96');
for($r=0;$r<count($number);$r++)
{?>
	<option <?php if($noperpage==$number[$r]){?> selected="selected"<?php }?>>
	<?php echo $number[$r]."</br>";?>
	</option>
<?php }?>
<option value="<?php echo $count;?>" <?php if($noperpage==$count){?> selected="selected"<?php } ?>>All</option>
</select>
</form>
<div id="online_outer">
	<div id="left_online">
      	<div id="onlineshop_cate">
        	<div id="shop_cate">
            <div id="shop_head">Product Categories</div>
               <?php if(!empty($category))
  						{ 
	  						foreach($category->result() as $cat)
	  						{
		  		?>
								<div class="cate_name"><a href="<?php echo $base;?>index.php/onlineshop/index/<?php echo $cat->id;?>/0/#<?php echo $cat->id;?>"><?php echo $cat->category;?></a></div> 
               <?php
	 						}
  						}  
  			   ?>
           </div>
       </div>
	   
	   
 <div id="slideshow01">
    <div id="slidesContainer">
      <div class="slide">
       <div class="img"><img src="<?php echo $base;?>images/adds/img2.jpg"></div>
      </div>
      <div class="slide">
        <div class="img"><img src="<?php echo $base;?>images/adds/img3.jpg" /></div>
      </div>
      <div class="slide">
        <div class="img"><img src="<?php echo $base;?>images/adds/img4.jpg" /></div>
      </div>
      <div class="slide">
        <div class="img"><img src="<?php echo $base;?>images/adds/img5.jpg" /></div>
      </div>
    </div>
 </div> 
      
</div>
<div style="width:710px; float:right;">
<?php 
   if(!empty($product_lst['result']))
   {
		foreach($product_lst['result'] as $product1)
		{
			
			$arr=explode($product1->brand,$product1->internetdesc);
	?>
			<div class="product_outer">
             	<div class="product_head"><?php echo $product1->internetdesc;//echo $arr[1];?></div>
                <div class="product_img">
                  <div align="center" class="product_desc"><a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $product1->hamcode;?>"><img src="<?php echo $base;?>images/products/<?php echo $product1->hamcode.'.Jpg';?>" alt="Product Image"/></a></div>
                </div>
                <div class="product_desc"><a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $product1->hamcode;?>"><?php echo $product1->description;?></a></div>
                <div class="product_desc"><a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $product1->hamcode;?>">Brand :<?php echo $product1->brand;?></a></div>
                <div class="product_price"><span class="price">Size/Count: <?php echo $product1->productsize.$product1->unitofmeasure;?></span></div>
                
			</div>
<?php 
		}
	}
else
{
?>
<p><?php echo "<p style=\"font-family:arial; font-size:15px; color:#000000;\">There is no  more Products Displayed.</p>";?></p>
<?php
}
?></div>
<div id="tnt_pagination">
<span class="disabled_tnt_pagination"><?php echo $links;?></span></div>
<div id="offer"><img src="<?php echo $base;?>images/buy2.jpg" height="148" /></div>    <div class="clear"></div> 
</div>        
</div>
</div>
</div>
</div>

