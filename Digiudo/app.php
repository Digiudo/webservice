<?php

class App{
    private $met, $clazz;
    
    public function __construct($met,$clazz){
        $this->met = $met;
        $this->clazz = $clazz;
    }
    
    public function startApp(){
        $clazzName = ucfirst($this->clazz)."Controller";
        require_once "controller/Controller.php";
        $filename = "controller/".$clazzName.".php";
        if (file_exists($filename)){
            require_once $filename;
            $c = new $clazzName();
            $met= $this->met;
            $c->$met();
        }else{
            require_once "controller/DigiudoController.php";
            $c = new DigiudoController();
            $c->erroNotFound(); 
        }
    }
}

session_start();
require_once "view/View.php";

$met = $_GET["metodo"];
$clazz = $_GET["classe"];
$r = new App($met,$clazz);
$r->startApp();

?>

