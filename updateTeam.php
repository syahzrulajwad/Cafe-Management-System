<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bengkel1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

if(isset($_POST)& !empty($_POST))
{
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$ic=$_POST['ic'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$work=$_POST['work'];
}

$UpdateSql="UPDATE team SET fname='$fname', lname='$lname', ic=$ic, phone='$phone', address='$address', email='$email', gender='$gender', work='$work' WHERE id=$id ";
$res=mysqli_query($conn,$UpdateSql);
	if($res)
	{
		header('location:listTeam.php');
	}
	else
	{
		$fmsg="Failed to Update Data.";
	}
mysqli_close($conn);
?>