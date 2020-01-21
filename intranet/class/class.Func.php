<?php
include('class.ConfigVO.php');
include('DAO/class.ConfigDAO.php');

//CARREGA AS CONFIGURAÇOES DO BANCO
$configDAO = new ConfigDAO();
$configs = $configDAO->getAll();
$names = array_map(create_function('$o', 'return $o->getNome();'), $configs);

if (in_array('TempoTimeout', $names)) { $TempoTimeout = (int) $configDAO->getByName('TempoTimeout')[0]->getValor() * 60; }
if (in_array('GrupoAdmin', $names)) { $GrupoAdmin = $configDAO->getByName('GrupoAdmin')[0]->getValor(); }
if (in_array('GrupoCliente', $names)) { $GrupoCliente = $configDAO->getByName('GrupoCliente')[0]->getValor(); }
if (in_array('TiposDeProjetos', $names)) { $TiposDeProjetos = $configDAO->getByName('TiposDeProjetos')[0]->getValor(); }

function getUrl() {
  $url = "http://".$_SERVER['HTTP_HOST']."/portfolio/site/";
  return $url;
}



?>