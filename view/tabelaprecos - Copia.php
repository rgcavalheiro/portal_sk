
        <?php

        $vigencia_precos['datade'] = '';
        $vigencia_precos['dataate'] = '';
        $parceiro[0]['nomeparc'] = '';
        $vigencia = '';


        if(isset($_GET['vig'])){
            if($_GET['vig'] != 0){
            $vigencia = $_GET['vig'];
            $vigencia_precos = find('vigencia_precos',$vigencia);

            // var_dump($vigencia_precos);

            $vigencia_precos['datade'] = date('d-m-Y', strtotime($vigencia_precos['datade']));
            $vigencia_precos['dataate'] = date('d-m-Y', strtotime($vigencia_precos['dataate']));


            $parceiro = getwhere('parceiros','codparc',$vigencia_precos['codparc']);
            }
        }




        if(isset($_POST['newpreco'])){
            $newpreco = $_POST['newpreco'];

            $newpreco['vlrunitario'] = str_replace(',', '', $newpreco['vlrunitario']);


            

            if(save('fornecedores_precos',$newpreco)){

                echo '

                        <script type="text/javascript"> alert("Preço adicionado!");</script>

                        ';

            };




        }



        if(isset($_POST['vigencia'])){

            $newvigencia = $_POST['vigencia'];


            if(strlen($newvigencia['nomevigencia']) > 3){
                if($newvigencia['datade'] < $newvigencia['dataate']){
                    if(isset($newvigencia['codparc'])){



                        save('vigencia_precos',$newvigencia);
                        echo '

                        <script type="text/javascript"> alert("Vigencia adicionada!");</script>

                        ';

                    }else{
                        echo '

                        <script type="text/javascript"> alert("Escolha um parceiro!");</script>

                        ';
                    }


                }else{
                    echo '

                        <script type="text/javascript"> alert("datas invalidas!");</script>

                        ';
                    
                }



            }else{
                echo '

                        <script type="text/javascript"> alert("Adicione um nome!");</script>

                        ';

            }


        }





        $todas_vigencias = find('vigencia_precos');
        $todos_parceiros = find('parceiros');
        
        foreach ($todos_parceiros as $key => $value) {
            $todos_parceiros[$key] = array_map('utf8_decode', $value);
        }
        $todos_produtos = find('produtos');

        if(is_array($todos_produtos)){
        foreach ($todos_produtos as $key => $value) {
            $todos_produtos[$key] = array_map('utf8_decode', $value);
        }
}



        ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="col-md-4">
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


        <h1 class="h2">Tabela de Preços</h1>
       
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
            </div>
        </div>
    </div>
    <div class="col-lg-6 overflow-visible table-responsive">




        <table class="table table-sm table-striped">
            <tbody>
                <tr>
                    <td class="border-0 fs-5 fw-bold">Parceiro</td>
                    <td class="border-0 fs-5"><?=utf8_decode($parceiro[0]['nomeparc'])?></td>
                    <td class="border-0 fs-5 fw-bold">Data de</td>
                    <td class="border-0 fs-5"><?=$vigencia_precos['datade']?></td>
                </tr>
                <tr>
                    <td class="fs-5 fw-bold">Vigência</td>
                    <td class="fs-5">
                        
                            <a class="btn btn-primary btn-sm dropdown-toggle"  style="overflow: visible !important;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
<?php

    
    if(isset($vigencia_precos['nomevigencia'])){        
        $selected = utf8_decode($vigencia_precos['nomevigencia']);
    }else{
        $selected = "Selecione";
    }



    echo $selected;

