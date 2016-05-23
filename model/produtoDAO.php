<?php

class ProdutoDAO{
    public function insert(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Produto(nm_produto,vl_produto,im_Produto,tp_Produto,ds_Produto) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$p->getNome(),$p->getValor(),$p->getCapa(),$p->getTipo(),$p->getDescricao());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt = $mysqli->prepare("SELECT * FROM Produto order by cd_Produto DESC LIMIT 1");
        $stmt->execute();
        $stmt->bind_result($id,$nome,$valor,$capa,$tipo,$descricao);
        $stmt->fetch();
        $stmt->close();
        $prod = new Produto($id,$nome,$valor,$capa,$tipo,$descricao);
        return $prod;
    }
    
    public function getProduct(){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        $stmt = $mysqli->query("SELECT * FROM Produto");
        //$dados = [];
        $prod = [];
        for ($count=0; $row = $stmt->fetch_assoc(); $count++){
            //$dados[$count] = $row;
            $prod[$count] = new Produto($row['cd_Produto'],$row['nm_Produto'],$row['vl_Produto'],$row['im_Produto'],$row['tp_Produto'],$row['ds_Produto']);
            //var_dump($dados[0]['cd_Produto'].$dados[0]['nm_Produto'].$dados[0]['vl_Produto']);
        }
        return $prod;
    }
    
    public function deletar($x){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        $stmt = $mysqli->prepare("DELETE FROM Produto where cd_Produto = ?");
        $stmt->bind_param("i",$x);
        $stmt->execute();
    }
    
    public function alter(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE Produto SET nm_Produto = ? , vl_Produto = ? WHERE cd_Produto = ?");
        $stmt->bind_param("sdi",$p->getNome(),$p->getValor(),$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        
        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE cd_Produto = ?");
        $stmt->bind_param("i",$p->getId());
        $stmt->execute();
        
        $stmt->bind_result($id,$nome,$valor);
        $stmt->fetch();
        $stmt->close();
        $prod = new Produto($id,$nome,$valor);
        return $prod;
    }
}

?>