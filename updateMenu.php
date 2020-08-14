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
	$name=$_POST['name'];
	$desc=$_POST['desc'];
	$cost=$_POST['cost'];
	$type=$_POST['type'];

}

$UpdateSql="UPDATE menu SET name='$name', description='$desc', cost=$cost, type='$type' WHERE id=$id ";
$res=mysqli_query($conn,$UpdateSql);
	if($res)
	{
		header('location:menulist.php');
	}
	else
	{
		$fmsg="Failed to Update Data.";
	}
mysqli_close($conn);
?>