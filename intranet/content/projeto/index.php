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
  $listProjetos = $projetoDAO->getAll();

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
                  <th scope="col" class="text-left">Nome</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Prazo</th>
                  <th scope="col">Valor</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if  (sizeof($listProjetos) > 0) {
                    foreach($listProjetos as $objVo) {
                      $cliente = $usuarioDAO->getById($objVo->getIdcliente());
                      printf('<tr>');
                      printf('<th scope="row"><a href="%s" class="text-primary">#%s</a></th>', getUrl() . 'intranet/content/index.php?pg=alterar&lc=projeto&id=' . $objVo->getIdprojeto(), $objVo->getIdprojeto());
                      printf('<td class="text-left">%s <span class="badge badge-info float-right">%s</span></td>', $objVo->getNome(), 'Em andamento');
                      printf('<td>%s</td>', $objVo->getTipo());
                      printf('<td>%s</td>', $cliente->getNome());
                      $prazo = DateTime::createFromFormat('Y-m-d H:i:s', $objVo->getData());
                      printf('<td>%s</td>', $prazo->format('d/m/Y'));
                      printf('<td>R$ %s</td>', $objVo->getValor());
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