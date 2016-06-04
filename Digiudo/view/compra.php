<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Digiúdo - Comprar</title>
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
	<script>
        <?php include "js/bibliotecaJQuery/jquery-2.2.0.js"; ?>
    </script>
	<script>
        <?php include "js/anuncio.js"; ?>
    </script>
	<script>
        <?php include "js/principal.js"; ?>
    </script>
</head>
<body>
<header>
	<a href="index.html" ><h1>Digiúdo</h1></a>
	
	<ul>
		<li class="lis"><a href="compra.html">comprar</a></li>
		<li class="lis"><a href="vender.html">vender</a></li>
		<li class="lis"><a href="saibamais.html">saiba mais</a></li>
		<li class="lis"><a href="cadastroInicial.html">cadastrar</a></li>
		<li class="lis"><a href="vender.html">login</a></li>
		<li class="lis"><a href="#">carrinho</a></li>	
	</ul>
	
	<div id="area-busca">
	<label><span>Pesquisar</span>
	<input type="search" name="pesq" id="pesq" placeholder="Pesquisar" onchange="buscaHead()">
	</label>
	</div>
	<span class="cabeca">
	</span>
</header>

<div id="breadcrumbs">
	<ul>
		<li><a href="index.html">home</a></li> 
		<li>comprar</li>
	</ul>
	
</div>
		

<nav id="menu-lateral">	
	<ul>
		<li id="menu-lateral-cat" class="cabeca2">categorias</li>
		<li class="lis2"><a href="#">artes</a></li>
		<li class="lis2"><a href="#">audio</a></li>
		<li class="lis2"><a href="#">design</a></li>
		<li class="lis2"><a href="#">e-book</a></li>
		<li class="lis2"><a href="#">educacional</a></li>
		<li class="lis2"><a href="#">idiomas</a></li>
		<li class="lis2"><a href="#">programação</a></li>
		<li class="lis2"><a href="#">gastronomia</a></li>
		<li class="lis2"><a href="#">vídeo</a></li>
	</ul>
</nav>
<main id="principal">
	
	<img src="imagens/banner/banner.png" alt="banner de cima" id="banner-cima">
	
	<h2 id="texto-busca">O que você procura?</h2>
	<label>
	<input type="search" id="busc" name="buscaprincipal" onchange="buscaPrinc()"><a href="#">
	<img src="imagens/icones/busq.png" alt="iconebuscaPagina" onclick="buscaPrinc()"></a>
	</label>
	
<!-- Anuncios-->
	<div id="dinamico">
	</div>


	<div id="bloco-proximo">
		<a href="#"><div class="proximo">1</div></a>
		<a href="#"><div class="proximo">2</div></a>
		<a href="#"><div class="proximo">3</div></a>
		<a href="#"><div class="proximo">></div></a>
	</div>
<!-- Anuncios até aqui-->

<img src="imagens/banner/netshoes.png" alt="banner de baixo" id="banner-baixo">

</main>

<aside>
<img src="imagens/banner/banner_lateral.jpg" alt="banner Lateral" id="banner-lateral">
</aside>

<footer class="vcard"> <!-- hcard-->
<div class="blocos-footer">
	<p>Redes Sociais</p>
	<a href="#" class="url"><img src="imagens/icones/face.png" alt="icone Facebook" class="photo"></a> <!-- hcard-->
	<a href="#" class="url"><img src="imagens/icones/g+.png" alt="icone Google mais" class="photo"></a> <!-- hcard-->
	<a href="#" class="url"><img src="imagens/icones/youtube.png" alt="icone youtube" class="photo"></a> <!-- hcard-->
	<a href="#" class="url"><img src="imagens/icones/twitter.png" alt="icone twitter" class="photo"></a> <!-- hcard-->
</div>
<div class="blocos-footer">
	<div class="blocos-footer-centro">
		<p>Ligue grátis:</p>
		<img src="imagens/icones/telefone.png" alt="icone telefone" class="photo"> <!-- hcard-->
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