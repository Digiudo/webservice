$(document).ready(function(){ //altera formulario entre fisico e juridico
	$("#usuario").change(function(){
		if($(this).val() == "F"){
		$("#juridico").hide();
		$("#fisico").show();
	}else if($(this).val() == "J"){
		$("#fisico").hide();
		$("#juridico").show();
	}
	});
});

function erroEmail(){//onblur no input email
	var email = $('input[name="email"]').val();
	if(!isEmail(email)){
		$('p.emailJaExiste').addClass("err");
		$('p.emailJaExiste').html("Digite um email válido.");
		$('input[name="email"]').css("background-color","#FFC0CB");
	}else{
		$('p.emailJaExiste').removeClass("err");
		$('p.emailJaExiste').html("");
		$('input[name="email"]').css("background-color","#FFF");
	}
}

function isEmail(email){
	if(email.indexOf('@')==-1 || email.indexOf('.')==-1 ){
		return false;
	}else{
		return true;
	}
}
function verificaEmail(){
	var email = $('#email').val();
	var usuario = $('#usuario').val();
	var aux;
	if(usuario == 'F'){
		aux = 0;
	}else if(usuario == 'J'){
		aux = 1;
	}
	$.ajax({
    	type: 'GET',
    	dataType: "json",
    	cache: false,
    	contentType:"application/json",    
    	url: 'https://webservice-digiudo.c9users.io/listarUsuarios/'+aux,
    	success: function (e) {
    		var ver = false;
    		if(e != null){
    			for(var i = 0; i<e.length; i++){
    			if(e[i].ds_Email == email){
    				$('p#erroSenha').removeClass("err");
					$('p#erroSenha').html("");
					$('#senha, #senha2').css("background-color","#FFF");
    				$('p.emailJaExiste').html("Esse E-Mail já possui cadastro.");
    				$('p.emailJaExiste').removeClass("success");
    				$('p.emailJaExiste').addClass("err");
    				$('#email').css("background-color","#FFC0CB");
					$('#email').focus();
					ver = true;
    			}
    		}	
    		}
    		cadastro(ver,email); //chama funcao e variavel boo se existe email + email
    	}
    });
}
function cadastro(vmail,email){
	var novoCadastro=false;
	if(vmail == false){
		var senha = $('#senha').val();
		var senha2 = $('#senha2').val();
		if(senha == senha2){
			var usuario = $('#usuario').val();
			var tel = $('#tel').val();
			var cep = $('#cep').val();
			var logradouro = $('#logradouro').val();
			var numero = $('#numero').val();
			var cidade = $('#cidade').val();
			var estado = $('#estado').val();
			if(usuario == "F"){
				var nome = $('#nome').val();
				var rg = $('#rg').val();
				var cpf = $('#cpf').val();
				var sexo = $('#sexo').val();
				var model = {'nm_Usuario':nome,
								'ds_Email':email,
								'ds_Senha':senha,
								'ds_Logradouro':logradouro,
								'ds_Numero':numero,
								'ds_Cidade':cidade,
								'sg_Estado':estado,
								'cd_Cep':cep,
								'cd_Telefone':tel,
								'fl_Usuario':usuario,
								'cd_Rg':rg,
								'cd_Cpf':cpf,
								'sg_Sexo':sexo};
    				$.ajax({
    					type: 'POST',
    					dataType: "json",
    					cache: false,
    					contentType:"application/json",    
    					url: 'https://webservice-digiudo.c9users.io/usuario',
    					data: JSON.stringify(model),
    				}).done(function(){
    					$('p.emailJaExiste').html("E-mail de confirmação enviado, verifique seu Email.");
    					$('p.emailJaExiste').addClass("success");
    					$('input.inpcadastrar').css("background-color","#FFF");
    					$('input.inpcadastrar').val("");
    				});
			}else if(usuario == "J"){
				var nomeArtistico = $('#nomeArtistico').val();
				var razaoSocial = $('#razaoSocial').val();
				var cnpj = $('#cnpj').val();
				var model = {'nm_Usuario':nomeArtistico,
								'ds_Email':email,
								'ds_Senha':senha,
								'ds_Logradouro':logradouro,
								'ds_Numero':numero,
								'ds_Cidade':cidade,
								'sg_Estado':estado,
								'cd_Cep':cep,
								'cd_Telefone':tel,
								'fl_Usuario':usuario,
								'cd_Cnpj':cnpj,
								'nm_RazaoSocial':razaoSocial};
    				$.ajax({
    					type: 'POST',
    					dataType: "json",
    					cache: false,
    					contentType:"application/json",    
    					url: 'https://webservice-digiudo.c9users.io/usuario',
    					data: JSON.stringify(model),
    				}).done(function(){
    					$('p.emailJaExiste').html("E-mail de confirmação enviado, verifique seu Email.");
    					$('p.emailJaExiste').addClass("success");
    					$('input.inpcadastrar').css("background-color","#FFF");
    					$('input.inpcadastrar').val("");
    				});
			}
		}else{
			$('p#erroSenha').addClass("err");
			$('p#erroSenha').html("Digite senhas iguais!");
			$('#senha, #senha2').css("background-color","#FFC0CB");
			$('#senha').focus();
		}
	}
	return novoCadastro;
}
/*
function verificaEmail(){
	var novoCadastro=false;
	var usuario = $('#usuario').val();
	
	var email = $('#email').val();
	if(nome != "" && email != ""){
		if(!isEmail(email)){
			$('p.emailJaExiste').addClass("err");
			$('p.emailJaExiste').html("Digite um email válido.");
		}else{
			$.ajax({
    			type: 'GET',
        		dataType: "json",
        		cache: false,
        		contentType:"application/json",    
        		url: 'https://webservice-digiudo.c9users.io/listarUsuarios',
    		}).done(function(e){
    			novoCadastro =true;
    			for(var i = 0; i<e.length; i++){
    				if(e[i].ds_Email == email){
    					$('p.emailJaExiste').html("Esse E-Mail já possui cadastro.");
    					$('p.emailJaExiste').removeClass("success");
    					$('p.emailJaExiste').addClass("err");
    					$('input[name="email"]').css("background-color","#FFC0CB");
    					novoCadastro = false;
    				}
    			}
    			if(novoCadastro == true){
					var model = {"nm_Usuario" : nome,"ds_Email" : email};
    				$.ajax({
    					type: 'POST',
    					dataType: "json",
    					cache: false,
    					contentType:"application/json",    
    					url: 'https://webservice-digiudo.c9users.io/usuario',
    					data: JSON.stringify(model),
    				}).done(function(){
    					$('p.emailJaExiste').html("E-mail de confirmação enviado, verifique seu Email.");
    					$('p.emailJaExiste').addClass("success");
    					$('input.inpcadastrar').css("background-color","#FFF");
    					$('input.inpcadastrar').val("");
    				});
				}
    		});
		}
	}else{
		$('p.emailJaExiste').html("Por favor preencher os dois campos.");
    	$('p.emailJaExiste').addClass("err");
		$('input.inpcadastrar').css("background-color","#FFC0CB");
	}
	return novoCadastro;
}
*/