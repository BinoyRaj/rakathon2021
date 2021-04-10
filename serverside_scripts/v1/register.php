<?php
session_start();
include '../includes/Dbconnect.php';
$healthId = $_POST['healthId'];
$amt = $_POST['amt'];
$errormsg =  "There is some server error. Please contact us for more details.";
$HomeURL="http://localhost:8080/rakathon/new-fri-form.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($healthId) and $healthId!="" and isset($amt) and $amt!=""){
        $conn=getCon();
        $stmt="SELECT `patientName`, `kyc`, `age`, `gender`, `mobile` FROM `NDHMDB` WHERE (healthId='".$healthId."')";
        if(!($result=mysqli_query($conn,$stmt))){
            header("refresh:.1; url=".$HomeURL."?error=true&msg='".$errormsg."'");
        }else{
            if(mysqli_num_rows($result) == 0){
                echo '<script>alert("No record found for the health ID.")</script>';
                header("refresh:.1; url=".$HomeURL."?error=true&msg='No record found for the health ID.'");
            }else{
                $row = mysqli_fetch_assoc($result);
                $name = $row["patientName"];
                $kyc = $row["kyc"];
                $age = $row["age"];
                $gender = $row["gender"];
                $mobile = $row["mobile"];
                $hospId = $_SESSION['hospId'];
                $status = "APPROVED";
                $stmt1="SELECT `entryId` FROM `patientDetails` ORDER BY entryId DESC LIMIT 1";
                $result1=mysqli_query($conn,$stmt1);
                $row1 = mysqli_fetch_assoc($result1);
                $entryId = $row1["entryId"];
                $entryId++;

                $sql="INSERT INTO `patientDetails` (`entryId`, `healthId`, `hospId`, `patientName`, `KYC`, `age`, `gender`, `mobile`, `amountRequested`, `amountRaised`, `status`) VALUES ('$entryId','$healthId','$hospId','$name','$kyc','$age','$gender','$mobile','$amt',0,'$status')";
                if(mysqli_query($conn,$sql)) {
                    
                    $fileCount = count($_FILES['bills']['name']);
                    for($i=0;$i<$fileCount;$i++) {
                        $fileName = $_FILES['bills']['name'][$i];
                        // $billImage = '/Users/binoy.raj/Documents/heap-dump/'.$entryId.'/'.$fileName;
                        $billImage = addslashes(file_get_contents($_FILES['bills']['tmp_name'][$i]));
                        $sqlUpload = "INSERT INTO `patientBills` (`entryId`, `billImage`) VALUES ('$entryId','$billImage')";
                        if(mysqli_query($conn,$sqlUpload)) {
                            echo '<script>alert("File Uploaded")</script>';
                        }
                    }

                    echo '<script>alert("Registered.")</script>';
                    header("refresh:.1; url=".$HomeURL);
                } else {
                    echo "<script>alert('$errormsg');</script>";
                    header("refresh:.1; url=".$HomeURL);
                }
                
            }
        }
    }else {
        header("refresh:.1; url=".$HomeURL."?error=true&msg='Required fields are  missing'");
    }
}
?>
