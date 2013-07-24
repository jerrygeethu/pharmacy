<?php


include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_POST_VARS['ccode'],'NUMBER');

include('loadconfdb.php');

$CondStr = "";
foreach($CONF as $k=>$v)
{
	if(substr($k,0,strlen("conf_staff")) == "conf_staff")
	{
		list($v1,$v2,$v3) = explode(":",$v);
		$v = $v1.":xxxxxxxx:".$v3;
	}
	$CondStr .= ($k."=".GetEQString(str_replace("\n","[nl]",$v))."&");
}


echo "pr_s=s&consema=1&".$CondStr."pr_e=e";

?>