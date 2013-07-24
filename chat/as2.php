<?php



include_once('noca.php');
include_once('rcq.php');

$CCode = FilterString($HTTP_GET_VARS['ccode'],'NUMBER');
$LanguageSel = FilterString($HTTP_GET_VARS['language_sel'],'WORD');
$AdmID = FilterString($HTTP_GET_VARS['admid'],'WORD');


$TTime = get_microtime();

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
mysql_select_db($DBDatabase,$dbh);

$TTM = (1*time())-432000;
mysql_query("DELETE FROM msgdb WHERE ttime<$TTM",$dbh);
mysql_query("DELETE FROM cs WHERE lastact<$TTM",$dbh);
mysql_query("UPDATE cs SET assign=1 WHERE ccode=$CCode",$dbh);
mysql_close($dbh);


?>


<HTML>
<HEAD>
<meta http-equiv=Content-Type content="text/html;  charset=ISO-8859-1">
<TITLE>Elatrip Live Chat</TITLE>
</HEAD>
<BODY bgcolor="#FFFFFF">
<?php
	echo phpOnlineGetFlashCode('asc','?ccode='.$CCode.'&language_sel='.$LanguageSel.'&admid='.$AdmID.'&ct='.$TTime);
?>
</BODY>
</HTML>