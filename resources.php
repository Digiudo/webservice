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
    
    public function imagem(){
      // Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/';
 
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
 
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['capa']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['capa']['error']]);
exit; // Para a execução do script
}
 
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['capa']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
}
 
// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['capa']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}
 
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
$nome_final = time().'.jpg';
} else {
// Mantém o nome original do arquivo
$nome_final = $_FILES['capa']['name'];
}
 
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['capa']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "Upload efetuado com sucesso!";
echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}
 
}

    }
    
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