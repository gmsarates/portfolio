<?php
  Class GrupoDAO extends Conexao {

    public function countUsuarios(int $idgrupo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $count = $this->selectDB('SELECT * FROM usuarios WHERE grupo = ' . $idgrupo);
      return count($count);
    }

    public function getAll() {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $listGrupos = $this->selectDB('SELECT * FROM grupos', null, 'GrupoVO');
      return $listGrupos;
    }
    
    public function getById($id) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $grupos = $this->selectDB('SELECT * FROM  grupos WHERE idgrupo = '.$id, null, 'GrupoVO');
      return $grupos[0];
    }

    public function insert(GrupoVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = sprintf("INSERT INTO grupos (nome, cor) VALUES 
      ('%s', '%s')", 
      $objVo->getNome(),
      $objVo->getCor());
      $id = $this->insertDB($sql);
      return (int)$id;
    }

    public function update(GrupoVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = sprintf("UPDATE grupos SET nome='%s', cor='%s' WHERE idgrupo='%s'", 
      $objVo->getNome(),
      $objVo->getCor(),
      $objVo->getIdgrupo());
      $ret = $this->updateDB($sql);
      return (int)$ret;
    }

    public function save(GrupoVO &$objVo) {
      if ($objVo->getIdgrupo() != null) {
        $ret = $this->update($objVo);
      } else  {
        $ret = $this->insert($objVo);
      }
      return $ret;
    }

    public function delete(GrupoVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = "DELETE FROM grupos WHERE idgrupo = ". $objVo->getIdgrupo();
      $ret = $this->deleteDB($sql);
      return (int)$ret;
    }
  }
?>