?>

                             



                        </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php

                                foreach ($todas_vigencias as $key => $value) {


                                    echo ' <li>
                                    <a class="dropdown-item" href="?u=tabelaprecos&vig='.$value['id'].'">';
                                    echo utf8_decode($value['nomevigencia']);
                                    echo '</a>
                                    </li>';

                                }

                                ?>

                            </ul>
                        
                    </td>
                    <td class="fs-5 fw-bold">Data até<br></td>
                    <td class="fs-5"><?=$vigencia_precos['dataate']?><br></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nova Tabela de Preços</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>                     
    <br>
    
    <div class="table-responsive">
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Adicionar</button>
        <table class="table table-striped table-sm">
            <thead>
                <th>Código produto Seq<br></th>
                <th>Descrição<br></th>
                <th>Qtd Mínima<br></th>
                <th>Qtd Máxima<br></th>
                <th>Vl. Unitário<br></th>
            </thead>
            <tbody>
                

                    <?php

                    if($vigencia>0){







                        $produtos = getwhere('fornecedores_precos','codvigencia',$vigencia);

                        if(is_array($produtos)){


                        foreach ($produtos as $key => $value) {
                            
                            echo "<tr>";
                            echo "<td>".$value['codprodseq']."</td>";

                            echo "<td>";
                            
                            $descprod = '';
                            foreach ($todos_produtos as $key2 => $value2) {
                               if($value2['codprod'] == $value['codprodseq']){
                                $descprod = $value2['descprod'];
                               }
                            }



                            echo $descprod;

                            echo "</td>";

                            echo "<td>".$value['qtdminima']."</td>";
                            echo "<td>".$value['qtdmaxima']."</td>";
                            echo "<td>".$value['vlrunitario']."</td>";

                            echo "</tr>";


                        }

                    }else{
                        echo "<tr><td style='color: red;'>Sem dados.</td></tr>";
                    }








                    

                    }else{
                       echo "<tr><td style='color: red;'>Selecione uma vigência.</td></tr>";
                    }

                    ?>


            </tbody>
        </table>
    </div>
</main>











<!-- Modal PRECOS -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <h4 class="modal-title">Novo preço</h4> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                 
    </div>                             

    <div class="modal-body"> 
        <form role="form" action="?u=tabelaprecos<?php if(strlen($vigencia) > 0){ echo '&vig='.$vigencia; } ?>" method="post"> 
    
    <div class="mb-3">                                          

        <select class="form-select" id="produto" name="newpreco[codprodseq]" aria-label="Produto" required>
          <option selected>Produto</option>

          <?php

          foreach ($todos_produtos as $key => $value) {
              echo '<option value="'.$value['codprod'].'">'.$value['descprod'].'</option>';
          }


          ?>                          
      </select>
  </div>

  <div class="mb-3 d-none">     
    <input type="text" name="newpreco[codvigencia]" value="<?=$vigencia?>"  class="form-control" required>                                          
</div>  

  <div class="mb-3"> 
    <label>Qtde Mínima</label>                                         
    <input type="number" name="newpreco[qtdminima]" class="form-control" required> 
</div>                                     

<div class="mb-3"> 
    <label>Qtde Máxima</label> 
    <input type="number" name="newpreco[qtdmaxima]"  class="form-control" required>                                          
</div>      

<div class="mb-3"> 
    <label>Vlr Unitário</label> 
    <input type="text" name="newpreco[vlrunitario]" id="preco" class="form-control" required>                                          
</div>  





<div class="row">
    <div class="col-md-6 text-center">
        <button type="button" class="btn btn-default btn-secondary" data-bs-dismiss="modal">Cancelar</button>                                                                                          
    </div>
    <div class="col-md-6 text-center">
        <button type="submit" class="btn btn-primary">Confirmar</button>                                             
    </div>
</div>                                     
</form>                                 
</div>
</div>
</div>
</div>

















<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <h4 class="modal-title">Nova Tabela de Preços</h4> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                 
    </div>                             

    <div class="modal-body"> 
        <form role="form" action="?u=tabelaprecos<?php



        if(strlen($vigencia) > 0){
            echo '&vig='.$vigencia;
        }

    ?>" method="post"> 
    <div class="mb-3">                                          

        <input type="text" id="nomevigencia" name="vigencia[nomevigencia]" placeholder="Descrição" class="form-control" required> 
    </div>
    <div class="mb-3">                                          

        <select class="form-select" id="codparc" name="vigencia[codparc]" aria-label="Parceiros">
          <option selected>Escolha um parceiro</option>

          <?php

          foreach ($todos_parceiros as $key => $value) {
              echo '<option value="'.$value['codparc'].'">'.$value['nomeparc'].'</option>';
          }


          ?>                          
      </select>
  </div>
  <div class="mb-3"> 
    <label>Data de</label>                                         
    <input type="date" name="vigencia[datade]" class="form-control" required> 
</div>                                     

<div class="mb-3"> 
    <label>Data até</label> 
    <input type="date" name="vigencia[dataate]"  class="form-control">                                          
</div>                                                                                                               

<div class="row">
    <div class="col-md-6 text-center">
        <button type="button" class="btn btn-default btn-secondary" data-bs-dismiss="modal">Cancelar</button>                                                                                          
    </div>
    <div class="col-md-6 text-center">
        <button type="submit" class="btn btn-primary">Confirmar</button>                                             
    </div>
</div>                                     
</form>                                 
</div>
</div>
</div>
</div>



















