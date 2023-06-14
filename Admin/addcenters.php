<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body background= "clinicview.jpg" behavior="fixed">
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
<center><h1>ADD CENTERS</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  CID:<input type="number" name="cid" required>
  <br>
  Name: <input type="text" name="name" required>
  <br>
  Address: <input type="text" name="address" required>
  <br>
  Town: <input type="text" name="town" required>
  <br>
  City: <input type="text" name="city" required>
  <br>
  Contact no.: <input type="number" name="contact" maxlength="10" minlength="10" required>
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
function newcenters()
{
	include 'dbconfig.php';
		$cid=$_POST['cid'];
		$name=$_POST['name'];
		$town=$_POST['town'];
		$city=$_POST['city'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		$sql = "INSERT INTO centers (CID, Name, Address, Town, City, Contact) VALUES ('$cid','$name','$address','$town','$city','$contact')";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to Admin mainpage page....</h2>";
		header( "Refresh:3; url=addcenters.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkcid()
{
	include 'dbconfig.php';
	$cid=$_POST['cid'];
	$sql= "SELECT * FROM centers WHERE cid = '$cid'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>CID already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		newcenters();
	}

	
}
if(isset($_POST['Submit']))
{
	if(!empty($_POST['cid'])&&!empty($_POST['name'])&&!empty($_POST['address'])&&!empty($_POST['town'])&&!empty($_POST['city']) && !empty($_POST['contact']))
			checkcid();
	else
		echo "EMPTY VALUES NOT ALLOWED";
}

?>

</body>
</html>
