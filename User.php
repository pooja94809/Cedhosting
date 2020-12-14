<?php
require_once("Dbcon.php");
class user{
	function signup($firstname,$lastname,$email,$password,$question,$answer,$mobile,$conn){
		$name = $firstname." ".$lastname;
		 $sql = "SELECT * FROM tbl_user WHERE 
        `email`='".$email."' AND `mobile`='".$mobile."'";
        $this->result=$conn->query($sql);
        if($this->result->num_rows>0){
        	while($row=$this->result->fetch_assoc()){
        		if ($row["email"]===$email){
        			echo '<script>alert("already exist")</script>';
        		}if($row['mobile']===$mobile){
					echo '<script>alert("mobile already exist")</script>';
					return false;
				}
        	}
        }else{
        	$sql = "INSERT INTO tbl_user(`email`,`name`,`mobile`,`email_approved`,`phone_approved`,`active`,`is_admin`,`sign_up_date`,`password`,`security_question`,`security_answer`) VALUES('".$email."','".$name."','".$mobile."','0','0','0','0',NOW(),'".$password."','".$question."','".$answer."')";
        	if ($conn-> query($sql) === TRUE) {
				echo ("<script>window.location.href='verification.php?email=".$email."&name=".$name."&mobile=".$mobile."';</script>");

	        	// echo '<script>alert("you are registered successfully")</script>';

	        } else {
	            echo "Error: " . $sql . "<br>" . $conn->error;
	            echo "error";
	        }
	        $conn->close();
	    }
	}
	function login($email,$password,$conn){
		$sql = "SELECT * FROM tbl_user WHERE `email`='".$email."' AND `password`='".$password."'";
		// echo $sql;
			$this -> result = $conn -> query($sql); 
			if ($this -> result -> num_rows > 0){
				while($row = $this -> result->fetch_assoc()) {
					$_SESSION['ID']=$row['id'];
					$_SESSION['email']=$email;
					$_SESSION['password']=$password;
					if($row['is_admin'] == "1"){
						$_SESSION['admindata']=array('email'=>$row['email'],'password'=>$row['password']);
						echo ("<script type='text/javascript'>
							location.href='admin/index.php'</script>");
					}else{
						$_SESSION['userdata']=array('email'=>$row['email'],'password'=>$row['password']);
						echo ("<script type='text/javascript'>
							location.href='index.php'</script>");
					}
				}
				echo '<script>alert("Login is successfull!!")</script>';
			}else{
					echo '<script>alert("Firstly signup yourself")</script>';
				}
}

	function emailapprove($email,$conn){
		echo $email;
		$sql = "UPDATE `tbl_user` SET `email_approved`= '1',`active`='1' WHERE `email` = '$email' ";
		if ($conn-> query($sql) === TRUE) {
			echo ("<script type='text/javascript'>
							location.href='login.php'</script>");
		   } 
	   else {
		   
		   echo "error";
   }
	}


	function mobileapprove($email,$conn){
		$sql = "UPDATE `tbl_user` SET `phone_approved`= '1',`active`='1' WHERE `email` = '$email' ";
		if ($conn-> query($sql) === TRUE) {
			echo ("<script type='text/javascript'>
			location.href='login.php'</script>");
		   } 
	   else {
		   
		   echo "error";
   }
	}
}

?>