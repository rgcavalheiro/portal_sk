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


        <h1 class="h2">Usuários</h1>
        
    </div>

    <br>


    <!-- <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Adicionar</button> -->
    <div class="pt-3 pb-3">
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">Novo usuário</button>
    </div>

    <div class="table-responsive">
        <table id="datatable" class="table">
            <thead>
                <th>ID<br></th>
                <th>Usuário<br></th>
                <th>Senha<br></th>
                <th>Email<br></th>
                <th>Grupo<br></th>
                <th>Codparc<br></th>               
                <th>Opções<br></th>
            </thead>
            <tbody>



            </tbody>
        </table>
    </div>
</main>



<!-- Add user Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addUser" action="">
          <div class="mb-3 row">
            <label for="addUserField" class="col-md-3 form-label">Usuário</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addUserField" name="addUserField">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addPassField" class="col-md-3 form-label">Senha</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addPassField" name="addPassField">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addEmailField" class="col-md-3 form-label">Email</label>
            <div class="col-md-9">
              <input type="Email" class="form-control" id="addEmailField" name="addEmailField">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addGrupoField" class="col-md-3 form-label">Grupo</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="addGrupoField" name="addGrupoField">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addCodparcField" class="col-md-3 form-label">Codparc</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addCodparcField" name="addCodparcField">
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
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="Alterar usuario" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateUser" >
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label for="usuarioField" class="col-md-3 form-label">Usuário</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="_userField" name="name" >
            </div>
          </div>
           <div class="mb-3 row">
            <label for="passField" class="col-md-3 form-label">Senha</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="_passField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passField" class="col-md-3 form-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="_emailField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passField" class="col-md-3 form-label">Grupo</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="_grupoField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passField" class="col-md-3 form-label">Codparc</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="_codparcField" name="name" >
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
















