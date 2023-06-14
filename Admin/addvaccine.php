<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body background= "doctordesk.jpg">
<ul>
<li class="dropdown"><font color="yellow" size="10">ADMIN MODE</font></li>
<br>
<h2>
<li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Vaccine</a>
    <div class="dropdown-content">
      <a href="addvaccine.php">Add Vaccine</a>
      <a href="deletevaccine.php">Delete Vaccine</a>
      <a href="showvaccine.php">Show Vaccine</a>
	
    </div>
  </li>
  
  <li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">Centers</a>
    <div class="dropdown-content">
      <a href="addcenters.php">Add Centers</a>
      <a href="deletecenters.php">Delete Centers</a>

	  <a href="showcenters.php">Show Centers</a>
    </div>
  </li>
   <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Log Out</b></button>
	</form>
  </li>
	
</ul>
</h2>
<center><h1>ADD vaccine</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  DID:<input type="number" name="did" required>
  <br>
  Name: <input type="text" name="name" required>
  <br>

  Region: <input type="text" name="region" required>
  <br>
  
  <button type="submit" name="Submit">REGISTER</button>
</form>
</font></b>
</center>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
function newUser()
{
	include 'dbconfig.php';
		$did=$_POST['did'];
		$name=$_POST['name'];

		$region=$_POST['region'];
		$sql = "INSERT INTO vaccine (DID, Name,Region) VALUES ('$did','$name','$region') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to Admin mainpage page....</h2>";
		header( "Refresh:3; url=addvaccine.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



?>

</body>
</html>