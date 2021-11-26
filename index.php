<?php



require_once('controller/config.php');


$debug = 0;


$base_url = BASEURL;
$variables_to_view['js_variables']['base_url'] = $base_url;


$request = $_SERVER['REQUEST_URI'];
$base_url = BASEURL.'?u=';

$tamanho = strlen($base_url);


$new_request = substr($request,$tamanho);

if($debug==1)var_dump($new_request);

$pos = strpos($new_request, '&');

if($pos>0){

    $new_request = substr($new_request, 0,$pos);
}





include(DBAPI); 
include(HEADER_TEMPLATE); 




if(isset($_SESSION['id_user'])){



    $logado = true;


}else{
    $logado = false;
}



if(isset($_GET['u'])){

    $local = $_GET['u'];

}else{
    if($logado == true){


        ?>
        <script type="text/javascript">


            php_variables = <?php echo json_encode($variables_to_view['js_variables']) ?>;
            

            window.location.href = php_variables.base_url + "?u=home";

        </script>
        <?php


    }else{




        ?>
        <script type="text/javascript">

            php_variables = <?php echo json_encode($variables_to_view['js_variables']) ?>;
            

            window.location.href = php_variables.base_url + "?u=login";

        </script>
        <?php




    }
}




include 'view/header.php';

include 'view/navbar.php';

include 'view/sidebar.php';


if($logado==false){

    require __DIR__ . '/view/login.php';





}else{





    if(in_array($new_request, $routes)){

       require __DIR__ . '/view/'.$new_request.'.php';


   }else{

    http_response_code(404);
    require __DIR__ . '/view/404.php';
}




}





include 'view/footer.php';



?>

<!-- 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2>stats!</h2>

    <?php



    // var_dump($request);

    // echo "<br>session=";
    // var_dump($_SESSION);
    
    // echo "<br><br>";


    ?>
</main> -->



