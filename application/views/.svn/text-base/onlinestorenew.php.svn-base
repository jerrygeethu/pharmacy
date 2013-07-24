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
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>

<div id="consultation_outer">
<div id="refill_outer">
<div id="createaccount_head">Online Shop</div>
<div id="createaccount_line"></div>
<div id="createaccount_desc"> Whether you’re searching for household items or natural products – skin care, beauty products or vitamins, you can shop the CVS/pharmacy online store by department, brand or category. </div>



<div id="online_outer">
	 		<div id="left_online">
      		<div id="onlineshop_cate">
            	<div id="shop_cate">
                	<div id="shop_head">Product Categories</div>
                	<?php foreach($category->result_array() as $product_category)
                	{?>
                    <div class="cate_name"><a href="<?php echo $base;?>/index.php/onlineshop/<?php echo $product_category['id']?>"><?php echo $product_category['category'];?></a></div>
					<?php } ?>
                </div>
            </div>
            
           <!-- <div id="online_adds"></div> -->
           
           
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
   
<!---------------------begin:categories------------------------->
   <div class="categories_outer">
           <div class="productcategories_mainouter">
              <div class="productcategories_outer">
              <?php foreach($main->result_array() as $main_category)
              { 
				 $count = count($main_category);
/*
				 if($count%3==0)
				 { 
*/
				  ?>
             	<div class="productcategories_head2"><a href="#"><?php echo $main_category['category']?></a></div>
                  <div class="categories_img" >
                     <div align="center"><a href="#"><img style="border:1px solid #a7b5be;" src="<?php echo $base;?>images/<?php echo $main_category['image'];?>" width="74" height="74" /></a></div>
                     </div>
                     <?php 
				 $count++;
				 }
/*
              }
*/
                     ?>
               </div>
           </div>

  </div>         
<!---------------------end:categories------------------------->   
<div id="tnt_pagination">
<span class="disabled_tnt_pagination">Prev</span><a href="#1">1</a><a href="#2">2</a><a href="#3">3</a><span class="active_tnt_link">4</span><a href="#5">5</a><a href="#6">6</a><a href="#7">7</a><a href="#8">8</a><a href="#9">9</a><a href="#10">10</a><a href="#forwaed">Next</a></div>

   <div id="offer"><img src="<?php echo $base;?>images/buy2.jpg" height="148" /></div>   
      
      
      </div>
              
              
	  <div class="clear"></div>
