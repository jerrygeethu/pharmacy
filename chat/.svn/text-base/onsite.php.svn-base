<?php



include_once('noca.php');
include_once('rcq.php');

$Usr = $HTTP_POST_VARS['usr1'];
$TTime = gmdate("U");
$WUsr = "";

$DTime = get_microtime();

$FDELIM = "|_:-:|";
$LDELIM = "|::_:-|";


	$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
	mysql_select_db($DBDatabase,$dbh);
	$HREF = $AS2PHP;
	$Alarm=0;
	$res = mysql_query("SELECT * FROM msgdb WHERE code1=3 AND ($DTime-ttime<(15*60)) ORDER BY ttime DESC",$dbh);
	$STA = array();
	while($row = mysql_fetch_array($res))
	{
		$MS = $row["msg"];
		$CCode = $row["ccode"];
		list($NL1,$IP,$METHOD,$URL) = explode("^%^",$MS);
		switch($METHOD)
		{
			case 'GET':
				$METHOD_P = 'G';
				break;
			case 'POST':
				$METHOD_P = 'P';
				break;
		}
		$URL = preg_replace(array("/http:\/\//i","/https:\/\//i"),"",$URL);
		if(strpos($URL,"/")===false)
			$URL = "/";
		else
			$URL = "/".preg_replace("/[^\/]+\/(.*)/","\\1",$URL);
		$ExTime = floor($DTime-$row['ttime']);
		$EXM = floor($ExTime/60);
		$EXS = floor($ExTime-($EXM*60));
		if($EXM>0)
			$EXC = $EXM.":".$EXS;
		else
			$EXC = $EXS."s";

		$URL = urlencode($URL);

		$STA[$IP] = $CCode.$FDELIM.$IP.$FDELIM.$METHOD_P.$FDELIM.$URL.$FDELIM.$EXC.$LDELIM;

	}
	mysql_free_result($res);
	mysql_close($dbh);

	$WList = "";
	foreach($STA as $k=>$v)
	{
		$WList .= $v;
	}



	echo "pr_s=s&wlistvar=$WList&onsite_sema=1&pr_e=e";



?>