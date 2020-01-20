<?php
  Class ConfigVO {
    private $idconfig = null;
    private $nome = null;
    private $valor = null;

    public function getIdconfig(){
      return $this->idconfig;
    }
  
    public function setIdconfig($idconfig){
      $this->idconfig = $idconfig;
    }
  
    public function getNome(){
      return $this->nome;
    }
  
    public function setNome($nome){
      $this->nome = $nome;
    }
  
    public function getValor(){
      return $this->valor;
    }
  
    public function setValor($valor){
      $this->valor = $valor;
    }
  }
  ?>