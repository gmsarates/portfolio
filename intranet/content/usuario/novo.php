<?php
  if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] < 1800)) {
      @header('location: ../../');
    }
  } 
?>

<div class="container my-5">

  <!-- Section: Block Content -->
  <section>

    <div class="card card-list">
      <div class="card-header white d-flex justify-content-between align-items-center py-3">
        <p class="h5-responsive font-weight-bold mb-0"><i class="fas fa-envelope pr-2"></i>Cadastrar usuário</p>
        <p class="h5-responsive font-weight-bold mb-0"><a id="close_form"><i class="fas fa-times"></i></a></p>
      </div>
      <div class="card-body">
        <form id="ajax_form" action="usuario/ajax/ajax_add_alt.php" method="POST" enctype="multipart/form-data">
          <label>Dados pessoais do usuário</label>
          <input type="text" placeholder="Nome" name="inputNome" class="form-control rounded-0 mb-3" required>
          <div class="row">
            <div class="col-md-6">
              <input type="email" placeholder="Email" name="inputEmail" class="form-control rounded-0 mb-4" required>
            </div>
            <div class="col-md-6">
              <input type="text" placeholder="Telefone" name="inputTelefone" class="form-control rounded-0 mb-4">
            </div>
          </div>
          <hr class="my-3">
          <label>Informações do usuário</label>
          <div class="row">
            <div class="col-md-6">
              <input type="text" placeholder="Usuário" name="inputUsuario" class="form-control rounded-0 mb-4" required>
            </div>
            <div class="col-md-6">
              <select class="browser-default custom-select rounded-0 mb-4" name="inputGrupo" required>
                <option selected>Grupo do usuário</option>
                <option value="admin">Admin</option>
                <option value="cliente">Cliente</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="password" placeholder="Senha" name="inputSenha" class="form-control rounded-0 mb-4" required>
            </div>
            <div class="col-md-6">
              <input type="password" placeholder="Repetir senha" class="form-control rounded-0 mb-4" required>
            </div>
          </div>
          <select class="browser-default custom-select rounded-0 mb-4" name="inputIdprojeto">
            <option selected>Projeto associado ao usuário</option>
          </select>
          <label>Informações sobre o usuário</label>
          <textarea id="tinyedit" name="inputDescricao"></textarea>
        </div>
        <div class="card-footer white py-3">
          <div class="text-right">
            <button class="btn btn-primary btn-lg px-3 my-0 mr-0 btn_submit">Cadastrar<i class="fas fa-paper-plane pl-2"></i></button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
