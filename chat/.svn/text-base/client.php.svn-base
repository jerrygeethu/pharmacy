<?php



include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_COOKIE_VARS['ocode'],'NUMBER');

if($CCode == "")
{
	$CCode = time() . rand(111111,999999);
	setcookie("ocode", $CCode, time()+31536000);
}

?>
<HTML>
<HEAD>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name="Description" content="Live Customer Support, Free live support, free 24x7 live customer support">
<TITLE>Mainstreet Live Chat</TITLE>
</HEAD>
<BODY bgcolor="#FFFFFF" topmargin="0" leftmargin="0">
<div>
	<div><img src="images/msp2.jpg"/></div>
	<?php echo phpOnlineGetFlashCode('cs');?>
</div>

	<!--<table border="0" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFC0CB" width="100px" id="AutoNumber4" height="100px">
  	<tr>
	<td><img src="images/msp.jpg"/></td>
	<td><img src="images/msp2.jpg"/></td>
	</tr><tr>
	<td width="100%" align="center">
	<table border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="477px" id="AutoNumber2">
	  <tr>
	    </tr>
	    </table>
	</tr>
	    </table>
	  <!--<td width="70" rowspan="5"></td>
      <td  rowspan="5">&nbsp;<img src="images/msp.jpg"/></td>
      <td colspan="5" height="5"></td>
      </tr>
	  <tr>
	    <td colspan="5"><img src="images/msp2.jpg"/></td>
      </tr>
      
       <tr>
      <td width="31" height="30">&nbsp;</td>
      <td width="78">&nbsp;</td>
      <td width="13">&nbsp;</td>
      <td width="274">&nbsp;</td>
      <td width="25">&nbsp;</td>
      </tr>
     
       <tr>
      <td width="31">&nbsp;</td>
      <td width="78">NickName</td>
      <td width="13">:</td>
      <td width="274"><input type="text"/></td>
      <td width="25">&nbsp;</td>
      </tr>
       <tr>
         <td>&nbsp;</td>
         <td>E-mail</td>
         <td>:</td>
         <td><input type="text"/></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td></td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td><input type="submit" value="chat" style="width:100px; "/>

         </td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td></td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
</table>-->

</BODY>
</HTML>
