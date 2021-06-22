<?php

include '../connect.php';



    $s_id=$_GET["s_id"];

    $result = mysqli_query($con, "delete from student where s_id='$s_id'");

    
    if($result){
        header("location:viewstudent.php?ok=1");
    }
    else{
        echo "failed:  ";
        echo mysqli_error($con);
    
    }
    

?>