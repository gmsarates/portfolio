<?php
include('../../../class/class.Conexao.php');
include('../../../class/class.ProjetoVO.php');
include('../../../class/DAO/class.ProjetoDAO.php');

$projDAO = new ProjetoDAO();

if (isset($_POST['idprojeto'])) {
  $projeto = $projDAO->getById($_POST['idprojeto']);
  $func = 'alterado';
}  else {
  $projeto = new ProjetoVO();
  $func = 'cadastrado';
}

$projeto->setNome($_POST['inputNome']);
$projeto->setTipo($_POST['inputTipo']);
$projeto->setIdcliente($_POST['inputCliente']);
$data = DateTime::createFromFormat('d/m/Y', $_POST['inputData']);
$projeto->setData($data->format('Y-m-d 00:00:00'));
$projeto->setValor($_POST['inputValor']);
$projeto->setDescricao($_POST['inputDescricao']);

$id = $projDAO->save($projeto);

if (is_int($id)) {
  $msg = array('titulo' => 'Projeto '.$func.' com sucesso', 'msg' => 'O projeto <b>'.$projeto->getNome().'</b> foi '.$func.' com sucesso.');
  echo json_encode($msg);
} else {
  $msg = array('titulo' => 'Erro', 'msg' => '"'.$id.'"');
  echo json_encode($msg);
}


?>