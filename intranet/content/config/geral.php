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
        <p class="h5-responsive font-weight-bold mb-0"><i class="fas fa-envelope pr-2"></i>Configurações gerais</p>
        <p class="h5-responsive font-weight-bold mb-0"><a id="close_form"><i class="fas fa-times"></i></a></p>
      </div>
      <form id="ajax_form" action="config/ajax/ajax_add_alt.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <label for="GrupoAdmin">Grupo de administradores <a href="#" data-toggle="tooltip" title="Selecione o grupo que será atribuido aos administradores."><i class="fas fa-question-circle"></i></a></label>
          <select class="browser-default custom-select rounded-0 mb-4" name="GrupoAdmin" required>
            <option selected>Grupo de administradores</option>
            <?php
              if (sizeof($listGrupos) > 0) {
                foreach ($listGrupos as $objVo) {
                  printf('<option value="%s" %s>%s</option>', $objVo->getIdgrupo(), ($objVo->getIdgrupo() == $GrupoAdmin) ? 'selected' : '', $objVo->getNome());
                }
              }
            ?>
          </select>

          <label for="GrupoCliente">Grupo de clientes <a href="#" data-toggle="tooltip" title="Selecione o grupo que será atribuido aos clientes."><i class="fas fa-question-circle"></i></a></label>
          <a href="index.php?pg=novo&lc=grupo" class="float-right">Novo grupo</a>
          <select class="browser-default custom-select rounded-0 mb-4" name="GrupoCliente" required>
            <option selected>Grupo de clientes</option>
            <?php
              if (sizeof($listGrupos) > 0) {
                foreach ($listGrupos as $objVo) {
                  printf('<option value="%s" %s>%s</option>', $objVo->getIdgrupo(), ($objVo->getIdgrupo() == $GrupoCliente) ? 'selected' : '', $objVo->getNome());
                }
              }
            ?>
          </select>

          <label for="TempoTimeout">Tempo de ausência para TIMEOUT <a href="#" data-toggle="tooltip" title="Configure o tempo de ausência necessário para desconectar um usuário do sistema."><i class="fas fa-question-circle"></i></a></label>
          <input type="number" placeholder="Tempo (minutos)" name="TempoTimeout" class="form-control rounded-0 mb-4" value='<?=$TempoTimeout/60?>' required>

          <label for="TiposDeProjetos">Tipos de projetos <a href="#" data-toggle="tooltip" title="Configure os tipos disponíveis na criação de um projeto."><i class="fas fa-question-circle"></i></a></label>
          <input type="text" placeholder="Tipo 1,Tipo 2,Tipo 3" name="TiposDeProjetos" class="form-control rounded-0 mb-4" value="<?=$TiposDeProjetos;?>" required>

          <label for="StatusDeProjetos">Status de projetos <a href="#" data-toggle="tooltip" title="Configure os status disponíveis para os projetos."><i class="fas fa-question-circle"></i></a></label>
          <input type="text" placeholder="Em andamento,Concluído,Cancelado" name="StatusDeProjetos" class="form-control rounded-0 mb-4" value="<?=$StatusDeProjetos;?>" required>
        </div>
        <div class="card-footer white py-3">
          <div class="text-right">
            <button class="btn btn-primary btn-lg px-3 my-0 mr-0 btn_submit">Salvar<i class="fas fa-paper-plane pl-2"></i></button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
