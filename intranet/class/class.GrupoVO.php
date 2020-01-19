<?php
  Class GrupoVO {
    private $idgrupo  = null;
    private $nome  = null;
    private $cor  = null;

    public function getIdgrupo(){
      return $this->idgrupo;
    }
  
    public function setIdgrupo($idgrupo){
      $this->idgrupo = $idgrupo;
    }
  
    public function getNome(){
      return $this->nome;
    }
  
    public function setNome($nome){
      $this->nome = $nome;
    }
  
    public function getCor(){
      return $this->cor;
    }
  
    public function setCor($cor){
      $this->cor = $cor;
    }
  }
  ?>