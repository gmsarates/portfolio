<?php
include('../../../class/class.Conexao.php');
include('../../../class/class.GrupoVO.php');
include('../../../class/DAO/class.GrupoDAO.php');

$grupoDAO = new GrupoDAO();

if (isset($_POST['idgrupo'])) {
  $grupo = $grupoDAO->getById($_POST['idgrupo']);
  $func = 'alterado';
}  else {
  $grupo = new GrupoVO();
  $func = 'cadastrado';
}

$grupo->setNome($_POST['inputNome']);
$grupo->setCor($_POST['inputCor']);

$id = $grupoDAO->save($grupo);

if (is_int($id)) {
  $msg = array('titulo' => 'Grupo '.$func.' com sucesso', 'msg' => 'O grupo <b>'.$grupo->getNome().'</b> foi '.$func.' com sucesso.');
  echo json_encode($msg);
} else {
  $msg = array('titulo' => 'Erro', 'msg' => '"'.$id.'"');
  echo json_encode($msg);
}


?>