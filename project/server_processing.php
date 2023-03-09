<?php

include 'connection.php';

// Get the start and length parameters
$start = $_POST['start'];
$length = $_POST['length'];

// Query the database
$sql = "SELECT `name`, `email`, `password`, `gender` FROM `user`LIMIT $start, $length";
$result = mysqli_query($con, $sql);

// Fetch the data
$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);

// Close the database connection
mysqli_close($con);

?>
