<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scalez=1">
    <title>AdminLTE 3 | Recover Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.
                </p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="password" name="password" required class="form-control" placeholder="New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="cpassword" required class="form-control"
                            placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="sub" class="btn btn-primary btn-block">Change password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <?php
                //print_r($_GET[]);exit;
                
              
                if(isset($_POST['sub'])){
                    if(isset($_GET['token'])){
                        $token=$_GET['token'];
                                       
                    //   echo "<pre>"; print_r("$query");exit;
                    
                    $query = mysqli_query($con,
                    
                    "SELECT * FROM `user` WHERE `token`='$token';"
                    
                    );
                    if($query
                    ){
                        echo ' <div class="alert alert-warning">
    <strong>Warning!</strong> You should <a href="#" class="alert-link">This forget password link has been expired ! Re-sent your email</a>.
  </div>';
  
                       }
                    $curDate = date("Y-m-d H:i:s");
                    if (mysqli_num_rows($query) > 0) {
                    $row= mysqli_fetch_array($query);
                            //  echo "<pre>"; print_r($row);exit;
                    $password=$_POST['password'];
                    $cpassword=$_POST['cpassword'];
                    // $curDate = date("Y-m-d H:i:s");
                    // if($row['exp_date'] >= $curDate){   
                    // }
                      //  echo "<pre>"; print_r("$sql");exit;

                    // $sql="SELECT count(*) FROM `user` WHERE  `token`='$token'"; 
                    // echo "<pre>"; print_r($sql);exit;
                    //$result=mysqli_query($con,$sql);
                    // if ($result = mysqli_query($con, $sql)) {
                     
                    // }
                    
                    // echo "<pre>"; print_r(mysqli_num_rows($result));exit;
                    $update="UPDATE `user` SET `password`='$password',`date`='$curDate' WHERE `token`= '$token' ";
                    
                    $newToken = md5($token).rand(10,9999);
                    $updateOne ="UPDATE `user` SET `token`='$newToken',`date`='$curDate' WHERE `token`= '$token' ";
                    // echo "<pre>"; print_r($updateOne);exit;


                        //password passwords doesn't match.. 
                    if($password != $cpassword){
                        echo  "passwords doesn't match";    
                   }
                   

                    // token expired......
                //    $sql="SELECT * FROM `user` WHERE  `token`='$token'";
                //    $result=mysqli_query($con,$sql);
                //  //   echo "<pre>"; print_r($result);exit;
                //    if($result){
                //     echo "This forget password link has been expired";
                //    }

                    //   echo "<pre>"; print_r($update);exit;
                    $result=mysqli_query($con,$update);
                    $result=mysqli_query($con,$updateOne);
                    if($result)
                   {
                     echo  "<script>alert('Your Password Update Successfully.')</script>";
                     echo "<script>location.href='login.php'</script>";

                //    } $sql="SELECT * FROM `user` WHERE  `token`='$token'";
                //    $result=mysqli_query($con,$sql);
                //                        //   echo "<pre>"; print_r($result);exit;
                //    if($result){
                //     echo "This forget password link has been expired";
                //    }
                   }
                else{        
                    echo "your password not update ";
                    echo  header('location:reset_password.php');
                }
               
            }
        }

                }
               
               
            
                 ?>
                <p class="mt-3 mb-1">
                    <a href="login.php">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>