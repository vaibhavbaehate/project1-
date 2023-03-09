<?php
include 'connection.php';
// echo "<pre>";print_r($_POST);exit;

if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    $email = $_POST['email'];
 
    $result = mysqli_query($con,"SELECT * FROM user WHERE email='" . $email . "'");
 
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
     $token = md5($email).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $d = date("Y-m-d H:i:s",$expFormat);
 
    $update = mysqli_query($con,"UPDATE user set  `password`='" . $password . "',`token`='" . $token . "' ,`date`='" . $d . "' WHERE email='" . $email . "'");
 
    $link = "<a href='localhost/project1/reset_password.php?key=".$email."&token=".$token."'>Click To Reset password</a>";
 
    require_once('PHPMailer/PHPMailerAutoload.php');
 
    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "vaibhav.devstree@gmail.com";
    // GMAIL password
    $mail->Password = "yhewvtgfzsrkxomc";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='vaibhav.devstree@gmail.com';
    $mail->FromName='vaibhav';
    $mail->AddAddress('vaibhavbarhate4@gmail.com', 'vaibhav');
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