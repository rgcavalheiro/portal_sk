


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Parceiros</h1>

    </div>



    <table class="table tabela_parceiros" id="parceiros">
        <thead>
            <tr>
                <th width="100px">ID</th>
                <th width="100px">CodParc</th>
                <th width="100px">NomeParc</th>
                <th width="100px">Fornecedor</th>
                <th width="100px">Cliente</th>
                <th width="100px">Codcid</th>
                <th width="100px">Classificms</th>
                <th width="100px">Possuí usuário</th>
                <th width="100px"></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>



</main>




<!-- GERAR user Modal -->
<div class="modal fade" id="gerarUserModal" tabindex="-1" aria-labelledby="gerar usuario" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GERAR Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="gerarusuario" >
          <input type="hidden" name="trid" id="trid" value="">
          <input type="hidden" name="codparc" id="codparc" value="">
          <div class="mb-3 row">
            <label for="usuario" class="col-md-3 form-label">Usuário</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="usuario" name="usuario" >
          </div>
      </div>
      <div class="mb-3 row">
        <label for="senha" class="col-md-3 form-label">Senha</label>
        <div class="col-md-9">
          <input type="text" class="form-control" id="senha" name="senha" >
      </div>
  </div>
  <div class="mb-3 row">
    <label for="email" class="col-md-3 form-label">Email</label>
    <div class="col-md-9">
      <input type="email" class="form-control" id="email" name="email" >
  </div>
</div>

<div class="mb-3 row">
    <label for="grupo" class="col-md-3 form-label">Grupo</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="grupo" name="grupo" >
  </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
</form> 
</div>
<div class="modal-footer">
    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
</div>
</div>
</div>
</div>
<!-- END gerar user Modal -->







