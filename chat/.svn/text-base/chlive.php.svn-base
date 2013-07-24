<?php


include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_POST_VARS['ccode'],'NUMBER');
$TTime = gmdate("U");




$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);

mysql_query("UPDATE cs SET lastact=$TTime WHERE ccode=$CCode",$dbh);
SetPStatus("1");
mysql_close($dbh);


echo "pr_s=s&pr_e=e";


?>