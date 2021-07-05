
<?php

include '../connect.php';

$s_id = $_POST["s_id"];
$s_name = $_POST["s_name"];
$s_password = $_POST["s_password"];
$s_email = $_POST["s_email"];
$s_phone = $_POST["s_phone"];
$s_address = $_POST["s_address"];
$department = $_POST["department"];


if (isset($_POST['submit'])) {

				$query = "INSERT INTO `student` (`s_id`, `s_name`, `s_password`, `s_email`, `s_phone`, `s_address`, `department`) VALUES (NULL, '$s_name', '$s_password', '$s_email', '$s_phone', '$s_address', '$department')";

				if (mysqli_query($con, $query)) {
					header("location:addstudent.php");
				} else {
					echo mysqli_error($con);
				}
            }
?>

