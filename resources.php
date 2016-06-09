<?php

abstract class GeneralResource{
    
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"Recurso inexistente $m"));
        http_response_code(404);   
    }
    
}

class GeneralResourceGET extends GeneralResource{
    
    public function listaTodosProduto(){
        header('content-type: application/json');
        require_once "model/produto.php";
        require_once "model/produtoDAO.php";
        $pd = new ProdutoDAO();
        $prod = $pd->getAllProduct();
        foreach($prod as $x){
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome(), "valor"=>$x->getValor(), "capa"=>$x->getCapa(), "tipo"=>$x->getTipo(), "descricao"=>$x->getDescricao());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }
    
    public function listaProduto(){
        header('content-type: application/json');
        require_once "model/produto.php";
        require_once "model/produtoDAO.php";
        $pd = new ProdutoDAO();
        $prod = $pd->getProduct($_GET["arg1"]);
        foreach($prod as $x){
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome(), "valor"=>$x->getValor(), "capa"=>$x->getCapa(), "tipo"=>$x->getTipo(), "descricao"=>$x->getDescricao());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }
    
    public function buscaProduto(){
        $bprod = $_GET["arg1"];
        header('content-type: application/json');
        require_once "model/produto.php";
        require_once "model/produtoDAO.php";
        $pd = new ProdutoDAO();
        $prod = $pd->getBuscaProduto($bprod);
        foreach($prod as $x){
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome(), "valor"=>$x->getValor(), "capa"=>$x->getCapa(), "tipo"=>$x->getTipo(), "descricao"=>$x->getDescricao());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }
    
    public function listarUsuarios(){
        header('content-type: application/json');
        if($_GET["arg1"] == 0){
		    $aux = "F";
	    }else if($_GET["arg1"] == 1){
		    $aux = "J";
	    }
        $class = "Usuario".$aux;// espera arg F ou J
        require_once "model/".$class.".php";
        require_once "model/UsuarioDAO.php";
        $ct = new UsuarioDAO();
        $metodo = "list".$class;
        $cli = $ct->$metodo();
        switch ($class){
            case 'UsuarioF':
                foreach($cli as $aux){
                    $array[] = array("cd_Usuario"=>$aux->getId(), "nm_Usuario"=>$aux->getNome(),"ds_Email"=>$aux->getEmail(),"ds_Senha"=>$aux->getSenha(),"ds_Logradouro"=>$aux->getLogradouro(),"ds_Numero"=>$aux->getNum(),"ds_Cidade"=>$aux->getCidade(),"sg_Estado"=>$aux->getEstado(),"cd_Cep"=>$aux->getCep(),"cd_Telefone"=>$aux->getTel(),"fl_Usuario"=>$aux->getUsuario(),"cd_Rg"=>$aux->getRg(),"cd_Cpf"=>$aux->getCpf(),"ds_Sexo"=>$aux->getSexo());
                }
                break;
            case 'UsuarioJ':
                foreach($cli as $aux){
                    $array[] = array("cd_Usuario"=>$aux->getId(), "nm_Usuario"=>$aux->getNome(),"ds_Email"=>$aux->getEmail(),"ds_Senha"=>$aux->getSenha(),"ds_Logradouro"=>$aux->getLogradouro(),"ds_Numero"=>$aux->getNum(),"ds_Cidade"=>$aux->getCidade(),"sg_Estado"=>$aux->getEstado(),"cd_Cep"=>$aux->getCep(),"cd_Telefone"=>$aux->getTel(),"fl_Usuario"=>$aux->getUsuario(),"cd_Cnpj"=>$aux->getCnpj(),"nm_RazaoSocial"=>$aux->getRazaoSocial());
                }
                break;
        }
        echo json_encode($array);
        http_response_code(200);
    }
    
