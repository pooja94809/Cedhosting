<?php
session_start();
require_once("Dbcon.php");
require_once("header.php");
require_once("User.php");
$dbcon=new dbcon();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';
$user=new user();
// $id=$_SESSION['ID'];
$email=$_GET['email'];
$mobile=$_GET['mobile'];
// print_r($mobile);

// if(isset($_POST['login'])){
// 	$otp= isset($_POST['otp'])?$_POST['otp']:'';
// 	$user= new user();
// 	$sql = $user -> otp($otp,$dbcon-> conn);
	
// }
if(isset($_POST['verifyemail'])){
	echo ("<script>window.location.href='verification.php?email=".$email."&name=".$name."&mobile=".$mobile."';</script>");
	$otp1 = rand(1000,9999);
	$_SESSION['otp1']=$otp1;
	$_SESSION['email']=$email;
	$_SESSION['mobile']=$mobile;
	// echo '<script>alert("Check your mail!! ")</script>';
	$mail = new PHPMailer();
	try {
	$mail->isSMTP(true);
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'poojakumari94809@gmail.com';
	$mail->Password = 'pooja,pk.';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->setfrom('poojakumari94809@gmail.com', 'CedHosting');
	$mail->addAddress($email);
	$mail->addAddress($email, $name);

	$mail->isHTML(true);
	$mail->Subject = 'Account Verification';
	$mail->Body = 'Hi User,Here is your otp for account verification'.$otp1;
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	// header('location: verification.php?email=' . $email);
	// echo ("<script>window.location.href='index.php?';</script>");
	// echo ("<script type='text/javascript'>
	// 							location.href='account.php'</script>");
	} catch (Exception $e) {
	echo "Mailer Error: " . $mail->ErrorInfo;
	}
	
}
if(isset($_POST['verifymobile'])){
	echo ("<script>window.location.href='verification.php?email=".$email."&mobile=".$mobile."';</script>");
	echo $mobile;
	$otp = rand(1000,9999);
	$_SESSION['otp']=$otp;
	$fields = array(
		"sender_id" => "FSTSMS",
		"message" => "Your OTP  " . $otp,
		"language" => "english",
		"route" => "p",
		"numbers" => $mobile,
	);
	
	$curl = curl_init();
	
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_SSL_VERIFYHOST => 0,
	  CURLOPT_SSL_VERIFYPEER => 0,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode($fields),
	  CURLOPT_HTTPHEADER => array(
		"authorization: 1MRKL3SNzOTjn0p9IW2oeFbrcQUdg6u5YwZVXmJhkyCEHDGvtq96OHqrQgPBuEU1ioYR5aMy7vWbeGkN",
		"accept: */*",
		"cache-control: no-cache",
		"content-type: application/json"
	  ),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	//   echo '<script>alert("Check your phone!! ")</script>';
	}
}
if(isset($_POST['submitemail'])){
	// echo $email;
	if($_POST['emailotp'] == ""){
		echo ("<script>alert('Please Enter OTP');</script>");
	}else{
		if($_SESSION['otp1']==$_POST['emailotp']){
			echo ("<script>alert('email is verified now you can login yourself');</script>");
			// echo ("<script type='text/javascript'>
			// 				location.href='login.php'</script>");
			$sql = $user -> emailapprove($email,$dbcon-> conn);
			echo $sql;
		}else{
			echo ("<script>alert('email is not verified');</script>");

		}
	}
}
if(isset($_POST['submitmobile'])){
	if($_POST['mobileotp'] == ""){
		echo ("<script>alert('Please Enter OTP');</script>");
	}else{
		if($_SESSION['otp']==$_POST['mobileotp']){
			echo ("<script>alert('mobile is verified now you can login yourself');</script>");
			$sql = $user -> mobileapprove($email,$dbcon-> conn);
		}else{
			echo ("<script>alert('mobile is not verified');</script>");
			
		}
	}
}
?>

<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>Verify through Email</h3>
									 <form action="" method="POST">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email" value="<?php echo $email;?>" disabled><br> 
									  </div>
									  <!-- <a class="acount-btn" href="#" name="verifyemail">Verify Email</a> -->
									  <input type="submit" name="verifyemail" value="Verify Email">
									</form>
									 
									
								</div>
								<div class="col-md-6 login-right">
									<h3>Verify through Mobile No.</h3>
									<form action="" method="POST">
									  <div>
										<span>Mobile No.<label>*</label></span>
										<input type="text" name="mobile" value="<?php echo $mobile;?>" disabled> 
									  </div>
									  <input type="submit" name="verifymobile" value="Verify mobile">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <!-- <h3>Verify through Email</h3> -->
									 <form action="" method="POST">
									  <div>
										<span>Enter Email OTP<label>*</label></span>
										<input type="text" name="emailotp"><br> 
									  </div>
									  <input type="submit" name="submitemail" value="submit">
									</form>
									 
									
								</div>
								<div class="col-md-6 login-right">
									<!-- <h3>Verify through Mobile No.</h3> -->
									<form action="" method="POST">
									  <div>
										<span>Enter Mobile OTP<label>*</label></span>
										<input type="text" name="mobileotp"> 
									  </div>
									  <input type="submit" name="submitmobile" value="submit">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php include("footer.php"); ?>
</body>
</html>