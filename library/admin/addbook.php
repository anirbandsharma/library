<?php
session_start();

$name=$_SESSION['$name'];

include '../connect.php';


$name=$_GET["name"];

?>

<html>
     

 <head>
     <title>library</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 </head>

 <body>
     <div class="container">
         <h1 class="text-center display-3">Librarian panel</h1>
     </div>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#"><?php echo ("Welcome $name"); ?></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="#">Issue Book <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Return Book</a>
                 </li>
                 <li class="nav-item dropdown active">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Dropdown
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="addbook.php">Add Books</a>
                         <a class="dropdown-item" href="viewbook.php">View library status</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="logout.php">Log Out</a>
                 </li>
             </ul>
             <form class="form-inline my-2 my-lg-0">
                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
             </form>
         </div>
     </nav>


     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>





     <h1 style="text-align: center;">Input Form</h1>
    <form action="addbook1.php" method="POST">
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
                <input type="file" name="photo">
                </td>
            </tr>
            
            
            <tr>
            <td></td>
                <td><input type="submit" value="Add"></td>
            </tr>
        </table> 
    </form>


 </body>

     </body>
 </html> 
