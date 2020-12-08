<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include("header.php");
require("sql.php");

if(isset($_POST['submit'])){
	$firstname= isset($_POST['first']);
	echo $firstname;
	$lastname= isset($_POST['first'])?$_POST['last']:'';
	$email= isset($_POST['email'])?$_POST['email']:'';
	$password= isset($_POST['password'])?$_POST['password']:'';
	$confirm= isset($_POST['confirm'])?$_POST['confirm']:'';
	$question= isset($_POST['question'])?$_POST['question']:'';
	$answer= isset($_POST['answer'])?$_POST['answer']:'';
	// echo "<script'>alert('message');</script>";
}
?>

	<!---header--->
	<!---header--->
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
						<input type="text" name="first"> 
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<input type="text" name="last"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email"> 
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
								<input type="password" name="password">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirm">
							 </div>
					 </div>
					  <div class="register-bottom-grid">
						    <h3>Security information</h3>
							 <div>
								<span>Security Question<label>*</label></span>
								<input type="password" name="question">
							 </div>
							 <div>
								<span>Security Answer<label>*</label></span>
								<input type="password" name="answer">
							 </div>
					 </div>
				</form>
				<div class="clearfix"> </div>
				<div class="register-but">
				   <form>
					   <input type="submit" name="submit" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
<?php
include("footer.php");
?>
</body>
</html>