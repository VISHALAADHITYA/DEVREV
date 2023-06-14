<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body>

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
<p>

<center><h1>********WELCOME ADMIN*******</h1> 
<?php
session_start();	
	if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=../cover.php"); 
	}
?>
</body>
</html>