<?php 
session_start();
if(isset($_SESSION['username'])&&$_SESSION['username']!="" &&$_SESSION['isAdmin']==1 ){
$servername = "localhost";
$username = "root";
$password = "";
$dbname="shelterdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
$id = $_GET['id'];
if(!empty($id)){
    $result = mysqli_query($conn,"SELECT * FROM pet WHERE id=".$id.";");
	$row=mysqli_fetch_assoc($result);
	if($row){
	    $age=$row['age'];
		$agr=$row['isAgressive'];
		$pic=$row['picture'];
	}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
  <title>EditPet</title>
    <link rel="stylesheet" type="text/css" href="addpet.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>
<div class="add-pet-form">
    <h1><?php echo $row['name'];?></h1>
<form action="" method="POST" enctype="multipart/form-data">
<p class="add-pet-form-text">Picture</p>
<label class="custom-file-upload"> 
    <input id="profile-img" name="image" type="file" accept="image/gif, image/jpeg, image/png" />
	<!--<img src="" id="profile-img-tag" width="300px" />-->
	<?php echo '<img src="data:image;base64,'.$pic.'" id="profile-img-tag" width="300px">';?>
    Choose File
</label>
<p class="add-pet-form-text">Age(years)</p>
<p class="add-pet-form-text">Current information: <?php echo ".$age.";?></p>
<select name="age">
  <option value="nothing">--Choose an option--</option>
  <option value="Younger than 1 year old">Younger than 1 year old</option>
  <option value="1-3 years old">1-3 years old</option>
  <option value="3-6 years old">3-6 years old</option>
  <option value="6-10 years old">6-10 years old</option>
  <option value="Older than 10 years old">Older than 10 years old</option>
 </select>
<p class="add-pet-form-text">Is it agressive?</p>
<p class="add-pet-form-text">Current information: <?php echo ".$agr.";?></p>
<select name="agressive">
  <option value="nothing">--Choose an option--</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>
</select><br>
<input type="submit" name="save" value="Save">
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>
</body>
</html>

<?php
if(isset($_POST['save']))
{
	
//echo "Submit pressed!";
if(!($_FILES['image']['tmp_name']))
{
   $ok=0;
}
else{
$image=addslashes($_FILES['image']['tmp_name']);
$name=addslashes($_FILES['image']['name']);
$image=file_get_contents($image);
$image=base64_encode($image);
$sql="UPDATE pet SET picture='$image' WHERE id=$id"; 
	 
  
  $result=mysqli_query($conn,$sql);
 
  if($result===TRUE)
	  $ok=1;
     
}

//$pic=addslashes(file_get_contents($_POST['pic']));
$newAge=mysqli_real_escape_string($conn,$_POST['age']);
$isAgressiveUpdate=mysqli_real_escape_string($conn,$_POST['agressive']);
if($newAge=="nothing" && $isAgressiveUpdate=="nothing" && $ok==0){
    echo "<script type='text/javascript'>
	var r=confirm('You have not changed anything.Do you want to exit the form?');
	if(r==true){
		document.location='adminpage.php';
	}</script>";
  }
  else if($newAge=="nothing" && $isAgressiveUpdate=="nothing" && $ok==1)
  {
	  echo "<script type='text/javascript'>
	var r=confirm('You have changed the picture.Do you want to exit?');
	if(r==true){
		document.location='adminpage.php';
	}</script>";
  }
  else{
	  //echo "Here";
	  //echo ".$newAge.";
	  //echo ".$isAgressiveUpdate.";
  if($newAge!="nothing" &&$isAgressiveUpdate!="nothing" ){
	 $sql="UPDATE pet SET age='$newAge',isAgressive='$isAgressiveUpdate' WHERE id=$id"; 
	 //echo "$sql";
  }
  else if($isAgressiveUpdate!="nothing"){
	  $sql="UPDATE pet SET isAgressive='$isAgressiveUpdate' WHERE id=$id"; 
	  //echo "$sql";
  }
  else {
	 $sql="UPDATE pet SET age='$newAge' WHERE id=$id"; 
	 //echo "$sql";
  }
  $result=mysqli_query($conn,$sql);
  //echo "$result";
  if($result===TRUE)
  {
	//echo "Reusit";
	echo'<script type="text/javascript">
	document.location="adminpage.php";
	</script>';
  }
  }
}
}
else{
    echo "Access Denied! You must be logged in";
	//header('Location:index.php');
	echo'<script type="text/javascript">
	document.location="index.php";
	</script>';
	}
?>
