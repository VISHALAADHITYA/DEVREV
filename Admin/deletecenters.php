<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body background= "clinicview.jpg">
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
<h1>
<center><h1>DELETE CENTERS</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
Enter CID:<center><input type="number" name="cid"></center>
			<button type="submit" name="Submit1">Delete by CID</button>
			<br>---------OR---------<br>
Select Name:<br><?php
				require_once('dbconfig.php');
				$clinic_result = $conn->query('select * from centers order by City,Town');
				?>
				<center>
				<select name="centersname">
				<option value="">---Select Name---</option>
				<?php
				if ($centers_result->num_rows > 0) {
				while($row = $centers_result->fetch_assoc()) {
				?>
				<option value="<?php echo $row["CID"]; ?>"><?php echo $row["Name"].", ".$row["Town"].", ".$row["City"].",(".$row["Address"].")"."(CID=".$row["CID"].")"; ?></option>
				<?php
					}
					}
				?>
				</select></center>
				
				<button type="submit" name="Submit2">Delete by Name</button>
</form>			
<?php
session_start();
include 'dbconfig.php';
if(isset($_POST['Submit1']))
{
	$cid=$_POST['cid'];
	$sql = "DELETE FROM centers WHERE CID= $cid ";

	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully.Refreshing....";
		header( "Refresh:2; url=deletecenters.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}

}
if(isset($_POST['Submit2']))
{
	$cid=$_POST['centersname'];
	$sql = "DELETE FROM centers WHERE cid = $cid ";

	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully.Refreshing....";
		header( "Refresh:2; url=deletecenters.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}

}	
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
?>			
</body>
</html>