<?php




include_once('config.php');

$CH1 = "";
$CH2 = "";

function CheckTable($table,$DBHost, $DBUsername, $DBPassword,$DBDatabase)
{
	$CNT_SUCCESS = false;
	$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true);
	mysql_select_db($DBDatabase,$dbh);
	$res = mysql_query("SELECT * from $table LIMIT 0,1",$dbh);
	if($res===false)
	{
		$CNT_SUCCESS = false;
	}
	else
	{
		$CNT_SUCCESS = true;
	}
	mysql_close($dbh);
	return($CNT_SUCCESS);
}

$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true);
if(!$dbh)
{
	$CH1 = 'Error: Can not connect to MySQL server';
	$CH2 = 'Hint: Check the database parameters in config.php';
}
else
{
	if(mysql_select_db($DBDatabase,$dbh)==false)
	{
		$CH1 = 'Error: I can connect to MySQL server but not to database '.$DBDatabase;
		$CH2 = 'Hint: Check the database parameters in config.php';
	}
	else
	{
		mysql_close($dbh);
		if(!CheckTable('bvars',$DBHost, $DBUsername, $DBPassword,$DBDatabase) || !CheckTable('cs',$DBHost, $DBUsername, $DBPassword,$DBDatabase) || !CheckTable('msgdb',$DBHost, $DBUsername, $DBPassword,$DBDatabase))
		{
			echo "pr_s1=";
			include("install.php");
			echo "&";
		}
		if(!CheckTable('bvars',$DBHost, $DBUsername, $DBPassword,$DBDatabase) || !CheckTable('cs',$DBHost, $DBUsername, $DBPassword,$DBDatabase) || !CheckTable('msgdb',$DBHost, $DBUsername, $DBPassword,$DBDatabase))
		{
			$CH1 = 'Error: I can\'t create required tables or tables corrupted';
			$CH2 = 'Hint: Try to drop all tables from database and reload this page.';
		}
	}
	
}



$RV = 2;
if($CH1=='')
	$RV = 1;



echo "pr_s=s&gm_sema=$RV&ch1=$CH1&ch2=$CH2&pr_e=e";

?>