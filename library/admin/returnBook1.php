<?php
  
$t_id = $_REQUEST['t_id'];
  
include '../connect.php';
  
if ($t_id !== "") {
    
    $sql = "update book_issue set status='RET' where transaction_id=$t_id";
    $response="false";
    if($con->query($sql) === TRUE)
    {
       $response = "true";
    }

}
echo $response;
?>