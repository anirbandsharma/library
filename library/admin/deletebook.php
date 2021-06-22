<?php

include '../connect.php';
// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");



    $b_id=$_GET["b_id"];

    $result = mysqli_query($con, "delete from books where b_id='$b_id'");

    
    if($result){
        header("location:viewbook.php?ok=1");
    }
    else{
        echo "failed:  ";
        echo mysqli_error($con);
    
    }
    

?>