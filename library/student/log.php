
<?php

include '../connect.php';
// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");

$name = $_POST["name"];
$password = $_POST["password"];
$result=mysqli_query($con,"select * from admin where name = '$name'");
	$row=mysqli_fetch_array($result);
	if($row['password']==$password)
	{
		$_SESSION['name']=$name;
 		header("Location:adminpanel.php?name=$name");
 	}
 	else
 	{
 		header("location:login.php?err=1");
 	}
 


?>
