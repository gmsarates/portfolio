<?php

  include('../class/class.Conexao.php');
  include('../class/class.GrupoVO.php');
  include('../class/DAO/class.GrupoDAO.php');
  include('../class/class.UsuarioVO.php');
  include('../class/DAO/class.UsuarioDAO.php');

  $grupoDAO = new GrupoDAO();
  $idgrupo = $_GET['id'];
  $grupos = $grupoDAO->countUsuarios($idgrupo);
  
  if (sizeof($grupos) > 0) {
    print_r($grupos);
  } else  {
    print('bbbb');
  }
  
?>