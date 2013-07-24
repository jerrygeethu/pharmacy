<?php



include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_COOKIE_VARS['ocode'],'NUMBER');
$TTime = gmdate("U");
$FN1=$HTTP_POST_VARS['name'];
$FN2=$HTTP_POST_VARS['email'];
$FN3=$HTTP_POST_VARS['username'];



$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
mysql_query("UPDATE cs SET name=\"$FN1\",email=\"$FN2\",username=\"$FN3\" WHERE ccode=$CCode",$dbh);
mysql_close($dbh);
SetPStatus("1");

echo "pr_s=s&pr_e=e";

?>