<?php 
include('database.php');
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$grupo = $_POST['grupo'];
$codparc = $_POST['codparc'];
$id = $_POST['id'];


$sql = "UPDATE `usuarios` SET  `usuario`='$usuario' , `senha`= '$senha' , `email`= '$email' , `grupo`= '$grupo' , `codparc`= '$codparc' WHERE id='$id' ";
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