<?php 
include('database.php');
$id = $_POST['id'];
$sql = "SELECT * FROM fornecedores_precos WHERE id='$id' LIMIT 1";


$con = open_database();
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);




$produto_details = getWhere('produtos','codprod',$row['codprodseq']);
$produto_details = $produto_details[0];
$return = array();

$return['descprod'] = utf8_decode($produto_details['descprod']);
$return['codprod'] = $produto_details['codprod'];


$return['codvigencia'] = $row['codvigencia'];
$return['qtdminima'] = $row['qtdminima'];
$return['qtdmaxima'] = $row['qtdmaxima'];
$return['vlrunitario'] = $row['vlrunitario'];

 








echo json_encode($return);
?>
