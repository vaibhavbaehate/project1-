<?php

$columns = array(
  0 => 'name',
  1 => 'email',
  2 => 'password',
  3 => 'gender',
  4 => 'start_date',
  5 => 'salary'
);

$sql = "SELECT * FROM employees";
$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

if(!empty($_POST['search']['value'])) {
  $sql .= " WHERE name LIKE '%".$_POST['search']['value']."%' ";
  $sql .= " OR position LIKE '%".$_POST['search']['value']."%' ";
  $sql .= " OR office LIKE '%".$_POST['search']['value']."%' ";
  $query = mysqli_query($conn, $sql);
  $totalFiltered = mysqli_num_rows($query);
}

$data = array();

while($row = mysqli_fetch_array($query)) {
  $subdata = array();
  $subdata[] = $row['id'];
  $subdata[] = $row['name'];
  $subdata[] = $row['email'];
  $subdata[] = $row['password'];
  $subdata[] = $row['gender'];
  
  $data[] = $subdata;
}

$json_data =['']
?>














var datatable= $('#example').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax":{ 
            url : "server_processing.php",
          type:"POST",
          
          },
         
        });
        
    });  
    
    















    <?php
include 'connection.php';

$column = array(
  0 => 'id',
  1 => 'name',
  2 => 'email',
  3 => 'password',
  4 => 'gender',
);

$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($result);
$totalFiltered = $totalData;
$sql = "SELECT * FROM `user` WHERE 1=1";
if (!empty($_POST['search']['value'])) {
   $sql .= " AND (id Like '" . $request['search']['value'] . "%'";
   $sql .= " OR name LIKE '" . $request['search']['value'] . "%' ";
   $sql .= " OR email LIKE '" . $request['search']['value'] . "%' ";
   $sql .= " OR password LIKE '" .$request['search']['value'] . "%' ";
   $sql .= " OR gender LIKE '" . $request['search']['value'] . "%' ";
   $sql .= " OR action LIKE '" . $request['search']['value'] . "%' ";
}
  $result = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($result);
//ORDER

// $sql.=" ORDER BY " .$col[$request['order'][0]['column']]." ".$request['order'][0]['dir']."  LIMIT ".$request['start']." ,".$request['length']." ";
$data = array();

while($row = mysqli_fetch_array($result)) {
  $subdata = array();
  $subdata[] = $row['id'];
  $subdata[] = $row['name'];
  $subdata[] = $row['email'];
  $subdata[] = $row['password'];
  $subdata[] = $row['gender'];
  
  $data[] = $subdata;
}

$json_data = array(
   // "draw" => intval($request['draw']),
   "recordstotal" => intval($totalData),
   "recordsFiltered" => intval($totalFiltered),
   "data" => $data,
);

echo json_encode($json_data);




?>

















if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name=$_POST['name'];                                                   
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  // $password=password_hash($password, PASSWORD_DEFAULT);
  $male=$_POST['radio'];

    $sql = "INSERT INTO `user`(`name`, `email`, `password`, `cpassword`, `gender`,) VALUES ('$name','$email','$password','$cpassword',' $male')";
  $result=mysqli_query($con,$sql);
    ($password == $cpassword);
    if ($result) {
        echo "<script>alert('successfully')</script>";
        echo "<script>location.href='register.php'</script>";

    }
    else{
        echo "erorr";
    }
  
}
?>




















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
        // echo "erorr";
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
                    <div class="row"></div>
                        <div class="col-12">
                            <button type="submit" name="sub" class="btn btn-primary btn-block">Request new
                                password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
if(isset($_POST['sub']) && $_POST['email']){

   
    $email = $_POST['email'];
 
    $sql = "SELECT * FROM token WHERE email='$email'";
    $result = mysqli_query($con,$sql);
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
     $token = md5($email).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $Date = date("Y-m-d H:i:s",$expFormat);
 
    $sql="UPDATE token set  password='$password', token='$token' ,date='$Date' WHERE email='$email'";
    $result = mysqli_query($con,$sql);
 
    $link = "<a href='localhost/project1/reset_password.php?key=".$email."&token='$token'>Click To Reset password</a>";
 
    require ('PHPMailerAutoload.php');
 
    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "vaibhavstudenttdb@gmail.com";
    // GMAIL password
    $mail->Password = "vaibhav992001";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='vaibhavstudenttdb@gmail.com';
    $mail->FromName='vaibhav';
    $mail->AddAddress('vaibhavbarhate4@gmail.com', 'vaibhav barhate');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "Invalid Email Address. Go back";
  }
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
