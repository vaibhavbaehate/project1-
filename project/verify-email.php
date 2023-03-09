<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Account Activation by Email Verification using PHP</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
if($_GET['email'] )
{

$email = $_GET['email'];
$token = $_GET['token'];
$sql = "SELECT * FROM `user` WHERE `email`='$email'";
$result=mysqli_query($con,$sql);

$d = date('Y-m-d H:i:s');
if (mysqli_num_rows($result) > 0) {
$row= mysqli_fetch_array($result);
if($row['date'] == NULL){
$sql="UPDATE user set `date` ='$d' WHERE `email`='$email'";
$result=mysqli_query($con,$sql);
$msg = "Congratulations! Your email has been verified.";
}else{
$msg = "You have already verified your account with us";
}
} else {
$msg = "This email has been not registered with us";
}
}
else
{
$msg = "Danger! Your something goes to wrong.";
}
?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header text-center">
                User Account Activation by Email Verification using PHP
            </div>
            <div class="card-body">
                <p><?php echo $msg; ?></p><br>
                <a href="login.php" class="btn btn-default">Login</a>
            </div>
        </div>
    </div>
</body>

</html>