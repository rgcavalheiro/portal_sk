<?php 
require_once('config.php');
include('database.php');

$output= array();
$sql = "SELECT * FROM produtos";

$con = open_database();

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE descprod like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
	$sql .= " ORDER BY id asc";
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
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['codprod'];
	$sub_array[] = $row['descprod'];
	$sub_array[] = $row['caracteristicas'];
	$sub_array[] = $row['local'];
	$sub_array[] = $row['codvol'];



if($row['tem_img'] > 0){
	$img = '<img src="'. BASEURL.'/view/images/'.$row['codprod'].'.dbimage"  width="42" height="42">';
}else{
	$img = 'Sem Imagem';
}



	$sub_array[] = $img;
  	
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#Modal" class="btn btn-info btn-sm gerausbtn" >Editar</a>  <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-danger btn-sm deleteBtn" >Deletar</a>';
	$data[] = $sub_array;
}


$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
