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
<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Online Shop</div>
<div class="clear"></div>
<div id="frame" style="display:none;"></div>

<div id="consultation_outer">
	<div id="refill_outer">
		<div id="createaccount_head">Online Shop</div>
		<div id="createaccount_line"></div>
		<div id="createaccount_desc"> Whether you’re searching for household items or natural products – skin care, beauty products or vitamins, you can shop the Mainstreet pharmacy online store by department, brand or category. </div>
		<div id="online_outer">
			<div id="left_online">
				<div id="onlineshop_cate">
					<div id="shop_cate">
						<div id="shop_head">Product Categories</div>
						<?php   
							if(!empty($category))
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
<!---------------------begin:categories------------------------->
			<div class="categories_outer">
				<?php 
					$counts=$main->num_rows; 
					$va=$main->result();  
					$i=0;
					$sh=1;
					if($counts%3==0)
					{	
					while($counts>$i)
					{							
				?>
					<div class="productcategories_mainouter" id='<?php echo $va[$i]->id;?>'>
						<div class="productcategories_outer">
							<div class="productcategories_head2">
								<a href="#"><?php echo $va[$i]->category;?></a>
							</div>
							<div class="categories_img" >
								<div align="center">
									<img style="border:1px solid #a7b5be;" src="<?php echo $base;?>images/category/<?php echo $va[$i]->image;?>" width="74" height="74" />
								</div>
							</div>
							<?php
							$id=$va[$i]->id;
							$cnt=count($cats[$id]);
							if($cnt>4)
							{
							?>
							<div class="productcategories">
							<a id="<?php echo $va[$i]->hash;?>">
							<ul>
							<?php 
							$id=$va[$i]->id;
							$count=count($cats[$id]);
							for($j=0;$j<4;$j++)
							{
								$ct=$cats[$id][$j];
								if($ct->mainid==$va[$i]->id)
								{             
							?>
							<li>  
							<a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a> 
							</li>
							<?php 
								} 
							}
							?>
						</ul>
					</a>
					<a href="" id="p<?php echo $sh;?>-show" class="showLink" onclick="showHide('p<?php echo $sh;?>');return false;"><pre> Show more...</pre></a></p>
					<div id="p<?php echo $sh;?>" class="show_hide">
													<div class="productcategories">
														<a id="<?php echo $va[$i]->hash;?>">
															<ul>
																<?php 
																	$id=$va[$i]->id;
																	$count=count($cats[$id]);
																	for($j=4;$j<$count;$j++)
																	{
																		$ct=$cats[$id][$j];
																		if($ct->mainid==$va[$i]->id)
																		{             
																?>
																			<li>  
																				<a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a> 
																			</li>
																<?php 
																		} 
																	}
																?>
															</ul>
														</a>
													</div>
													<p><a href="" id="p<?php echo $sh;?>-hide" class="hideLink" onclick="showHide('p<?php echo $sh;?>');return false;"><pre> Hide</pre></a></p>
												</div>
											</div>		
									<?php
										}
										else
										{
									?>
											<div class="productcategories">
												<a id="<?php echo $va[$i]->hash;?>">
													<ul>
														<?php 
															$id=$va[$i]->id;
															$count=count($cats[$id]);
															for($j=0;$j<$count;$j++)
															{
																$ct=$cats[$id][$j];
																if($ct->mainid==$va[$i]->id)
																{             
														?>
																	<li>  
																		<a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a> 
																	</li>
														<?php 
																} 
															}
														?>
													</ul>
												</a>
											</div>
									<?php
										}
									?>							
								</div>
								<div class="productcategories_outer">
									<div class="productcategories_head2"><a href="#"><?php echo $va[$i+1]->category;?></a></div>
									<div class="categories_img" >
										<div align="center"><img style="border:1px solid #a7b5be;" src="<?php echo $base;?>images/category/<?php echo $va[$i+1]->image;?>" width="74" height="74" /></div>
									</div>
									<?php
										$id=$va[$i+1]->id;
										$cnt=count($cats[$id]);
										if($cnt>4)
										{
									?>
											<div class="productcategories">
												<ul>
													<?php 
														$id=$va[$i+1]->id;
														$count=count($cats[$id]);
														for($j=0;$j<4;$j++)
														{
															$ct=$cats[$id][$j];
															if($ct->mainid==$va[$i+1]->id)
															{              
													?>
																<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
													<?php 
															} 
														}  
													?>
												</ul>
												<a href="" id="q<?php echo $sh;?>-show" class="showLink" onclick="showHide('q<?php echo $sh;?>');return false;"><pre> Show more...</pre></a></p>
												<div id="q<?php echo $sh;?>" class="show_hide">
													<div class="productcategories">
														<ul>
															<?php 
																$id=$va[$i+1]->id;
																$count=count($cats[$id]);
																for($j=4;$j<$count;$j++)
																{
																	$ct=$cats[$id][$j];
																	if($ct->mainid==$va[$i+1]->id)
																	{              
															?>
																		<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
															<?php 
																	} 
																}  
															?>
														</ul>												
														<p><a href="" id="q<?php echo $sh;?>-hide" class="hideLink" onclick="showHide('q<?php echo $sh;?>');return false;"><pre> Hide</pre></a></p>												
													</div>
												</div>
											</div>
									<?php
										}
										else
										{
									?>
											<div class="productcategories">
												<ul>
													<?php 
														$id=$va[$i+1]->id;
														$count=count($cats[$id]);
														for($j=0;$j<$count;$j++)
														{
															$ct=$cats[$id][$j];
															if($ct->mainid==$va[$i+1]->id)
															{              
													?>
																<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
													<?php 
															} 
														}  
													?>
												</ul>
											</div>
									<?php
										}
									?>
									
								</div>
								<div class="productcategories_outer">
									<div class="productcategories_head2"><a href="#"><?php echo $va[$i+2]->category;?></a></div>
									<div class="categories_img" >
										<div align="center"><img style="border:1px solid #a7b5be;" src="<?php echo $base;?>images/category/<?php echo $va[$i+2]->image;?>" width="74" height="74" /></div>
									</div>
									<?php
										$id=$va[$i+2]->id;
										$cnt=count($cats[$id]);
										if($cnt>4)
										{
									?>
											<div class="productcategories">
												<ul>
													<?php 
														$id=$va[$i+2]->id;
														$count=count($cats[$id]);
														for($j=0;$j<4;$j++)
														{
															$ct=$cats[$id][$j];
															if($ct->mainid==$va[$i+2]->id)
															{              
													?>
																<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
													<?php
															} 
														}  
													?>
												</ul>
												<a href="" id="r<?php echo $sh;?>-show" class="showLink" onclick="showHide('r<?php echo $sh;?>');return false;"><pre> Show more...</pre></a></p>
												<div id="r<?php echo $sh;?>" class="show_hide">
													<div class="productcategories">
														<ul>
															<?php 
																$id=$va[$i+2]->id;
																$count=count($cats[$id]);

																for($j=4;$j<$count;$j++)
																{
																	$ct=$cats[$id][$j];
																	if($ct->mainid==$va[$i+2]->id)
																	{              
															?>
																		<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
															<?php
																	} 
																}  
															?>
														</ul>
													</div>
													<p><a href="" id="r<?php echo $sh;?>-hide" class="hideLink" onclick="showHide('r<?php echo $sh;?>');return false;"><pre> Hide</pre></a></p>
												</div>											
											</div>
									<?php
										}
										else
										{
									?>
											<div class="productcategories">
												<ul>
													<?php 
														$id=$va[$i+2]->id;
														$count=count($cats[$id]);

														for($j=0;$j<$count;$j++)
														{
															$ct=$cats[$id][$j];
															if($ct->mainid==$va[$i+2]->id)
															{              
													?>
																<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
													<?php
															} 
														}  
													?>
												</ul>
											</div>
									<?php
										}
									?>
									
									
								</div>
							</div> 
							<div class="clear"></div>

				<?php
							$i=$i+3;
							$sh++;
						}
					} 
					else if($counts%3==2)
					{ 						
				?>
						<div class="productcategories_mainouter"  id='<?php echo $va[$i]->id;?>'>
							<div class="productcategories_outer">
								<div class="productcategories_head2"><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $va[$i]->id;?>"><?php echo $va[$i]->category;?></a></div>
								<div class="categories_img" >
									<div align="center"><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $va[$i]->id;?>"><img style="border:1px solid #a7b5be;" src="<?php echo $base;?>images/category/<?php echo $va[$i]->image;?>" width="74" height="74" /></a></div>
								</div>
								<?php
									$id=$va[$i]->id;
									$cnt=count($cats[$id]);
									if($cnt>4)
									{
								?>
										<div class="productcategories">
											<ul>
												<?php 
													$id=$va[$i]->id;
													$count=count($cats[$id]);
													for($j=0;$j<4;$j++)
													{
														$ct=$cats[$id][$j];
														if($ct->mainid==$va[$i]->id)
														{              
												?>
															<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id; ?>"><?php echo $ct->subcategory; ?></a></li>
												<?php 
														} 
													} 
												?>
											</ul>
											<a href="" id="a<?php echo $sh;?>-show" class="showLink" onclick="showHide('a<?php echo $sh;?>');return false;"><pre> Show more...</pre></a></p>
											<div id="a<?php echo $sh;?>" class="show_hide">
												<div class="productcategories">
													<ul>
														<?php 
															$id=$va[$i]->id;
															$count=count($cats[$id]);
															for($j=4;$j<$count;$j++)
															{
																$ct=$cats[$id][$j];
																if($ct->mainid==$va[$i]->id)
																{              
														?>
																	<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id; ?>"><?php echo $ct->subcategory; ?></a></li>
														<?php 
																} 
															} 
														?>
													</ul>
												</div>
												<p><a href="" id="a<?php echo $sh;?>-hide" class="hideLink" onclick="showHide('a<?php echo $sh;?>');return false;"><pre> Hide</pre></a></p>
											</div>											
										</div>
								<?php
									}
									else
									{
								?>
										<div class="productcategories">
											<ul>
												<?php 
													$id=$va[$i]->id;
													$count=count($cats[$id]);
													for($j=0;$j<$count;$j++)
													{
														$ct=$cats[$id][$j];
														if($ct->mainid==$va[$i]->id)
														{              
												?>
															<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id; ?>"><?php echo $ct->subcategory; ?></a></li>
												<?php 
														} 
													} 
												?>
											</ul>
										</div>
								<?php
									}
								?>
							</div>
							<div class="productcategories_outer">
								<div class="productcategories_head2"><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $va[$i+1]->id;?>"><?php echo $va[$i+1]->category;?></a></div>
								<div class="categories_img" >
									<div align="center"><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $va[$i+1]->id;?>"><img style="border:1px solid #a7b5be;" src="<?php echo $base;?>images/category/<?php echo $va[$i+1]->image;?>" width="74" height="74" /></a></div>
								</div>
								<?php
									$id=$va[$i+1]->id;
									$cnt=count($cats[$id]);
									if($cnt>4)
									{
								?>
										<div class="productcategories">
											<ul>
												<?php 
													$id=$va[$i+1]->id;
													$count=count($cats[$id]);
													for($j=0;$j<4;$j++)
													{
														$ct=$cats[$id][$j];
														if($ct->mainid==$va[$i+1]->id)
														{              
												?>
															<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
												<?php 
														} 
													}  
												?>
											</ul>
										</div>
										<a href="" id="b<?php echo $sh;?>-show" class="showLink" onclick="showHide('b<?php echo $sh;?>');return false;"><pre> Show more...</pre></a></p>
										<div id="b<?php echo $sh;?>" class="show_hide">
											<div class="productcategories">
												<ul>
													<?php 
														$id=$va[$i+1]->id;
														$count=count($cats[$id]);
														for($j=4;$j<$count;$j++)
														{
															$ct=$cats[$id][$j];
															if($ct->mainid==$va[$i+1]->id)
															{              
													?>
																<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
													<?php 
															} 
														}  
													?>
												</ul>
											</div>
											<p><a href="" id="b<?php echo $sh;?>-hide" class="hideLink" onclick="showHide('b<?php echo $sh;?>');return false;"><pre> Hide</pre></a></p>
										</div>
								<?php
									}
									else
									{
								?>
										<div class="productcategories">
											<ul>
												<?php 
													$id=$va[$i+1]->id;
													$count=count($cats[$id]);
													for($j=0;$j<$count;$j++)
													{
														$ct=$cats[$id][$j];
														if($ct->mainid==$va[$i+1]->id)
														{              
												?>
															<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
												<?php 
														} 
													}  
												?>
											</ul>
										</div>
								<?php
									}
								?>
							</div>
						</div>
						<div class="clear"></div>
				<?php  
					}
					else
					{
				?>
						<div class="productcategories_mainouter"  id='<?php echo $va[$i]->id;?>'>
							<div class="productcategories_outer">
								<div class="productcategories_head2"><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $va[$i]->id;?>"><?php echo $va[$i]->category;?></a></div>
								<div class="categories_img" >
									<div align="center"><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $va[$i]->id;?>"><img style="border:1px solid #a7b5be;" src="<?php echo $base;?>images/category/<?php echo $va[$i]->image;?>" width="74" height="74" /></a></div>
								</div>
								<div class="productcategories">
									<ul>
										<?php 
											$id=$va[$i]->id;
											$count=count($cats[$id]);
											for($j=0;$j<$count;$j++)
											{
												$ct=$cats[$id][$j];
												if($ct->mainid==$va[$i]->id)
												{              
										?>
													<li><a href="<?php echo $base;?>index.php/onlineshop/product/<?php echo $ct->id;?>"><?php echo $ct->subcategory; ?></a></li>
										<?php 
												} 
											} 
										?>
									</ul>
								</div>
							</div> 
						</div> 
						<div class="clear"></div>
				<?php 
					}
				?>
			</div>
			<div class="clear"></div>
<!---------------------end:categories-------------------------> 
			<div id="tnt_pagination"><?php print_r($page);?> </div>
			<div id="offer"><img src="<?php echo $base;?>images/buy2.jpg" height="148" /></div> 
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
</div>
<div class="clear">

</div>
<style type="text/css">
   
   /* This CSS is used for the Show/Hide functionality. */
   .show_hide {
      display: none;
	  height:auto;
	  }
   a.showLink, a.hideLink {
   width:100px;
      text-decoration: none;
	  font-size:13px;
      color: #c8070d;
      padding-left: 8px;
	  float:right;
      background: transparent url(<?php echo $base.'images/';?>down.gif) no-repeat left; }
   a.hideLink {
   height:auto;
      background: transparent url(<?php echo $base.'images/';?>up.gif) no-repeat left; }
</style>
<script language="javascript" type="text/javascript">
function showHide(shID) {
   if (document.getElementById(shID)) {
      if (document.getElementById(shID+'-show').style.display != 'none') {
         document.getElementById(shID+'-show').style.display = 'none';
         document.getElementById(shID).style.display = 'block';
      }
      else {
         document.getElementById(shID+'-show').style.display = 'inline';
         document.getElementById(shID).style.display = 'none';
      }
   }
}
</script>
