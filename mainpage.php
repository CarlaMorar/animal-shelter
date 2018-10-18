<?php
session_start();
// echo "Hello, ".$_SESSION['username'];
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
.sign-in-form input[type="text"],
.sign-in-form input[type="password"]{
    display: block;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 15%;
    padding: 5px;
    border-radius: 3px;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border: 2px solid #fff;
    box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
}
.sign-in-form input[type="submit"]{
    background: #009688;
    padding: 8px 20px 8px 20px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
    font: normal 30px 'Bitter', serif;
    -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    border: 1px solid #009688;
    font-size: 15px;
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
  <a class="w3-bar-item w3-button w3-hide-small w3-hover-white">Find a pet</a>
  <a href="./addpet.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Add a pet</a>
   <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Language <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">English</a>
      <a href="#" class="w3-bar-item w3-button">Romanian</a>
    </div>
  </div>
  <p style="margin:8px auto auto 85%">Hello, <?php echo $_SESSION['username'];?></p>
  <a href="logout.php" style="margin:8px auto auto 95%" >Logout</a>
  </div>
</div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="#team" class="w3-bar-item w3-button">Team</a>
    <a href="#work" class="w3-bar-item w3-button">Work</a>
    <a href="#pricing" class="w3-bar-item w3-button">Price</a>
    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    <a href="#" class="w3-bar-item w3-button">Search</a>
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity" style="background-color:black">
  <img src="images/dog.jpg" alt="dog" style="max-width: 100%;height:auto;display: block; margin-left: auto;margin-right: auto;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">LEARN MORE ABOUT ADOPTION</button>
  </div>
</div>

<!-- Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Hello</h4>
      <h5>We are happy you are willing to help these animals <i class="fa fa-smile-o"></i></h5>
    </header>
    <div class="w3-container">
      <p>Want to adopt?</p>
      <p>Go to our <a class="w3-text-teal" href="/adopt.html">adoption section</a> to learn more!</p>
    </div>
  </div>
</div>

<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
<h2>OUR TEAM</h2>
<p>Nothing would be possible without them:</p>

<div class="w3-row"><br>

<div class="w3-quarter">
  <img src="images/employee1.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Johnny Walker</h3>
</div>

<div class="w3-quarter">
  <img src="images/employee2.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Rebecca Flex</h3>
</div>

<div class="w3-quarter">
  <img src="images/employee3.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <h3>Jan Ringo</h3>
</div>


</div>
</div>

<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter">
<h2>Pets of the month</h2>
<p>Description</p>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="/w3images/snow.jpg" alt="Picture1" style="width:100%">
  <div class="w3-container">

  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="/w3images/lights.jpg" alt="Picture2" style="width:100%">
  <div class="w3-container">
  
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="/w3images/mountains.jpg" alt="Picture3" style="width:100%">
  <div class="w3-container">
 
  </div>
  </div>
</div>

</div>

<!-- Pricing Row -->
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>Pets of the month</h2>
    <p>These are the most appreciated animals on our site</p><br>
    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">Name 1</p>
        </li>
        <li><img src="images/dog.jpg" style="width:450px"></li>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large"> Adopt</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">Name 2</p>
        </li>
        <li><img src="images/dog.jpg" style="width:450px"></li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large">Adopt</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-12">
          <p class="w3-xlarge">Name 3</p>
        </li>
        <li><img src="images/dog.jpg" style="width:450px"></li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large"> Adopt</button>
        </li>
      </ul>
    </div>
</div>

<!-- Contact Container -->
<div style="text-align:center;margin-left:30%">
<div id="contact" style="float:left;width:50%;margin-left:200px">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Come to see the animals.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i> Timisoara, Romania</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  0723496854</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  rescuetm@yahoo.com</p>
    </div>
  </div>
</div>
</div>


</body>
</html>
