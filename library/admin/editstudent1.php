<?php


include '../connect.php';


if (isset($_POST['submit'])) {


    $s_id = $_POST["s_id"];
    $s_name = $_POST["s_name"];
    $s_email = $_POST["s_email"];
    $s_phone = $_POST["s_phone"];
    $s_address = $_POST["s_address"];
    $department = $_POST["department"];
	

				$query = "UPDATE `student` SET  s_name='$s_name', s_email='$s_email', s_phone='$s_phone', s_address='$s_address', department='$department', update_date=CURRENT_TIMESTAMP where s_id='$s_id'  ";
                
				if (mysqli_query($con, $query)) {
					header("location:viewstudent.php");
				} else {
					echo mysqli_error($con);
				}
}

?>