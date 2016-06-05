<?php

class Produto{
    private $user,$id, $nome, $valor, $capa, $tipo, $descricao;
    
    public function __construct($user,$id=0, $nome, $valor, $capa, $tipo, $descricao){
        $this->user = $user;
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->capa = $capa;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
    }
   
     public function getUser(){
        return $this->user;
    }    
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getValor(){
        return $this->valor;
    }
    
    public function getCapa(){
        return $this->capa;
    }
    
    public function getTipo(){
        return $this->tipo;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
}

?>