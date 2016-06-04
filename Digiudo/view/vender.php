<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Digiúdo - Vender</title>
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
		<?php include "css/vender.css"; ?>
    </style>
	<script>
        <?php include "js/jquery.js"; ?>
    </script>
	<script>
        <?php include "js/bibliotecaJQuery/jquery-2.2.0.js"; ?>
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
	<input type="search" name="pesq" id="pesq" placeholder="Pesquisar">
	</label>
	</div>
	<span class="cabeca">
	</span>
</header>

<div id="breadcrumbs">
	<ul>
		<li><a href="index.html">home</a></li> 
		<li>login e cadastro</li>
	</ul>
</div>


<aside>
<h1>Acessar a Minha Conta</h1>
<form name="form1" onsubmit="return validar()">	
<p>
<label class="sen">E-mail: 
	<input type="email" name="login" placeholder="Login" tabindex="1" autofocus>
</label>
</p>
<p>
<label class="sen">Senha:
	<input type="password" name="senha" placeholder="Senha" tabindex="2">
</label>
	<a href="#" class="block">Não sei a minha senha</a>
</p>
<p>
	<label>
		<input type="checkbox" name="lembre-me" value="true" id="html5">Lembrar-me
	</label>
</p>
<p>
	<input type="submit"  value="Entrar" class="boton" tabindex="3">
</p>
</form>	
</aside>

<nav class="saiba">
<h2> Comece agora Mesmo</h2>
<p class="text-coment">* Dados obrigatórios</p>
	
<p class="asf">
	<label class="mr1">
		Nome:* <input name="nome" type="text" size="25" maxlength="20" class="inpcadastrar" tabindex="4">
	</label>
</p>
	
<p class="asf">
	<label class="mr2">
		Sobrenome:* <input name="sobrenome" type="text" size="25" maxlength="20" class="inpcadastrar" tabindex="5">
	</label>
</p>

<p class="asf">
	<label class="mr3">
		E-mail:* <input type="email" name="cadastra-e-mail"  class="inpcadastrar" tabindex="6">
	</label>
</p>

<p class="asf">
	<label class="mr4">
		Repetir e-mail:* <input type="email" name="cadastra-e-mail-conf"  class="inpcadastrar" tabindex="7">
	</label>
</p>

<p class="asf">
	<label class="mr5">Telefone:*
	<input type="tel" name="fone" id="fone" class="inpcadastrar" placeholder="(xx)xxxxx-xxxx" tabindex="8">
	</label>
	
</p>

<p class="asf">
	<label class="mr6">Criar Senha:* 
	<input type="password" name="criarsenha" class="inpcadastrar" placeholder="Use entre 6 e 20 caracteres." tabindex="9">
	</label>
</p>
<p class="asf">
<label class="mr7">Repetir Senha:* 
	<input type="password" name="criarsenha-conf" class="inpcadastrar" tabindex="10">
	</label>
</p>
<p class="text-coment top">Ver o <a href="#" class="text-coment">Sumário do contrato</a> do Digiúdo</p>

<p>
	<input type="submit" value="Cadastrar-me" class="boton" onclick="novo()" tabindex="11">
</p>
	
	<p class="text-coment top">
	Ao cadastrar-me, declaro que sou maior de idade e aceito a<br> <a href="#" class="text-coment">Política de privacidade</a> e os 
	<a href="#" class="text-coment">Termos e condições do Digiúdo</a> e do <a href="#" class="text-coment">MercadoPago</a>.
	</p>

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
<script type="text/javascript" src="js/cadastro.js"></script>
</body>
</html>
