<?php
  Class UsuarioDAO extends Conexao {

    public function logar($user, $pass) {
      $listUsuarios = $this->selectDB('SELECT * FROM usuarios', null, 'UsuarioVO');
      $logado = false;
      foreach ($listUsuarios as $objVo) {
        if ($objVo->getUsuario() == $user) {
          if ($objVo->getSenha() == md5($pass)) {
            $logado = true;
          } else {
            // ERRO DE SENHA
            $logado = false;
          }
        } else {
          // ERRO DE USER
          $logado = false;
        }

        if ($logado == true) {
          session_cache_limiter('private');
          session_cache_expire(30);
          session_start();
          $_SESSION['id'] = $objVo->getIdusuario();
          $_SESSION['nome'] = $objVo->getNome();
          $_SESSION['grupo'] = $objVo->getGrupo();
          $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
          header("location: " . getUrl() . 'intranet/content/');
        } else  {
          $_SESSION['logado'] = false;
        }
      }
    }

    public function getAll() {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $listUsuarios = $this->selectDB('SELECT * FROM  usuarios', null, 'UsuarioVO');
      return $listUsuarios;
    }

    public function getByGrupo($idgrupo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $listUsuarios = $this->selectDB('SELECT * FROM  usuarios WHERE grupo = '.$idgrupo, null, 'UsuarioVO');
      return $listUsuarios;
    }
    
    public function getById($id) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $usuario = $this->selectDB('SELECT * FROM  usuarios WHERE idusuario = '.$id, null, 'UsuarioVO');
      return $usuario[0];
    }

    public function insert(UsuarioVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = sprintf("INSERT INTO usuarios (nome, usuario, senha, email, telefone, grupo, idprojeto, descricao) VALUES 
      ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
      $objVo->getNome(),
      $objVo->getUsuario(),
      md5($objVo->getSenha()),
      $objVo->getEmail(),
      $objVo->getTelefone(),
      $objVo->getGrupo(),
      $objVo->getIdprojeto(), 
      $objVo->getDescricao());
      $id = $this->insertDB($sql);
      return (int)$id;
    }

    public function update(UsuarioVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = sprintf("UPDATE usuarios SET nome='%s', usuario='%s', senha='%s', email='%s', telefone='%s', grupo='%s', idprojeto='%s', descricao='%s' WHERE idusuario='%s'", 
      $objVo->getNome(),
      $objVo->getUsuario(),
      md5($objVo->getSenha()),
      $objVo->getEmail(),
      $objVo->getTelefone(),
      $objVo->getGrupo(),
      $objVo->getIdprojeto(), 
      $objVo->getDescricao(),
      $objVo->getIdusuario());
      $ret = $this->updateDB($sql);
      return (int)$ret;
    }

    public function save(UsuarioVO &$objVo) {
      if ($objVo->getIdusuario() != null) {
        $ret = $this->update($objVo);
      } else  {
        $ret = $this->insert($objVo);
      }
      return $ret;
    }

    public function delete(UsuarioVO &$objVo) {
      $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
      $sql = "DELETE FROM usuarios WHERE idusuario = ". $objVo->getIdusuario();
      $ret = $this->deleteDB($sql);
      return (int)$ret;
    }
  }
?>