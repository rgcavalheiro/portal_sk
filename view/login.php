<?php




if(isset($_POST)){


    if(isset($_POST['usuario']) and isset($_POST['senha'])){



        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $existe_usuario = getwhere('usuarios','usuario',$usuario);

        

        if(isset($existe_usuario[0])){

        
            if($existe_usuario[0]['senha'] == $senha){


                $_SESSION['id_user'] = $existe_usuario[0]['id'];
                $_SESSION['grupo'] = $existe_usuario[0]['grupo'];
?>
   <script type="text/javascript">
    
     php_variables = <?php echo json_encode($variables_to_view['js_variables']) ?>;        
    window.location.href = php_variables.base_url + "?u=home";

</script>
<?php
                
          

            }else{


                echo '

<script type="text/javascript">
    alert("Usuário ou senha inválidos[2]");
</script>



            ';

            }


        }else{


            echo '

<script type="text/javascript">
    alert("Usuário ou senha inválidos[1]");
</script>



            ';

        }




    }



}




?>









<main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">

    <link href="model/css/login.css" rel="stylesheet">
                    
<div class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form ">
                     <div class="logo mb-3">
                         <div class="col-md-12 text-center">
                            <h1>Login</h1>
                         </div>
                    </div>
                   <form action="?u=login" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Usuário</label>
                              <input type="text" name="usuario"  class="form-control" id="usuario"  placeholder="Digite seu usuário">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Senha</label>
                              <input type="password" name="senha" id="senha"  class="form-control" aria-describedby="emailHelp" placeholder="Digite sua senha">
                           </div>
                           
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           
                        </form>
                 
                </div>
            </div>
              
        </div>
      </div>   
         
</div>
                </main>
