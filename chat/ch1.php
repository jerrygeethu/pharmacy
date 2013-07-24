<?php


include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_COOKIE_VARS['ocode'],'NUMBER');
$TTime = gmdate("U");



if($CCode == "")
{
	$CCode = FilterString($HTTP_POST_VARS['ccode'],'NUMBER');

}

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);

$res = mysql_query("SELECT * FROM cs WHERE ccode=$CCode",$dbh);
$row = mysql_fetch_array($res);

if($row["online"] == 0)
{
	mysql_query("UPDATE cs SET online=1,lastact=$TTime WHERE ccode=$CCode",$dbh);
}
else
{
	mysql_query("UPDATE cs SET lastact=$TTime WHERE ccode=$CCode",$dbh);
}

$CCASS = $row["assign"];

mysql_free_result($res);
mysql_close($dbh);
SetPStatus("1");


$TTime = get_microtime();

echo "pr_s=s&ct=$TTime&ccode=$CCode&cass=$CCASS&pr_s=s";

?>