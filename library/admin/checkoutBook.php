<?php
  
$s_id = $_REQUEST['s_id'];
$b_id = $_REQUEST['b_id'];
  
include '../connect.php';
  
if ($s_id !== "" && $b_id !== "") {

    $return_query="update book_issue set status=RET where b_id='$b_id' and s_id='$s_id'";
    echo $return_query;
    $result = mysqli_query($con, $return_query);
    if ($row = mysqli_fetch_array($result)){
        $resopnse= "success";
    }
    else{
        $response = "fail";
    }

}
  
$result = array("$response");
  
$myJSON = json_encode($result);
echo $myJSON;
?>