<?php



include_once('noca.php');
include_once('rcq.php');

$ADMIDF = DayanaDec($HTTP_POST_VARS['admidf']);
$ADMPUF = DayanaDec($HTTP_POST_VARS['admpuf']);

if(!IsLoginValid($ADMIDF,$ADMPUF))
{
	echo "pr_s=s&gm_sema=2001&gm_status=".$CONF['conf_Msg13']."&pr_e=e";
	return;
}

$CONFS = array();
foreach($HTTP_POST_VARS as $k=>$v)
{
	if(substr($k,0,strlen("conf_Msg")) == "conf_Msg")
	{
		$CONFS[$k] = DayanaDec($v);
	}
}

$CondStr = "";
$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
foreach($CONFS as $k=>$v)
{
	$v = str_replace("[nl]","\n",$v);
	$rv = mysql_query("UPDATE bvars SET bvalue=\"$v\" WHERE bname=\"$k\"",$dbh);
	if(mysql_affected_rows($dbh)==0 || $rv===false)
	{
		mysql_query("INSERT INTO bvars VALUES(\"$k\",\"$v\")",$dbh);
	}
}
mysql_close($dbh);


echo "pr_s=s&gm_sema=1&gm_status=".$CONF['conf_Msg45']."&pr_e=e";
return;


?>