<?php
session_start(); //Variable to Store error message;

$db = mysqli_connect('localhost', 'root', '', 'bengkel1');
$user = "";
$pass = "";

if (isset($_POST['submit']))
{
 if(empty($_POST['user']) || empty($_POST['pass']))
 {
 	$error = "Username or Password is Invalid";
 }
 else
 {
 //Define $user and $pass
 	$user=$_POST['user'];
 	$pass=$_POST['pass'];


 $query = mysqli_query($db, "SELECT * FROM users WHERE password='$pass' AND usename='$user'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1)
 	{
 		 $_SESSION['message']= "Record updated successfully";
	 	header('location: welcome.html');
  	// Redirecting to other page
 	}
 else
 	{
 		$_SESSION['message'] = "Username of Password is Invalid";
 		header('location: LoginPage.html');
 	}
 mysqli_close($conn); // Closing connection
 }
}
 
?>