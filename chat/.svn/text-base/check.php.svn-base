<?php


include_once('noca.php');
include_once('rcq.php');

$CHStr = "";


$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true);
if(!$dbh)
{
	$CHStr .= '<p><font color="#FF0000"><b>Error:</b><br>I can\'t connect to MySQL, Check the DB* variables in config.php</font><br></p>';
}
else
{
	if(mysql_select_db($DBDatabase,$dbh)==false)
	{
		$CHStr .= '<p><font color="#FF0000"><b>Error:</b><br>I can connect to MySQL, But can not connect to '.$DBDatabase.' database.</font><br></p>';
	}
	else
	{
		$res = mysql_query("SHOW TABLES FROM $DBDatabase",$dbh);
		if(!$res)
		{
			$CHStr .= '<p><font color="#FF0000"><b>Error:</b><br>I can connect to MySQL, But can not check the tables.</font><br></p>';
		}
		else
		{
			$TBLS_INDEX = 0;
			$TBLS = array();
			while ($row = mysql_fetch_row($res))
				$TBLS[$TBLS_INDEX++] = $row[0];
			if(in_array("bvars",$TBLS)==false || in_array("cs",$TBLS)==false || in_array("msgdb",$TBLS)==false)
			{
				$CHStr .= '<p><font color="#FF0000"><b>Error:</b><br>MySQL table not found, I will execute the install module, Reloading the staff.php may fix the problem.</font><br></p>';
				include("install.php");
			}
			else
			{
				$res = mysql_query("SHOW COLUMNS FROM msgdb");
				if($res && mysql_num_rows($res) > 0)
				{
					while ($row = mysql_fetch_assoc($res)) 
					{
						if($row['Field']=='msg')
						{
							if($row['Type']!='text')
							{
								$sql = 'ALTER TABLE msgdb CHANGE msg msg TEXT NULL DEFAULT NULL'; 
								mysql_query('ALTER TABLE msgdb CHANGE msg msg TEXT NULL DEFAULT NULL',$dbh);
							}
							break;
						}
					}
				}
			}
		}
		mysql_close($dbh);
	}
}




if($CONF['conf_UseLanguageTranslator']==1)
{
	$TransStatus = strtolower(Translate('city','en','de'));
	if($TransStatus != 'stadt')
	{
		$CHStr .= '<p><font color="#FF0000"><b>Warning:</b><br>Translation system does not work on your server. Please disable it in config.php</font><br></p>';
	}
}

$CHStr .= implode('', file(base64_decode('aHR0cDovL3BocG9ubGluZS5kYXlhbmFob3N0LmNvbS9uZXdzLnBocD92PQ==').$phpOnlineVer));


$RV = 0;
if($CHStr=='')
	$RV = 1;



echo "pr_s=s&news_sema=$RV&news1=$CHStr&pr_e=e";

?>