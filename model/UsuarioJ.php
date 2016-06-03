<?php
require_once "Usuario.php";
class UsuarioJ extends Usuario{
    /*
CREATE TABLE UsuarioJuridico (cd_UsuJuridico INT PRIMARY KEY NOT NULL,
                             cd_Cnpj VARCHAR (50) NOT NULL,
                             nm_RazaoSocial VARCHAR (50) NULL);*/
    private $cnpj, $razaoSocial;
    
    public function __construct($id=0, $nome,$email,$senha,$logradouro,$numero,$cidade,$estado,$cep, $tel, $usuario,$cnpj, $razaoSocial){
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        $this->tel = $tel;
        $this->usuario = $usuario;
        $this->cnpj = $cnpj;
        $this->razaoSocial = $razaoSocial;
    }
    
    public function getCnpj(){
        return $this->cnpj;
    }
    public function getRazaoSocial(){
        return $this->razaoSocial;
    }
}

?>