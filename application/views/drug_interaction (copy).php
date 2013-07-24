<div class="navigation"><a href="<?php echo $base;?>index.php">Home</a> &rsaquo;&rsaquo; <a href="<?php echo $base;?>index.php/drugs/druginformation">Drug Information</a> &rsaquo;&rsaquo; Drug Interaction</div>

	<div class="clear"></div>
	<div id="frame" style="display:none;"></div>
	<div id="consultation_outer">
		<div id="refill_outer">
			<form name="frm">
				<div id="createaccount_head">Pharmacy Drug Interaction</div>
				<div id="createaccount_line"></div>	
				
					<?php
						if(!empty($drugname_oral))
						{
					?>		<div style="float:left;" class="popup">
								<a href='' onclick='javascript:openwindow("<?php echo $a1;?>")'><?php echo $drugname_oral;?></a>
							</div>
					<?php		
						}
						echo "<br/>";
						if(!empty($drugname_injection))
						{
					?>	
							<div style="float:left;" class="popup">
								<a href='' onclick='javascript:openwindow("<?php echo $v1;?>")'><?php echo $drugname_injection;?></a>
							</div>
					<?php	
						}
					?>
									
			</form>
			
			<!--<div style="width:100%;">
				<?php
/*
					if(!empty($drugname_oral))
					{
*/
				?>		<div style="float:left;" class="popup">
							<a href="<?php //echo $base;?>drugInteraction/<?php //echo $a1;?>" onclick="return iframe('ifrm', this.href)"><?php //echo $drugname_oral;?></a>
						</div>
				<?php		
/*
					}
					echo "<br/>";
					if(!empty($drugname_injection))
					{
*/
				?>	
						<div style="float:left;" class="popup">
							<a href="<?php //echo $base;?>drugInteraction/<?php //echo $v1;?>" onclick="return iframe('ifrm', this.href)"><?php //echo $drugname_injection;?></a>
						</div>
				<?php	
					//}
				?>
			</div>
			
			<div style="float:left;">
				<iframe name="ifrm" id="ifrm" src="<?php //echo $base;?>index.php/drugs/druginteraction/<?php //echo $id;?>" frameborder="0" noresize="noresize" scrolling="auto" height="500px" width="1000px" marginwidth="5" marginheight="5" >dfsd</iframe>
			</div>-->
		</div>
	</div>
	</div>
	<div class="clear">
</div>
<script language="javascript">
function openwindow(id)
{
	//alert(id);
	window.open("<?php echo $base;?>drugInteraction/"+id,"_blank","height=700,width=800,status=yes,toolbar=no,scrollbars=yes,menubar=no,location=yes");
}
</script>
<script type="text/javascript">
/*
	function iframe(id, url) 
	{
		if (!document.getElementById) 
		return;
		var el = document.getElementById(id);
		if (el && el.src) 
		{
			el.src = url;
			return false;
		}
		return true;
	}
*/
</script>
