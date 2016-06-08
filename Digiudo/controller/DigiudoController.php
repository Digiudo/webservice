<?php

class DigiudoController extends Controller{
    
    
    public function home(){
        $this->view->renderizar("index");
    }
    
    public function cadastroProduto(){
        //var_dump($_SESSION["_ID"]);
        $this->estaAuth();
        $this->view->renderizar("cadastroProduto");
    }
    
    public function cadastroInicial(){
        $this->view->renderizar("cadastroInicial");
    }
    
    public function compra(){
        $this->view->renderizar("compra");
    }

    public function saibamais(){
        $this->view->renderizar("saibamais");
    }
    
    public function vender(){
        if(!isset($_SESSION["_ID"])){
            $this->view->renderizar("vender");
        }else{
            $this->view->renderizar("painel");
        }
    }
    
    public function cadastroUsuario(){
        if(!isset($_SESSION["_ID"])){
            $this->view->renderizar("cadastroUsuario");
        }else{
            $this->view->renderizar("painel");
        }
        
    }
    
    public function painel(){
        //var_dump($_SESSION["_ID"]);
        $this->estaAuth();
        $this->view->renderizar("painel");
    }

    public function __call($m,$a){
        $this->view->renderizar("erroNotFound");
    }
    
    public function estaAuth(){
        if(!isset($_SESSION["_ID"])){
            $this->vender();       
        }
    }
    
    public function logout(){
        $this->estaAuth();
        unset($_SESSION["_ID"]);
        $this->vender(); 
    }
    
     public function auth(){
        unset($_SESSION["_ID"]);
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/LoginDAO.php";
            $uDAO = new LoginDAO();
            $ehLoginCorreto = $uDAO->authUser($array["login"],$array["senha"]);
            if($ehLoginCorreto === false){
                echo json_encode($ehLoginCorreto);
            }else{
                $_SESSION["_ID"] = $ehLoginCorreto;
                echo json_encode($ehLoginCorreto);
            }
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
}

?>