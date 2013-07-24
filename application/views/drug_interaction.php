<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/druginformation">Drug Information</a> &rsaquo;&rsaquo; Drug Interaction</div>

<?php 
	$eng=explode(",", $english);
	$span=explode(",", $spanish);
?>


	<div class="clear"></div>
	<div id="frame" style="display:none;"></div>
	<div id="consultation_outer">
		<div id="refill_outer">
			<form name="frm">
				<div id="createaccount_head">Pharmacy Drug Interaction</div>
				<div id="createaccount_line"></div>	
					<?php 
						if(!empty($english))
						{
					?>
							<div style="float:left;width:999px;height:200px;" class="popup">
								<div style="font-style:italic;font-weight:normal;">English &rsaquo;&rsaquo;</div><br/>
								<?php 
									for($i=0;$i<count($eng);$i++)
									{
								?>
										<a href='' onclick='javascript:openwindow("<?php echo $eng[$i];?>")'><?php echo $drugname;?></a><br/>
								<?php
									}
								?>
							</div>
					<?php
						}
						else
						{
							
					?>
							<div style="float:left;width:999px;height:200px;font-style:italic;" class="popup">Search Result not Fount</div>
					<?php
						}
						if(!empty($spanish))
						{
					?>
							<div style="float:left;width:999px;height:200px;" class="popup">
								<div style="font-style:italic;font-weight:normal;">Spanish &rsaquo;&rsaquo;</div><br/>
								<?php 
									for($j=0;$j<count($span);$j++)
									{
								?>
										<a href='' onclick='javascript:openwindow("<?php echo $span[$j];?>")'><?php echo $drugname;?></a><br/>
								<?php
									}
								?>
							</div>
					<?php
						}
					?>									
			</form>
			
		</div>
	</div>
	</div>
	<div class="clear">
</div>
<div>
<div class="push"></div>
<script language="javascript">
function openwindow(id)
{
	//alert(id);
	window.open("<?php echo $base;?>drugInteraction/"+id,"_blank","height=700,width=800,status=yes,toolbar=no,scrollbars=yes,menubar=no,location=yes");
}
</script>
