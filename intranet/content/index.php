<?php
  include('../class/class.Conexao.php');
  include('../class/class.Func.php'); //CARREGA AS CONFIGURAÇOES DO BANCO
  session_start();

  if (!isset($_SESSION['id'])) {
    header('location: ../index.php');
  }

  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $TempoTimeout)) {
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Refresh:0");
  }

  @$lc = $_GET['lc'];
  @$pg = $_GET['pg'];

  if (!isset($lc)) {
    $lc = 'painel';
  }

  if (!isset($pg)) {
    $pg = 'index';
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/mdb.min.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-admin.css" rel="stylesheet">
  <link href="../../css/hover.css" rel="stylesheet">
  <!-- JQuery -->
  <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
</head>

<body>
  <?php include('sidenav.php'); ?>

  <div  class="container-fluid display-page">
    <?php include($lc.'/'.$pg.'.php'); ?>
  </div>

  <!-- Central Modal Medium Success -->
  <div class="modal fade" id="modal_sucesso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <p class="heading lead" id="titulo_modal"></p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
            <p id="msg_modal"></p>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Fechar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Central Modal Medium Success-->

</body>

  <!-- SCRIPTS -->
  <script type="text/javascript" src="../../js/popper.min.js"></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/mdb.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/lqntykqf4w4b0okq799krcyk2vkfi6s770dxgwjh4bpp7v8l/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
  <script type="text/javascript" src="../../js/jquery.form.js"></script>
  <script type="text/javascript" src="../../js/func.js"></script>
</body>

</html>