<?php
include('class/class.Conexao.php');
include('class/class.Func.php');
include('class/class.UsuarioVO.php');
include('class/DAO/class.UsuarioDAO.php');

$usuarioDAO = new  UsuarioDAO();

@$user = $_POST['user'];
@$pass = $_POST['pass'];
if (isset($user)) {
  $usuarioDAO->logar($user, $pass);
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
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/mdb.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-admin.css" rel="stylesheet">
  <link href="../css/hover.css" rel="stylesheet">
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>

  <!-- Main navigation -->
<div class="login">
  
  <!-- Full Page Intro -->
  <section id="loginBg" style="background-image: url('../images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask d-flex pattern-7 login justify-content-center">
      <!-- Content -->
      <div class="container my-5 py-5">
        
        <h3 class="font-weight-bold text-center white-text pb-2">Fazer login no sistema</h3>
        <p class="lead text-center white-text pt-2 mb-5">Se você chegou até aqui, provávelmente você tem um login e senha.</p>
        
        <!--Grid row-->
        <div class="row d-flex align-items-center justify-content-center">
          <!--Grid column-->
          <div class="col-md-6 col-xl-5">
            <!--Form-->
            <form method="POST">
              <div class="card">
                <div class="card-body z-depth-2 px-4">
                  <div class="md-form mt-3">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="user" name="user" class="form-control" autocomplete="off">
                    <label for="form3">Usuário</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-key prefix grey-text"></i>
                    <input type="password" id="pass" name="pass" class="form-control" autocomplete="off">
                    <label for="form4">Senha</label>
                  </div>
                  <div class="text-center my-3">
                    <button type="submit" class="btn btn-indigo btn-block">Entrar</button>
                  </div>
                  <?php

                  if (isset($_SESSION['logado'])) {
                    if ($_SESSION['logado'] != true) {
                      printf('<div class="text-center text-danger">Usuário e/ou senha incorretos.</div>');
                    }
                  }
                  ?>
                </div>
              </div>
            </form>
            <!--/.Form-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </section>
  <!-- Full Page Intro -->
  
</div>
<!-- Main navigation -->
  

  <!-- SCRIPTS -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript" src="../js/func.js"></script>

  <script>
    $(document).ready(function () {
      var h = $(window).height();
      $("#loginBg").css('height', parseInt(h) + 'px');
    });
  </script>
</body>

</html>
