<?php 
include('database.php');

$output= array();
$sql = "SELECT * FROM usuarios";

$con = open_database();

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE usuario like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
$all_grupos = find('grupos');
$all_parceiros = find('parceiros');
//var_dump($all_grupos);

while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['usuario'];
	$sub_array[] = $row['senha'];
	$sub_array[] = $row['email'];
	

foreach ($all_grupos as $key => $value) {
	if($value['grupo'] == $row['grupo']){
		$sub_array[] = $value['descricao'];
	}
}

$parceiro = '';
	foreach ($all_parceiros as $key => $value) {
	if($value['codparc'] == $row['codparc']){
		$parceiro = utf8_decode($value['nomeparc']);
	}
}

if(strlen($parceiro) < 1){
	$parceiro = 'Sem parceiro';
}


	$sub_array[] = $parceiro;


	
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#editUserModal" class="btn btn-info btn-sm editbtn" >Editar</a>  <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-danger btn-sm deleteBtn" >Deletar</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
