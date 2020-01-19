<?php

function getUrl() {
  $url = "http://".$_SERVER['HTTP_HOST']."/portfolio/site/";
  return $url;
}

function  getBadge($grupo) {
  $ret = null;
  switch ($grupo) {
    case 'admin': 
      $ret = 'badge-default';
      break;
    case 'cliente':
      $ret = 'badge-secondary';
      break;
  }
  return $ret;
}
?>