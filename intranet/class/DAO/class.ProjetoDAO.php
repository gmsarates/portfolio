<?php
  Class ProjetoDAO extends Conexao {

    public function getAll() {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $listProjetos = $this->selectDB('SELECT * FROM projetos', null, 'ProjetoVO');
      return $listProjetos;
    }
    
    public function getById($id) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $projetos = $this->selectDB('SELECT * FROM  projetos WHERE idprojeto = '.$id, null, 'ProjetoVO');
      return $projetos[0];
    }

    public function insert(ProjetoVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = sprintf("INSERT INTO projetos (nome, tipo, idcliente, data, valor, descricao) VALUES 
      ('%s', '%s', '%s', '%s', '%s', '%s')", 
      $objVo->getNome(),
      $objVo->getTipo(),
      $objVo->getIdcliente(),
      $objVo->getData(),
      $objVo->getValor(),
      $objVo->getDescricao());
      $id = $this->insertDB($sql);
      return (int)$id;
    }

    public function update(ProjetoVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = sprintf("UPDATE projetos SET nome='%s', tipo='%s', idcliente='%s', data='%s', valor='%s', descricao='%s' WHERE idprojeto='%s'", 
      $objVo->getNome(),
      $objVo->getTipo(),
      $objVo->getIdcliente(),
      $objVo->getData(),
      $objVo->getValor(),
      $objVo->getDescricao(),
      $objVo->getIdprojeto());
      $ret = $this->updateDB($sql);
      return (int)$ret;
    }

    public function save(ProjetoVO &$objVo) {
      if ($objVo->getIdprojeto() != null) {
        $ret = $this->update($objVo);
      } else  {
        $ret = $this->insert($objVo);
      }
      return $ret;
    }

    public function delete(ProjetoVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = "DELETE FROM projetos WHERE idprojeto = ". $objVo->getIdprojeto();
      $ret = $this->deleteDB($sql);
      return (int)$ret;
    }
  }
?>