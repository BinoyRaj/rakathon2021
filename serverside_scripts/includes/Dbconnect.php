<?php
function getCon() {
	include 'constants.php';
	$conn=new mysqli($sname,$uname,$pass,$db);
	if ($conn->connect_error){
		die("Connection to DB failed: ".$conn->connect_error);
	}
	return $conn;
}
?>
