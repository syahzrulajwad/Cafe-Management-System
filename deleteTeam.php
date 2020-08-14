<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bengkel1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

$id=$_GET['id'];
$DelSql="DELETE FROM team WHERE id=$id";
	$res=mysqli_query($conn, $DelSql);
	if($res){
		header('location:listTeam.php');
	}
	else{
		echo "Failed to delete";
	}

mysqli_close($conn);
?>