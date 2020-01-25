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


<div class="container mt-5">

  <!-- Classic tabs -->
  <div class="classic-tabs mx-2">

    <ul class="nav tabs-dark" id="myClassicTabOrange" role="tablist">
      <li class="nav-item">
        <a class="nav-link  waves-light active show" id="profile-tab-classic-orange" data-toggle="tab"
          href="#tab-arquivos" role="tab" aria-controls="tab-arquivos" aria-selected="true"><i class="fas fa-archive fa-2x pb-2" aria-hidden="true"></i><br>Arquivos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange" role="tab" aria-controls="follow-classic-orange" aria-selected="false"><i class="fas fa-sitemap fa-2x pb-2" aria-hidden="true"></i><br>Site</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light" id="contact-tab-classic-orange" data-toggle="tab" href="#contact-classic-orange" role="tab" aria-controls="contact-classic-orange" aria-selected="false"><i class="fas fa-envelope fa-2x pb-2" aria-hidden="true"></i><br>Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-light" id="awesome-tab-classic-orange" data-toggle="tab" href="#awesome-classic-orange" role="tab" aria-controls="awesome-classic-orange" aria-selected="false"><i class="fas fa-star fa-2x pb-2" aria-hidden="true"></i><br>Be awesome</a>
      </li>
    </ul>

    <div class="tab-content card" id="myClassicTabContentOrange">
      <div class="tab-pane fade active show" id="tab-arquivos" role="tabpanel" aria-labelledby="profile-tab-classic-orange">
        <div class="row">
          <div class="col-md-2">
            <button type="button" name="btnNovoArquivo" id="btnNovoArquivo" class="btn btn-success btn-lg btn-block">Novo arquivo</button>
          </div>
          <div class="col-md-10">
            <div class="card text-white bg-primary">
              <div class="card-body">
                <h4 class="card-title">Arquivos disponíveis</h4>
                <p class="white-text">Confira abaixo  os arquivos disponíveis  para  o  projeto <b>XXXX</b></p>
                <div class="table-responsive">
                  <table class="table table-striped bg-white black-text text-center">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nome do arquivo</th>
                        <th>Alterações</th>
                        <th>Data</th>
                        <th style="width: 250px;">Ações</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="va-middle" scope="row">1</td>
                          <td class="va-middle">teste.txt</td>
                          <td class="va-middle">uhu</td>
                          <td class="va-middle">20/20/2020</td>
                          <td>
                            <a name="btnDownload" id="btnDownload" class="btn btn-dark" href="#" role="button">Download</a>
                            <a name="btnDelete" id="btnDelete" class="btn btn-danger" href="#" role="button">Excluir</a>
                        
                          </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>


          </div>
        </div>



      </div>
      <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
          aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
          quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
      </div>
      <div class="tab-pane fade" id="contact-classic-orange" role="tabpanel"
        aria-labelledby="contact-tab-classic-orange">
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
          deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
          provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
          Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
          eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
          assumenda est, omnis dolor repellendus. </p>
      </div>
      <div class="tab-pane fade" id="awesome-classic-orange" role="tabpanel"
        aria-labelledby="awesome-tab-classic-orange">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
          eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.</p>
      </div>
    </div>

  </div>
  <!-- Classic tabs -->


</div>