<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Forgot Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" class="col-12">
                        <button type="submit" name="sub" class="btn btn-primary btn-block">Request new
                            password</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>



            <?php 
                                    
                 
               if (isset($_POST['sub']) && $_POST['email'])
               { 
                    $email = $_POST['email'];
                 
                    $sql = "SELECT * FROM user WHERE email='$email '";
                    $result=mysqli_query($con, $sql);
                    $row= mysqli_fetch_array($result);
                    
                 if($row)
                 {
                    $token = $row['token'];
                    //print_r($token);exit;
                    //$token = md5($email).rand(10,9999);
                
                //     $expFormat = mktime(
                //     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                //     );
     
                //    $d = date("Y-m-d H:i:s",$expFormat);
          
           
                   //$expFormat = mktime(
                    //date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                    //);
                //   $expDate = date("Y-m-d H:i:s",$expFormat);
                //    $sql = "UPDATE user set  token=' $token', `date`='$expDate'WHERE email='$email'";
                   $result=mysqli_query($con,$sql);
                   
                   $link = "<a href='localhost/project1/reset_password.php?token=$token'>Click To Reset password</a>";
                   //echo "<pre>"; print_r($link);exit;
                 
                   } 
                     
                   require_once('PHPMailer/PHPMailerAutoload.php');
                
                   $mail = new PHPMailer();
                    $mail->CharSet =  "utf-8";
                    $mail->SMTPDebug = 0; 
                   $mail->IsSMTP();
                   // enable SMTP authentication
                   $mail->SMTPAuth = true;                  
                   // GMAIL username
                   $mail->Username = "vaibhav.devstree@gmail.com";
                   // GMAIL password
                   $mail->Password = "pwzxpkgkxzuaavkf";
                   $mail->SMTPSecure = "ssl"; 
                

                   // sets GMAIL as the SMTP server
                   $mail->Host = "smtp.gmail.com";
                   // set the SMTP port for the GMAIL server
                   $mail->Port = "465";
                   $mail->From='vaibhav.devstree@gmail.com';
                   $mail->FromName='vaibhav';
                   $mail->AddAddress('vaibhav.devstree@gmail.com', 'vaibhav');
                   $mail->Subject  =  'Reset Password';
                   $mail->IsHTML(true);
                   $mail->Body    = '
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   <strong>Success!</strong>Click On This Link to Reset Password ' .$link.'.';
                 
                   if($mail->Send())
                   {
                     echo  "<script>alert('Check Your Email and Click on the link sent to your email.')</script>";
                   }
                   else
                   {
                     echo "Mail Error - >".$mail->ErrorInfo;
                   }
                 }else{
                //    echo "Invalid Email Address. Go back";
                 }
               
               ?>


            <p class="mt-3 mb-1">
                <a href="login.php">Login</a>
            </p>
            <p class="mb-0">
                <a href="register.php" class="text-center">Register a new membership</a>
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
  