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
  $listUsuarios = $usuarioDAO->getAll();
  $grupoDAO = new GrupoDAO();

?>
<div class="container my-5">
  <!-- Section: Block Content -->
  <section>
    
    <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-header white d-flex justify-content-between align-items-center py-3">
            <p class="h5-responsive font-weight-bold mb-0">Gerenciar usuários</p>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><i class="far fa-window-minimize fa-sm pl-3"></i></li>
              <li><i class="fas fa-times fa-sm pl-3"></i></li>
            </ul>
          </div>
          <div class="card-body">
            <table class="table list-usuarios">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email / Telefone</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Projeto</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if  (sizeof($listUsuarios) > 0) {
                    foreach($listUsuarios as $objVo) {
                      @$grupo = $grupoDAO->getById($objVo->getGrupo());
                      printf('<tr>');
                      printf('<th scope="row"><a href="%s" class="text-primary">#%s</a></th>', getUrl() . 'intranet/content/index.php?pg=alterar&lc=usuario&id=' . $objVo->getIdusuario(), $objVo->getIdusuario());
                      printf('<td>%s</td>', $objVo->getNome());
                      printf('<td>%s / %s</td>', $objVo->getEmail(),  $objVo->getTelefone());
                      if (isset($grupo)) {
                        printf('<td><span class="badge %s">%s</span></td>', $grupo->getCor(), $grupo->getNome());
                      } else {
                        printf('<td><span class="red-text">ERRO (grupo excluído)</span></td>');
                      }
                      printf('<td>%s</td>', $objVo->getIdprojeto());
                      printf('</tr>');
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer white py-3 d-flex justify-content-between">
            <a class="btn btn-primary btn-md px-3 my-0 mr-0" href="index.php?pg=novo&lc=usuario">Novo usuário</a>
          </div>
        </div>
      </div>
    </div>

  </section> 
</div>