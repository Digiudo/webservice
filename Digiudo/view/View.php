<?php

class View{
    public function renderizar($pagina){
        require_once $pagina . ".php";
    }
}

?>