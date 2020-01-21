<?php
  class ProjetoVO {
    private $idprojeto = null;
    private $idcliente = null;
    private $nome = null;
    private $tipo = null;
    private $data = null;
    private $valor = null;
    private $descricao = null;

    public function getIdprojeto(){
      return $this->idprojeto;
    }
  
    public function setIdprojeto($idprojeto){
      $this->idprojeto = $idprojeto;
    }
  
    public function getIdcliente(){
      return $this->idcliente;
    }
  
    public function setIdcliente($idcliente){
      $this->idcliente = $idcliente;
    }
  
    public function getNome(){
      return $this->nome;
    }
  
    public function setNome($nome){
      $this->nome = $nome;
    }
  
    public function getTipo(){
      return $this->tipo;
    }
  
    public function setTipo($tipo){
      $this->tipo = $tipo;
    }
  
    public function getData(){
      return $this->data;
    }
  
    public function setData($data){
      $this->data = $data;
    }
  
    public function getValor(){
      return $this->valor;
    }
  
    public function setValor($valor){
      $this->valor = $valor;
    }

    public function getDescricao(){
      return $this->descricao;
    }
  
    public function setDescricao($descricao){
      $this->descricao = $descricao;
    }
  }
?>