<?php



include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_POST_VARS['ccode'],'NUMBER');

$ADMIDF = DayanaDec($HTTP_POST_VARS['admidf']);
$ADMPUF = DayanaDec($HTTP_POST_VARS['admpuf']);

if(!IsLoginValid($ADMIDF,$ADMPUF))
{
	echo "pr_s=s&gm_sema=1&gm_status=".$CONF['conf_Msg13']."&pr_e=e";
	return;
}



$FL_Status = $CONF['conf_Msg45'];



$PRECONF = array();
$PREUSERPASS = array();
$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
$res = mysql_query("SELECT * from bvars",$dbh);
while($row = mysql_fetch_array($res))
{
	if(substr($row['bname'],0,strlen("conf_")) == "conf_")
	{
		$PRECONF[$row['bname']] = $row['bvalue'];
		if(substr($row['bname'],0,strlen("conf_staff")) == "conf_staff")
		{
			list($v1,$v2,$v3) = explode(":",$row['bvalue']);
			$PREUSERPASS[$v1] = $v2;
		}
	}
}
mysql_close($dbh);



$CONF = array();
$StaffIndex = 0;
asort($HTTP_POST_VARS);
reset($HTTP_POST_VARS);
foreach($HTTP_POST_VARS as $k=>$v)
{
	$v = DayanaDec($v);
	if(substr($k,0,5) == "conf_")
	{
		if(substr($k,0,10) == "conf_staff")
		{
			list($v1,$v2,$v3) = explode(":",$v);
			if(trim($v1)=='')	continue;
			if($v2=='xxxxxxxx')
			{
				$v = $v1.":".$PREUSERPASS[$v1].":".$v3;
			}
			else
			{
				$v = $v1.":".md5($v2).":".$v3;
			}
			$k="conf_staff".$StaffIndex;
			$StaffIndex++;
		}
		if(substr($k,0,12) == "conf_License")
		{
			if(strlen($v)!=64)	continue;
		}
		if($k=="conf_phpOnlineVer")
			continue;
		if($k=="conf_DYear")
			continue;
		if(substr($k,0,8) == "conf_Msg")
			continue;
		$CONF[$k] = $v;
	}
}

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
mysql_query("DELETE from bvars where bname LIKE \"conf_staff%\"",$dbh);
mysql_close($dbh);

$CondStr = "";
$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
foreach($CONF as $k=>$v)
{
	$v = str_replace("[nl]","\n",$v);
	$khex = MySQLHex($k);
	$vhex = MySQLHex($v);

	if($vhex == '0x0')
		$vhex = "''";
	
	$rv = mysql_query("UPDATE bvars SET bvalue=$vhex WHERE bname=\"$k\" ",$dbh);
	if(mysql_affected_rows($dbh)==0 || $rv===false)
	{
		mysql_query("INSERT INTO bvars VALUES($khex,$vhex)",$dbh);
	}
}
mysql_query("UPDATE bvars SET bvalue=\"0\" WHERE bname=\"conf_LicenseV\"",$dbh);
mysql_close($dbh);




echo "pr_s=s&gm_sema=1&gm_status=".$FL_Status."&pr_e=e";

?>