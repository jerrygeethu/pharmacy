<?php



include_once('config.php');

$CONF_MSG_COUNT_EXPECT = 93;

$CONF_MSG_COUNT = 0;
$CONF = array();

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true);
if($dbh===false)
{
	exit(0);
}
mysql_select_db($DBDatabase,$dbh);

$CONF['conf_phpOnlineTitle'] = 'Mainstreet Live Chat';

$RTCNT=0;
$CNT_SUCCESS = false;
do
{
	$res = mysql_query("SELECT * from bvars",$dbh);
	if($res===false)
	{
		include("install.php");
		$RTCNT++;
	}
	else
	{
		while($row = mysql_fetch_array($res))
		{
			if(substr($row['bname'],0,strlen("conf_")) == "conf_")
			{
				$CONF[$row['bname']] = $row['bvalue'];
				if(substr($row['bname'],0,strlen("conf_Msg")) == "conf_Msg")
				{
					$CONF_MSG_COUNT++;
				}
			}
		}
		$CNT_SUCCESS = true;
		break;
	}
}while($RTCNT<2);
mysql_close($dbh);


if($CNT_SUCCESS==false)
{
	exit(0);
}


$CDEF['GCompanyName'] 	= 'Our Company Name';
$CDEF['GDomainName'] 	= str_replace("www.","",$_SERVER["HTTP_HOST"]);
$CDEF['GEmailAddress'] 	= 'support@'.$CDEF['GDomainName'];
$CDEF['GEmailSubject'] 	= "Message from online support";

if($CONF_MSG_COUNT_EXPECT != $CONF_MSG_COUNT)
{
	include('lang_str_en_us.php');
	foreach($LANG as $a=>$v)
	{
		if(!isset($CONF['conf_Msg'.$a]) || $CONF['conf_Msg'.$a]=='')
		{
			$CDEF['Msg'.$a] = $v;
		}
	}
}

$CDEF['MaxWaitTime'] = 30;
$CDEF['UseLanguageTranslator'] = 0;
$CDEF['GetClientEmail'] = 1;
$CDEF['Right2Left'] = 0;
$CDEF['PlainTextEmail'] = 0;
$CDEF['License'] = "";

$CDEF['staff0'] = 'admin:80177534a0c99a7e3645b52f2027a48b:1';

if(isset($GCompanyName))	$CDEF['GCompanyName'] 	= $GCompanyName;
if(isset($GDomainName))		$CDEF['GDomainName'] 	= $GDomainName;
if(isset($GEmailAddress))	$CDEF['GEmailAddress'] 	= $GEmailAddress;
if(isset($GEmailSubject))	$CDEF['GEmailSubject'] 	= $GEmailSubject;
if(isset($Msg1))		$CDEF['Msg1'] 	= $Msg1;
if(isset($Msg2))		$CDEF['Msg2'] 	= $Msg2;
if(isset($Msg3))		$CDEF['Msg3'] 	= $Msg3;
if(isset($Msg4))		$CDEF['Msg4'] 	= $Msg4;
if(isset($Msg5))		$CDEF['Msg5'] 	= $Msg5;
if(isset($Msg6))		$CDEF['Msg6'] 	= $Msg6;
if(isset($Msg7))		$CDEF['Msg7'] 	= $Msg7;
if(isset($Msg8))		$CDEF['Msg8'] 	= $Msg8;
if(isset($Msg9))		$CDEF['Msg9'] 	= $Msg9;
if(isset($Msg10))		$CDEF['Msg10'] 	= $Msg10;
if(isset($MaxWaitTime))		$CDEF['MaxWaitTime'] 	= $MaxWaitTime;
if(isset($UseLanguageTranslator))	$CDEF['UseLanguageTranslator'] 	= $UseLanguageTranslator;
if(isset($License))		$CDEF['License']= $License;


$ConfReload = false;
foreach($CDEF as $k=>$v)
{
	if(!isset($CONF['conf_'.$k]))
	{
		$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
		mysql_select_db($DBDatabase,$dbh);
		mysql_query("INSERT INTO bvars VALUES(\"conf_$k\",\"$v\")",$dbh);
		mysql_close($dbh);
		$ConfReload = true;
	}
}

if($ConfReload)
{
	$CONF = array();
	$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
	mysql_select_db($DBDatabase,$dbh);
	$res = mysql_query("SELECT * from bvars",$dbh);
	if($res)
	{
		while($row = mysql_fetch_array($res))
		{
			if(substr($row['bname'],0,strlen("conf_")) == "conf_")
			{
				$CONF[$row['bname']] = $row['bvalue'];
			}
		}
	}
}

$CONF['conf_phpOnlineVer'] = $phpOnlineVer;
$CONF['conf_DYear'] = date("Y");




$CONF['conf_rings'] = '';
$FDELIM = "|_:-:|";
$LDELIM = "|::_:-|";
$dir = dirname(__FILE__).'/rings';
if (is_dir($dir)) 
{
	if ($dh = opendir($dir)) 
	{
		while (($file = readdir($dh)) !== false) 
		{
			if(substr($file,-4)=='.mp3')
			{
				$CONF['conf_rings'] .= $file.$FDELIM.substr($file,0,-4).$LDELIM;
			}
		}
		closedir($dh);
	}
}

if(!isset($CONF['conf_rings']) || $CONF['conf_rings']=='')
{
	$CONF['conf_rings'] = 'ringin.mp3';
}



?>
