<?php
include('../../../class/class.Conexao.php');
include('../../../class/class.Func.php');
include('../../../class/class.ProjetoVO.php');
include('../../../class/DAO/class.ProjetoDAO.php');

$projetoDAO = new ProjetoDAO();

if (isset($_POST['id'])) {
    $projeto = $projetoDAO->getById($_POST['id']);
    $nome = $projeto->getNome();
    $res = $projetoDAO->delete($projeto);

  if (is_int($res)) {
    $msg = array('titulo' => 'Projeto excluído com sucesso', 'msg' => 'O projeto <b>'.$nome.'</b> foi excluído com sucesso.');
    echo json_encode($msg);
  } else {
    $msg = array('titulo' => 'Erro', 'msg' => $res);
    echo json_encode($msg);
  }
}

?>