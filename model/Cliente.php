<?php

class Cliente{
    private $id, $nome, $tel;
    
    public function __construct($id=0, $nome, $tel){
        $this->id = $id;
        $this->nome = $nome;
        $this->tel = $tel;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getTel(){
        return $this->tel;
    }
    
}

?>