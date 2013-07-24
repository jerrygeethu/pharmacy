<?php



include_once('noca.php');
include_once('rcq.php');


$AdmID = FilterString($HTTP_POST_VARS['admid'],'WORD');
$FSS = DayanaDec($HTTP_POST_VARS['wlistvar']);
$FSS_TYPE = FilterString($HTTP_POST_VARS['addm_switch'],'NUMBER');


$FTY = "p";
if($FSS_TYPE==1)
	$FTY = "p";
if($FSS_TYPE==2)
	$FTY = "g";


$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);


if($FSS_TYPE==3)
{
	$res = mysql_query("DELETE FROM bvars WHERE bname='$FSS'",$dbh);
}
else
{
	$BName = "fss_".$FTY."_".$AdmID."_".time().rand(10000,99999);
	$BValue = MySQLHex($FSS);
	$res = mysql_query("INSERT INTO bvars VALUES('$BName',$BValue)",$dbh);
}
mysql_close($dbh);




echo "pr_s=s&addm_sema=1&pr_e=e";


?>