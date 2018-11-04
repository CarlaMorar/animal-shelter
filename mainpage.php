<?php
session_start();
?>
<?php
if(isset($_SESSION['username'])&&$_SESSION['username']!=""){
?>
<!DOCTYPE html>
<html>
<head>
<title>animalshelter</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mainpage1.css">
<link rel="stylesheet" type="text/css" href="mainpage2.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
.active {
    background-color:#009688;
	text-align: center;
    padding: 10px 15px;
    text-decoration: none;
}

.images
{
    position: relative;
}
.images img
{
    display: none;
    position: absolute;
}
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}
.column:hover{
	transform:scale(1.1);
}
.row::after {
  content: "";
  clear: both;
  display: table;
}
#profile-img-tag{
	float:right;
	border-radius:40px;
	max-height:50px;
	width:45px;
	margin:auto 2px auto 2px;
}
</style>
</head>
<body id="myPage">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
  <a href="#team" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Team</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
  <a href="./pets.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Find a pet</a>
  <a href="./addpet.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Add a pet</a>
  <?php if($_SESSION['isAdmin']==1) echo '<a href="./adminpage.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Admin</a>'?>

  
  <p style="float:right">Hello, <?php echo $_SESSION['username']."    ";?><a  class="active" href="logout.php">Logout</a></p>
  <?php
    $pic=$_SESSION['pic'];
   echo '<img src="data:image;base64,'.$pic.'" id="profile-img-tag" >';?>
  </div>
</div>


<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity" style="background-color:black;margin:45px 0px 0px 0px">
  <img src="images/back.jpg" alt="back" style="max-width: 100%;height:350px;display: block; margin-left: auto;margin-right: auto;">
</div>


<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
<h2>OUR TEAM</h2>
<p>Nothing would be possible without them:</p>

<div class="w3-row"><br>

<div class="w3-quarter">
  <img src="images/e1.jpg" alt="employee" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Johnny Walker</h3>
</div>

<div class="w3-quarter">
  <img src="images/e2.jpg" alt="employee" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Rebecca Flex</h3>
</div>

<div class="w3-quarter">
  <img src="images/e3.jpg" alt="employee" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Jan Ringo</h3>
</div>

<div class="w3-quarter">
  <img src="images/e4.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Robert Smith</h3>
</div>
</div>
</div>

<div class="row" style="background:black">
  <div class="column">
    <img src="./images/find.jpg" alt="Picture1" style="width:100%">
  </div>
  <div class="column">
    <img src="./images/rescue.jpg" alt="Picture2" style="width:100%">
  </div>
  <div class="column">
    <img src="./images/donate.jpg" alt="Picture3" style="width:100%">
  </div>
</div>

<!-- Contact Container -->
<div style="text-align:center;margin-left:30%;margin-right:10%">
<div id="contact" style="float:left;width:60%;margin-left:200px">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Come to see the animals.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i> Timisoara, Romania</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  0723496854</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  friends.tm@yahoo.com</p>
    </div>
  </div>
</div>
</div>
</body>
</html>

<?php 
}
else{
    echo "Access Denied! You must be logged in";
	header('Location:index.php');
	
    //redirect to login page or just display message 
}
?>

