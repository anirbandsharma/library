
<?php


include '../connect.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $b_id = $_POST["b_id"];
    $b_name = $_POST["b_name"];
    $b_description = $_POST["b_description"];
    $quantity = $_POST["quantity"];
	$author = $_POST["author"];
	$year = $_POST["year"];
	$category = $_POST["category"];
	$isbn = $_POST["isbn"];
	$language = $_POST["language"];
	$photo = $_POST["photo"];

    $query = "INSERT INTO books VALUES ('$b_id', '$b_name', '$b_description', '$quantity', '$author', '$year', '$category', '$isbn', '$photo', '$language') ";
    
    if(mysqli_query($con,$query))
	{
		header("location:adminpanel.php?ok=1");
	}
	else
	{
		echo mysqli_error($con);
	}
}

?>

