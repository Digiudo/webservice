<?php

abstract class GeneralResource{
    
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"Recurso inexistente $m"));
        http_response_code(404);   
    }
    
}

class GeneralResourceGET extends GeneralResource{
    
    public function listaProduto(){
        header('content-type: application/json');
        require_once "model/produto.php";
        require_once "model/produtoDAO.php";
        $pd = new ProdutoDAO();
        $prod = $pd->getProduct();
        foreach($prod as $x){
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome(), "valor"=>$x->getValor());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }
    
    
}

class GeneralResourceOPTIONS extends GeneralResource{

    
    public function produto(){
        header('allow: POST, OPTIONS');
        http_response_code(200); 
    }
    
    public function listaProduto(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function deletarProduto(){
        header('allow: DELETE, OPTIONS');
        http_response_code(200);
    }
    
    public function alterarProduto(){
        header('allow: PUT, OPTIONS');
        http_response_code(200);
    }
}



class GeneralResourcePOST extends GeneralResource{
    
    public function produto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            //CUIDADO
            require_once "model/produto.php";
            require_once "model/produtoDAO.php";
            $produto = new Produto(0,$array["nome"],$array["valor"]);
            $pd = new ProdutoDAO();
            $prod = $pd->insert($produto);
            echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor()));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }

}

class GeneralResourceDELETE extends GeneralResource{
    
    public function deletarProduto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            //$json = file_get_contents('php://input');
            //$array = json_decode($json,true);
            //CUIDADO
            require_once "model/produtoDAO.php";
            $pd = new ProdutoDAO();
            $prod = $pd->deletar($_GET['arg1']);
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }

}

class GeneralResourcePUT extends GeneralResource{
    
    public function alterarProduto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            //CUIDADO
            require_once "model/produto.php";
            require_once "model/produtoDAO.php";
            $produto = new Produto($_GET['arg1'],$array["nome"],$array["valor"]);
            $pd = new ProdutoDAO();
            $prod = $pd->alter($produto);
            echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor()));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
}
?>