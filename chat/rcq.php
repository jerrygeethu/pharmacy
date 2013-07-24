<?php




include_once('config.php');
$phpOnlineVer = "2.1.3";

$TransLangs = array(array("en","english"),
			array("de","German"),
			array("es","Spanish"),
			array("fr","French"),
			array("it","Italian"),
			array("pt","Portuguese"));


ini_set('display_errors',0);
error_reporting(0);

if(!isset($HTTP_SERVER_VARS) || trim($HTTP_SERVER_VARS["SERVER_PORT"])=="")
{
	$HTTP_GET_VARS = $_GET;
	$HTTP_POST_VARS = $_POST;
	$HTTP_COOKIE_VARS = $_COOKIE;
	$HTTP_SERVER_VARS = $_SERVER;
}



include_once('loadconfdb.php');





function GetCCodeStatus($CC,$FN)
{
	return 1;
}


function SetCCodeStatus($CC,$ST,$FN)
{
}

function GetPStatus($PPTTP="john")
{
	return 1;
}

function SetPStatus($ST)
{
}

function GetEQString($ST)
{
	$RV = "";
	$ST = utf8_encode($ST);
	for($i=0;$i< strlen($ST);$i++)
	{
		$RV .= ("%".dechex(ord($ST{$i})));
		
	}
	return($RV);
}

function Translate($Msg,$From,$To)
{

$SupportedTrans = array("en|de","en|es","en|fr","en|it","en|pt",
			"de|en","de|fr",
			"es|en",
			"fr|en","fr|de",
			"it|en",
			"pt|en");

	$LPR = $From.'|'.$To;
	$TMsg = $Msg;
	if(in_array($LPR,$SupportedTrans))
	{
		$TUL = implode("",file("http://translate.google.com/translate_t?ie=UTF8&hl=en&langpair=$LPR&text=".rawurlencode($TMsg) ));
		$Result = preg_match("'<textarea.+name=q[^>]*>([^<]*)</textarea>'i",$TUL,$matches);
		if(isset($matches[1]))
			$TMsg = $matches[1];

	}
	else
	{
		$LPR = $From.'|en';
		$TUL = implode("",file("http://translate.google.com/translate_t?ie=UTF8&hl=en&langpair=$LPR&text=".rawurlencode($TMsg) ));
		$Result = preg_match("'<textarea.+name=q[^>]*>([^<]*)</textarea>'i",$TUL,$matches);
		if(isset($matches[1]))
			$TMsg = $matches[1];
		$TMsg2 = $TMsg;

		$LPR = 'en|'.$To;
		$TUL = implode("",file("http://translate.google.com/translate_t?ie=UTF8&hl=en&langpair=$LPR&text=".rawurlencode($TMsg2) ));
		$Result = preg_match("'<textarea.+name=q[^>]*>([^<]*)</textarea>'i",$TUL,$matches);
		if(isset($matches[1]))
			$TMsg2 = $matches[1];

		$TMsg = $TMsg2;
	}
	return($TMsg);

}


function DayanaDec($s)
{
	$rv = "";
	$sa = explode(":",$s);	
	for($i=0;$i< count($sa);$i++)
	{
		if($sa[$i]!='')
		{
			$t = base_convert($sa[$i],36,10);
			if($t>255)
				$rv .= ("&#".$t.";");
			else
				$rv .= chr($t);
		}
	}
	return($rv);
}


function DayanaEnc($s)
{
	$t=0;
	$rv="";
	for($i=0;$i< strlen($s);$i++)
	{
		$t = "".ord($s[$i])."";
		$rv .= (base_convert($t,10,36) . ":");
	}
	return ($rv);
}

function MySQLHex($s,$stripslash=true,$replacequote=true,$add0x=true)
{
	$ANT = $s;
	if($stripslash)
		$ANT = stripslashes($ANT);
	if($replacequote)
		$ANT = str_replace('"',"'",$ANT);

	$ANS = "";
	if($add0x)
		$ANS .= "0x";
	for($i=0;$i< strlen($ANT);$i++)
	{
		$RVL = dechex(ord($ANT{$i}));
		if(strlen($RVL)==1)
			$RVL = "0".$RVL;
		$ANS .= $RVL;
	}
	if($add0x && strlen($ANT)==0)
		$ANS .= "0";	
	return($ANS);
}

