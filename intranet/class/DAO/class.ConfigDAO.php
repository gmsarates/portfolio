<?php
  Class ConfigDAO extends Conexao {

    public function getAll() {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $listConfigs = $this->selectDB('SELECT * FROM config', null, 'ConfigVO');
      return $listConfigs;
    }
    
    public function getById($id) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $configs = $this->selectDB('SELECT * FROM config WHERE idconfig = '.$id, null, 'ConfigVO');
      return $configs[0];
    }

    public function getByName($name) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $configs = $this->selectDB('SELECT * FROM config WHERE nome = "'.$name.'"', null, 'ConfigVO');
      return $configs;
    }

    public function insert(ConfigVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $link = $this->connect();
      $sql = sprintf("INSERT INTO config (nome, valor) VALUES 
      ('%s', '%s')", 
      $objVo->getNome(),
      $objVo->getValor());
      $id = $this->insertDB($sql);
      return (int)$id;
    }

    public function update(ConfigVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = sprintf('UPDATE config SET nome="%s", valor="%s" WHERE idconfig = %s ', 
      $objVo->getNome(),
      $objVo->getValor(),
      $objVo->getIdconfig());
      $ret = $this->updateDB($sql);
      return $ret;
    }

    public function save(ConfigVO &$objVo) {
      if ($objVo->getIdconfig() !== null) {
        return $this->update($objVo);
      } else  {
        return $this->insert($objVo);
      }
    }

    public function delete(ConfigVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = "DELETE FROM config WHERE idconfig = ". $objVo->getIdconfig();
      $ret = $this->deleteDB($sql);
      return (int)$ret;
    }
  }
?>