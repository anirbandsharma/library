<?php
session_start();
if (!$_SESSION['name']) {
  header("LOCATION: login.php");
}
$name = $_SESSION['name'];
include '../connect.php';
include 'main.php';

$alreadyGetData= FALSE;
if(isset($_GET['s_id']))
{
	$alreadyGetData = TRUE;
}

?>

<html>

	<body>
		<style>
			.col{
  				margin: 0px;
			}
		</style>


    	<div class="row">
    		<div class="col-md-8 offset-md-2 bg-light p-4 mt-4">
    			<h4 class="text-center">Return Book</h4>
    			<form action="" method="post" class="form-inline">
    				<input type="text" name="search" id="search" class="form-control form-control-lg rounded-0" placeholder="search student id" style="width:80%;">
    				<input type="submit" name="submit" value="search" class="btn btn-info btn-lg rounded-0" style="width:20%;">
    			</form>
    		</div>
    	</div>

    	<?php
    		if($alreadyGetData)
    		{
    			$s_id = $_GET['s_id'];
    			$s_name = $_GET['s_name'];
    			$isbn = $_GET['b_id'];
    			$b_name = $_GET['b_name'];
    			$query = "select return_date from book_issue where s_id=$s_id and b_id=$isbn";
    			$result = mysqli_query($con, $query);
            	if ($row = mysqli_fetch_array($result))
            	{
            		$return_time = strtotime($row["return_date"]);
                	$current_time = strtotime(date("Y-m-d"));
                	$offset = 24*60*60;
                	$remaining = $return_time - $current_time;
                	$remaining_day = floor($remaining/$offset);
                	$per_day_penalty = 10;
                	$r_str = $remaining_day > 0 ? '<p style="text-align:center; color:black; background-color:yellow;">'.$remaining_day. " day remains</p>" : '<p style="text-align:center; color:black; background-color:red;">'.abs($remaining_day)." day penalty</p>";
                	$fine = $remaining_day < 0 ? abs($remaining_day)*$per_day_penalty : 0;
	    			echo 
	    			'<div class="row">
			    		<div class="col">
			    			<table class="table" id="myTable">
			        			<thead class="thead">
			            			<tr>
			            				<td>Select</td>
			                			<td>Student ID</td>
			                			<td>Name</td>
			                			<td>ISBN</td>
			                			<td>Book Name</td>
			                			<td>Return date</td>
			            			</tr>
			        			</thead>

			        			<tbody>

							        <tr>
							        	<td><input type="checkbox" name="check_list[]" disabled="disabled"></td>
							            <td style="vertical-align:middle;">' . $s_id . '</td>
							            <td style="vertical-align:middle;">' . $s_name . '</td>
							            <td style="vertical-align:middle;">' . $isbn . '</td>
							            <td style="vertical-align:middle;">' . $b_name . '</td>
							            <td style="vertical-align:middle;">' . $row["return_date"] . '</td>
							        </tr>

			        			</tbody>
			        		</table>
			    			
			    		</div>	

			    		<div class="col">
			    			<table class="table" id="myTable">
			        			<thead class="thead">
			            			<tr>
			            				<td>book id</td>
			            				<td>book name</td>
			                			<td>penalty</td>
			                			<td>fine</td>
			            			</tr>
			        			</thead>

			        			<tbody>

			        				<tr>
							            <td style="vertical-align:middle;">' . $isbn . '</td>
							            <td style="vertical-align:middle;">' . $b_name . '</td>
							            <td style="vertical-align:middle;">' . $r_str . '</td>
							            <td style="vertical-align:middle;">' . $fine . '</td>
							        </tr>
			        			</tbody>
			        		</table>
			    			
			    		</div>
	    			</div>
	    			<div class="row">
			    		<form action="returnBook.php" method="post">
			    			<input type="submit" name="submit" class="btn btn-primary btn-lg" style="width:100%;">
			    		</form>
					</div>';

					$_SESSION['ss_id']= $s_id;
					$_SESSION['bb_id']= $isbn;

		   		 }

		    	
    		}

    	?>

		<?php
			if(isset($_POST['submit']))
			{
				$s_id = $_SESSION['ss_id'];
				$b_id = $_SESSION['bb_id'];
				$return_query="update book_issue set status='RET' where b_id=$b_id and s_id=$s_id";
			    $result = mysqli_query($con, $return_query);
			    if ($result){
			        echo '<script>alert("returned book successfull")</script';
			    }
			    else{
			        echo '<script>alert("error while returned, please checkout again")</script';
			    }
			}
		?>
    		

	</body>
</html>	