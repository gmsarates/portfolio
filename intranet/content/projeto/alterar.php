<?php
  if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $TempoTimeout)) {
      @header('location: ../../');
    }
  } 

  include('../class/class.ProjetoVO.php');
  include('../class/DAO/class.ProjetoDAO.php');
  include('../class/class.UsuarioVO.php');
  include('../class/DAO/class.UsuarioDAO.php');

  $projetoDAO = new ProjetoDAO();
  $usuarioDAO = new UsuarioDAO();
  $idprojeto = $_GET['id'];
  $projeto  = $projetoDAO->getById($idprojeto);
  $data = DateTime::createFromFormat('Y-m-d H:i:s', $projeto->getData());
  
?>

<div class="container my-5">

  <!-- Section: Block Content -->
  <section>

    <div class="card card-list">
      <div class="card-header white d-flex justify-content-between align-items-center py-3">
        <p class="h5-responsive font-weight-bold mb-0"><i class="fas fa-envelope pr-2"></i>Alterar projeto</p>
        <p class="h5-responsive font-weight-bold mb-0"><a id="close_form"><i class="fas fa-times"></i></a></p>
      </div>
      <form id="ajax_form" action="projeto/ajax/ajax_add_alt.php" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='idprojeto' value='<?=$idprojeto?>'>
        <div class="card-body">
          <label>Dados do projeto</label>
          <input type="text" placeholder="Nome do projeto" value="<?=$projeto->getNome()?>" name="inputNome" class="form-control rounded-0 mb-3" required>
          <div class="row">
            <div class="col-md-6">
              <select class="browser-default custom-select rounded-0 mb-4" name="inputTipo" required>
                <option selected>Tipo do projeto</option>
                <?php
                  $tipos_proj = explode(",", $TiposDeProjetos);
                  foreach ($tipos_proj as $tipo) {
                    printf('<option value="%s" %s>%s</option>', $tipo, ($projeto->getTipo() == $tipo) ? 'selected' : '', $tipo);
                  }

                ?>
              </select>
            </div>
            <div class="col-md-6">
              <select class="browser-default custom-select rounded-0 mb-4" name="inputCliente" required>
                <option selected>Cliente</option>
                <?php
                $listUsuarios = $usuarioDAO->getByGrupo($GrupoCliente);
                  foreach ($listUsuarios as $objVo) {
                    printf('<option value="%s" %s>%s</option>', $objVo->getIdusuario(), ($projeto->getIdcliente() ==  $objVo->getIdusuario()) ? 'selected' : '', $objVo->getNome());
                  }
                ?>

              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="text" placeholder="Prazo de entrega" name="inputData" value="<?=$data->format('d/m/Y')?>" class="form-control rounded-0 mb-4 picker__input" required>
            </div>
            <div class="col-md-6">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend rounded-0 mb-4">
                  <span class="input-group-text" id="addon-wrapping">R$</span>
                </div>
                <input type="text" placeholder="Valor" name="inputValor" value="<?=$projeto->getValor()?>" class="form-control rounded-0 mb-4" required>
              </div>
            </div>
          </div>
          <label>Descrição do projeto</label>
          <textarea id="tinyedit" name="inputDescricao"><?=$projeto->getDescricao()?></textarea>
        </div>
        <div class="card-footer white py-3">
          <div class="text-right">
            <button type="button" ajax-url="projeto/ajax/ajax_del.php" idaction="<?=$projeto->getIdprojeto()?>" class="btn btn-danger btn-lg px-3 my-0 mr-0 btn_excluir">Excluir<i class="fas fa-paper-plane pl-2"></i></button>
            <button class="btn btn-primary btn-lg px-3 my-0 mr-0 btn_submit">Alterar<i class="fas fa-paper-plane pl-2"></i></button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
