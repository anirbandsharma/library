<?php
session_start();
if(!$_SESSION['name']){
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];


// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");
include '../connect.php';
include 'main.php';

//$name = $_GET["name"];

?>





<html>
<body>
<form class="form-issuebook"  action="issuebook1.php" method="POST">
              <div class="form-label-group">
                <input type="text" name="b_id" class="form-control" placeholder="Enter the book id" value="">
              </div>

              <div class="form-label-group">
                <input type="text" name="sname" class="form-control" placeholder="Enter the student name" >
              </div>

              <div class="form-label-group">
                <input type="number" name="qty" class="form-control" placeholder="Enter the quantity" >
              </div>

              <input class="btn btn-lg btn-primary btn-block text-uppercase" name="submit"  type="submit"><br><br>
             
            </form>
	
	
</body>
</html>

