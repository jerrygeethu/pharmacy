<?php


include_once('noca.php');
include_once('rcq.php');

$TTime = gmdate("U");

$LastAdmLoginTime = 0;


	$LastAdmLoginTime = 0;

	$dbh=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or die ('res=0');
	mysql_select_db($DBDatabase,$dbh);


	$res = mysql_query("SELECT * FROM bvars WHERE bname='adm_login_time'",$dbh);
	while($row = mysql_fetch_array($res))
	{
		$LastAdmLoginTime = $row["bvalue"];
	}
	mysql_close($dbh);

if($LastAdmLoginTime==0 || $LastAdmLoginTime<($TTime-120))
{
	$OnlineStatus = 0;
}
else
{
	$OnlineStatus = 1;
}


echo "pr_s=s&sema10=1&on_st=$OnlineStatus&pr_e=e";

?>