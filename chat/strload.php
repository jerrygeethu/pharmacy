<?php



include_once('noca.php');
include_once('rcq.php');



$LangFile = $HTTP_POST_VARS['lang_file'];
$TTime = gmdate("U");


$LangFile = FilterString($LangFile,'WORD');


if (preg_match("#^[a-z0-9_]+$#i",$LangFile) )
{
	$LangFile = 'lang_str_'.$LangFile.'.php';
	include_once($LangFile);
}


$CondStr = "";
foreach($LANG as $k=>$v)
{
	$CondStr .= ("lang_str_".$k."=".GetEQString(str_replace("\n","[nl]",$v))."&");
}


echo "pr_s=s&load_sema=1&".$CondStr."pr_e=e";

?>