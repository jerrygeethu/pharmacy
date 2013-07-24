<?php


include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_POST_VARS['ccode'],'NUMBER');
$LanguageSel = $HTTP_POST_VARS['language_sel'];
$Msg = DayanaDec($HTTP_POST_VARS['input']);
$WriteSignal = DayanaDec($HTTP_POST_VARS['write_signal']);


if(substr($WriteSignal,0,strlen('EOw3OkAE062f8628bz2y7v47vmW85q4c'))=='EOw3OkAE062f8628bz2y7v47vmW85q4c')
{
	$Msg = $WriteSignal;
}

if(substr($Msg,0,strlen('EOw3OkAE062f8628bz2y7v47vmW85q4c'))!='EOw3OkAE062f8628bz2y7v47vmW85q4c')
{

	$Msg = ':4-|ln|_4:'.$LanguageSel.':4-|ln|_4:'.$Msg;

}



$TTime = get_microtime();

$MsgMySQL = MySQLHex($Msg,false,false,true);

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);
$res = mysql_query("INSERT INTO msgdb VALUES($TTime,\"$CCode\",$MsgMySQL,2,0)",$dbh);
SetCCodeStatus($CCode,"1","1");


mysql_close($dbh);


echo "pr_s=s&ttm=$TTime&pr_e=e";

?>