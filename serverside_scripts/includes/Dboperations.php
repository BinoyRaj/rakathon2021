<?php
include 'Dbconnect.php';
include 'MailActions.php';

function isUserExist($email,$conn){
	$stmt="SELECT acStatus FROM users WHERE emailId='".$email."'";
	$result=mysqli_query($conn,$stmt);
	$row = mysqli_fetch_assoc($result);
	$acStat = $row["acStatus"];
	if($acStat==3 || $acStat==1 || $acStat==2){
		return true;
	}
	return false;
}

function createUser($email,$uname,$dob,$gender,$pass,$cDist){
	$conn=getCon();
	$password=sha1(md5($pass));
	$otp = mt_rand(1111,9999);
	$sql="INSERT INTO `users`(`emailId`, `name`, `dob`, `gender`, `password`, `acStatus`, `otp`, `currentDistrict`, `lastLogin`) VALUES ('$email','$uname','$dob','$gender','$password',1,$otp,'$cDist',CURDATE())";
	if(!mysqli_query($conn,$sql)){
		if(isUserExist($email,$conn)){
			$conn->close();
			return 0; //comment: 0 means user already exits
		}else{
			$conn->close();
			return 1; //comment: some sql operation error;
		}
	}else{
		if(sendVerifyLink($email,$otp,$uname)){
			$conn -> close();
			return 2; //comment: user registered successfully;	
		}else{
			return 3;
		}
		
	}
}
?>
