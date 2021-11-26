                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Tabela de Preços</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
                            </div>
                        </div>
                    </div>
<?php
$precos = find('precos');
?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="precos">
                            <thead>
                                <tr>
                                    <th width="100px">Codprod</th>
                                    <th width="100px">Valor</th>
                                    <th width="100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($precos) > 0){
                                    foreach ($precos as $preco) {


                                        $preco = array_map('utf8_decode', $preco);


                                    ?>
                                    <tr>
                                        <td><?php  echo $preco['codprod'];  ?></td> 
                                        <td><?php  echo $preco['valor']; ?></td>
                                        <td><a href="">opções </a> </td>
                                    </tr>
                                <?php } }else{
                                        echo "Sem dados.";
                                    }


                                     ?>
                            </tbody>
                        </table>
                        
                    </div>
                </main>