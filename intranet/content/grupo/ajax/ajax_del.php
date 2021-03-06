<?php
include('../../../class/class.Conexao.php');
include('../../../class/class.Func.php');
include('../../../class/class.GrupoVO.php');
include('../../../class/DAO/class.GrupoDAO.php');

$grupoDAO = new GrupoDAO();

if (isset($_POST['id'])) {
  if (!($_POST['id'] == $GrupoAdmin) && !($_POST['id'] == $GrupoCliente)) {

    $grupo = $grupoDAO->getById($_POST['id']);
    $nome = $grupo->getNome();
    $res = $grupoDAO->delete($grupo);
    
  } else {
    $res = 'Você não pode excluir este grupo.';
  }

  if (is_int($res)) {
    $msg = array('titulo' => 'Grupo excluído com sucesso', 'msg' => 'O grupo <b>'.$nome.'</b> foi excluído com sucesso.');
    echo json_encode($msg);
  } else {
    $msg = array('titulo' => 'Erro', 'msg' => $res);
    echo json_encode($msg);
  }
}

?>