<?php
  if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $TempoTimeout)) {
      @header('location: ../../');
    }
  } 

  
  include('../class/class.GrupoVO.php');
  include('../class/DAO/class.GrupoDAO.php');

  $grupoDAO = new GrupoDAO();
  $listGrupos = $grupoDAO->getAll();
?>

<div class="container my-5">

  <!-- Section: Block Content -->
  <section>

    <div class="card card-list">
      <div class="card-header white d-flex justify-content-between align-items-center py-3">
        <p class="h5-responsive font-weight-bold mb-0"><i class="fas fa-envelope pr-2"></i>Cadastrar projeto</p>
        <p class="h5-responsive font-weight-bold mb-0"><a id="close_form"><i class="fas fa-times"></i></a></p>
      </div>
      <form id="ajax_form" action="projeto/ajax/ajax_add_alt.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <label>Dados do projeto</label>
          <input type="text" placeholder="Nome do projeto" name="inputNome" class="form-control rounded-0 mb-3" required>
          <div class="row">
            <div class="col-md-6">
              <select class="browser-default custom-select rounded-0 mb-4" name="inputTipo" required>
                <option selected>Tipo do projeto</option>
              </select>
            </div>
            <div class="col-md-6">
              <select class="browser-default custom-select rounded-0 mb-4" name="inputCliente" required>
                <option selected>Cliente</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="text" placeholder="Prazo de entrega" name="inputPrazo" class="form-control rounded-0 mb-4" required>
            </div>
            <div class="col-md-6">
              <input type="text" placeholder="Valor" name="inputValor" class="form-control rounded-0 mb-4" required>
            </div>
          </div>
          <label>Descrição do projeto</label>
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
