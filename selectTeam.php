<?php
$conn = mysqli_connect("localhost","root","");
     if(!$conn){
           die("Database Connection failed".mysqli_error());
}else{
$db_select = mysqli_select_db($conn,"bengkel1");
     if(!$db_select){
           die("Database selection failed".mysql_error());
}
}
$id=$_GET['id'];
$SelSql="SELECT * FROM team WHERE id=$id";
$res=mysqli_query($conn,$SelSql);
$r=mysqli_fetch_assoc($res);
 
?>

<!DOCTYPE html>
<html>

<head>
<title>MENU</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
   <a href="#" class="w3-bar-item w3-right w3-button"><i class="fa fa-sign-out"></i></a>
  <span class="w3-bar-item w3-right">LogOut</span>
  <span class="w3-bar-item w3-left">Cafe' Management System</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="icon.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>ADMIN</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="welcome.html" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Sales</a>
    <a href="listTeam.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Staff</a>
    <a href="menu.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-tasks fa-fw"></i>  Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-file fa-fw"></i>  Report</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
</head>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <body>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
      <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>

<link rel="stylesheet" href="style.css">
<div class="container" style="margin:400px;margin-top:50px;">
<h3>Update Team Form</h3>
  <form action="updateTeam.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="fname">First Name</label>
    <input type="text" id="fname"  name="fname" value="<?php echo $r['fname'];?>"placeholder="First Name"/>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" value="<?php echo $r['lname'];?>" placeholder="Your last name..">

    <label for="ic">NRIC</label>
    <input type="text" id="ic" name="ic" value="<?php echo $r['ic'];?>" placeholder="Your NRIC number..">

    <label for="phone">phone</label>
    <input type="text" id="phone" name="phone" value="<?php echo $r['phone'];?>" placeholder="Your phone number..">

    <label for="address">Address</label>
    <input type="text" id="address" name="address" value="<?php echo $r['address'];?>" placeholder="Your Address..">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="<?php echo $r['email'];?>" placeholder="Your Email..">

    <label for="gender">Gender</label>
     <select id="gender" name="gender">
      <option value="none"<?php if($r['gender']=='none'){echo "selected";}?>>None</option>
      <option value="male"<?php if($r['gender']=='male'){echo "selected";}?>>Male</option>
      <option value="female"<?php if($r['gender']=='female'){echo "selected";}?>>Female</option>
    </select>

    <label for="work">Work Type</label>
     <select id="work" name="work">
      <option value="none"<?php if($r['work']=='none'){echo "selected";}?>>None</option>
      <option value="fulltime"<?php if($r['work']=='fulltime'){echo "selected";}?>>Full Time</option>
      <option value="parttime"<?php if($r['work']=='parttime'){echo "selected";}?>>Part Time</option>
    </select>
  <div>
    <input type="submit" name="submit" value="Update!" >
    <a href="listTeam.php"><input type="button"  name="back" value="Back" >
    </a></div>
  </div>
  </form>
  </div>
</div>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</body>
<!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by Ajwad</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
</body>
</html>
