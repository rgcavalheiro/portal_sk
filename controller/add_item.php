<?php 
include('database.php');
$pedido = $_POST;

if(isset($_SESSION['next_item'])){
  $next_item = $_SESSION['next_item'];

}else{
  $_SESSION['next_item'] = 1;
  $next_item = 1;
}



if(isset($_SESSION['itens_pedido'])){

    $itens = $_SESSION['itens_pedido'];

    array_push($itens,$pedido);
    $_SESSION['itens_pedido'] = $itens;
    $_SESSION['next_item']++;



}else{
    $itens = array();

    array_push($itens,$pedido);


    $_SESSION['itens_pedido'] = $itens;
    $_SESSION['next_item']++;



}

  
    $return = array(
        'status'=>'true',
       
    );

    echo json_encode($return);


?>