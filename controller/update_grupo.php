<?php 
include('database.php');

$grupo = $_POST['grupo'];
$descricao = $_POST['descricao'];
$id = $_POST['id'];


$sql = "UPDATE `grupos` SET  `grupo`= '$grupo' , `descricao`= '$descricao' WHERE id='$id' ";
$con = open_database();
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>