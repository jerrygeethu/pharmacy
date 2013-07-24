<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; New Prescription</div>
<div class="clear"></div>
<div id="frame" style="display:none;">
</div>
<div id="createaccount_outer">
<div id="refill_outer">
<div id="createaccount_head">New Prescription Request</div>
<div id="createaccount_line"></div>
<div id="createaccount_desc">You can buy medicines online if you have the prescription from the doctor.  </div>

<div id="request">
  <div class="request_text">If you have the paper prescription written by your doctor:</div>
<div class="request_text">	1.Click continue to submit your request online</div>
<div class="request_text">	2.Once you have submitted your request online, you must mail us the paper prescription written by your doctor along with your order number to the address provided in the order confirmation.</div>

</div>

<div id="button_outer">

<div class="button_outer01">
<?php if($this->session->userdata('memberid')!="")
{ ?>
<a href="<?php echo $base;?>index.php/prescription/newprescription"><input type="submit" name="button" id="button" value="Continue" class="button" /></a>
<?php } 
else
{
?><a href="<?php echo $base;?>index.php/home/signin"><input type="submit" name="button" id="button" value="Continue" class="button" /></a>

<?php } ?>

</div>
<div class="button_outer01">
<a href="<?php echo $base;?>"><input type="submit" name="button" id="button" value="Cancel" class="button" /></a>
</div>
</div>

</div>

</div>
</div>
</div>
