<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Digiúdo - Cadastro Inicial</title>
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
		<?php include "css/cadastroInicial.css"; ?>
    </style>
	<script>
        <?php include "js/bibliotecaJQuery/jquery-2.2.0.js"; ?>
    </script>
	<script>
        <?php include "js/principal.js"; ?>
    </script>
	<script>
        <?php include "js/cadastroInic.js"; ?>
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
	<input type="search" name="pesq" id="pesq" placeholder="Pesquisar">
	</label>
	</div>
	<span class="cabeca">
	</span>
</header>

<div id="breadcrumbs">
	<ul>
		<li><a href="index.html">home</a></li> 
		<li>cadastro inicial</li>
	</ul>
</div>

<nav class="cadastroInic">
	<div class="formCadastroInic">
	    <h2>Crie sua conta grátis</h2>
	    <p class="emailJaExiste"></p>
	    <form onsubmit="return (verificaEmail())">
            <p class="pCadastroInic">
	            <label>
		            Nome:<br> <input name="nome" type="text" size="25" maxlength="50" class="inpcadastrar" tabindex="1" autofocus required>
	            </label>
            </p>
	
            <p class="pCadastroInic">
	            <label>
		            E-mail:<br> <input name="email" type="email" size="25" maxlength="50" class="inpcadastrar" tabindex="2" required>
    	        </label>
            </p>

            <p>
	            <input type="submit" value="Criar Conta" tabindex="3" >
            </p>
	    </form>
    	<p class="text-coment top">
    	    Ao cadastrar-me, declaro que sou maior de idade e aceito a<br> <a href="#" class="text-coment">Política de privacidade</a> , 
    	    <a href="#" class="text-coment">Termos e condições do Digiúdo</a> e do <a href="#" class="text-coment">MercadoPago</a>.
    	</p>
    </div>
</nav>
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
