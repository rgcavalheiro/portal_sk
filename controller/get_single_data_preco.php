<?php 
include('database.php');
$id = $_POST['id'];
$sql = "SELECT * FROM fornecedores_precos WHERE id='$id' LIMIT 1";
$con = open_database();
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);


$produto = getWhere('produtos','codprod',$row['codprodseq']);
$produto = $produto[0];

$row['descprod'] = utf8_decode($produto['descprod']);
$row['vlrunitario'] = "R$".number_format($row['vlrunitario'], 2, ',', '.');





echo json_encode($row);
?>
