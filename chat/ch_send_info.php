<?php



include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_GET_VARS['ccode'],'NUMBER');
$UN = $HTTP_GET_VARS['un'];
$Msg = "USERNAME: ".$UN;


$TTime = get_microtime();

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
$res = mysql_query("INSERT INTO msgdb VALUES($TTime,\"$CCode\",\"$Msg\",2,0)",$dbh);
SetCCodeStatus($CCode,"1","1");


mysql_close($dbh);

echo "pr_s=s&pr_e=e";

?>