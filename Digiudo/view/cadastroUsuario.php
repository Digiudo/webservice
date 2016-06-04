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
		<?php include "css/cadastroUsuario.css"; ?>
    </style>
	<script>
        <?php include "js/bibliotecaJQuery/jquery-2.2.0.js"; ?>
    </script>
	<script>
        <?php include "js/principal.js"; ?>
    </script>
	<script>
        <?php include "js/cadastroUsuario.js"; ?>
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
		<li>cadastro usuário</li>
	</ul>
</div>

<nav class="cadastroUsuario">
	<div class="formcadastroUsuario">
	    <h2>Preencha os campos</h2>
	    <p class="emailJaExiste"></p>
	    <form onsubmit="return (cadastro())">
	    	<p class="pcadastroUsuario">
	            <label>
		            E-mail:<br><input type="email" name="email" id="email" placeholder="digiudo@digiudo.com.br" size="25" maxlength="50" class="inpcadastrar" tabindex="1" autofocus onblur="erroEmail()">
    	        </label>
            </p>
	    	<p class="pcadastroUsuario">
	    		<label>
				Usuário:<br>
					<select id="usuario" name="usuario" size="1" class="inpcadastrar" tabindex="2">
						<option value="F" selected>Fisico</option>
						<option value="J">Jurídico</option>
					</select>
				</label>
            </p>
            <div id="fisico">
            	<p class="pcadastroUsuario">
	            	<label>
		            	Nome:<br><input type="text" name="nome" id="nome" size="25" maxlength="50" placeholder="digite seu nome" class="inpcadastrar" tabindex="3">
	            	</label>
            	</p>
            	<p class="pcadastroUsuario">
	            	<label>
		            	Rg:<br><input type="text" name="rg" id="rg" size="25" maxlength="9" placeholder="408840547" class="inpcadastrar" tabindex="4">
	            	</label>
            	</p>
            	<p class="pcadastroUsuario">
	            	<label>
		            	Cpf:<br><input type="text" name="cpf" id="cpf" size="25" maxlength="11" placeholder="23790889968" class="inpcadastrar" tabindex="5">
	            	</label>
            	</p>
            	<p class="pcadastroUsuario" class="inpcadastrar" size="25">
            		<label>
						Sexo:<br>
						<select id="sexo" name="sexo" size="1" class="inpcadastrar" tabindex="6">
							<option value="F" selected>Feminino</option>
							<option value="M">Masculino</option>
						</select>
					</label>
            	</p>
            </div>
            <div id="juridico">
            	<p class="pcadastroUsuario">
	            	<label>
		            	Nome artístico:<br><input type="text" name="nomeArtistico" id="nomeArtistico" size="25" maxlength="50" placeholder="Nome artístico" class="inpcadastrar" tabindex="7">
	            	</label>
            	</p>
            	<p class="pcadastroUsuario">
            		<label>
		            	Razão social:<br><input type="text" name="razaoSocial" id="razaoSocial" size="25" maxlength="50" placeholder="Razão social" class="inpcadastrar" tabindex="8">
	            	</label>
            	</p>
            	<p class="pcadastroUsuario">
            		<label>
		            	Cnpj:<br><input type="text" name="cnpj" id="cnpj" size="25" maxlength="14" placeholder="41218613000187" class="inpcadastrar" tabindex="9">
	            	</label>
            	</p>
            </div>
            <p id="erroSenha"></p>
            <p class="pcadastroUsuario">
				<label>
					Senha:<br><input type="password" name="senha" id="senha" size="25" maxlength="50" placeholder="digite uma senha" class="inpcadastrar" tabindex="10" >
				</label>
			</p>
			<p class="pcadastroUsuario">
				<label>
					Repita a senha:<br><input type="password" name="senha2" id="senha2" size="25" maxlength="50" placeholder="repita a senha" class="inpcadastrar" tabindex="11" >
				</label>
			</p>
			<p class="pcadastroUsuario">
				<label>
					Telefone:<br><input type="tel" name="tel" id="tel" size="25" maxlength="50" placeholder="01332325454" class="inpcadastrar" tabindex="12">
				</label>
			</p>
			<p class="pcadastroUsuario">
				<label>
					Cep:<br><input type="cep" name="cep" id="cep" maxlength="9" placeholder="12345-678"  pattern="[0-9]{5}-[0-9]{3}" size="25" maxlength="50" class="inpcadastrar" tabindex="13">
				</label>
			</p>
			<p class="pcadastroUsuario">
	            <label>
		            Logradouro:<br><input type="text" name="logradouro" id="logradouro" size="25" maxlength="50" placeholder="digite seu endereço" class="inpcadastrar" tabindex="14" >
	            </label>
            </p>
            <p class="pcadastroUsuario">
	            <label>
		            Número:<br><input type="text" name="numero" id="numero" size="25" maxlength="6" placeholder="digite o número" class="inpcadastrar" tabindex="15">
	            </label>
            </p>
            <p class="pcadastroUsuario">
	            <label>
		            Cidade:<br><input type="text" name="cidade" id="cidade" size="25" maxlength="50" placeholder="digite a cidade" class="inpcadastrar" tabindex="16" >
	            </label>
            </p>
            <p class="pcadastroUsuario">
	            <label>
		            Estado:<br><input type="text" name="estado" id="estado" size="25" maxlength="2" placeholder="SP" class="inpcadastrar" tabindex="17" >
	            </label>
            </p>
            <p>
	            <input type="submit" value="Criar Conta" tabindex="18" onclick="verificaEmail()">
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
