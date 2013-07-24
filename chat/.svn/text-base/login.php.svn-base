<?php



include_once('noca.php');
include_once('rcq.php');

$StaffUserName = $HTTP_POST_VARS['staffusername'];
$StaffPassword = $HTTP_POST_VARS['staffpassword'];


list($RV,$STV,$ADMID,$ADMPU) = IsLoginValidEx($StaffUserName,$StaffPassword);

$ADMIDF = DayanaEnc($StaffUserName);
$ADMPUF = DayanaEnc($StaffPassword);


echo "ps_s=s&loginstatus=$RV&admid=$ADMID&admpu=$ADMPU&admidf=$ADMIDF&admpuf=$ADMPUF&ssttvv=$STV&pr_e=e";



?>