<?php
function sendVerifyLink($email,$otp,$uname){
	$vLink="https://www.diginotes.in/diginotes_serverside_scripts_app/v1/AcActivation.php";
	$key=md5($otp);
	$to=$email;
	$subject="Verification Link for DigiNotes Account";
	$message='
    <html>
    <body>
    <p>Hello '.$uname.',</p>
        <a href="'.$vLink.'?email='.$email.'&key='.$key.'">Please click here to activate your account.</a>
    <p>Link is valid for the current month.</p><br><p>Thanking You</p><p>Team DigiNotes</p>
    </body>
    </html>
    ';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: DigiNotes <verification@diginotes.in>' . "\r\n" . 'Reply-To: DO NOT REPLY <no-reply@diginotes.in>' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	return (mail($to,$subject,$message,$headers));
}

function sendForgetPass($email,$otp,$uname){
	$vLink="https://www.diginotes.in/diginotes_serverside_scripts_app/v1/PasswordReset.php";
	$key=md5($otp);
	$to=$email;
	$subject="Password Reset Link for DigiNotes Account";
    $message='
    <html>
    <body>
    <p>Hello '.$uname.',</p>
        <a href="'.$vLink.'?email='.$email.'&key='.$key.'">Please click here to reset you account password.</a>
    <p>Link is valid for the current month.</p><br><p>Thanking You</p><p>Team DigiNotes</p>
    </body>
    </html>
    ';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: DigiNotes <verification@diginotes.in>' . "\r\n" . 'Reply-To: DO NOT REPLY <no-reply@diginotes.in>' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	return (mail($to,$subject,$message,$headers));
}
?>
