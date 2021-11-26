<?php 
include('database.php');
$id = $_GET['id'];



$img = 0;

$file = 'http://prioridade-producao.tarx.tech/mge/Produto@IMAGEM@CODPROD='.$id.'.dbimage';
$file_headers = @get_headers($file);
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $img = 0;
} else {



    $ch = curl_init($file);
    $fp = fopen('../view/images/'.$id.'.dbimage', 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    $img = 1;

}






if($img == 1){
    $produto = getWhere('produtos','codprod',$id);


    $produto[0]['tem_img'] = 1;
    var_dump($produto[0]);
    update('produtos',$produto[0]['id'],$produto[0]);
}





?>