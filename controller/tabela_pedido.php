<?php 
require_once('config.php');
include('database.php');





if(isset($_SESSION['itens_pedido'])){
	$pedidos = $_SESSION['itens_pedido'];
	$data = array();
	foreach ($pedidos as $key => $row) {


		$produto = getWhere('produtos','codprod',$row['codprod']);
		$produto = $produto[0];

		$sub_array = array();

		$sub_array[] = $row['id'];

		if($produto['tem_img'] == 1){			

			$sub_array[] = '<img src="'. BASEURL.'/view/images/'.$row['codprod'].'.dbimage"  width="42" height="42">';

		}else{
			
			$sub_array[] = 'sem img';

		}

		$sub_array[] = utf8_decode($produto['descprod']);
		


		


		$sql = "SELECT * FROM fornecedores_precos WHERE codvigencia = ".$row['codvigencia']." and codprodseq = ".$row['codprod']." LIMIT 1";
		$con = open_database();
		$query = mysqli_query($con,$sql);
		$preco = mysqli_fetch_assoc($query);





		$sub_array[] = 'R$ '.number_format($preco['vlrunitario'], 2, ',', '.');
		$sub_array[] = $row['quantidade'];
		$sub_array[] = 'R$ '.number_format($row['quantidade']*$preco['vlrunitario'], 2, ',', '.');
		$sub_array[] = ' <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-danger btn-sm deleteItem" >Remover</a>';


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






}else{

	$data = array();

	$output = array(
		'draw'=> 0,
		'recordsTotal' =>0 ,
		'recordsFiltered'=>   0,
		'data'=>$data,
	);
	echo  json_encode($output);


}



