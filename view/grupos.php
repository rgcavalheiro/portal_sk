<style type="text/css">
    
.modal {
  text-align: center;
}
@media screen and (min-width: 768px) {
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}
.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
  min-width: 380px;
}

</style>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="col-md-4">
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


        <h1 class="h2">Grupos</h1>
        
    </div>

    <br>


    <!-- <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Adicionar</button> -->
    <div class="pt-3 pb-3">
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGrupoModal">Novo grupo</button>
    </div>

    <div class="table-responsive">
        <table id="grupos" class="table">
            <thead>
                <th>ID<br></th>
                <th>Descrição<br></th>
                <th>Grupo<br></th>             
                <th>Opções<br></th>
            </thead>
            <tbody>



            </tbody>
        </table>
    </div>
</main>



<!-- Add user Modal -->
<div class="modal fade" id="addGrupoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo grupo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addGrupo" action="">
          <div class="mb-3 row">
            <label for="descricao" class="col-md-3 form-label">Descrição</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="descricao" name="descricao">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="grupo" class="col-md-3 form-label">Grupo</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="grupo" name="grupo">
            </div>
          </div>
          
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- END Add user Modal -->






<!-- EDIT user Modal -->
<div class="modal fade" id="editGrupoModal" tabindex="-1" aria-labelledby="Alterar grupo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Grupo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateGrupo" >
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label for="_descricao" class="col-md-3 form-label">Descrição</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="_descricao" name="_descricao" >
            </div>
          </div>

          <div class="mb-3 row">
            <label for="grupo" class="col-md-3 form-label">Grupo</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="_grupo" name="name" >
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
<!-- END EDIT user Modal -->
















