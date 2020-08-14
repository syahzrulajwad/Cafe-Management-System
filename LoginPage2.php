<?php
session_start();
$conn = mysqli_connect("localhost","root","","bengkel1");
$username=$_POST['username'];
$password=$_POST['password'];

    

	$sql="SELECT * FROM user WHERE username='$username'AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    
    if($count==1)
    {
        
        header('location: welcome.php');
    }
    else
    {
        $fmsg="Invalid Login Credentials.";
        header('location: LoginPage.html');
    }
?>