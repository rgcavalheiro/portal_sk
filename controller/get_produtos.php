
<?php


include('database.php');
$con = open_database();


if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,DB_NAME);
$sql="SELECT * FROM produtos ";
$result = mysqli_query($con,$sql);


//var_dump($result);

while($row = mysqli_fetch_assoc($result))
{
	$sub_array = array();
	$sub_array['id'] = $row['id'];
	$sub_array['codprod'] = $row['codprod'];
	$sub_array['descprod'] = $row['descprod'];
	$sub_array['caracteristicas'] = $row['caracteristicas'];
	$sub_array['local'] = $row['local'];
	$sub_array['codvol'] = $row['codvol'];


if(strlen(BASEURL)>2){
	$arg = BASEURL;
}else{
	$arg = '';
}

if($row['tem_img'] > 0){
	$img = '<img src="'.$arg.'/view/images/'.$row['codprod'].'.dbimage"  class="card-img-top tem_img" height="150">';
}else{
	$img = '<img src="'.$arg.'/view/images/sem-imagem.webp" class="card-img-top tem_img" height="150">';
}




  	

	$sub_array['tem_img'] = $img;


$data[] = $sub_array;
}



echo  json_encode($data);




mysqli_close($con);
?>
