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
        $stmt = $mysqli->prepare("INSERT INTO Usuarios(nm_Usuario,ds_Email,ds_Senha,ds_Logradouro,ds_Numero,ds_Cidade,sg_Estado,cd_Cep,cd_Telefone,fl_Usuario) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss",$p->getNome(),$p->getEmail(),$p->getSenha(),$p->getLogradouro(),$p->getNum(),$p->getCidade(),$p->getEstado(),$p->getCep(),$p->getTel(),$p->getUsuario());
        
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $retornoId = mysqli_insert_id($mysqli);
        $stmt = $mysqli->prepare("INSERT INTO UsuarioJuridico(cd_UsuJuridico,cd_Cnpj,nm_RazaoSocial) VALUES (?,?,?)");
        $stmt->bind_param("iss",$retornoId, $p->getCnpj(), $p->getRazaoSocial());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function getUsuario($id){ //Consultar um unico cliente Fisico ou Juridico
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("SELECT fl_Usuario FROM Usuarios WHERE cd_Usuario=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($usuario);
        $stmt->fetch();
        $stmt->close();
        require_once "model/Usuario".$usuario.".php";
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        switch ($usuario){
            case 'F':
                $stmt = $mysqli->prepare("SELECT * FROM Usuarios as U INNER JOIN UsuarioFisico as F ON U.cd_Usuario = F.cd_UsuFisico AND U.cd_Usuario=?");
                $stmt->bind_param("i",$id);
                $stmt->execute();
                $stmt->bind_result($id,$nome,$email,$senha,$endereco,$num,$cidade,$estado,$cep,$tel,$usuario,$idF,$rg,$cpf,$sexo);
                $stmt->fetch();
                $usu = new UsuarioF($id,$nome,$email,$senha,$endereco,$num,$cidade,$estado,$cep,$tel,$usuario,$rg,$cpf,$sexo);
                break;
            case 'J':
                $stmt = $mysqli->prepare("SELECT * FROM Usuarios as U INNER JOIN UsuarioJuridico as J ON U.cd_Usuario = J.cd_UsuJuridico AND U.cd_Usuario=?");
                $stmt->bind_param("i",$id);
                $stmt->execute();
                $stmt->bind_result($id,$nome,$email,$senha,$endereco,$num,$cidade,$estado,$cep,$tel,$usuario,$idJ,$cnpj,$razaoSocial);
                $stmt->fetch();
                $usu = new UsuarioJ($id,$nome,$email,$senha,$endereco,$num,$cidade,$estado,$cep,$tel,$usuario,$cnpj,$razaoSocial);
                break;
        }
        $stmt->close();
        return $usu;
    }
    
    public function listUsuarioF(){ //Listar usuarios fisicos
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->query("SELECT * FROM Usuarios as U INNER JOIN UsuarioFisico as F ON U.cd_Usuario = F.cd_UsuFisico");
        $row = $stmt->fetch_all();
        $c = [];
        foreach($row as $usuario){
            $c[] = new UsuarioF($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],$usuario[9],$usuario[10],$usuario[12],$usuario[13],$usuario[14]);
        }
        $stmt->close();
        return $c;
    }
    
    public function listUsuarioJ(){ //Listar usuarios juridicos
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->query("SELECT * FROM Usuarios as U INNER JOIN UsuarioJuridico as J ON U.cd_Usuario = J.cd_UsuJuridico");
        $row = $stmt->fetch_all();
        $c = [];
        foreach($row as $usuario){
            $c[] = new UsuarioJ($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],$usuario[9],$usuario[10],$usuario[12],$usuario[13]);
        }
        $stmt->close();
        return $c;
    }
    
    public function deletarUsuarioF($id){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("DELETE FROM UsuarioFisico WHERE cd_UsuFisico=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt = $mysqli->prepare("DELETE FROM Usuarios WHERE cd_Usuario=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }
    
    public function deletarUsuarioJ($id){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("DELETE FROM UsuarioJuridico WHERE cd_UsuJuridico=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt = $mysqli->prepare("DELETE FROM Usuarios WHERE cd_Usuario=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }
    
    public function alterarUsuarioF(UsuarioF $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE Usuarios SET nm_Usuario=?, ds_Email=?, ds_Senha=?, ds_Logradouro=?, ds_Numero=?, ds_Cidade=?, sg_Estado=?, cd_Cep=?, cd_Telefone=?, fl_Usuario=? WHERE cd_Usuario=?");
        $stmt->bind_param("ssssssssssi",$p->getNome(),$p->getEmail(),$p->getSenha(),$p->getLogradouro(),$p->getNum(),$p->getCidade(),$p->getEstado(),$p->getCep(),$p->getTel(),$p->getUsuario(),$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt = $mysqli->prepare("UPDATE UsuarioFisico SET cd_Rg=?, cd_Cpf=?, sg_Sexo=? WHERE cd_UsuFisico=?");
        $stmt->bind_param("sssi", $p->getRg(), $p->getCpf(), $p->getSexo(), $p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function alterarUsuarioJ(UsuarioJ $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE Usuarios SET nm_Usuario=?, ds_Email=?, ds_Senha=?, ds_Logradouro=?, ds_Numero=?, ds_Cidade=?, sg_Estado=?, cd_Cep=?, cd_Telefone=?, fl_Usuario=? WHERE cd_Usuario=?");
        $stmt->bind_param("ssssssssssi",$p->getNome(),$p->getEmail(),$p->getSenha(),$p->getLogradouro(),$p->getNum(),$p->getCidade(),$p->getEstado(),$p->getCep(),$p->getTel(),$p->getUsuario(),$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt = $mysqli->prepare("UPDATE UsuarioJuridico SET cd_Cnpj=?,nm_RazaoSocial=? WHERE cd_UsuJuridico=?");
        $stmt->bind_param("ssi", $p->getCnpj(), $p->getRazaoSocial(), $p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
}

?>