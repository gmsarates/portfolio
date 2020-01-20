<?php
include('../../../class/class.Conexao.php');
include('../../../class/class.UsuarioVO.php');
include('../../../class/DAO/class.UsuarioDAO.php');

$usuarioDAO = new UsuarioDAO();

if (isset($_POST['id'])) {
  $usuario = $usuarioDAO->getById($_POST['id']);
  $nome = $usuario->getNome();
  $res = $usuarioDAO->delete($usuario);
  
  if (is_int($res)) {
    $msg = array('titulo' => 'Usuário excluído com sucesso', 'msg' => 'O usuário <b>'.$nome.'</b> foi excluído com sucesso.');
    echo json_encode($msg);
  } else {
    $msg = array('titulo' => 'Erro', 'msg' => '"'.$res.'"');
    echo json_encode($msg);
  }
}

?>