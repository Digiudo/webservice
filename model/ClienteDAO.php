<?php

class ClienteDAO{
    
    public function insert(Cliente $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Clientes(nm_Cliente,cd_Telefone) VALUES (?,?)");
        $stmt->bind_param("ss",$p->getNome(),$p->getTel());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function getCliente($id){ //Consultar um unico cliente
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        $stmt = $mysqli->prepare("SELECT * FROM Clientes WHERE cd_Cliente=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $tel);
        $stmt->fetch();
        $stmt->close();
        $cli = new Cliente($id,$nome,$tel);
        return $cli;
    }
    
    public function listCliente(){ //Listar todos
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        $stmt = $mysqli->query("SELECT * FROM Clientes");
        $row = $stmt->fetch_all();
        $c = [];
        foreach($row as $usuario){
            $c[] = new Cliente($usuario[0],$usuario[1],$usuario[2]);
        }
        $stmt->close();
        return $c;
    }
    
    public function deletar($id){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        $stmt = $mysqli->prepare("DELETE FROM Clientes WHERE cd_Cliente=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }
    
    public function alterar(Cliente $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE Clientes SET nm_Cliente=?, cd_Telefone=? WHERE cd_Cliente=?");
        $stmt->bind_param("ssi",$p->getNome(),$p->getTel(),$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
}

?>