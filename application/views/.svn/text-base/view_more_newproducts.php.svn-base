<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
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
function submitform()
	{
		document.forms["Product_fetch"].submit();
	}
</script>
    



<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a>&nbsp;&nbsp;>> New Products</div>
<div class="clear"></div>
<div id="frame" style="display:none;"></div>
<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">New Products</div>
<div id="createaccount_line"></div>
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
   if(!empty($product_image['result']))
   {
		foreach($product_image['result'] as $product1)
		{
?>
			<div class="product_outer">
             	<div class="product_head"><?php echo $product1->internetdesc;?></div>
                <div class="product_img">
                  <div align="center" class="product_desc"><a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $product1->hamcode;?>"><img src="<?php echo $base;?>images/products/<?php echo $product1->hamcode.'.Jpg';?>" alt="Product Image"/></a></div>
                </div>
                <div class="product_desc"><a href="<?php echo $base;?>index.php/onlineshop/items/<?php echo $product1->hamcode;?>"><?php echo $product1->description;?></a></div>
                
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
<div id="tnt_pagination"><?php echo $link;?></div>
<div id="offer"><img src="<?php echo $base;?>images/buy2.jpg" height="148" /></div>    
</div>        
<div class="clear"></div>  
</div>
</div>
</div>
</div>
