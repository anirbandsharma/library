<?php
session_start();
if (!$_SESSION['name']) {
  header("LOCATION: login.php");
}

$name = $_SESSION['name'];


// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");
include '../connect.php';
include 'main.php';

//$name = $_GET["name"];

?>





<html>

<body>

<style>
.col{
  margin: 20px;
}
</style>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js">
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>


  <form class="form-issuebook" action="issuebook1.php" method="POST">
  
   <div class="row">

    <div class="col">
      <input type="text" name="b_id" class="form-control" onkeyup="GetDetail(this.value)" placeholder="Enter the Book ID">
      
    </div>

    <div class="col">
      <input type="text" name="s_id" class="form-control" onkeyup="GetStudent(this.value)" placeholder="Enter the Student ID">
      
    </div>

   </div>

   <div class="row">

    <div class="col">
    ISBN:
      <input type="text" name="isbn" id="isbn" class="form-control-plaintext readonly" placeholder='Invalid book id' value="" required>
      </div>

      <div class="col">
    Student Name:
    <input type="text" name="s_name" id="s_name" class="form-control-plaintext readonly" placeholder='Invalid student id' value="" required>
    </div>

   </div>
   
   <div class="row">
    <div class="col">
    Book Name:
      <input type="text" name="name" id="name" class="form-control-plaintext readonly" placeholder='Invalid book id' value="" required>
    </div>

    <div class="col">
    Department:
      <input type="text" name="department" id="department" class="form-control-plaintext readonly" placeholder='Invalid student id' value="" required>
    </div>
   </div>

<div class="row">
   <div class="col">
    Available Quantity:
      <input type="text" name="quantity" id="quantity" class="form-control-plaintext readonly" placeholder='Invalid Quanity' value="" required>
    </div>

    <div class="col">
    Already Issued:
      <input type="text" name="issued_book" id="issued_book" class="form-control-plaintext readonly" placeholder='Invalid issued_book' value="" required>
    </div>
</div>
    

    <input class="btn btn-md btn-primary btn-block text-uppercase" name="submit" type="submit" id="submit" disabled="true"><br><br>

  </form>

  <script>
  // readonly fields
    $(".readonly").on('keydown paste focus mousedown', function(e){
        if(e.keyCode != 9) // ignore tab
            e.preventDefault();
    });
</script>

  <script>
    // onkeyup event will occur when the user 
    // release the key and calls the function
    // assigned to this event
    let disableBook = true;
    let disableStudent = true;
    function GetDetail(str) {
      document.getElementById("submit").disabled=true;
      if (str.length == 0) {
        document.getElementById("isbn").value = "";
        document.getElementById("name").value = "";
        document.getElementById("quantity").value = "";
        return;
      } else {

        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          // Defines a function to be called when
          // the readyState property changes
          if (this.readyState == 4 &&
            this.status == 200) {

            console.log(this.responseText);
            // Typical action to be performed
            // when the document is ready
            var myObj = JSON.parse(this.responseText);

            // Returns the response data as a
            // string and store this array in
            // a variable assign the value 
            // received to isbn input field

            document.getElementById("name").value = myObj[0];

            // Assign the value received to
            // other input field
            document.getElementById("isbn").value = myObj[1];
            document.getElementById("quantity").value = myObj[2];
            if(myObj[2] == 0)
            {
                disableBook=true;
            }
            else{
                disableBook=false;
            }
            if(!disableBook && !disableStudent)
            {
              document.getElementById("submit").disabled=false;
            }
          }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "getbookdetails.php?b_id=" + str, true);

        // Sends the request to the server
        xmlhttp.send();
      }
    }

    function GetStudent(str) {
       document.getElementById("submit").disabled=true;
      if (str.length == 0) {
        document.getElementById("s_name").value = "";
        document.getElementById("department").value = "";
         document.getElementById("issued_book").value = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 &&
            this.status == 200) {
            console.log(this.responseText);
            var myObj = JSON.parse(this.responseText);
            console.log(myObj["s_name"]);
            document.getElementById("s_name").value = myObj["s_name"];
            document.getElementById("department").value = myObj["department"];
            document.getElementById("issued_book").value = myObj["issued_book"];
            if(myObj["issued_book"] === 5 || myObj["issued_book"] === -1)
            {
                disableStudent =true;
            }
            else {
                disableStudent =false;
            }
            if(!disableBook && !disableStudent)
            {
              document.getElementById("submit").disabled=false;
            }
            }
        };

        xmlhttp.open("GET", "getstudentdetails.php?s_id=" + str, true);

        xmlhttp.send();
      }
    }
  </script>

</body>

</html>