<?php

class DigiudoController extends Controller{
    
    
    public function index(){
        $this->view->renderizar("index");
    }
    
    public function cadastroProduto(){
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
        $this->view->renderizar("vender");
    }
    
    public function cadastroUsuario(){
        $this->view->renderizar("cadastroUsuario");
    }
    
    public function painel(){
        $this->view->renderizar("painel");
    }

    public function __call($m,$a){
        $this->view->renderizar("erroNotFound");
    }
}

?>