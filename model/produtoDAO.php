<?php

class ProdutoDAO{
    public function insert(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Produto(nm_produto,vl_produto,im_Produto,cd_TipoProduto,ds_Produto,cd_Usuario) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssisi",$p->getNome(),$p->getValor(),$p->getCapa(),$p->getTipo(),$p->getDescricao(),$p->getUser());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt = $mysqli->prepare("SELECT * FROM Produto where cd_Usuario=? order by cd_Produto DESC LIMIT 1");
        $stmt->bind_param('i',$p->getUser());
        $stmt->execute();
        $stmt->bind_result($id,$nome,$valor,$capa,$descricao,$cat,$tipo,$user);
        $stmt->fetch();
        $stmt->close();
        $prod = new Produto($user,$id,$nome,$valor,$capa,$tipo,$descricao);
        return $prod;
    }
    
    public function getAllProduct(){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->query("SELECT * FROM Produto ");
        $prod = [];
        
        for ($count=0; $row = $stmt->fetch_assoc(); $count++){
            //$dados[$count] = $row;
            $prod[$count] = new Produto($row['cd_Usuario'],$row['cd_Produto'],$row['nm_Produto'],$row['vl_Produto'],$row['im_Produto'],$row['cd_TipoProduto'],$row['ds_Produto']);
            //var_dump($dados[0]['cd_Produto'].$dados[0]['nm_Produto'].$dados[0]['vl_Produto']);
        }
        return $prod;
        
    }
    
    public function getProduct($x){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE cd_Usuario = ?");
        $stmt->bind_param("i",$x);
        $stmt->execute();
        $v = $stmt->get_result();
        $prod = [];
        while ($row = $v->fetch_assoc()){
            $prod[] = new Produto($row['cd_Usuario'],$row['cd_Produto'],$row['nm_Produto'],$row['vl_Produto'],$row['im_Produto'],$row['cd_TipoProduto'],$row['ds_Produto']);
        }
        $stmt->close();
        return $prod;
    }
    
    public function getBuscaProdutoMenor($produto){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE vl_Produto < ?");
        $stmt->bind_param("d",$produto);
        $stmt->execute();
        $v = $stmt->get_result();
        $prod = [];
        while ($row = $v->fetch_assoc()){
            $prod[] = new Produto($row['cd_Usuario'],$row['cd_Produto'],$row['nm_Produto'],$row['vl_Produto'],$row['im_Produto'],$row['cd_TipoProduto'],$row['ds_Produto']);
        }
        $stmt->close();
        return $prod;
    }
    
    public function deletar($x){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("DELETE FROM Produto where cd_Produto = ?");
        $stmt->bind_param("i",$x);
        $stmt->execute();
        $stmt->close();
    }
    
    public function alter(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE Produto SET nm_produto =? ,vl_produto = ?,im_Produto = ?,cd_TipoProduto = ?,ds_Produto = ? WHERE cd_Produto = ?");
        $stmt->bind_param("sssisi",$p->getNome(),$p->getValor(),$p->getCapa(),$p->getTipo(),$p->getDescricao(),$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        
        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE cd_Produto = ?");
        $stmt->bind_param("i",$p->getId());
        $stmt->execute();
        $stmt->bind_result($id,$nome,$valor,$capa,$descricao,$cat,$tipo,$user);
        $stmt->fetch();
        $stmt->close();
        $prod = new Produto(0,$id,$nome,$valor,$capa,$tipo,$descricao);
        return $prod;
    }
}

?>