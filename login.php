<?php
session_start();
$conn = mysqli_connect("localhost","root","","bengkel1");
    
if(isset($_POST) & !empty($_POST))
{
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=md5($_POST['password']);
}

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
    }
?>
<!DOCTYPE html>
<html>
<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}
 
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
  
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>
    <form class="form-signin"  method="POST">
        <h2 class="form-signin-heading">Please Login</h2>
    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Username</span>
    <input type="text" name="username" class="form-control" placeholder="Username" required>
     </div>
     <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Password</span>
      <input type="password" name="password" class="form-control" placeholder="Password" required></div>
        <button class="btn btn-lg btn-primary btn-block" href="LoginPage2.php" type="submit">Login</button>
      </form>
  </body>

</html>