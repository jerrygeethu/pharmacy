<?php


include_once('noca.php');
include_once('rcq.php');

eval(base64_decode("bGlzdCgkSVNOLCRJU05QQikgPSBHZXRMaWNlbnNlKCk7"));

echo "ps_s=s&txt_sema=1&maxwaittime=".$CONF['conf_MaxWaitTime']."&usetrans=".$CONF['conf_UseLanguageTranslator']."&license=$ISN&licensepb=$ISNPB&phponlinever=".$CONF['conf_phpOnlineVer']."&msg1=".$CONF['conf_Msg1']."&msg2=".$CONF['conf_Msg2']."&msg3=".$CONF['conf_Msg3']."&msg4=".$CONF['conf_Msg4']."&msg5=".$CONF['conf_Msg5']."&msg6=".$CONF['conf_Msg6']."&msg7=".$CONF['conf_Msg7']."&msg8=".$CONF['conf_Msg8']."&msg9=".$CONF['conf_Msg9']."&msg10=".$CONF['conf_Msg10']."&ps_e=e";

?>