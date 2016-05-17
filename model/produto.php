<?php

class Produto{
    private $id, $nome, $valor;
    
    public function __construct($id=0, $nome, $valor){
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
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
}

?>