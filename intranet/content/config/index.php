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
    
    <div class="row">
      <div class="col-12">
      	<div class="card card-list">
          <div class="card-header white d-flex justify-content-between align-items-center py-3">
            <p class="h5-responsive font-weight-bold mb-0">Gerenciar grupos</p>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><i class="far fa-window-minimize fa-sm pl-3"></i></li>
              <li><i class="fas fa-times fa-sm pl-3"></i></li>
            </ul>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">#ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Identificação</th>
                  <th scope="col">Usuários</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if  (sizeof($listGrupos) > 0) {
                    foreach($listGrupos as $objVo) {
                      printf('<tr>');
                      printf('<th scope="row"><a href="%s" class="text-primary">#%s</a></th>', getUrl() . 'intranet/content/index.php?pg=alterar&lc=grupo&id=' . $objVo->getIdgrupo(), $objVo->getIdgrupo());
                      printf('<td>%s</td>', $objVo->getNome());
                      printf('<td><span class="badge %s">%s</span></td>', $objVo->getCor(), $objVo->getCor());
                      printf('<td>%s</td>', $grupoDAO->countUsuarios($objVo->getIdgrupo()));
                      printf('</tr>');
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
          </div>
          <div class="card-footer white py-3 d-flex justify-content-between">
            <a class="btn btn-primary btn-md px-3 my-0 mr-0" href="index.php?pg=novo&lc=grupo">Novo grupo</a>
          </div>
        </div>
      </div>
    </div>

  </section> 
</div>