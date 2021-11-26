<?php 
include('database.php');
$user = $_POST;

$usuario = $user['usuario'];
$senha = $user['senha'];
$email = $user['email'];
$grupo = $user['grupo'];
$codparc = $user['codparc'];



// $query = save('usuarios',$usuario);

$con = open_database();

$sql = "INSERT INTO `usuarios` (`usuario`,`senha`,`email`,`grupo`,`codparc`) values ('$usuario', '$senha', '$email', '$grupo', '$codparc' )";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);



if($query ==true)
{
   
    $return = array(
        'status'=>'true',
       
    );

    echo json_encode($return);
}
else
{
     $return = array(
        'status'=>'false',
      
    );

    echo json_encode($return);
} 

?>