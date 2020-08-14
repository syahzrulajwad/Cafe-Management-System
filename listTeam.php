<!-- Following php code example shows how to open a database connection for MySQL database -->

<?php

$conn = mysqli_connect("localhost","root","");
     if(!$conn){
           die("Database Connection failed".mysqli_error());
}else{
$db_select = mysqli_select_db($conn,"bengkel1");
     if(!$db_select){
           die("Database selection failed".mysql_error());
}else{ 

   } 
}
$ReadSql="SELECT * FROM team";
$res = mysqli_query($conn, $ReadSql);

 

?>

<!-- This piece of PHP code defines the structure of the html table -->

 

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
   <a href="logout.php" class="w3-bar-item w3-right w3-button"><i class="fa fa-sign-out"></i></a>
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
    <a href="welcome.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="/native-php/index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Sales</a>
    <a href="listTeam.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Staff</a>
    <a href="menulist.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-tasks fa-fw"></i>  Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-file fa-fw"></i>  Report</a>
    <a href="linegraph2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Graf</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
   <h1><b>List Team</b></h1>
    </head>
<body>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
-->
    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
      <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>
<div  class="container"  style="padding-top:22px" method="post">
        <div class="row col-md-6 col-md-offset-2 custyle">
        <table id="table" class="table table-striped custab">
          <thead>
            <a href="registerTeam.html" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new staff</a>
            
           <tr bgcolor="#F0F8FF">
                     <th>Id</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Ic</th>
                     <th>Phone</th>
                     <th>Address</th>
                     <th>Email</th>
                     <th>Gender</th>
                     <th>Work Type</th>
                     <th>Action</th>
                     
                     
           </tr>
           </thead>
           

           <!-- We use while loop to fetch data and display rows of date on html table -->

<?php

     while ($r = mysqli_fetch_assoc($res)){
?>
           <tr>
               <td scope="row"><?php echo $r['id'];?></th>
               <td><?php echo $r['fname'];?></td>
               <td><?php echo $r['lname'];?></td>
               <td><?php echo $r['ic'];?></td>
               <td><?php echo $r['phone'];?></td>
               <td><?php echo $r['address'];?></td>
               <td><?php echo $r['email'];?></td>
               <td><?php echo $r['gender'];?></td>
               <td><?php echo $r['work'];?></td>
               <td> 
                <a href="selectTeam.php?id=<?php echo $r['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="deleteTeam.php?id=<?php echo $r['id']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
           </tr>
           <?php }?>
          
        </table>
</div>
<a href="/report/cetak.php"><button type="button" id="next" class="btn btn-xs btn-danger">PRINT</button></a>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function() {
              $('#table').DataTable();
          } );
        </script>
   </body>

</html>