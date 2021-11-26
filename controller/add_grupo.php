<?php 

include('database.php');
$grupo = $_POST;

$descricao = $grupo['descricao'];

$grupo = $grupo['grupo'];




// $query = save('usuarios',$usuario);

$con = open_database();

$sql = "INSERT INTO `grupos` (`descricao`,`grupo`) values ('$descricao', '$grupo' )";
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