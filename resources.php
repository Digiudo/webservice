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
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome(), "valor"=>$x->getValor(), "capa"=>$x->getCapa(), "tipo"=>$x->getTipo(), "descricao"=>$x->getDescricao());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }
    public function listarClientes(){
        header('content-type: application/json');
        require_once "model/Cliente.php";
        require_once "model/ClienteDAO.php";
        $ct = new ClienteDAO();
        $cli = $ct->listCliente();
        foreach($cli as $aux){
            $array[] = array("cd_Cliente"=>$aux->getId(), "nm_Cliente"=>$aux->getNome(), "cd_Telefone"=>$aux->getTel(),"ds_Email"=>$aux->getEmail(),"ds_Senha"=>$aux->getSenha(),"ds_Endereco"=>$aux->getEndereco(),"ds_Numero"=>$aux->getNum(),"ds_Cidade"=>$aux->getCidade(),"sg_Estado"=>$aux->getEstado(),"cd_Cep"=>$aux->getCep());
        }
        echo json_encode($array);
        http_response_code(200);
    }
    public function buscarCliente(){
        $id = $_GET["arg1"];
        header('content-type: application/json');
        require_once "model/Cliente.php";
        require_once "model/ClienteDAO.php";
        $ct = new ClienteDAO();
        $cli = $ct->getCliente($id);
        echo json_encode(array("cd_Cliente"=>$cli->getId(), "nm_Cliente"=>$cli->getNome(), "cd_Telefone"=>$cli->getTel(),"ds_Email"=>$cli->getEmail(),"ds_Senha"=>$cli->getSenha(),"ds_Endereco"=>$cli->getEndereco(),"ds_Numero"=>$cli->getNum(),"ds_Cidade"=>$cli->getCidade(),"sg_Estado"=>$cli->getEstado(),"cd_Cep"=>$cli->getCep()));
        http_response_code(200);
    }
    
}

class GeneralResourceOPTIONS extends GeneralResource{

    public function produto(){
        header('allow: POST, OPTIONS');
        http_response_code(200); 
    }
    
    public function imagem(){
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
    
    public function cliente(){
        header('allow: POST, OPTIONS');
        http_response_code(200); 
    }
    
    public function clienteLista(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function buscarCliente(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function deletarCliente(){
        header('allow: DELETE, OPTIONS');
        http_response_code(200); 
    }
    
    public function alterarCliente(){
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
            //var_dump($array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["descricao"]);
            $produto = new Produto(0,$array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["descricao"]);
            $pd = new ProdutoDAO();
            $prod = $pd->insert($produto);
            echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor(), "capa"=>$prod->getCapa(), "tipo"=>$prod->getTipo(), "descricao"=>$prod->getDescricao()));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function cliente(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/Cliente.php";
            require_once "model/ClienteDAO.php";
            $cliente = new Cliente(0,$array["nm_Cliente"],$array["cd_Telefone"],$array["ds_Email"],$array["ds_Senha"],$array["ds_Endereco"],$array["ds_Numero"],$array["ds_Cidade"],$array["sg_Estado"],$array["cd_Cep"]);
            $ct = new ClienteDAO();
            $ct->insert($cliente);
            echo json_encode(array("response"=>"Cadastrado"));
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
            $pd->deletar($_GET['arg1']);
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function deletarCliente(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            //$json = file_get_contents('php://input');
            //$array = json_decode($json,true);
            //require_once "model/Cliente.php";
            require_once "model/ClienteDAO.php";
            $cd = new ClienteDAO();
            $cd->deletar($_GET['arg1']);
            echo json_encode(array("response"=>"Cliente deletado"));
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
            $produto = new Produto($_GET['arg1'],$array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["descricao"]);
            $pd = new ProdutoDAO();
            $prod = $pd->alter($produto);
            echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor(), "capa"=>$prod->getCapa(), "tipo"=>$prod->getTipo(), "descricao"=>$prod->getDescricao()));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function alterarCliente(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/Cliente.php";
            require_once "model/ClienteDAO.php";
            $cliente = new Cliente($_GET["arg1"],$array["nm_Cliente"],$array["cd_Telefone"],$array["ds_Email"],$array["ds_Senha"],$array["ds_Endereco"],$array["ds_Numero"],$array["ds_Cidade"],$array["sg_Estado"],$array["cd_Cep"]);
            $ct = new ClienteDAO();
            $ct->alterar($cliente);
            echo json_encode(array("response"=>"Cliente alterado"));
            http_response_code(200);   
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
}
?>