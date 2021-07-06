<?php
  
// Get the b_id 
$b_id = $_REQUEST['b_id'];
  
include '../connect.php';
  
if ($b_id !== "") {

    $query = mysqli_query($con, "SELECT * FROM books WHERE isbn='$b_id'");
    $name="";
    $quantity= 0;
    if($row = mysqli_fetch_array($query))
    {
        $name = $row["b_name"];
        $quantity = $row["quantity"];
    }    
   
}
  
// Store it in a array
$result = array("$name","$b_id","$quantity");
  
// Send in JSON encoded form
$myJSON = json_encode($result,JSON_FORCE_OBJECT);
echo $myJSON;
?>
