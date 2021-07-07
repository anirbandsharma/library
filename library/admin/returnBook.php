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
else if(isset($_POST['search']))
{
	$alreadyGetData= FALSE;
}

?>

<html>

	<body>
		<style>
			body{
				background:#ddd;
			}
			.form-control-borderless {
   			 border: none;
			}

			.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    		border: none;
    		outline: none;
    		box-shadow: none;
			}
		</style>


    	
    		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
				<div class="container">
				    <br/>
					<div class="row justify-content-center">
				      <div class="col-12 col-md-10 col-lg-8">
				        <form class="card card-sm" action="returnBook.php" method="post">
				            <div class="card-body row no-gutters align-items-center">
				                <div class="col-auto">
				                    <i class="fas fa-search h4 text-body"></i>
				                </div>
				                                    
	                      <div class="col">
	                          <input class="form-control form-control-lg form-control-borderless" type="search" name="inputsearch" placeholder="Search with student id">
	                      </div>
				                                   
	                      <div class="col-auto">
	                          <input type="submit" name="search" class="btn btn-lg btn-success" id="search">
	                      </div>
				                                  
				            </div>
				        </form>
				      </div>
				                       
				  </div>
				</div>
    

    	<?php
    		if($alreadyGetData)
    		{
    			$s_id = $_GET['s_id'];
    			$s_name = $_GET['s_name'];
    			$isbn = $_GET['b_id'];
    			$b_name = $_GET['b_name'];
    			$t_id = $_GET['t_id'];
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
                	$r_str = $remaining_day > 0 ? '<p style="text-align:center; color:black; background-color:green;">'.$remaining_day. " day remains</p>" : '<p style="text-align:center; color:black; background-color:red;">'.abs($remaining_day)." day penalty</p>";
                	$fine = $remaining_day < 0 ? abs($remaining_day)*$per_day_penalty : 0;
	    			echo 
	    			'
			    		<div class="container my-4">
			    			<table class="table" id="myTable">
			        			<thead class="thead">
			            			<tr>
			            				<td>Select</td>
			            					<td>Transaction Id</td>
			                			<td>Student ID</td>
			                			<td>Name</td>
			                			<td>ISBN</td>
			                			<td>Book Name</td>
			                			<td>Return date</td>
			                			<td>penalty</td>
			                			<td>fine</td>
			            			</tr>
			        			</thead>

			        			<tbody>

							        <tr>
							        	<td><input type="checkbox" name="check_list[]" disabled="disabled"></td>
							        	<td style="vertical-align:middle;">' . $t_id . '</td>
							        	<td style="vertical-align:middle;">' . $s_id . '</td>
							            <td style="vertical-align:middle;">' . $s_name . '</td>
							            <td style="vertical-align:middle;">' . $isbn . '</td>
							            <td style="vertical-align:middle;">' . $b_name . '</td>
							            <td style="vertical-align:middle;">' . $row["return_date"] . '</td>
							            <td style="vertical-align:middle;">' . $r_str . '</td>
							            <td style="vertical-align:middle;">' . $fine . '</td>
							        </tr>

			        			</tbody>
			        		</table>
			    			
			    		</div>
			    		<div class="container my-4">
			    			<button type="submit" id="submit" class="btn btn-primary btn-lg" style="width:100%;">checkout</button>
							</div>';
	    			

		   		 }

		    	
    		}

    		else if(!$alreadyGetData && isset($_POST['inputsearch']))
    		{
    				$s_id = $_POST['inputsearch'];
    				$sql = 'select * from student inner join book_issue as m1 using(s_id) INNER JOIN books on m1.b_id=books.isbn WHERE m1.s_id ='.$s_id.' and m1.status='.'"ACQ"';
    				
    				$result1 = mysqli_query($con, $sql);
    				echo mysqli_error($con);
    				echo '<div class="container my-4">
			    			<table class="table" id="myTable1">
			        			<thead class="thead">
			            			<tr>
			            				<td>Select</td>
			            					<td>Transaction Id</td>
			                			<td>Student ID</td>
			                			<td>Name</td>
			                			<td>ISBN</td>
			                			<td>Book Name</td>
			                			<td>Return date</td>
			                			<td>penalty</td>
			                			<td>fine</td>
			            			</tr>
			        			</thead>
			        			<tbody>';
            while ($row = mysqli_fetch_array($result1)) {
            		$t_id = $row["transaction_id"];
            		$return_time = strtotime($row["return_date"]);
              	$current_time = strtotime(date("Y-m-d"));
              	$offset = 24*60*60;
              	$remaining = $return_time - $current_time;
              	$remaining_day = floor($remaining/$offset);
              	$per_day_penalty = 10;
              	$r_str = $remaining_day > 0 ? '<p style="text-align:center; color:black; background-color:green;">'.$remaining_day. " day remains</p>" : '<p style="text-align:center; color:black; background-color:red;">'.abs($remaining_day)." day penalty</p>";
              	$fine = $remaining_day < 0 ? abs($remaining_day)*$per_day_penalty : 0;


              	echo 
	    					'

							        <tr>
							        	<td style="vertical-align:middle;"><input type="checkbox" name="check_list[]"></td>
							        	<td style="vertical-align:middle;">' . $row["transaction_id"] . '</td>
							        	<td style="vertical-align:middle;">' . $row["s_id"] . '</td>
						            <td style="vertical-align:middle;">' . $row["s_name"] . '</td>
						            <td style="vertical-align:middle;">' . $row["isbn"] . '</td>
						            <td style="vertical-align:middle;">' . $row["b_name"] . '</td>
						            <td style="vertical-align:middle;">' . $row["return_date"] . '</td>
						            <td style="vertical-align:middle;">' . $r_str . '</td>
						            <td style="vertical-align:middle;">' . $fine . '</td>
							        </tr>

			        			'
			    			
			    		;

            }
            echo '
            </tbody>
			        		</table></div>
			    		<div class="container my-4">
			    			<button id="checkall" class="btn btn-primary btn-lg" style="width:100%;">checkout</button>
							</div>';
    		}

    	?>
    	

	<script type="text/javascript">
		if(document.getElementById('submit')){
			document.getElementById("submit").addEventListener("click", checkoutBooks, true);
		}
		document.getElementById("checkall").addEventListener("click", multipleCheckout, true);
	
		function checkoutBooks()
		{
			let t_id = <?php echo $t_id ?> ;
			var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 &&
            this.status == 200) {
            console.log(this.responseText);
            if(this.responseText.trim() === 'true')
            {
                alert("returned book successfull");
                window.location.href = "returnBook.php";
            }
            else{
                alert("error while returned, please checkout again");
            }
            
          }
        };

        xmlhttp.open("GET", "returnBook1.php?t_id=" + t_id, true);

        xmlhttp.send();
      

		}

		function multipleCheckout()
		{
				var n1 = document.getElementById("myTable1").rows.length;
				var checkboxes = document.getElementById("myTable1").getElementsByTagName("input");
				var i =0;
				var j=0;
				var param= [];
				var param = new Parameter();
				for(i=1; i<n1; i++)
				{
					var data = document.getElementById("myTable1").rows[i];
					let selected = checkboxes[j].checked;
					let tran_id = data.cells.item(1).innerHTML;
					let fine = data.cells.item(8).innerHTML;
					console.log(tran_id+" "+fine+" "+selected);
					var p = new Parameter();
					if(selected){
						p.t_id = tran_id;
						p.fine = fine;
						param[j]=p;
					}
					j++;


				}
				let payload = JSON.stringify(param);
				console.log(payload);

				var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 &&
            this.status == 200) {
            console.log(this.responseText);
            if(this.responseText.trim() === 'true')
            {
                alert("returned book successfull");
                window.location.href = "returnBook.php";
            }
            else{
                alert("error while returned, please checkout again");
            }
            
          }
        };

        xmlhttp.open("POST", "returnBook2.php", true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xmlhttp.send("data="+payload);
		}

		class Parameter
		{

		}
	</script>
    		

	</body>
</html>	