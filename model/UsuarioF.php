<?php
require_once "Usuario.php";
class UsuarioF extends Usuario{

/*
CREATE TABLE UsuarioFisico (cd_UsuFisico INT PRIMARY KEY NOT NULL,
                           cd_Rg VARCHAR (50) NULL,
                           cd_Cpf VARCHAR (50) NOT NULL,
                           sg_Sexo CHAR (1) NULL);*/

    private $rg, $cpf,$sexo;
    
    public function __construct($id=0, $nome,$email,$senha,$logradouro,$numero,$cidade,$estado,$cep, $tel, $usuario,$rg, $cpf,$sexo){
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
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
    }
    public function getRg(){
        return $this->rg;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getSexo(){
        return $this->sexo;
    }
}
/*
$p = new UsuarioF(0, 'Gustavo','guto@guto.com','123','teste','123','guaru','SP','11222-555', '01332326565', 'F','123456789', '123654987','M');
echo $p->getNome();
echo $p->getRg();
*/
?>