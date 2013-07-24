<?php



include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_POST_VARS['ccode'],'NUMBER');
$LTime = FilterString($HTTP_POST_VARS['ltime'],'NUMBER');
$LanguageSel = $HTTP_POST_VARS['language_sel'];
$TTime = gmdate("U");
$MsgTemp = "";
//$DTime = doubleval($LTime);
$DTime = $LTime;

$getuptext = 0;
$uptext = "";
$WriteSignal = 0;
$FakeMsgTemp = 0;


$fst = GetCCodeStatus($CCode,"2");
if($fst==1)
{
	SetCCodeStatus($CCode, "0","2");

	$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
	mysql_select_db($DBDatabase,$dbh);
	$res = mysql_query("SELECT * FROM msgdb WHERE ccode=\"$CCode\" AND ttime>$LTime AND code1=1 AND code2=0 ORDER BY ttime ASC",$dbh);
	$res2= mysql_query("UPDATE msgdb SET code2=1 WHERE ccode=\"$CCode\" AND ttime>$LTime AND code1=1 AND code2=0 ORDER BY ttime ASC",$dbh);

	while($row = mysql_fetch_array($res))
	{
		if(substr($row["msg"],0,strlen('EOw3OkAE062f8628bz2y7v47vmW85q4c'))=='EOw3OkAE062f8628bz2y7v47vmW85q4c')
		{
			if($row["msg"]=='EOw3OkAE062f8628bz2y7v47vmW85q4c_1')
			{
				$getuptext = 1;
				$FakeMsgTemp = 1;
			}
			if($row["msg"]=='EOw3OkAE062f8628bz2y7v47vmW85q4c_2')
			{
				$WriteSignal = 1;
				$FakeMsgTemp = 1;
			}
			if($row["msg"]=='EOw3OkAE062f8628bz2y7v47vmW85q4c_3')
			{
				$WriteSignal = 2;
				$FakeMsgTemp = 1;
			}
			if($row["msg"]=='EOw3OkAE062f8628bz2y7v47vmW85q4c_7')
			{
				$WriteSignal = 7;
				$FakeMsgTemp = 1;
			}
			if($row["msg"]=='EOw3OkAE062f8628bz2y7v47vmW85q4c_8')
			{
				$WriteSignal = 8;
				$FakeMsgTemp = 1;
			}
			if($row["msg"]=='EOw3OkAE062f8628bz2y7v47vmW85q4c_9')
			{
				$WriteSignal = 9;
				$FakeMsgTemp = 1;
			}
			if(substr($row["msg"],0,strlen('EOw3OkAE062f8628bz2y7v47vmW85q4c_10'))=='EOw3OkAE062f8628bz2y7v47vmW85q4c_10')
			{
				$row["msg"] = htmlspecialchars(substr($row["msg"],strlen('EOw3OkAE062f8628bz2y7v47vmW85q4c_10')+1));
				if($CONF['conf_Right2Left']==1)				
					$MsgTemp .= ("<p align=\"right\"><b><font color=\"#FF0000\">".$row["msg"]." &lt;".$CONF['conf_GCompanyName']."</font></b></p>");
				else
					$MsgTemp .= ("<p><b><font color=\"#FF0000\">".$CONF['conf_GCompanyName']."&gt; ".$row["msg"]."</font></b></p>");
			}
		}
		else
		{
			$row["msg"] = htmlspecialchars($row["msg"]);
			$row["msg"] = preg_replace("'\[url\](.+)\[/url\]'si","<a target=\"_blank\" href=\"\\1\"><font color=\"#008000\">\\1</font></a>",$row["msg"]);

			if(strpos($row["msg"],':4-|ln|_4:')!==false)        
			{
				$TMS2 = explode(":4-|ln|_4:",$row["msg"]);
				$TextLanguageSel = $TMS2[1];
				if($LanguageSel!=$TextLanguageSel)
				{
					$row["msg"] = Translate($TMS2[2],$TextLanguageSel,$LanguageSel);
				}
				else
				{
					$row["msg"] = $TMS2[2];
				}
			}
			if($CONF['conf_Right2Left']==1)				
				$MsgTemp .= ("<p align=\"right\"><b><font color=\"#0000FF\">".$row["msg"]." &lt;".$CONF['conf_GCompanyName']."</font></b></p>");
			else
				$MsgTemp .= ("<p><b><font color=\"#0000FF\">".$CONF['conf_GCompanyName']."&gt; ".$row["msg"]."</font></b></p>");
		}
//		$PKT = doubleval($row["ttime"]);
		$PKT = $row["ttime"];
		if($PKT > $DTime)
		{
			$DTime = $PKT;
		}
	}

	mysql_close($dbh);

	if($FakeMsgTemp == 1 && $MsgTemp == "")
	{
		$MsgTemp = "EOw3OkAE062f8628bz2y7v47vmW85q4c";
	}

}

$MsgTemp = GetEQString($MsgTemp);


echo "pr_s=s&cass2=test&ltime=$DTime&sema10=1&msgtemp=$MsgTemp&fdelim2=1&uptext=$uptext&fdelim3=1&writesignal=$WriteSignal&pr_e=e";

?>