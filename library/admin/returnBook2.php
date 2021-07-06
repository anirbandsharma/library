<?php
  
include '../connect.php';

$data='{"0":{"t_id":"2","fine":"350"},"1":{"t_id":"3","fine":"0"}}';
$data= $_POST['data'];

$response = "false";
if(isset($data))
{
   $myJSON = json_decode($data,true);
   $c = count($myJSON);
   $i=0;
   $s="";
   for($i=0; $i<$c ;$i++){
      $t_id = $myJSON[$i]['t_id'];
      $fine = $myJSON[$i]['fine'];
      if($i == 0)
      {
         $s=$s."transaction_id=".$t_id;
      }
      else{
         $s=$s." or transaction_id=".$t_id;
      }
     
   }

   $sql = "update book_issue set status='RET' where $s";
   $response = "false";
   if($con->query($sql) === TRUE)
   {
       $response = "true";
   }
   
}

echo $response;

?>