<div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> Your Email Is Not Found.
  </div>
  <?php
     if(isset($_POST['sub'])){
        session_start();
// use PHPMailer\PHPMailer\PHPMailer;               
// use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';
                                                               

//Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';

        function  send_password_resent($email,$token)
        {
            $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vaibhavbarhate4@gmail.com';                     //SMTP username
    $mail->Password   = 'vaibhav09092001';                               //SMTP password
    $mail->SMTPSecure = "tls";         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('vaibhavbarhate4@gmail.com', '$email');
    $mail->addAddress('vaibhavbarhate4@gmail.com', '$email');     //Add a recipient
    $mail->addAddress('vaibhavstudenttdb@gmail.com');               //Name is optional
    $mail->addReplyTo('vaibhavstudenttdb@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset password';
    $mail->Body    =  "<a href='localhost/project1/reset_password.php?token='$token'&email='$email'>Click To Reset password</a>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        }
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $token=md5(rand());
        $Sql="SELECT * FROM `token` WHERE email='$email'";
        $result=mysqli_query($con,$Sql);


        if(mysqli_num_rows($result)>0){

                    $row=mysqli_fetch_array ($result);
                    $email=$row['email'];
                    $token=$row['token'];
                      
         $update_token="UPDATE `token` SET `token`='$token' WHERE `email`='$email'limit 1";
         $update_token_run=mysqli_query($con,$update_token);
         if($update_token_run){
             send_password_resent($email,$token);
             $_SESSION['status'] = "check your email we sent tp resent password link";
            header('location:forgot.php');
            exit(0);

         }   
         else{
            $_SESSION['status'] = "something went wrong";
            header('location:forgot.php');
            exit(0);
         }
        }
        else{

            $_SESSION['status'] = "user not found";
          header('location:forgot.php');
            exit(0);
        }

    }

?>











































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



<div class="register-box  " style="margin-left:500px;">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form method="POST">
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
                <input type="radio" name="radio" required value="male">
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
             
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;

                require 'PHPMailer/PHPMailer/src/Exception.php';
                 require 'PHPMailer/PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/PHPMailer/src/SMTP.php';     
                
                //Load Composer's autoloader
                require 'vendor/autoload.php';
                function  sendemail_verify($name,$email,$token)
             {
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        // $mail->SMTPDebug = 3;        //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'vaibhav.devstree@gmail.com';                     //SMTP username
                        $mail->Password   = 'Vaibhav@2023';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    
                        //Recipients
                        $mail->setFrom('vaibhav.devstree@gmail.com', 'Mailer');
                        $mail->addAddress('vaibhavbarhate4@gmail.com', 'Joe User');     //Add a recipient
                        $mail->addAddress('$email');               //Name is optional
                        $mail->addReplyTo('vaibhavbarhate4@gmail.com', 'Information');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com'); 
                    
                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Tankyou for register';
                        $mail->Body    = "<a href='localhost/project1/register.php?token='$token'&email='$email'></a>";
                        $mail->AltBody = 'Verify Your Account ';
                    
                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }

              


           
if (isset($_POST['sub'])) {
  
    session_start();
     $name = $_POST['name'];  
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password=password_hash($password, PASSWORD_DEFAULT);

    $gender = $_POST['radio'];
    $token = md5($_POST['email']).rand(10,9999);

    // email exists or not
    $check_email="SELECT email FROM `user` WHERE email='$email' LIMIT 1";
    $check_emai_run=mysqli_query($con, $check_email);
    if(mysqli_num_rows($check_emai_run) > 0) {
        $_SESSION['status'] = "email alreay exists";
        header('location:register.php');
    

    }
    else{
       // insret user data
       $sql="INSERT INTO `user`(`name`, `email`, `password`, `gender`, `token`) VALUES ('$name','$email','$password',' $gender','$token')";
       $result=mysqli_query($con,$sql);
       if($result){
        sendemail_verify( $name,$email,$token);
        $_SESSION['status'] = "Register successfull ! please check your email";
        header('location:register.php');
     
       }
       else{
        $_SESSION['status'] = "Register failed";
        header('location:register.php');
       

       }
       if(isset($_SESSION['status'])){
        echo "<h4>".($_SESSION['status'])."</h4 >";                 
        unset ($_SESSION['status']);
    }
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