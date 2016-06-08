<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Digiúdo - Saiba mais</title>
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
		<?php include "css/saibamais.css"; ?>
    </style>
	<script>
        <?php include "js/bibliotecaJQuery/jquery-2.2.0.js"; ?>
    </script>
	<script>
        <?php include "js/principal.js"; ?>
    </script>
</head>
<body>
<header>
	<a href="index" ><h1>Digiúdo</h1></a>
	
	<ul>
		<li class="lis"><a href="compra">comprar</a></li>
		<li class="lis"><a href="<?php if(!$_SESSION["_ID"]){ echo "vender";}else{echo "cadastroProduto";}?>">vender</a></li>
		<li class="lis"><a href="saibamais">saiba mais</a></li>
		<li class="lis"><a href="cadastroUsuario">cadastrar</a></li>
		<li class="lis"><a href="<?php if(!$_SESSION["_ID"]){ echo "vender";}else{echo "painel";}?>"><?php if(!$_SESSION["_ID"]){ echo "login";}else{echo "painel";}?></a></li>
		<li class="lis"><a href="#">carrinho</a></li>	
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
		<li>saiba mais</li>
	</ul>
</div>
<nav class="saiba">
	<h1 class="compra">Como <span>comprar?</span></h1>
	
	<p class="compra"> 
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua.
	</p>
	
	<a href="#.html" class="boton">Dúvidas frequentes</a>
</nav>
<aside class="acc">
	<video src="#" controls poster="view/imagens/outras/postercomprar.jpg" title="videocomprar" class="topvideo">
	</video>
</aside>

<aside class="top degrade acc2">
	<video src="#" controls title="videovender" poster="view/imagens/outras/postervender.jpg" class="topvideo">
	</video>
</aside>
<nav class="saiba top degrade position-mobile">
	<h1 class="vende">Como <span>vender?</span></h1>
	
	<p class="vende"> 
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua.
	</p>
	
	<a href="#.html" class="boton botfrvender">Dúvidas frequentes</a>
</nav>

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
</body>
</html>