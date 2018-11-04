<?php
session_start();
if(isset($_SESSION['username'])&&$_SESSION['username']!="" &&$_SESSION['isAdmin']==1){
?>

<!DOCTYPE html> 
<html>
<head>
   <title>Admin</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <style>
body{
	 margin:0px;
}
 .container{
	 width:90%;
	 margin:5px 0 50px 5%;
	 border:solid #6495ED ;
 } 
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover{
    background-color: #111;
}

.active {
    background-color: 	#6495ED;
}
.button {
    background-color: #6495ED;
    border: none;
    color: white;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px auto 4px 15%;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
}
.button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
h2{
	text-align:center;
}
.container{
	overflow:auto;
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
<body>

<ul>
<li style="float:right;background-color:#6495ED;" ><a class="active" href="logout.php">Logout</a></li>
<li style="float:right" ><a>Hello, <?php echo $_SESSION['username'];?></a></li>
<li style="float:right" ><?php
    $pic=$_SESSION['pic'];
   echo '<img src="data:image;base64,'.$pic.'" id="profile-img-tag" >';?></li>
<li style="float:left;background-color:#6495ED;" ><a href="mainpage.php" ><i class="fa fa-home w3-margin-right"></i>Home</a></li>
</ul>

<div class="container">
  <h2>Users Table</h2>
  <table id="usersTable" class="display compact">
    <thead>
      <tr>
          <th>Id</th>
          <th>Admin</th>
		  <th>First name</th>
          <th>Last name</th>
		  <th>Town</th>
		  <th>Email</th>
		  <th>Username</th>
		  <th>Delete User</th>
      </tr>
    </thead>
	<tbody>
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

//echo "Connected successfully";
$sql=mysqli_query($conn,"SELECT id,isAdmin,firstname,lastname,town,email,username from user");

while($result=mysqli_fetch_array($sql)){
	echo "
	<tr>
	<td>".$result['id']."</td>
	<td>".$result['isAdmin']."</td>
	<td>".$result['firstname']."</td>
	<td>".$result['lastname']."</td>
	<td>".$result['town']."</td>
	<td>".$result['email']."</td>
	<td>".$result['username']."</td>
	<td><button class='button' type='button' onclick='deleteuser(".$result['id'].")'>Delete</button></td>
	</tr>
	";
}
	?>
	</tbody>
  </table>
</div>

<script>
function deleteuser(id){
	var r=confirm("Are you sure you want to delete this user?");
	if(r==true){
		document.location="deleteuser.php?delete="+id;
	}
}
</script>
<div class="container">
  <h2>Pets Table(added by users)</h2>
  <table id="petsTable" class="display compact">
    <thead>
      <tr>
          <th>Id</th>
          <th>Cat/Dog</th>
		  <th>Name</th>
          <th>Gender</th>
		  <th>Age</th>
		  <th>Breed</th>
		  <th>Found</th>
		  <th>Agressive</th>
		  <th>User's phone</th>
		  <th>Delete</th>
		  <th>Accept</th>
      </tr>
    </thead>
		<tbody>
	<?php

$sql=mysqli_query($conn,"SELECT animalId,type,name,gender,age,breed,findingPlace,isAgressive,phoneNumber from animalrequest");

while($result=mysqli_fetch_array($sql)){
	echo "
	<tr>
	<td>".$result['animalId']."</td>
	<td>".$result['type']."</td>
	<td>".$result['name']."</td>
	<td>".$result['gender']."</td>
	<td>".$result['age']."</td>
	<td>".$result['breed']."</td>
	<td>".$result['findingPlace']."</td>
	<td>".$result['isAgressive']."</td>
	<td>".$result['phoneNumber']."</td>
	<td><button class='button' type='button' onclick='deletepet(".$result['animalId'].")'>Delete</button></td>
	<td><button class='button' type='button' onclick='acceptconfirm(".$result['animalId'].")'>Accept</button></td>
	</tr>
	";
}
	?>
	</tbody>
	</table>
</div>
<div class="container">
  <h2>Pets Table</h2>
  <table id="ourPetsTable" class="display compact">
    <thead>
      <tr>
          <th>Id</th>
          <th>Cat/Dog</th>
		  <th>Name</th>
          <th>Gender</th>
		  <th>Age</th>
		  <th>Breed</th>
		  <th>Agressive</th>
		  <th>Remove</th>
		  <th>Edit</th>
      </tr>
    </thead>
		<tbody>
	<?php
$sql=mysqli_query($conn,"SELECT id,type,name,gender,age,breed,isAgressive from pet");

while($result=mysqli_fetch_array($sql)){
	echo "
	<tr>
	<td>".$result['id']."</td>
	<td>".$result['type']."</td>
	<td>".$result['name']."</td>
	<td>".$result['gender']."</td>
	<td>".$result['age']."</td>
	<td>".$result['breed']."</td>
	<td>".$result['isAgressive']."</td>
	<td><button class='button' type='button' onclick='removepet(".$result['id'].")'>Remove</button></td>
	<td><button class='button' type='button' onclick='editpet(".$result['id'].")'>Edit</button></td>
	</tr>
	";
}
	?>
	</tbody>
	</table>
</div>
<div class="container">
  <h2>Adoption Requests Table</h2>
  <table id="adoptionRequestTable" class="display compact">
    <thead>
      <tr>
          <th>Id</th>
          <th>Pet ID</th>
		  <th>Person Username</th>
		  <th>Solved</th>
      </tr>
    </thead>
		<tbody>
	<?php
$sql=mysqli_query($conn,"SELECT id,petID,personUsername from adoptionRequest");

while($result=mysqli_fetch_array($sql)){
	echo "
	<tr>
	<td>".$result['id']."</td>
	<td>".$result['petID']."</td>
	<td>".$result['personUsername']."</td>
	<td><button class='button' type='button' onclick='solved(".$result['id'].")'>Solved</button></td>
	</tr>
	";
}
	?>
	</tbody>
	</table>
</div>
</body>
</html>
<script>
	$(document).ready(function() {
    $('#petsTable').DataTable();
    } );
    $(document).ready(function() {
    $('#usersTable').DataTable();
    } );
	$(document).ready(function() {
    $('#ourPetsTable').DataTable();
    } );
	$(document).ready(function() {
    $('#adoptionRequestTable').DataTable();
    } );
    function deletepet(id){
	var r=confirm("Are you sure you want to delete this pet?");
	if(r==true){
		document.location="delete.php?id="+id;
	}
	}
	function acceptconfirm(id){
	var r=confirm("Are you sure you want to accept this pet?");
	if(r==true){
		document.location="accept.php?id="+id;
	}
	}
	function removepet(id){
	var r=confirm("Are you sure you want to remove this pet from your site?");
	if(r==true){
		document.location="removepet.php?id="+id;
	}
	}
	function editpet(id){

		document.location="editpet.php?id="+id;
	}
	function solved(id){
	var r=confirm("Are you sure you do not need this information anymore?");
	if(r==true){
		document.location="solved.php?id="+id;
	}
	}
</script>
<?php
} 
else {
	header('Location:index.php');
}
?>

