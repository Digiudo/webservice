<?php

class Usuario{
    /*
        CREATE TABLE Usuarios (cd_Usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                     nm_Usuario VARCHAR (50) NOT NULL,
                     ds_Email VARCHAR (50) NOT NULL,
                     ds_Senha VARCHAR (12) NOT NULL,
                     ds_Logradouro VARCHAR (50) NULL,
                     ds_Numero VARCHAR (5) NULL,
                     ds_Cidade VARCHAR (50) NULL,
                     sg_Estado CHAR (2) NULL,
                     cd_Cep VARCHAR (8) NULL,
		     cd_Telefone VARCHAR (12) NULL,
                     fl_Usuario CHAR(1) NOT NULL);*/
    protected $id, $nome, $tel,$email,$senha,$logradouro,$numero,$cidade,$estado,$cep,$usuario;

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getLogradouro(){
        return $this->logradouro;
    }
    public function getNum(){
        return $this->numero;
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
    public function getTel(){
        return $this->tel;
    }
    public function getUsuario(){
        return $this->usuario;
    }
}

?>