<?php


include '../connect.php';


$b_id = $_POST["b_id"];
$b_name = $_POST["b_name"];
$b_description = $_POST["b_description"];
$quantity = $_POST["quantity"];
$author = $_POST["author"];
$year = $_POST["year"];
$category = $_POST["category"];
$isbn = $_POST["isbn"];
$language = $_POST["language"];

$file = $_FILES["file"];
print_r($file);

if (isset($_POST['submit'])) {

	$filename = $file['name'];
	$filerror = $file['error'];
	$filetemp = $file['tmp_name'];
	$filetype = $file['type'];
	$filesize = $file['size'];

	$fileExt = explode('.', $filename);
	$fileActualEXt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualEXt, $allowed)) {
		if ($filerror === 0) {
			if ($filesize < 5120000) {
				$filenamenew = uniqid('', true) . "." . $fileActualEXt;
				$filedestination = 'uploads/' . $filenamenew;
				move_uploaded_file($filetemp, $filedestination);

				$query = "update books set  b_name='$b_name', b_description='$b_description', quantity='$quantity', author='$author', year='$year', category='$category', isbn='$isbn', photo='$filedestination', language='$language' where b_id='$b_id'  ";

				if (mysqli_query($con, $query)) {
					header("location:viewbook.php");
				} else {
					echo mysqli_error($con);
				}
			} else {
				echo "File size should be less than 5mb";
			}
		} else {
			echo "There was an error uploading your file";
		}
	} else {
		echo " Invalid File type";
	}
}
?>