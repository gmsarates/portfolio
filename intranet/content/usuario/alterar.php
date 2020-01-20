<?php

  if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $TempoTimeout)) {
      @header('location: ../../');
    }
  } 

  
  include('../class/class.UsuarioVO.php');
  include('../class/DAO/class.UsuarioDAO.php');
  include('../class/class.GrupoVO.php');
  include('../class/DAO/class.GrupoDAO.php');

  $usuarioDAO = new UsuarioDAO();
  $idusuario = $_GET['id'];
  $usuario = $usuarioDAO->getById($idusuario);
  $grupoDAO = new GrupoDAO();
  $listGrupos = $grupoDAO->getAll();
?>

<div class="container my-5">

  <!-- Section: Block Content -->
  <section>

    <div class="card card-list">
      <div class="card-header white d-flex justify-content-between align-items-center py-3">
        <p class="h5-responsive font-weight-bold mb-0"><i class="fas fa-envelope pr-2"></i>Editar usuário <b><?=$usuario->getNome()?></b></p>
        <p class="h5-responsive font-weight-bold mb-0"><a id="close_form"><i class="fas fa-times"></i></a></p>
      </div>
      <form id="ajax_form" action="usuario/ajax/ajax_add_alt.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <input type="hidden" name="idusuario" value="<?=$usuario->getIdusuario()?>">
          <label>Dados pessoais do usuário</label>
          <input type="text" placeholder="Nome" value="<?=$usuario->getNome()?>" name="inputNome" class="form-control rounded-0 mb-3" required>
          <div class="row">
            <div class="col-md-6">
              <input type="email" placeholder="Email" value="<?=$usuario->getEmail()?>" name="inputEmail" class="form-control rounded-0 mb-4" required>
            </div>
            <div class="col-md-6">
              <input type="text" placeholder="Telefone" value="<?=$usuario->getTelefone()?>" name="inputTelefone" class="form-control rounded-0 mb-4">
            </div>
          </div>
          <hr class="my-3">
          <label>Informações do usuário</label>
          <div class="row">
            <div class="col-md-6">
              <input type="text" placeholder="Usuário" value="<?=$usuario->getUsuario()?>" name="inputUsuario" class="form-control rounded-0 mb-4" required>
            </div>
            <div class="col-md-6">
              <select class="browser-default custom-select rounded-0 mb-4" name="inputGrupo" required>
                <?php
                  if (sizeof($listGrupos) > 0) {
                    foreach ($listGrupos as $objVo) {
                      printf('<option value="%s" %s>%s</option>', $objVo->getIdgrupo(),  ($objVo->getIdgrupo() == $usuario->getGrupo()) ? 'selected' : '', $objVo->getNome());
                    }
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="password" placeholder="Senha" value="" name="inputSenha" class="form-control rounded-0 mb-4">
            </div>
            <div class="col-md-6">
              <input type="password" placeholder="Repetir senha" value="" class="form-control rounded-0 mb-4">
            </div>
          </div>
          <select class="browser-default custom-select rounded-0 mb-4" name="inputIdprojeto">
            <option <?=($usuario->getGrupo() == null) ? 'selected' : ''?>>Projeto associado ao usuário</option>
          </select>
          <label>Informações sobre o usuário</label>
          <textarea id="tinyedit" name="inputDescricao"><?=$usuario->getDescricao()?></textarea>
        </div>
        <div class="card-footer white py-3">
          <div class="text-right">
            <button type="button" ajax-url="usuario/ajax/ajax_del.php" idaction="<?=$usuario->getIdusuario()?>" class="btn btn-danger btn-lg px-3 my-0 mr-0 btn_excluir">Excluir<i class="fas fa-paper-plane pl-2"></i></button>
            <button class="btn btn-primary btn-lg px-3 my-0 mr-0 btn_submit">Alterar<i class="fas fa-paper-plane pl-2"></i></button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
