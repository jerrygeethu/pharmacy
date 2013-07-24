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
</script>
<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/onlineshop">Online Shop</a> &rsaquo;&rsaquo; <?php echo $categ->category;?></div>
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
                    
                	<?php   if(!empty($category))
  { 
	  foreach($category->result() as $cat)
	  {
		  ?>
                    <div class="cate_name"><a href="<?php echo $base;?>index.php/onlineshop/index/<?php echo $cat->id;?>/0/#<?php echo $cat->id;?>"><?php echo $cat->category;?></a>  </div> 
                      <?php
	  }
  }  
  ?>
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
           <div class="productcategories_mainouter1">
             <div id="final_categories">
        	<div id="box_head" style="width:700px;"><?php echo $categ->category;?></div>
            <div class="storelocator_main" style="width:690px; padding:10px;">
            	<div class="productcategories_outer" style="margin-right:0px;">
                <div class="productcategories"><ul>
                <?php 
					if(!empty($finestcategory))
					{
						foreach($finestcategory as $finestcategory1)
						{
							$finestcategory2 = explode(',',$finestcategory1['finestcategory']);
							for($i=0;$i<count($finestcategory2);$i++)
							{
					?>
							<a href="<?php echo $base;?>index.php/onlineshop/product_fetch/<?php echo $finestcategory1['finestcategoryId'];?>/<?php print urlencode($finestcategory2[$i]);?>"><li style="width:400px;"><?php print $finestcategory2[$i] ;?></li></a>
					<?php 
							}
						}
					}
					else
					{
						
					?>
                     </ul>
                     
                  </div>
             </div>
				<?php 
                  echo "<p style=\"font-family:arial; font-size:15px; color:#000000;\">This category has no more sub categories </p>";
					}
                  ?>
            </div>
            

            </div>
             </div>
           </div>
   </div>
   <!---------------------end:categories------------------------->
   <div id="offer" style="float:right;"><img src="<?php echo $base;?>images/buy2.jpg" height="148" width="100%"/></div>   
      
      
      </div>
              
              
	  <div class="clear"></div>
        
 <script type="text/javascript">
 jQuery(document).ready(function($){
		
$(".news-slider").jCarouselLite({
    btnNext: ".next",
    btnPrev: ".prev",
    vertical: true,
	visible: 2,
	circular: true
});

$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
	
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
	
		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	
	});	 
	
	
</script>
</body>
</html>