function IsLoginValid($StaffUserName,$StaffPassword)
{
	list($RV,$STV,$ADMID,$ADMPU) = IsLoginValidEx($StaffUserName,$StaffPassword);
	if($RV==1)
		return true;
	else
		return false;
}

function FilterString($s,$mode)
{
	if($mode=='NUMBER')
	{
		return(preg_replace('/[^0-9.]*/i','',$s));
	}
	if($mode=='WORD')
	{
		return(preg_replace('/\W*/i','',$s));
	}
	return($s);
}

function IsLoginValidEx($StaffUserName,$StaffPassword)
{
	global $CONF;
	$StaffLogin = array();
	foreach($CONF as $k=>$v)
	{
		if(substr($k,0,strlen("conf_staff")) == "conf_staff")
		{
			list($v1,$v2,$v3) = explode(":",$v);
			$StaffLogin[$v1] = $v2;
			$StaffLoginPU[$v1] = $v3;
		}
	}
	if(!isset($CONF['conf_GCompanyName']))
	{
		$StaffLogin['admin'] = '80177534a0c99a7e3645b52f2027a48b';
		$StaffLoginPU['admin'] = 1;
	}
	$RV = 0;
	$STV = 0;

	if(isset($StaffLogin[$StaffUserName])==false)
	{
		$RV=2;
		$STV = 1;
	}

	if(trim($StaffUserName)=='')
	{
		$RV=2;
		$STV = 2;
	}

	if(($StaffLogin[$StaffUserName]==md5($StaffPassword)) && $RV==0)
	{
		$RV=1;
		$STV = 3;
		$ADMID = str_replace(array('=','+','/','_'),array('XxexX','XxpxX','XxsxX','XxuxX'),base64_encode($StaffLogin[$StaffUserName]));
		$ADMPU = $StaffLoginPU[$StaffUserName];
	}
	else
	{
		$RV=2;
		$STV = 4;
	}
	return(array($RV,$STV,$ADMID,$ADMPU));
}

function get_microtime()
{
	list($usec, $sec) = explode(" ",microtime());
	$usec = str_replace('0.','',$usec);
	return($sec.'.'.$usec);
}

