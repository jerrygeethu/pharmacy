<?php



include_once('noca.php');
include_once('rcq.php');

$PEmail1 = $HTTP_POST_VARS['email1'];
$PEmail2 = $HTTP_POST_VARS['email2'];
$PEmail3 = $HTTP_POST_VARS['email3'];
$CCode = FilterString($HTTP_POST_VARS['ccode'],'NUMBER');
$PFromEmail = $HTTP_POST_VARS['fromemail'];


$subject = "Chat Transcript - ".$CONF['conf_GCompanyName'];

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
$res = mysql_query("SELECT * from cs WHERE ccode=\"$CCode\"",$dbh);
$UINFO = array();
while($row = mysql_fetch_array($res))
{
	$UINFO = $row;
	break;
}
mysql_close($dbh);

if($CCode=='' || $UINFO['ccode']!=$CCode)
{
	echo "pr_s=s&ctrans_sema=1&pstatus=Error Sending Email, Chat trans not found&pr_e=e";
	return;
}


$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
$res = mysql_query("SELECT * from msgdb WHERE ccode=\"$CCode\" ORDER BY ttime DESC ",$dbh);
$CHStartTime = 0;
while($row = mysql_fetch_array($res))
{
	if($row['msg']=='EOw3OkAE062f8628bz2y7v47vmW85q4c_1')
	{
		$CHStartTime = $row['ttime'];
		break;
	}
}
mysql_close($dbh);

$CHTR = array();
$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
$res = mysql_query("SELECT * from msgdb WHERE ccode=\"$CCode\" AND ttime>=$CHStartTime ORDER BY ttime ",$dbh);
$CHStart = false;
$CHEndTime = 0;
while($row = mysql_fetch_array($res))
{
	if($row['msg']=='EOw3OkAE062f8628bz2y7v47vmW85q4c_1')
	{
		$CHStart = true;
		continue;
	}
	if($CHStart)
	{
		if(substr($row['msg'],0,strlen('EOw3OkAE062f8628bz2y7v47vmW85q4c'))!='EOw3OkAE062f8628bz2y7v47vmW85q4c')
		{
			list($N1,$MsgLang,$Msg) = explode(":4-|ln|_4:",$row['msg']);
			$CHTR[$row['ttime']] = array("dir"=>$row['code1'],"msg"=>$Msg,"msglang"=>$MsgLang);
			$CHEndTime = $row['ttime'];
		}
	}
}
mysql_close($dbh);

$TRSTR = "";
foreach($CHTR as $ttime=>$CHT)
{
	$Writer = 'System: ';
	switch($CHT['dir'])
	{
		case 1:
			$Writer = 'Staff: ';
			break;
		case 2:
			$Writer = 'Client: ';
			break;
	}
	$TRSTR .= ($Writer.$CHT['msg']."\n");
}


$CHStartTimeDisplay = date("d-M-Y H:i:s T",$CHStartTime) . " (".gmdate("d-M-Y H:i:s T",$CHStartTime).")";
$CHEndTimeDisplay = date("d-M-Y H:i:s T",$CHEndTime) . " (".gmdate("d-M-Y H:i:s T",$CHEndTime).")";


$PMsg = $TRSTR;

$PMsg = str_replace(array(chr(92).chr(39),chr(92).chr(34)),array(chr(39),chr(34)),$PMsg);

if($CONF['conf_PlainTextEmail']==1)
{
	$headers  = "";

	$PMsg = str_replace(array(chr(92).chr(39),chr(92).chr(34)),array(chr(39),chr(34)),$PMsg);
	$PMsg = htmlspecialchars($PMsg);
	$PMsg = str_replace("&amp;","&",$PMsg);
	$message  = "Name: ".$UINFO['name']."\n";
	$message  = "Email: ".$UINFO['email']."\n";
	$message  = "IP: ".$UINFO['ip']."\n";
	$message  = "Start Time: ".$CHStartTimeDisplay."\n";
	$message  = "End Time: ".$CHEndTimeDisplay."\n";
	$message .= "------------------------------------------------------------\n";
	$message .= "$PMsg\n";
	$message .= "------------------------------------------------------------\n";
	$message .= "Powered by phpOnline v".$phpOnlineVer."\n";
}
else
{
	$PMsg = nl2br(htmlspecialchars($PMsg));
	$PMsg = str_replace("&amp;","&",$PMsg);
	$message = "<html><head><title>$subject</title></head><body><P>Name: ".utf8_encode($UINFO['name'])."<BR>IP: ".$UINFO['ip']."<br>Start Time: ".$CHStartTimeDisplay."<br>End Time: ".$CHEndTimeDisplay."<br>------------------------------------------------------------</p><P>".utf8_encode($PMsg)."</p><p>------------------------------------------------------------<br>Powered by phpOnline v".$phpOnlineVer."</p></body></html>";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
}


$headers .= "From: ".$PFromEmail."\r\n";
$PStatus = "<p>";
$AtLeastOneEmail = false;
if($PEmail1!='')
{
	if(mail($PEmail1, $subject, $message, $headers))
		$PStatus .= "Email to ".$PEmail1." => sent.<br>";
	else
		$PStatus .= "Email to ".$PEmail1." => FAILED.<br>";
	$AtLeastOneEmail = true;
}
if($PEmail2!='')
{
	sleep(1);
	if(mail($PEmail2, $subject, $message, $headers))
		$PStatus .= "Email to ".$PEmail2." => sent.<br>";
	else
		$PStatus .= "Email to ".$PEmail2." => FAILED.<br>";
	$AtLeastOneEmail = true;
}

if($PEmail3!='')
{
	sleep(1);
	if(mail($PEmail3, $subject, $message, $headers))
		$PStatus .= "Email to ".$PEmail3." => sent.<br>";
	else
		$PStatus .= "Email to ".$PEmail3." => FAILED.<br>";
	$AtLeastOneEmail = true;
}
if($AtLeastOneEmail==false)
	$PStatus .= "No email has sent.";
$PStatus .= "</p>";
sleep(1);



echo "pr_s=s&ctrans_sema=1&pstatus=$PStatus&pr_e=e";


?>