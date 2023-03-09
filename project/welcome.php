<?php 
include 'connection.php';
session_start();
if (!isset($_SESSION['username'])||$_SESSION['username']!=true){
   header('location: login.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="text-center">hello word!</h1>
    <a href="logout.php"><button class="btn btn-warning">logout</button></a>
</body>

</html>