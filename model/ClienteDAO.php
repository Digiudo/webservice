<?php

class ClienteDAO{
    
    public function insert(Cliente $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Clientes(nm_cliente,cd_telefone) VALUES (?,?)");
        $stmt->bind_param("ss",$p->getNome(),$p->getTel());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function getCliente($id){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        $stmt = $mysqli->prepare("SELECT * FROM Clientes WHERE cd_cliente=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $tel);
        $stmt->fetch();
        $cli = new Cliente($id,$nome,$tel);
        $stmt->close();
        return $cli;
    }
    public function listCliente(){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        $stmt = $mysqli->query("SELECT * FROM Clientes");
        $row = $stmt->get_result()->fetch_all();
        $c = [];
        foreach($row as $usuario){
            $c[] = new Cliente($usuario[0],$usuario[1],$usuario[2]);
        }
        $stmt->close();
        return $c;
    }
}

?>