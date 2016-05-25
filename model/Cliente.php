<?php

class Cliente{
    private $id, $nome, $tel,$email,$senha,$endereco,$num,$cidade,$estado,$cep;
    
    public function __construct($id=0, $nome, $tel,$email,$senha,$endereco,$num,$cidade,$estado,$cep){
        $this->id = $id;
        $this->nome = $nome;
        $this->tel = $tel;
        $this->email = $email;
        $this->senha = $senha;
        $this->endereco = $endereco;
        $this->num = $num;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
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
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getNum(){
        return $this->num;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getCep(){
        return $this->cep;
    }
}

?>