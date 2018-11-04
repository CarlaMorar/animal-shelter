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
<style type="text/css">
.details{
	text-align:left;
	
}
</style>
</head>
<body id="myPage">

<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="./mainpage.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
   <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Dogs">Filters <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
	  <form method="post" action="pets.php">
	  <label class="w3-bar-item" ><input type="radio" value="dogs" name="filter"  >Dogs</label>
	  <label class="w3-bar-item" style="margin:0px 0px 0px 13px"><input type="radio" value="puppies" name="filter"  >Puppies</label>
	  <label class="w3-bar-item"style="margin:0px 0px 0px 13px"><input type="radio" value="aDogs"  name="filter" >Adult dogs</label>
	  <label class="w3-bar-item"><input type="radio" value="cats" name="filter"  >Cats</label>
	  <label class="w3-bar-item" style="margin:0px 0px 0px 13px"><input type="radio" value="kittens" name="filter"  >Kittens</label>
	  <label class="w3-bar-item" style="margin:0px 0px 0px 13px"><input type="radio" value="aCats"  name="filter" >Adult cats</label>
	  <input type="submit" value="Apply filter" name="apply" style="margin:0px 0px 5px 30px;background-color:#008080;border-radius:6px;color:white;border:solid black" >
	  </form>
    </div>
  </div>
  
   <a href="logout.php" style="float:right" class="w3-bar-item w3-button">Logout</a>
  </div>
  
</div>
<div class="w3-row-padding w3-center w3-padding-64">
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
if(isset($_POST['filter']))
	$filter=$_POST['filter'];
else if(isset($_GET['f']) &&$_GET['f']!="")
	$filter=$_GET['f'];
else $filter="";
switch($filter)
{
	case 'dogs': $sql="SELECT * FROM pet WHERE type='dog'";break;
	case 'cats': $sql="SELECT * FROM pet WHERE type='cat'";break;
	case 'puppies': $sql="SELECT * FROM pet WHERE type='dog' AND age='Younger than 1 year'";break;
	case 'aDogs': $sql="SELECT * FROM pet WHERE type='dog' AND NOT age='Younger than 1 year' ";break;
	case 'kittens': $sql="SELECT * FROM pet WHERE type='cat'AND age='Younger than 1 year' ";break;
	case 'aCats': $sql="SELECT * FROM pet WHERE type='cat' AND NOT age='Younger than 1 year'";break;
    default:$sql="SELECT * FROM pet";break;
}
//else $sql="SELECT * FROM pet";

$result=mysqli_query($conn,$sql);
$results_per_page=6;
$number_of_results=mysqli_num_rows($result);
$number_of_pages=ceil($number_of_results/$results_per_page);
if(!isset($_GET['page'])){
	$page=1;
}
else {
	$page=$_GET['page'];
}
$this_page_first_result=($page-1)*$results_per_page;
$sql=$sql." LIMIT "." ".$this_page_first_result.",".$results_per_page;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
	$i=$row['id'];
	$n=$row['name'];
	$g=$row['gender'];
	$a=$row['age'];
	$b=$row['breed'];
  ?>
 <div class="w3-third w3-margin-bottom" style="height:300px;margin:2px auto">
      <ul class="w3-ul w3-border w3-hover-shadow"style="overflow:auto">
        
        <li><?php echo '<img style="max-height:150px" src="data:image;base64,'.$row['picture'].'">';?>
		<p><?php echo $row['name'];?></p></li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large" onclick="adopt(<?php echo $i;?>)"> Adopt</button>
		  <button class="w3-button w3-teal w3-padding-large" onclick="document.getElementById('<?php echo $i;?>').style.display='block'"> Info</button>

        </li>
      </ul>
 </div>
  <div id="<?php echo $i;?>" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('<?php echo $i;?>').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h5>Info about <?php echo $n;?> <i class="fa fa-smile-o"></i></h5>
    </header>
    <div class="w3-container">
     <?php echo '<img style="float:left;max-height:400px;border-radius:2px;margin:3px 16px 1px 1px;max-width:100%" src="data:image;base64,'.$row['picture'].'">';?>
	 <p class="details">Gender: <?php echo $g;?></p>
	 <p class="details">Age: <?php echo $a;?></p>
	 <p class="details">Breed: <?php echo $b;?></p>
    </div>
  </div>
</div>
<?php
}

?>
</div>
 <script>
 function adopt(id){
	var r=confirm("Are you sure you want to try to adopt this pet?");
	if(r==true){
	var link = 'adopt.php?id=' + id;
	document.location=link;
	}
 }
 </script>
 <footer style="margin-left:40%">
 <?php
  for($page=1;$page<=$number_of_pages;$page++){
	 echo '<a style="margin:3px" href="pets.php?page='.$page.'&f='.$filter.'">'.$page.'</a>';
 }
 ?>
 </footer>
</body>
</html>

<?php 
}
else{
    echo "Access Denied! You must be logged in";
	header('Location:index.php');
	 
}
?>
