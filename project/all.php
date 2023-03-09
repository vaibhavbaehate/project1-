<?php 
include 'connection.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!-- <body class="hold-transition register-page"> -->
<?php 
include 'nav.php';


 ?>


<?php 
include 'side.php';

 ?>


<div class="register-box  " style="margin-left:412px;">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="name" required class="form-control" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">

                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" required class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">

                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">

                        </div>
                    </div>
                </div>

                <span style="font-size: 15px;">MALE</span>
                <input type="radio" name="radio" value="male">
                <span style="font-size: 15px;">FEMALE</span>
                <input type="radio" name="radio" value="female">
                <div class="row">
                    <div class="col-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" name="sub" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <?php
       if (isset($_POST['sub'])) {
	$name=$_POST['name'];                                                   
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password=password_hash($password, PASSWORD_DEFAULT);
  $male=$_POST['radio'];

    $sql = "INSERT INTO `user`(`name`, `email`, `password`,  `gender`,) VALUES ('$name','$email','$password','$male')";
  $result=mysqli_query($con,$sql);
       
if ($result) {
	echo "<script>alert('successfully')</script>";
  		 	echo "<script>location.href='register.php'</script>";
	
}
  else{
    echo "Error: " ;
  }

       }

       ?>




            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>

            <a href="login.php" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>

</html>