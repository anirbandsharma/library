<?php

include '../connect.php';

$b_id = $_POST["b_id"];
$sname = $_POST["sname"];
$qty = $_POST["qty"];


 $result = mysqli_query($con, "SELECT `s_id` FROM `student` WHERE `student`.`s_name` = '$sname'");
 $row = mysqli_fetch_array($result);
 $s_id = $row['s_id'];



if (isset($_POST['submit'])) {

				$query = "INSERT INTO books_issue() VALUES (null,'$b_id', '$s_id', '$qty', CURRENT_TIMESTAMP)";

				if (mysqli_query($con, $query)) 
				{
					 header("location:issuebook.php");
					$success = "Success";
				} 
				else
				{
					echo mysqli_error($con);
					$success = "unsuccess";
				}

				echo $success;
			}
			
			
?>