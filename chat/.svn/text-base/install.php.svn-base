<?php



include_once('config.php');

$dbhe=mysql_connect($DBHost, $DBUsername, $DBPassword,true) or exit("Could not connect");
mysql_select_db($DBDatabase,$dbhe);

echo "Creating msgdb Table...\n<BR>";
$res = mysql_query("CREATE TABLE msgdb (
				ttime double(25,8) NOT NULL,
				ccode varchar(20),
				msg text,
				code1 SMALLINT(4) default 0,
				code2 SMALLINT(4) default 0,
						PRIMARY KEY  (ttime)
						) TYPE=MyISAM
		",$dbhe);
if($res==false)
	echo "Error: ".mysql_error()."\n<BR>";
else
	echo "Done.\n<BR>";


echo "Creating cs Table...\n<BR>";
$res = mysql_query("CREATE TABLE cs (
				ccode varchar(20) NOT NULL,
				assign SMALLINT(4) default 0,
				online SMALLINT(4) default 0,
				ip varchar(20),
				code1 SMALLINT(4) default 0,
				code2 SMALLINT(4) default 0,
				lastact INT(10) default 0,
				name varchar(110),
				email varchar(50),
				username varchar(20),
						PRIMARY KEY  (ccode)
						) TYPE=MyISAM
		",$dbhe);
if($res==false)
	echo "Error: ".mysql_error()."\n<BR>";
else
	echo "Done.\n<BR>";

echo "Creating bvars Table...\n<BR>";
$res = mysql_query("CREATE TABLE bvars (
				bname varchar(254) NOT NULL,
				bvalue varchar(254),
						PRIMARY KEY  (bname)
						) TYPE=MyISAM
		",$dbhe);
if($res==false)
	echo "Error: ".mysql_error()."\n<BR>";
else
	echo "Done.\n<BR>";


mysql_close($dbhe);


?>