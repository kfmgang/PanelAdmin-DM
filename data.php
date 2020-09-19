<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","test");

$sqlQuery = "SELECT id,day,count FROM playerweeklycount ORDER BY id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>