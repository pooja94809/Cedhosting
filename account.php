<?php
session_start();
include("header.php");
require("Dbcon.php");
require_once("User.php");
$user=new user();
$dbcon= new dbcon();
$errors = array();
$message = '';

if(isset($_POST['submit'])){
	$firstname= isset($_POST['first'])?$_POST['first']:'';
	$lastname= isset($_POST['first'])?$_POST['last']:'';
	$email= isset($_POST['email'])?$_POST['email']:'';
	$password= isset($_POST['password'])?$_POST['password']:'';
	$confirm= isset($_POST['confirm'])?$_POST['confirm']:'';
	$question= isset($_POST['question'])?$_POST['question']:'';
	$answer= isset($_POST['answer'])?$_POST['answer']:'';
	$mobile= isset($_POST['mobile'])?$_POST['mobile']:'';
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);
	
	if($password!=$confirm){
		$errors[]=array('input'=>'password','msg'=>'password does noy match');
		echo "<script>alert('confirm password does not match!');</script>";
	}else if(preg_match('/\s/', $password)){
		echo "<script>alert('spaces are not allowed in password');</script>";
	}
	else if(!strlen($password)>=8 && !strlen($password)<=16){
		echo "<script>alert('Password length should be 8-16 characters');</script>";
	}else if(!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email) || preg_match('/\s/', $email) ){
		echo "<script>alert('please enter valid email!! write in example@gmail.com format');</script>";
	}else if(!$uppercase || !$lowercase || !$number || !$specialChars){
		 echo "<script>alert('Password should be contain at least one upper case letter, one number, and one special character.');</script>";
	}
	else if(strlen($mobile) != 10){
        echo "<script>alert('Mobile No. should be of 10 digits');</script>";
    }
    else if(is_numeric($mobile) != 1){
        echo "<script>alert('Enter a Number');</script>";
    }else if($firstname===$lastname){
    	echo "<script>alert('you can not enter same firsname and lastname');</script>";
    }else if(!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $answer)|| !preg_match ("/^[a-zA-Z\s]+$/",$answer) || preg_match('/\s/', $answer) ){
    	echo "<script>alert('Enter a Valid answer');</script>";
    }else if (preg_match('[@_!#$%^&*()<>?/|}{~:]', $firstname) || is_numeric($firstname)==1 || preg_match('/\s/', $firstname)){
    	echo "<script>alert('In first name special character ,numbers and spaces are not allowed');</script>";
    }else if (preg_match('[@_!#$%^&*()<>?/|}{~:]', $lastname) || is_numeric($lastname)==1 || preg_match('/\s/', $lastname)){
    	echo "<script>alert('In last name special character,numbers and spaces are not allowed');</script>";
    }else if($mobile=='1111111111'|| $mobile=='2222222222' || $mobile=='3333333333' || $mobile=='4444444444'|| $mobile=='5555555555' || $mobile=='6666666666'|| $mobile=='7777777777'|| $mobile=='8888888888'|| $mobile=='9999999999'|| $mobile=='0000000000'){
    	echo "<script>alert('please enter valid mobile no.');</script>";
    }else if(preg_match("/^(0|[+91]{3})?[7-9][0-9]{9}$/", $mobile)){
    	echo "<script>alert('please enter valid mobile no.for zero');</script>";
    }
	else{
		$sql = $user -> signup($firstname,$lastname,$email,$password,$question,$answer,$mobile,$dbcon-> conn);
	}
	
}
?>

		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="" method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>First Name<label>*</label></span>
						<input type="text" name="first" required> 
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<input type="text" name="last" required> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email" required> 
					 </div>
					 <div>
						 <span>Mobile<label>*</label></span>
						 <input type="text" name="mobile" required> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
					
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" required>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirm" required>
							 </div>
					 </div>
					  <div class="register-bottom-grid">
						    <h3>Security information</h3>
							 <div>
							 	<span>Security question<label>*</label></span>
							 	<select class="form-control" id="dropdown" name="question"  required="required">
                                    <option selected disabled >Drop down to select question</option>
                                        <option value="childhood name">What was your childhood nickname?</option>
                                        <option value="childhood friend">What is the name of your favourite childhood friend?</option>
                                        <option value="favourite place">What was your favourite place to visit as a child?</option>
                                        <option value="dream job">What was your dream job as a child?</option>
                                        <option value="teacher's nickname">What is your favourite teacher's nickname?</option>
                                </select>
							 </div>
							 <div>
								<span>Security Answer<label>*</label></span>
								<input type="text" name="answer" required>
							 </div>
					 </div>
					 <div class="clearfix"> </div>
					 <div class="register-but">
					 	<input type="submit" name="submit" value="submit">
					 	<div class="clearfix"> </div>
					 </div>
					</div>
				</div>
				</form>
				
	</div>

			</div>
<!-- login -->
<?php
include("footer.php");
?>
</body>
</html>