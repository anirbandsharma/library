<?php
session_start();
if(!$_SESSION['name']){
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];

include '../connect.php';
include 'main.php';
?>


                       



    <div class="container my-4">

        <h1 style="text-align: center;">View Book</h1>
    </div>


    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <td>Photo</td>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>quantity</td>
                    <td>Author</td>
                    <td>Year of publication</td>
                    <td>Category</td>
                    <td>ISBN</td>
                    <td>Language</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php

                $result = mysqli_query($con, "select * from books");
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                <tr>
                    <td><img src="' . $row['photo'] . '" width="80" height="120"></td>
                    <td>' . $row["b_id"] . '</td>
                    <td>' . $row["b_name"] . '</td>
                    <td>' . $row["b_description"] . '</td>
                    <td>' . $row["quantity"] . '</td>
                    <td>' . $row["author"] . '</td>
                    <td>' . $row["year"] . '</td>
                    <td>' . $row["category"] . '</td>
                    <td>' . $row["isbn"] . '</td>
                    <td>' . $row["language"] . '</td>
                    <td><button><a href="editbook.php?b_id=' . $row["b_id"] . '">EDIT</a></button>
                    <button><a href="deletebook.php?b_id=' . $row["b_id"] . '">DELETE</a></button></td>
            ';
                }
                ?>
            </tbody>


        </table>
    </div>

    <div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    responsive: true
                });

            });
        </script>
    </div>
</body>

</html>