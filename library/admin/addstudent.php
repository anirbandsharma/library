<?php
session_start();
if(!$_SESSION['name']){
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];

include '../connect.php';
include 'main.php';

?>
       
                       


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>





    <h1 style="text-align: center;">Student Registration</h1>
    <form action="addstudent1.php" method="POST">
        <table border="1" width="800" height="500" align="center">
            
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="s_name">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="text" name="s_password">
                </td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>
                    <input type="email" name="s_email">
                </td>
            </tr>
            <tr>
                <td>s_phone</td>
                <td>
                    <input type="text" name="s_phone">
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="s_address">
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <input type="text" name="department">
                </td>
            </tr>
           


            <tr>
                <td></td>
                <td><input type="submit" value="Add Student" name="submit"></td>
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

