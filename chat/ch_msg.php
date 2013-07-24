<?php


include_once('noca.php');
include_once('rcq.php');

$PName = DayanaDec($HTTP_POST_VARS['pname']);
$PEmail = DayanaDec($HTTP_POST_VARS['pemail']);
$PMsg = DayanaDec($HTTP_POST_VARS['pmsg']);


$to  = $CONF['conf_GEmailAddress'];
$subject = $CONF['conf_GEmailSubject'];

if($CONF['conf_PlainTextEmail']==1)
{
	$PMsg = str_replace(array(chr(92).chr(39),chr(92).chr(34)),array(chr(39),chr(34)),$PMsg);
	$PMsg = htmlspecialchars($PMsg);
	$PMsg = str_replace("&amp;","&",$PMsg);
	$message  = "Name: $PName\n";
	$message .= "Email: $PEmail\n";
	$message .= "------------------------------------------------------------\n";
	$message .= "$PMsg\n";
	$message .= "------------------------------------------------------------\n";
	$message .= "Powered by phpOnline v".$phpOnlineVer."\n";
}
else
{
	$PName2 = utf8_encode($PName);
	$PMsg = str_replace(array(chr(92).chr(39),chr(92).chr(34)),array(chr(39),chr(34)),$PMsg);
	$PMsg = nl2br(htmlspecialchars($PMsg));
	$PMsg = str_replace("&amp;","&",$PMsg);
	$PMsg = utf8_encode($PMsg);
	$message = "<html><head><title>$subject</title></head><body><P>Name: $PName2<BR>Email: $PEmail<br>------------------------------------------------------------</p><P>$PMsg</p><p>------------------------------------------------------------<br>Powered by phpOnline v".$phpOnlineVer."</p></body></html>";

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
}

$PEmail = str_replace(array("\n","\r","\n\r",";","<",">"),"",$PEmail);
$PName = str_replace(array("\n","\r","\n\r",";","<",">"),"",$PName);

$headers .= "From: $PName<$PEmail>\r\n";

$PMailStatus = 0;
if(mail($to, $subject, $message, $headers))
{
	$PMailStatus = 1;
}
else
{
	$PMailStatus = 2;
}


echo "pr_s=s&pmailstatus=$PMailStatus&pr_e=e";


?>