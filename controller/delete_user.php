<?php 
include('database.php');

$user_id = $_POST['id'];
$sql = "DELETE FROM usuarios WHERE id='$user_id'";
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