<?php
  Class UsuarioVO {
    private $idusuario = null;
    private $nome = null;
    private $usuario = null;
    private $senha = null;
    private $email = null;
    private $telefone = null;
    private $grupo = null;
    private $idprojeto = null;
    private $descricao = null;

    public function getIdusuario(){
      return $this->idusuario;
    }
  
    public function setIdusuario($idusuario){
      $this->idusuario = $idusuario;
    }
  
    public function getNome(){
      return $this->nome;
    }
  
    public function setNome($nome){
      $this->nome = $nome;
    }
  
    public function getUsuario(){
      return $this->usuario;
    }
  
    public function setUsuario($usuario){
      $this->usuario = $usuario;
    }
  
    public function getSenha(){
      return $this->senha;
    }
  
    public function setSenha($senha){
      $this->senha = $senha;
    }

    public function getEmail(){
      return $this->email;
    }
  
    public function setEmail($email){
      $this->email = $email;
    }
  
    public function getTelefone(){
      return $this->telefone;
    }
  
    public function setTelefone($telefone){
      $this->telefone = $telefone;
    }
  
    public function getGrupo(){
      return $this->grupo;
    }
  
    public function setGrupo($grupo){
      $this->grupo = $grupo;
    }
  
    public function getIdprojeto(){
      return $this->idprojeto;
    }
  
    public function setIdprojeto($idprojeto){
      $this->idprojeto = $idprojeto;
    }

    public function getDescricao(){
      return $this->descricao;
    }
  
    public function setDescricao($descricao){
      $this->descricao = $descricao;
    }
  }
  ?>