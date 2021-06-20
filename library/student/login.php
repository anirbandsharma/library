<html>
    <head>
        <title>Login</title>
        <link rel="icon" href="../image/logo.jpg">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <style>
     body, html{
        background-image:	linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(images/background.jpg);
	background-repeat:no-repeat;
	background-size: cover;
  background-position: center;
     }   
    

    .title1{
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }
    .container{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }

    .btn, .form-control{
        border-radius: 5rem;
    }

    .form-label-group{
        padding: 20px;
    }
</style>

    </head>

<body>

<body>
<div class="title1">
    <h1>LIBRARY MANAGEMENT SYSTEM</h1>
</div>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Student Login</h5>
            <form class="form-signin"  action="log.php" method="POST">
              <div class="form-label-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>

              
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"><br><br>
             
              <a href="../student/stu_forget.php" > forget password? </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


</body>
</html>




