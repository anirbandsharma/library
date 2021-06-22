<?php
session_start();
if(!$_SESSION['name']){
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];


// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");
include '../connect.php';
include 'main.php';

//$name = $_GET["name"];

?>




    <h1 style="text-align: center;">Input Form</h1>
    <form action="addbook1.php" method="POST" enctype="multipart/form-data">
        <table border="1" width="800" height="500" align="center">
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="b_id">
                </td>
            </tr>
            <tr>
                <td>Book Name</td>
                <td>
                    <input type="text" name="b_name">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <input type="text" name="b_description">
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>
                    <input type="number" name="quantity" min="1" max="100">
                </td>
            </tr>
            <tr>
                <td>Author</td>
                <td>
                    <input type="text" name="author">
                </td>
            </tr>
            <tr>
                <td>year</td>
                <td>
                    <input type="text" name="year">
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <input type="text" name="category">
                </td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td>
                    <input type="text" name="isbn">
                </td>
            </tr>
            <tr>
                <td>Language</td>
                <td>
                    <input type="text" name="language">
                </td>
            </tr>
            <tr>
                <td>Photo</td>
                <td>
                    <input type="file" name="file">
                </td>
            </tr>


            <tr>
                <td></td>
                <td><input type="submit" value="Add Book" name="submit"></td>
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

</html>