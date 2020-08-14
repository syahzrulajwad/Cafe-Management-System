<?php
	session_start();

	
	$db = mysqli_connect('localhost', 'root','', 'bengkel1');
// initialize variables
	$name = "";
	$desc = "";
	$cost = "";
	$type = "";

	$id = 0;

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$desc = $_POST['desc'];
		$cost = $_POST['cost'];
		$type = $_POST['type'];

		

		mysqli_query($db, "INSERT INTO menu (name, description, cost, type) 
			VALUES ('$name', '$desc', '$cost', '$type');"); 
		$_SESSION['message'] = "Detail saved"; 
		header('location: menulist.php');
	}
?>