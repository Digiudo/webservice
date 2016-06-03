<?php

class UsuarioDAO{
    
    public function insertUsuarioF(UsuarioF $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Usuarios(nm_Usuario,ds_Email,ds_Senha,ds_Logradouro,ds_Numero,ds_Cidade,sg_Estado,cd_Cep,cd_Telefone,fl_Usuario) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss",$p->getNome(),$p->getEmail(),$p->getSenha(),$p->getLogradouro(),$p->getNum(),$p->getCidade(),$p->getEstado(),$p->getCep(),$p->getTel(),$p->getUsuario());
        
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $retornoId = mysqli_insert_id($mysqli);
        $stmt = $mysqli->prepare("INSERT INTO UsuarioFisico(cd_UsuFisico,cd_Rg,cd_Cpf,sg_Sexo) VALUES (?,?,?,?)");
        $stmt->bind_param("isss",$retornoId, $p->getRg(), $p->getCpf(), $p->getSexo());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    public function insertUsuarioJ(UsuarioJ $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Usuarios(nm_Usuario,cd_Telefone,ds_Email,ds_Senha,ds_Endereco,ds_Numero,ds_Cidade,sg_Estado,cd_Cep) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$p->getNome(),$p->getTel(),$p->getEmail(),$p->getSenha(),$p->getEndereco(),$p->getNum(),$p->getCidade(),$p->getEstado(),$p->getCep());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function getUsuario($id){ //Consultar um unico cliente
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("SELECT * FROM Usuarios WHERE cd_Usuario=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id, $nome, $tel,$email,$senha,$endereco,$num,$cidade,$estado,$cep);
        $stmt->fetch();
        $stmt->close();
        $cli = new Usuario($id, $nome, $tel,$email,$senha,$endereco,$num,$cidade,$estado,$cep);
        return $cli;
    }
    
    public function listUsuarioF(){ //Listar usuarios fisicos
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->query("SELECT * FROM Usuarios as U INNER JOIN UsuarioFisico as F ON U.cd_Usuario = F.cd_UsuFisico");
        $row = $stmt->fetch_all();
        $c = [];
        foreach($row as $usuario){
            $c[] = new UsuarioF($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],$usuario[9],$usuario[10],$usuario[11],$usuario[12],$usuario[13]);
        }
        $stmt->close();
        return $c;
    }
    
    public function deletar($id){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("DELETE FROM Usuarios WHERE cd_Usuario=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }
    
    public function alterar(Usuario $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE Usuarios SET nm_Usuario=?, cd_Telefone=?, ds_Email=?, ds_Senha=?, ds_Endereco=?, ds_Numero=?, ds_Cidade=?, sg_Estado=?, cd_Cep=? WHERE cd_Usuario=?");
        $stmt->bind_param("sssssssssi",$p->getNome(),$p->getTel(),$p->getEmail(),$p->getSenha(),$p->getEndereco(),$p->getNum(),$p->getCidade(),$p->getEstado(),$p->getCep(),$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
}

?>