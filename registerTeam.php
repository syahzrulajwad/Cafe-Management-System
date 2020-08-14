<?php
	session_start();

	
	$db = mysqli_connect('localhost', 'root','', 'bengkel1');
// initialize variables
	$fname = "";
	$lname = "";
	$ic = "";
	$phone = "";
	$address = "";
	$email = "";
	$gender = "";
	$work = "";
	$id = 0;

	if(isset($_POST['submit']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$ic = $_POST['ic'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$work = $_POST['work'];
		

		mysqli_query($db, "INSERT INTO team (fname, lname, ic, phone, address, email, gender, work) 
			VALUES ('$fname', '$lname', '$ic', '$phone', '$address', '$email', '$gender', '$work');"); 
		$_SESSION['message'] = "Detail saved"; 
		header('location: listTeam.php');
	}
?>