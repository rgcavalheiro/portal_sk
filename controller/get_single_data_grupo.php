<?php 
include('database.php');
$id = $_POST['id'];
$sql = "SELECT * FROM grupos WHERE id='$id' LIMIT 1";
$con = open_database();
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
