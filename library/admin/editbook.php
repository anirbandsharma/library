<?php
session_start();

include '../connect.php';
include 'main.php';




$b_id=$_GET["b_id"];

    

$result = mysqli_query($con, "select * from books where b_id=$b_id");
$row = mysqli_fetch_array($result);

?>


                      

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>





     <h1 style="text-align: center;">Edit Form</h1>
    <form action="editbook1.php" method="POST" enctype="multipart/form-data">
        <table border="1" width="800" height="500" align="center">
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="b_id" value="<?php echo $row["b_id"] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Book Name</td>
                <td>
                    <input type="text" name="b_name" value="<?php echo $row["b_name"] ?>">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <input type="text" name="b_description" value="<?php echo $row["b_description"] ?>">
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>
                <input type="number" name="quantity" min="1" max="100" value="<?php echo $row["quantity"] ?>">
                </td>
            </tr>
            <tr>
                <td>Author</td>
                <td>
                    <input type="text" name="author" value="<?php echo $row["author"] ?>">
                </td>
            </tr>
            <tr>
                <td>year</td>
                <td>
                    <input type="text" name="year" value="<?php echo $row["year"] ?>">
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <input type="text" name="category" value="<?php echo $row["category"] ?>">
                </td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td>
                    <input type="text" name="isbn" value="<?php echo $row["isbn"] ?>">
                </td>
            </tr>
            <tr>
                <td>Language</td>
                <td>
                    <input type="text" name="language" value="<?php echo $row["language"] ?>">
                </td>
            </tr>
            <tr>
                <td>Photo</td>
                <td>
                <input type="file" name="file" value="<?php echo $row["photo"] ?>">
                </td>
            </tr>
            
            
            <tr>
            <td></td>
                <td><input type="submit" value="Update" name="submit"></td>
            </tr>
        </table> 
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    

 </body>

     </body>
 </html> 
