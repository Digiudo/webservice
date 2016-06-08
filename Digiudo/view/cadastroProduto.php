<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Digiúdo - Cadastro Produto</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		<?php include 'http://fonts.googleapis.com/css?family=Roboto'; ?>
    </style>
	<style>
		<?php include "css/principal.css"; ?>
    </style>
	<style>
		<?php include "css/breadcrumbs.css"; ?>
    </style>
	<style>
		<?php include "css/footer.css"; ?>
    </style>
	<style>
		<?php include "css/compra.css"; ?>
    </style>
	<style>
		<?php include "css/cadastroproduto.css"; ?>
    </style>
	<script>
        <?php include "js/bibliotecaJQuery/jquery-2.2.0.js"; ?>
    </script>
	<script>
        <?php include "js/principal.js"; ?>
    </script>
    <script>
		window.sessionStorage.setItem("id", <?= $_SESSION["_ID"]['id']?>);
    </script>
</head>
<body onload="listar()">


<header>
	<a href="index" ><h1>Digiúdo</h1></a>
	
	<ul>
		<li class="lis"><a href="compra">comprar</a></li>
		<li class="lis"><a href="vender">vender</a></li>
		<li class="lis"><a href="saibamais">saiba mais</a></li>
		<li class="lis"><a href="cadastroUsuario">cadastrar</a></li>
		<li class="lis"><a href="#">carrinho</a></li>	
		<li class="lis"><a href="painel">Olá <?= $_SESSION["_ID"]['nome']?></a></li>
	</ul>
	
	<div id="area-busca">
	<label><span>Pesquisar</span>
	<input type="search" name="pesq" id="pesq" placeholder="Pesquisar">
	</label>
	</div>
	<span class="cabeca">
	</span>
</header>

<div id="breadcrumbs">
	<ul>
		<li><a href="index">home</a></li> 
		<li>login e cadastro</li>
	</ul>
</div>
<div id="dinamico">
	
<main>
	<div class="anuncio">
		<img src="view/imagens/outras/semimagem.jpg" class="anuncio1">
		<h2 class="dest">NOME DO PRODUTO</h2>
		<p class="tvideo">Tipo</p>
		<p>Por apenas:<br><span>00,00</span></p>
		<input type="submit" value="Adicionar ao Carrinho" class="boton">
		<a href="#" class="link">Ver mais detalhes</a>
	</div>
	<div class="form">
	<div class="head">
		<h1>Cadastro de Produtos</h1>
        <button id="btn-nv" class="boton1">Novo</button>
        <button id="btn-alt" class="boton1">Alterar</button>
     </div>
        
        <fieldset>
            	<div class="inputform">
                <label>nome
                <input type="text" name="nome" />
                </label>
                </div>
                <div class="inputform">
                <label>Valor
                <input type="text" name="valor" maxlength="10" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)">
                </label>
                </div>
                <div class="inputform">
                <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <label>Capa
                    <form id="formId" enctype="multipart/form-data">
                        <input type="file" name="arquivo" id="fileupload">
                    </form>
                </label>
                </span>
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>
                <div id="files" class="files"></div>
                </div>
                <div class="inputform">
                </label>
                <label>Tipo Arquivo
                <select id="tipo" name="tipo">
  					<option value="0"></option>
  					<option value="1" title="Video">Video</option>
  					<option value="2" title="Áudio">Áudio</option>
  					<option value="3" title="eBook">eBook</option>
				</select>
                </label>
                </div>
                <div class="inputform">
                	<label>Descrição
                		<textarea name="descricao">
                		</textarea>
                	</label>
                </div>
                <button id="btn-conc" class="boton1">confirmar</button>
        		<button id="btn-canc" class="boton1">cancelar</button>  
            </fieldset>
        <div class="coment">
            <table id="t1">
                <thead>
                    <tr>
                    <th id="codigo">ID</th>
                    <th id="nome">Nome</th>
                    <th id="valor">Valor</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
      </div>
</main>
<footer class="vcard"> <!-- hcard-->
<div class="blocos-footer">
	<p>Redes Sociais</p>
	<a href="#" class="url"><img src="view/imagens/icones/face.png" alt="icone Facebook" class="photo"></a> <!-- hcard-->
	<a href="#" class="url"><img src="view/imagens/icones/g+.png" alt="icone Google mais" class="photo"></a> <!-- hcard-->
	<a href="#" class="url"><img src="view/imagens/icones/youtube.png" alt="icone youtube" class="photo"></a> <!-- hcard-->
	<a href="#" class="url"><img src="view/imagens/icones/twitter.png" alt="icone twitter" class="photo"></a> <!-- hcard-->
</div>
<div class="blocos-footer">
	<div class="blocos-footer-centro">
		<p>Ligue grátis:</p>
		<img src="view/imagens/icones/telefone.png" alt="icone telefone" class="photo"> <!-- hcard-->
		<div id="ligue-gratis" class="tel">0800 726 2020</div> <!-- hcard-->
	</div>
</div>
<div class="blocos-footer">
	<div class="blocos-footer-centro">
		<div class="correio"><a href="mailto:digiudo@digiudo.com" class="email">E-mail</a></div> <!-- hcard-->
		<div class="correio"><a href="#">Chat</a></div>
	</div>
</div>
<div id="identidade">
<h3 class="h3-footer">© 2015 - Todos os direitos reservados - <span class="fn">Digiúdo® Tecnologia</span></h3> <!-- hcard-->
<p>CNPJ: 08.077.938/0001-11</p>
	<div class="adr"> <!-- hcard-->
		<span class="street-address">Av. Paulista, 1785, Conj 77 e 78</span><br>
		<span class="locality">Bela Vista</span> - <span class="region">SP</span> - <span class="postal-code">01311-200</span>
	</div>
</div>
</footer>
<script>
    <?php include "js/CadastroProduto.js"; ?>
</script>

</body>
</html>
