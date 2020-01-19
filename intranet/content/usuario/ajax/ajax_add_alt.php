<?php
include('../../../class/class.Conexao.php');
include('../../../class/class.UsuarioVO.php');
include('../../../class/DAO/class.UsuarioDAO.php');

$usuarioDAO = new UsuarioDAO();

if (isset($_POST['idusuario'])) {
  $usuario = $usuarioDAO->getById($_POST['idusuario']);
  $func = 'alterado';
}  else {
  $usuario = new UsuarioVO();
  $func = 'cadastrado';
}

$usuario->setNome($_POST['inputNome']);
$usuario->setEmail($_POST['inputEmail']);
$usuario->setTelefone($_POST['inputTelefone']);
$usuario->setUsuario($_POST['inputUsuario']);
$usuario->setGrupo($_POST['inputGrupo']);
if (isset($_POST['inputSenha'])) {
  $usuario->setSenha($_POST['inputSenha']);
}
$usuario->setIdprojeto($_POST['inputIdprojeto']);
$usuario->setDescricao($_POST['inputDescricao']);

$id = $usuarioDAO->save($usuario);

if (is_int($id)) {
  $msg = array('titulo' => 'Usuário '.$func.' com sucesso', 'msg' => 'O usuário <b>'.$usuario->getNome().'</b> foi '.$func.' com sucesso.');
  echo json_encode($msg);
} else {
  $msg = array('titulo' => 'Erro', 'msg' => '"'.$id.'"');
  echo json_encode($msg);
}


?>