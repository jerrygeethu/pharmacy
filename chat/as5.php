<?php


include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_POST_VARS['ttcc'],'NUMBER');

$TTime = get_microtime();

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);

$TTM = (1*time())-432000;
mysql_query("DELETE FROM msgdb WHERE ttime<$TTM",$dbh);
mysql_query("DELETE FROM cs WHERE lastact<$TTM",$dbh);
mysql_query("UPDATE cs SET assign=3 WHERE ccode=$CCode");
mysql_close($dbh);

echo "pr_s=s&pr_e=e";

?>