function phpOnlineGetFlashCode($id,$extra='')
{
	global $HTTP_SERVER_VARS;
	$use_https = false;
	if(isset($HTTP_SERVER_VARS['HTTPS']) && strtolower($HTTP_SERVER_VARS['HTTPS'])=='on')
		$use_https = true;

	if($use_https)
		$codebase = 'https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0';
	else
		$codebase = 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0';

	if($use_https)
		$pluginpage = 'https://www.macromedia.com/go/getflashplayer';
	else
		$pluginpage = 'http://www.macromedia.com/go/getflashplayer';
	
	$f = array();
	$f['cs'] = '         
		<OBJECT classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="'.$codebase.'" WIDTH="477" HEIGHT="230" id="cs" ALIGN="">
			<PARAM NAME=movie VALUE="cs.swf">
			<PARAM NAME=quality VALUE=High> 
			<PARAM NAME=bgcolor VALUE=FFFFFF>
			<param name="_cx" value="12621">
			<param name="_cy" value="6085">
			<param name="FlashVars" value="-1">
			<param name="Src" value="cs.swf">
			<param name="WMode" value="window">
			<param name="Play" value="-1">
			<param name="Loop" value="-1">
			<param name="SAlign" value>
			<param name="Menu" value="0">
			<param name="Base" value>
			<param name="AllowScriptAccess" value="always">
			<param name="Scale" value="ShowAll">
			<param name="DeviceFont" value="0">
			<param name="EmbedMovie" value="0">
			<param name="SWRemote" value>
		  <EMBED src="cs.swf" menu=false quality=high scale=noborder wmode="window" bgcolor=#FFFFFF  WIDTH="477" HEIGHT="230" NAME="cs" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="'.$pluginpage.'"></EMBED></OBJECT>';
	$f['as'] = '
		<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="'.$codebase.'" WIDTH="550" HEIGHT="370" id="as" ALIGN="">
			<PARAM NAME=movie VALUE="as.swf">
			<PARAM NAME=quality VALUE=High> 
			<PARAM NAME=bgcolor VALUE=#ece9d8> 
			<EMBED src="as.swf" quality=High bgcolor=#ece9d8 WIDTH="550" HEIGHT="370" NAME="as" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="'.$pluginpage.'"></EMBED></OBJECT>';

	$f['status'] = '
		<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="'.$codebase.'" HEIGHT="60" WIDTH="120" id="status" ALIGN="" border="0">
			<PARAM NAME=movie VALUE="status.swf"> 
			<PARAM NAME=menu VALUE=false> 
			<PARAM NAME=quality VALUE=High>
			<PARAM NAME=bgcolor VALUE=#ffffff> 
			<param name="salign" value="TL">
			<param name="scale" value="NoBorder">
			<EMBED src="status.swf" menu=false quality=High bgcolor=#ffffff  NAME="status" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="'.$pluginpage.'" salign="TL" width="120" height="60" scale="NoBorder"></EMBED></OBJECT>';

	$f['asc'] = '
		<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="'.$codebase.'" HEIGHT="400" WIDTH="500" id="asc" ALIGN="">
			<PARAM NAME=movie VALUE="asc.swf'.$extra.'"> 
			<PARAM NAME=menu VALUE=false> 
			<PARAM NAME=quality VALUE=high>
			<PARAM NAME=scale VALUE=exactfit>
			<PARAM NAME=bgcolor VALUE=#FFFFFF>
			<EMBED src="asc.swf'.$extra.'" menu=false quality=high scale=exactfit HEIGHT="400" WIDTH="500" bgcolor=#FFFFFF  NAME="asc" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="'.$pluginpage.'"></EMBED></OBJECT>';
		
		
	return(trim($f[$id]));
}


