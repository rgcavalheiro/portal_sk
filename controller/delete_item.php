<?php 
session_start();
$id = $_POST['id'];

$itens_pedido = $_SESSION['itens_pedido'];

$novo = array();
$delQuery = false;
foreach ($itens_pedido as $key => $value) {
   if($value['id'] != $id){
      array_push($novo,$value);     
   }else{
       $delQuery = true;
   }
}
$_SESSION['itens_pedido'] = $novo;






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