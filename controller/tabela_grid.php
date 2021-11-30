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


$cards = 0;
if(isset($_POST['draw'])){
	$draw = intval($_POST['draw']);	
}else{
	$draw = 12;
	$cards = 1;
}



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

	if($produto['caracteristicas'] == ''){
		$produto['caracteristicas'] = '<br>';
	}



	if($cards == 0){



	if($produto['tem_img']==1){
		$img = '<img src="'. BASEURL.'/view/images/'.$produto['codprod'].'.dbimage"  width="42" height="42">';

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


    }else{


    	// CARDS


	if($produto['tem_img']==1){
		$img = '<img class="center" src="'. BASEURL.'/view/images/'.$produto['codprod'].'.dbimage"  height="150"></img>';

	}else{
		$img = '<img src="view/images/sem_imagem.webp" class="card-img-top" height="150">';
	}

    $sub_array['img'] = $img;
	$sub_array['descprod'] = $produto['descprod'];
	$sub_array['caracteristicas'] = $produto['caracteristicas'];
	$sub_array['qtdminima'] = $row['qtdminima'];
	$sub_array['qtdmaxima'] = $row['qtdmaxima'];
	$sub_array['vlrunitario'] = 'R$ '.number_format($row['vlrunitario'], 2, ',', '.');
	$sub_array['id'] = $produto['id'];
    $sub_array['botao'] = '<a href="#" data-id="'.$row['id'].'" class="btn btn-success btn-sm addcarrinho2" >Adicionar ao Carrinho</a>  ';

    }







	$data[] = $sub_array;


} 

$count = count($data);



$output = array(
	'draw'=> $draw,
	'recordsTotal' =>$count ,
	'recordsFiltered'=>   $count,
	'data'=>$data,
);
if($cards==0){
echo  json_encode($output);
}else{
echo  json_encode($data);	
}
