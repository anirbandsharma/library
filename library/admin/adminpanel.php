<?php
session_start();
if (!$_SESSION['name']) {
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];

include '../connect.php';

include 'main.php';
// $con=mysqli_connect("localhost","root1","pass","library")or die("can't connect...");

$sql = ("SELECT COUNT(s_id) FROM student");
$rs = mysqli_query($con, $sql);
$total_students = mysqli_fetch_array($rs);

$sql2 = ("SELECT COUNT(b_id) FROM book_status");
$rs2 = mysqli_query($con, $sql2);
$total_books = mysqli_fetch_array($rs2);

$sql3 = ("SELECT COUNT(b_id) FROM book_status where status = 0");
$rs3 = mysqli_query($con, $sql3);
$available = mysqli_fetch_array($rs3);


?>



<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Students: <?php echo $total_students[0]; ?> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="viewstudent.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Total books: <?php echo $total_books[0]; ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="viewbook.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Available books: <?php echo $available[0]; ?> </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Issued books: <?php echo $total_books[0] - $available[0]; ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>



<div class="container my-4" id="viewstudent">

    <h1 style="text-align: center;">View Student</h1>
</div>


<div class="container my-4">
    <table class="table" id="myTable">
        <thead class="thead">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>E-mail</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Department</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php

            $result = mysqli_query($con, "select * from student");
            while ($row = mysqli_fetch_array($result)) {
                echo '
        <tr>
            <td>' . $row["s_id"] . '</td>
            <td>' . $row["s_name"] . '</td>
            <td>' . $row["s_email"] . '</td>
            <td>' . $row["s_phone"] . '</td>
            <td>' . $row["s_address"] . '</td>
            <td>' . $row["department"] . '</td>
            <td><button class="btn btn-primary"><a href="editstudent.php?s_id=' . $row["s_id"] . '">EDIT</a></button>
            <button class="btn btn-danger"><a href="deletestudent.php?s_id=' . $row["s_id"] . '">DELETE</a></button></td>
        </tr>
    ';
            }
            ?>
        </tbody>


    </table>
</div>



<div class="container my-4" id="viewbook">

    <h1 style="text-align: center;">View Book</h1>
</div>


<div class="container my-4">
    <table class="table" id="myTable2">
        <thead class="thead">
            <tr>
                <td>Photo</td>
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
            <td>' . $row["b_name"] . '</td>
            <td>' . $row["b_description"] . '</td>
            <td>' . $row["quantity"] . '</td>
            <td>' . $row["author"] . '</td>
            <td>' . $row["year"] . '</td>
            <td>' . $row["category"] . '</td>
            <td>' . $row["isbn"] . '</td>
            <td>' . $row["language"] . '</td>
            <td><button class="btn btn-primary"><a href="editbook.php?isbn=' . $row["isbn"] . '">EDIT</a></button>
                    <button class="btn btn-danger"><a href="deletebook.php?isbn=' . $row["isbn"] . '">DELETE</a></button></td>
                    </tr>
    ';
            }
            ?>
        </tbody>


    </table>
</div>


</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>



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
<script>
    $(document).ready(function() {
        $('#myTable2').DataTable({
            responsive: true
        });

    });
</script>


</body>

</html>