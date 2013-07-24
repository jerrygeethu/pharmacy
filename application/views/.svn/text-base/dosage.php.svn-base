<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/druginformation">Drug Information</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/alphadrug/<?php echo $this->session->userdata('string'); ?>"><?php echo ucfirst($drug->medication);?></a> &rsaquo;&rsaquo; Dosage</div>
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


<div id="dosage_outer">
<div id="most_common">Dosage</div>
<div id="most_line"></div>
<div class="clear"></div>
<div class="dosage">Select a dosage form below to view full drug information.<br/>
If a generic equivalent is available, it will also be displayed.</div>
<div class="alpha">
<ul>

<?php foreach($drugs->result() as $dr)
{ ?>
<li><a href="<?php echo $base;?>index.php/drugs/detaildrug/<?php echo $dr->GENPRODUCT_ID;?>"><?php echo $dr->GENERIC_PRODUCT_NAME;?></a></li>

<?php  }?>



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
