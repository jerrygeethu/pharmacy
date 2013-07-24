<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; Drug Information</div>
<div class="clear"></div>

<div id="frame" style="display:none;">
</div>

<div id="createaccount_outer">
<div id="refill_outer">
<div id="createaccount_head">Search Results</div>
<div id="createaccount_line"></div>
<!--<div id="createaccount_desc">
	
    <div class="druglink01"><a href="<?php //echo $base;?>index.php/drugs/druginformation">Druginformation</a></div>
</div>-->

<div id="drug_outer">
<div id="alphabet_outer">

<div id="alpha_left">
<div id="alpha_inner">
<div class="alpha_head">Browse alphabetically</div>
<div class="clear"></div>
<div class="alpha_outer">
<?php foreach(range('a','z') as $i) 
 { ?><div class="alphabet"><a href="<?php echo $base;?>index.php/drugs/alphadrug/<?php echo $i;?>"><?php echo $i;?></a></div>
<?php

}?>
</div>
</div>
</div>

<div id="alpha_right">
	<div id="alpha_rightinner">
		<div class="alpha_head">Search Drugname</div>
		<form action="<?php echo $base;?>index.php/drugs/search" method="post">
			<div id="drugtext_outer">
  				<input type="text" name="drug" id="drug" class="drugtextarea" value="drug name" onblur="if (this.value=='') 				{ this.value='drug name'; }" onfocus="if (this.value=='drug name') { this.value=''; }" />
			</div>
				<div id="drug_btn"><input type="submit" name="submit" id="submit" value="Search" class="button1" /></div>
		 </form>
		<div class="alpha_head">Check Drug Interaction</div>
		<form action="<?php echo $base;?>index.php/drugs/search" method="post">
			<div id="drugtext_outer1">
  				<input type="text" name="drug" id="drug" class="drugtextarea" value="drug name" onblur="if (this.value=='') 				{ this.value='drug name'; }" onfocus="if (this.value=='drug name') { this.value=''; }" />
			</div>
				<div id="drug_btn"><input type="submit" name="submit" id="submit" value="Search" class="button1" /></div>
		 </form>
		</div>
	</div>
    

    
</div>


</div>
<div class="drug_add"></div>
<div class="clear"></div>
<div id="drugnames01">
<div id="most_common">Select a medication by clicking on its name in the list below</div>
<div id="most_line"></div>
<div class="clear"></div>
<div id="scroll_druginformation"> 
<ul>
<?php

foreach($drugs->result() as $dr)
{ ?>


<li><a href="<?php echo $base;?>index.php/drugs/dosage/<?php echo $dr->drugsid;?>"><?php echo $dr->medication;?></a></li>

 
<?php }?>

</ul>
    
    </div>
</div>
 
 
<div id="drugright_add">
<div id="add_space"></div>
</div>   
   
     
     
</div>

</div>

<div class="clear"></div>


</div>
