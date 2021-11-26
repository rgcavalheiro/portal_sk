<?php 
require_once('config.php');
include('database.php');

$output= array();
$sql = "SELECT * FROM vigencia_precos WHERE CURRENT_DATE() BETWEEN datade AND dataate";

$con = open_database();


$result = $con->query($sql);

$found = array();
while ($row = $result->fetch_assoc()) {

	array_push($found, $row['id']);
} 



$array = implode("','",$found);
$array = str_replace('\'', '', $array);





close_database($con);
$con = open_database();

$sql_precos = "SELECT * FROM fornecedores_precos WHERE codvigencia IN (".$array.")";




$result = $con->query($sql_precos);


$data = array();
$produto_lista = array();






while ($row = $result->fetch_assoc()) {




	$con2 = open_database();
	$sql_produto = "SELECT * FROM produtos WHERE codprod = ".$row['codprodseq'];

	$result2 = $con2->query($sql_produto);

	$produto = array();

	while ($row2 = $result2->fetch_assoc()) {
		array_push($produto, $row2);
	} 

	$sub_array = array();
	$produto = $produto[0];


	if($produto['tem_img']==1){
		$img = '';
	}else{
		$img = 'Sem Imagem';
	}

	$sub_array[] = $img;
	$sub_array[] = $produto['descprod'];
	$sub_array[] = $produto['caracteristicas'];
	$sub_array[] = $row['qtdminima'];
	$sub_array[] = $row['qtdmaxima'];
	$sub_array[] = 'R$ '.number_format($row['vlrunitario'], 2, ',', '.');
	$sub_array[] = $produto['id'];
    $sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#addItemModal" class="btn btn-success btn-sm addcarrinho" >Adicionar ao Carrinho</a>  ';
	$data[] = $sub_array;


} 

$count = count($data);


$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count ,
	'recordsFiltered'=>   $count,
	'data'=>$data,
);
echo  json_encode($output);