$CRP = "ZnVuY3Rpb24gR2V0TGljZW5zZSgpIHsgZ2xvYmFsICRDT05GOyBnbG9iYWwgJERCSG9zdDsgZ2xvYmFsICREQlVzZXJuYW1lOyBnbG9iYWwgJERCUGFzc3dvcmQ7IGdsb2JhbCAkREJEYXRhYmFzZTsgJElTTiA9ICcnOyAkSVNOUEIgPSAwOyAkVExUaW1lID0gZGF0ZSgiVSIpOyBpZihzdHJsZW4oJENPTkZbJ2NvbmZfTGljZW5zZSddKT09NjQpIHsgJENPTkZbJ2NvbmZfTGljZW5zZVQnXSA9ICRDT05GWydjb25mX0xpY2Vuc2VUJ10qMTsgaWYoJENPTkZbJ2NvbmZfTGljZW5zZVYnXT09MSAmJiAkQ09ORlsnY29uZl9MaWNlbnNlVCddPigkVExUaW1lLSgyNCozNjAwKSkgJiYgJENPTkZbJ2NvbmZfTGljZW5zZVQnXSA8ICgkVExUaW1lKyg2MCkpICkgeyBsaXN0KCRJU04sJElTTlBCKSA9IGV4cGxvZGUoIjoiLGJhc2U2NF9kZWNvZGUoc3RycmV2KCRDT05GWydjb25mX0xpY2Vuc2VEJ10pKSk7ICRJU04gPSBiYXNlNjRfZGVjb2RlKHN0cnJldigkSVNOKSk7IAkkSVNOUEIgPSBiYXNlNjRfZGVjb2RlKHN0cnJldigkSVNOUEIpKTsgfSBlbHNlIHsJaWYoZmlsZV9leGlzdHMoJ2xpY2Vuc2UudHh0JykpIAl7CSRMQ1JGID0gaW1wbG9kZSgiIixmaWxlKCdsaWNlbnNlLnR4dCcpKTsJJExDUkYgPSBzdHJfcmVwbGFjZShhcnJheSgiXG4iLCJcciIsIlxzIiwiICIpLGFycmF5KCcnLCcnLCcnLCcnKSwkTENSRik7ICRMQ1JGID0gc3RyX3JlcGxhY2UoYXJyYXkoJy0tLS0tUEhQT05MSU5FLUxJQ0VOU0UtU1RBUlQtLS0tLScsJy0tLS0tUEhQT05MSU5FLUxJQ0VOU0UtRU5ELS0tLS0nKSxhcnJheSgnWycsJ10nKSwkTENSRik7DQpwcmVnX21hdGNoKCIvLipcWyguKilcXS4qLyIsICRMQ1JGLCAkTENSRl9tYXRjaGVzKTsgJExDUkYgPSAkTENSRl9tYXRjaGVzWzFdO2ZvcigkaT0wOyRpPDU7JGkrKyl7JExDUkYgPSBiYXNlNjRfZGVjb2RlKCRMQ1JGKTt9JExDUkYgPSBzdHJyZXYoJExDUkYpO2ZvcigkaT0wOyRpPDU7JGkrKyl7JExDUkYgPSBiYXNlNjRfZGVjb2RlKCRMQ1JGKTt9JExDUiA9ICRMQ1JGO31lbHNleyRMQ1IgPSBpbXBsb2RlKCIiLGZpbGUoImh0dHA6Ly9waHBvbmxpbmUuZGF5YW5haG9zdC5jb20vbGljZW5zZS5waHA/bGM9Ii4kQ09ORlsnY29uZl9MaWNlbnNlJ10pKTsgfSRMQ1JBID0gZXhwbG9kZSgiOjoiLCRMQ1IpOyANCmlmKGNvdW50KCRMQ1JBKT09OSl7aWYoJExDUkFbMV09PTEpeyRJU04gPSAkTENSQVszXTsgJElTTlBCID0gJExDUkFbMl07fX0gJENPTkZfTGljZW5zZUQgPSBzdHJyZXYoYmFzZTY0X2VuY29kZShzdHJyZXYoYmFzZTY0X2VuY29kZSgkSVNOKSkuIjoiLnN0cnJldihiYXNlNjRfZW5jb2RlKCRJU05QQikpKSk7IA0KJGRiaD1teXNxbF9jb25uZWN0KCREQkhvc3QsICREQlVzZXJuYW1lLCAkREJQYXNzd29yZCx0cnVlKSBvciBkaWUgKCdyZXM9MCcpO215c3FsX3NlbGVjdF9kYigkREJEYXRhYmFzZSwkZGJoKTtteXNxbF9xdWVyeSgiREVMRVRFIGZyb20gYnZhcnMgd2hlcmUgYm5hbWU9XCJjb25mX0xpY2Vuc2VEXCIgT1IgYm5hbWU9XCJjb25mX0xpY2Vuc2VUXCIgT1IgYm5hbWU9XCJjb25mX0xpY2Vuc2VWXCIgIiwkZGJoKTtteXNxbF9xdWVyeSgiSU5TRVJUIElOVE8gYnZhcnMgVkFMVUVTKFwiY29uZl9MaWNlbnNlRFwiLFwiJENPTkZfTGljZW5zZURcIikgIiwkZGJoKTsgbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPIGJ2YXJzIFZBTFVFUyhcImNvbmZfTGljZW5zZVRcIixcIiRUTFRpbWVcIikgIiwkZGJoKTsgbXlzcWxfcXVlcnkoIklOU0VSVCBJTlRPIGJ2YXJzIFZBTFVFUyhcImNvbmZfTGljZW5zZVZcIixcIjFcIikgIiwkZGJoKTsgbXlzcWxfY2xvc2UoJGRiaCk7IH0gfSByZXR1cm4oYXJyYXkoJElTTiwkSVNOUEIpKTsgfSBmdW5jdGlvbiBJc0xpY2Vuc2VkKCkgeyBsaXN0KCRJU04sJElTTlBCKSA9IEdldExpY2Vuc2UoKTsgaWYoJElTTlBCPjApIHJldHVybiB0cnVlOyBlbHNlIHJldHVybiBmYWxzZTsgfQ==";
eval(base64_decode($CRP));




?>
