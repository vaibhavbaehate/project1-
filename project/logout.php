<?php
include 'connection.php';
session_start();
session_destroy();
echo  "<script>alert('logout successfully')</script>";                           
echo  "<script>location.href='login.php'</script>";


?>