<?php 
include('database.php');

$id = $_POST['id'];
$sql = "DELETE FROM grupos WHERE id='$id'";
$con = open_database();
$delQuery =mysqli_query($con,$sql);
if($delQuery==true)
{
     $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 

?>