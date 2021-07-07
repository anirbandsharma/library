<?php

include '../connect.php';

$b_id = $_POST["b_id"];
$s_id = $_POST["s_id"];

$issue_date = date("Y-m-d");
$return_date =  date('Y-m-d', strtotime($issue_date . ' + 3 month'));

echo $issue_date;
echo $return_date;




if (isset($_POST['submit'])) {

	$query = "INSERT INTO book_issue VALUES (NULL, '$b_id', '$s_id', '$issue_date', '$return_date', 'ACQ' )";

	if (mysqli_query($con, $query)) {
		header("location:issuebook.php");
		$success = "Success";
	} else {
		echo mysqli_error($con);
		$success = "unsuccess";
	}

	echo $success;
}
