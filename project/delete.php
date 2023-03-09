<?php 
include 'connection.php';
$id=$_GET['id'];
$sql="DELETE FROM `user` WHERE `id`='$id'";
$result=mysqli_query($con,$sql);
if ($result) {
	echo "<script>alert('successfully')</script>";
   echo "<script>location.href='table.php';</script>";
}
	else{
  		 echo "erorr";
  	} 

?>
?>