    public function buscarUsuario(){
        $id = $_GET["arg1"];
        header('content-type: application/json');
        require_once "model/Usuario.php";
        require_once "model/UsuarioDAO.php";
        $ct = new UsuarioDAO();
        $aux = $ct->getUsuario($id);
        switch ($aux->getUsuario()){
            case 'F':
                $usuario = array("cd_Usuario"=>$aux->getId(), "nm_Usuario"=>$aux->getNome(),"ds_Email"=>$aux->getEmail(),"ds_Senha"=>$aux->getSenha(),"ds_Logradouro"=>$aux->getLogradouro(),"ds_Numero"=>$aux->getNum(),"ds_Cidade"=>$aux->getCidade(),"sg_Estado"=>$aux->getEstado(),"cd_Cep"=>$aux->getCep(),"cd_Telefone"=>$aux->getTel(),"fl_Usuario"=>$aux->getUsuario(),"cd_Rg"=>$aux->getRg(),"cd_Cpf"=>$aux->getCpf(),"ds_Sexo"=>$aux->getSexo());
                break;
            case 'J':
                $usuario = array("cd_Usuario"=>$aux->getId(), "nm_Usuario"=>$aux->getNome(),"ds_Email"=>$aux->getEmail(),"ds_Senha"=>$aux->getSenha(),"ds_Logradouro"=>$aux->getLogradouro(),"ds_Numero"=>$aux->getNum(),"ds_Cidade"=>$aux->getCidade(),"sg_Estado"=>$aux->getEstado(),"cd_Cep"=>$aux->getCep(),"cd_Telefone"=>$aux->getTel(),"fl_Usuario"=>$aux->getUsuario(),"cd_Cnpj"=>$aux->getCnpj(),"nm_RazaoSocial"=>$aux->getRazaoSocial());
                break;
        }
        echo json_encode($usuario);
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
    
    public function usuario(){
        header('allow: POST, OPTIONS');
        http_response_code(200); 
    }
    
    public function listarUsuarios(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function buscarUsuario(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function deletarUsuario(){
        header('allow: DELETE, OPTIONS');
        http_response_code(200); 
    }
    
    public function alterarUsuario(){
        header('allow: PUT, OPTIONS');
        http_response_code(200);
    }
    
}



class GeneralResourcePOST extends GeneralResource{

    
    public function up(){
        $dir = '/home/ubuntu/workspace/digiudo/view/imagens/uploads/';
       
        $uploadfile = $dir . basename($_FILES['arquivo']['name']);
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile);
        
    }
    
    public function produto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/produto.php";
            require_once "model/produtoDAO.php";
            //var_dump($array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["descricao"]);
            $produto = new Produto($array["user"],0,$array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["descricao"]);
            $pd = new ProdutoDAO();
            $prod = $pd->insert($produto);
            echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor(), "capa"=>$prod->getCapa(), "tipo"=>$prod->getTipo(), "descricao"=>$prod->getDescricao()));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function usuario(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            $class = "Usuario".$array["fl_Usuario"];
            require_once "model/".$class.".php";
            require_once "model/UsuarioDAO.php";
            switch ($array["fl_Usuario"]){
                case 'F':
                    $usuario = new $class(0,$array["nm_Usuario"],$array["ds_Email"],$array["ds_Senha"],$array["ds_Logradouro"],$array["ds_Numero"],$array["ds_Cidade"],$array["sg_Estado"],$array["cd_Cep"],$array["cd_Telefone"],$array["fl_Usuario"],$array["cd_Rg"],$array["cd_Cpf"],$array["sg_Sexo"]);
                    break;
                case 'J':
                    $usuario = new $class(0,$array["nm_Usuario"],$array["ds_Email"],$array["ds_Senha"],$array["ds_Logradouro"],$array["ds_Numero"],$array["ds_Cidade"],$array["sg_Estado"],$array["cd_Cep"],$array["cd_Telefone"],$array["fl_Usuario"],$array["cd_Cnpj"],$array["nm_RazaoSocial"]);
                    break;
            }
            $ct = new UsuarioDAO();
            $metodo = "insert".$class;
            $ct->$metodo($usuario);
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
            
            require_once "model/produtoDAO.php";
            $pd = new ProdutoDAO();
            $pd->deletar($_GET['arg1']);
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function deletarUsuario(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $usuario = "deletarUsuario" . $_GET['arg1'];
            //$json = file_get_contents('php://input');
            //$array = json_decode($json,true);
            //require_once "model/Cliente.php";
            require_once "model/UsuarioDAO.php";
            $cd = new UsuarioDAO();
            switch ($usuario){
                case 'deletarUsuarioF':
                    $cd->$usuario($_GET['arg2']);
                    break;
                case 'deletarUsuarioJ':
                    $cd->$usuario($_GET['arg2']);
                    break;
            }
            echo json_encode(array("response"=>"Usuario deletado"));
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
            $produto = new Produto(0,$array['id'],$array["nome"],$array["valor"],$array["capa"],$array["tipo"],$array["descricao"]);
            $pd = new ProdutoDAO();
            $prod = $pd->alter($produto);
            echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor(), "capa"=>$prod->getCapa(), "tipo"=>$prod->getTipo(), "descricao"=>$prod->getDescricao()));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function alterarUsuario(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            $class = "Usuario".$array["fl_Usuario"];
            require_once "model/".$class.".php";
            require_once "model/UsuarioDAO.php";
            switch ($array["fl_Usuario"]){
                case 'F':
                    $usuario = new $class($_GET["arg1"],$array["nm_Usuario"],$array["ds_Email"],$array["ds_Senha"],$array["ds_Logradouro"],$array["ds_Numero"],$array["ds_Cidade"],$array["sg_Estado"],$array["cd_Cep"],$array["cd_Telefone"],$array["fl_Usuario"],$array["cd_Rg"],$array["cd_Cpf"],$array["sg_Sexo"]);
                    break;
                case 'J':
                    $usuario = new $class($_GET["arg1"],$array["nm_Usuario"],$array["ds_Email"],$array["ds_Senha"],$array["ds_Logradouro"],$array["ds_Numero"],$array["ds_Cidade"],$array["sg_Estado"],$array["cd_Cep"],$array["cd_Telefone"],$array["fl_Usuario"],$array["cd_Cnpj"],$array["nm_RazaoSocial"]);
                    break;
            }
            $ct = new UsuarioDAO();
            $metodo = "alterar".$class;
            $ct->$metodo($usuario);
            echo json_encode(array("response"=>"Usuario alterado"));
            http_response_code(200);   
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
}
?>