<?php
include('../../../class/class.Conexao.php');
include('../../../class/class.ConfigVO.php');
include('../../../class/DAO/class.ConfigDAO.php');

$configDAO = new ConfigDAO();
$configs = $configDAO->getAll();
$names = array_map(create_function('$o', 'return $o->getNome();'), $configs);
foreach ($_POST as $i => $val) {
  if (in_array($i, $names)) {
    $config = $configDAO->getByName($i)[0];
  } else {
    $config = new ConfigVO();
  }
  $config->setNome($i);
  $config->setValor($val);
  $res =  $configDAO->save($config);
}

if (is_int($res)) {
  $msg = array('titulo' => 'Configurações salvas com sucesso', 'msg' => 'As configurações foram <b>salvas</b> com sucesso.');
  echo json_encode($msg);
} else {
  $msg = array('titulo' => 'Erro', 'msg' => '"'.$res.'"');
  echo json_encode($msg);
}


?>