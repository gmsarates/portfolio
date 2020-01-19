<?php
  if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
      @header('location: ../../');
    }
  } 
?>

<div class="container my-5">

  <!-- Section: Block Content -->
  <section>

    <div class="card card-list">
      <div class="card-header white d-flex justify-content-between align-items-center py-3">
        <p class="h5-responsive font-weight-bold mb-0"><i class="fas fa-envelope pr-2"></i>Cadastrar grupo</p>
        <p class="h5-responsive font-weight-bold mb-0"><a id="close_form"><i class="fas fa-times"></i></a></p>
      </div>
      <form id="ajax_form" action="grupo/ajax/ajax_add_alt.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <label>Dados do grupo</label>
          <div class="row">
            <div class="col-md-4">
              <input type="text" placeholder="Nome" name="inputNome" class="form-control rounded-0 mb-4" required>
            </div>
            <div class="col-md-8 list-badges">
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge1" name="inputCor" value="badge-default">
                <label for="radioBadge1"><span class="badge va-bottom badge-default">Default</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge2" name="inputCor" value="badge-primary">
                <label for="radioBadge2"><span class="badge va-bottom badge-primary">Primary</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge3" name="inputCor" value="badge-secondary">
                <label for="radioBadge3"><span class="badge va-bottom badge-secondary">Secondary</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge4" name="inputCor" value="badge-success">
                <label for="radioBadge4"><span class="badge va-bottom badge-success">Success</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge5" name="inputCor" value="badge-danger">
                <label for="radioBadge5"><span class="badge va-bottom badge-danger">Danger</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge6" name="inputCor" value="badge-warning">
                <label for="radioBadge6"><span class="badge va-bottom badge-warning">Warning</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge7" name="inputCor" value="badge-info">
                <label for="radioBadge7"><span class="badge va-bottom badge-info">Info</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge8" name="inputCor" value="badge-light">
                <label for="radioBadge8"><span class="badge va-bottom badge-light">Light</span></label>
              </div>

              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="radioBadge9" name="inputCor" value="badge-dark">
                <label for="radioBadge9"><span class="badge va-bottom badge-dark">Dark</span></label>
              </div>

            </div>
          </div>
          <div class="card-footer white py-3">
            <div class="text-right">
              <button class="btn btn-primary btn-lg px-3 my-0 mr-0 btn_submit">Cadastrar<i class="fas fa-paper-plane pl-2"></i></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
