<?php 
session_start();
if(isset($_SESSION['username'])&&$_SESSION['username']!=""){
?>
<!DOCTYPE html>
<html>
<head>
    <title>AddPet</title>
    <link rel="stylesheet" type="text/css" href="addpet.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body style="background-image:url(./images/add.png);background-repeat:no-repeat;background-size:100%">
<div class="add-pet-form"style="width:60%">
    <h1>Give us some information about the pet you want to add</h1>
	 <h2>We will find it a home</h2>
<form action="addpet.php" method="POST" enctype="multipart/form-data">
<fieldset>
<legend><span class="number">1</span> Pet Info</legend>
<p class="add-pet-form-text">Picture</p>
<label class="custom-file-upload"> 
    <input required id="profile-img" name="image" type="file" accept="image/gif, image/jpeg, image/png" />
	<img src="" id="profile-img-tag" width="300px" />
    Choose File
</label>
<p class="add-pet-form-text">Cat or dog?</p>
<select name="animal"  required>
  <option value="nothing">--Choose an option--</option>
  <option value="cat">Cat</option>
  <option value="dog">Dog</option>
  </select>
<p class="add-pet-form-text" >Name</p>
<input type="text" name="pet-name" required>
<p class="add-pet-form-text">Gender</p>
<select name="gender" required>
  <option value="nothing">--Choose an option--</option>
  <option value="female">Female</option>
  <option value="male">Male</option>
  </select>
<p class="add-pet-form-text">Age(years)</p>
<select name="age" required>
  <option value="nothing">--Choose an option--</option>
  <option value="Younger than 1 year old">Younger than 1 year old</option>
  <option value="1-3 years old">1-3 years old</option>
  <option value="3-6 years old">3-6 years old</option>
  <option value="6-10 years old">6-10 years old</option>
  <option value="Older than 10 years old">Older than 10 years old</option>
 </select>
<p class="add-pet-form-text">Breed</p>
<input type="text" name="breed" required>
<p class="add-pet-form-text">Where did you find it?</p>
<textarea name="where"></textarea>
<p class="add-pet-form-text">Is it agressive?</p>
<select name="agressive" required>
  <option value="nothing">--Choose an option--</option>
  <option value="Yes">Yes</option>
  <option value="No">No</option>
  <option value="Don-t know">Don't know</option>
</select><br>
</fieldset>
<fieldset>
<legend><span class="number">2</span> Your info</legend>
<p class="add-pet-form-text">Your phone number</p>
<input type="text" name="phone-number" required>
</fieldset>
<input type="submit" name="add" value="Add">
</form>
</div>
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
}
else{
    echo "Access Denied! You must be logged in";
	header('Location:index.php');
	
    //redirect to login page or just display message 
}
?>
<?php
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

echo "Connected successfully";

if(isset($_POST['add']))
{
$ok=1;
$image=addslashes($_FILES['image']['tmp_name']);
$name=addslashes($_FILES['image']['name']);
$image=file_get_contents($image);
$image=base64_encode($image);


$tType=mysqli_real_escape_string($conn,$_POST['animal']);
$n=mysqli_real_escape_string($conn,$_POST['pet-name']);
$tg=mysqli_real_escape_string($conn,$_POST['gender']);
$tAge=mysqli_real_escape_string($conn,$_POST['age']);
$breed=mysqli_real_escape_string($conn,$_POST['breed']);
$where=mysqli_real_escape_string($conn,$_POST['where']);
$tAgr=mysqli_real_escape_string($conn,$_POST['agressive']);
$pn=mysqli_real_escape_string($conn,$_POST['phone-number']);

switch($tType){
case "nothing":$ok=0;break;
default:$type=$tType;break;

}

switch($tg){
case "nothing": $ok=0;break;
default: $gender=$tg;break;
}

switch($tAge){
case "nothing":$ok=0;break;
default:$age=$tAge;break;

}

switch($tAgr){
case "nothing":$ok=0;break;
default:$agr=$tAgr;break;


}
if($ok){
	
$sql="INSERT INTO animalrequest(picture,picname,type,name,gender,age,breed,findingPlace,isAgressive,phoneNumber) VALUES ('$image','$name','$type','$n','$gender','$age','$breed','$where','$agr','$pn')";
if(mysqli_query($conn,$sql)===TRUE){
		echo "New record created successfully";
		header('Location:mainpage.php');
	}	
	else {
		echo "Error: ". $sql . "<br>" . $conn->error;
	} 
}
else { 
     $message = "You must complete all fields";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

}
?>

