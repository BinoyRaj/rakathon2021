<?php
include '../includes/Dbconnect.php';
$ReLink = $_POST['redirect'];
$email = $_POST['hospId'];
$password = $_POST['pass'];
$errormsg =  "There is some server error. Please contact us for more details.";
$HomeURL="http://localhost:8080/rakathon/index.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($email) and $email!="" and isset($password) and $password!="" and isset($ReLink) and $ReLink!=""){
        $conn=getCon();
        $stmt="SELECT `hospName` FROM `hospitalLogin` WHERE (userId='".$email."' AND password='".$password."')";
        if(!($result=mysqli_query($conn,$stmt))){
            header("refresh:.1; url=".$HomeURL."?redirect=".$ReLink."&error=true&msg='".$errormsg."'");
        }else{
            if(mysqli_num_rows($result) == 0){
                header("refresh:.1; url=".$HomeURL."?redirect=".$ReLink."&error=true&msg='Username/Password invalid'");
            }else{
                $row = mysqli_fetch_assoc($result);
                $hospName = $row["hospName"];
                session_start();
                $_SESSION['hospId'] = $email;
                $_SESSION['name'] = $hospName;
                $_SESSION['login'] = true;
                header("refresh:.1; url=".$ReLink);    
            }
        }
    }else {
        header("refresh:.1; url=".$HomeURL."?redirect=".$ReLink."&error=true&msg='Required fields are  missing'");
    }
}
?>
