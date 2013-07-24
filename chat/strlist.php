<?php



include_once('noca.php');
include_once('rcq.php');

$TTime = gmdate("U");

$FDELIM = "|_:-:|";
$LDELIM = "|::_:-|";

$WList = "";

if ($handle = opendir(getcwd())) 
{
	while (false !== ($file = readdir($handle))) 
	{
		if(substr($file,0,strlen('lang_str_'))=='lang_str_' && substr(strrev($file),0,strlen('php.'))=='php.')
		{
			$FC = file($file);
			if(strpos(strtolower($FC[2]),"phponline language strings")!==false)
			{
				$LangFile = substr($file,strlen('lang_str_'));
				$LangFile = strrev(substr(strrev($LangFile),strlen('php.')));
				$FCName = trim($FC[3]);
				$WList .= ($FCName.$FDELIM);
				$WList .= ($LangFile.$LDELIM);
			}
		}
	}
	closedir($handle);
}

echo "pr_s=s&wlist=$WList&strlist_sema=1&pr_e=e";


?>