# webservice
Web Service PHP

Para testes de funcionalidades não implementadas no site:<br>

Deletar Usuario:<br>
FISICO<br>
curl -v -X DELETE https://webservice-digiudo.c9users.io/deletarUsuario/F/19 -H 'Content-Type:application/json'<br>
JURIDICO<br>
curl -v -X DELETE https://webservice-digiudo.c9users.io/deletarUsuario/J/19 -H 'Content-Type:application/json'<br>


Alterar Usuario:<br>
FISICO<br>
curl -v -X PUT https://webservice-digiudo.c9users.io/alterarUsuario/10 -H 'Content-Type:application/json' \
-d '{"nm_Usuario":"AlterFisico","cd_Telefone":"54654","ds_Email":"alterfisico@hotmail.com","ds_Senha":"123","ds_Logradouro":"Rua teste","ds_Numero":"123","ds_Cidade":"Guaruja","sg_Estado":"SP","cd_Cep":"11442205","fl_Usuario":"F","cd_Rg":"505580427","cd_Cpf":"25668585597","sg_Sexo":"M"}'<br>
JURIDICO<br>
curl -v -X PUT https://webservice-digiudo.c9users.io/alterarUsuario/3 -H 'Content-Type:application/json' \
-d '{"nm_Usuario":"Alter","cd_Telefone":"321","ds_Email":"alterJuridico@hotmail.com","ds_Senha":"123","ds_Logradouro":"Rua teste","ds_Numero":"123","ds_Cidade":"Guaruja","sg_Estado":"SP","cd_Cep":"11442205","fl_Usuario":"J","cd_Cnpj":"512515","nm_RazaoSocial":"alterRazao"}'<br>


Listar Usuario:  0 = Fisico / 1 = Juridico<br>
FISICO<br>
curl -v -X GET https://webservice-digiudo.c9users.io/listarUsuarios/0 -H 'Content-Type:application/json'<br>
JURIDICO<br>
curl -v -X GET https://webservice-digiudo.c9users.io/listarUsuarios/1 -H 'Content-Type:application/json'<br>


Consultar Usuario por ID: (fisico ou juridico)<br>
curl -v -X GET https://webservice-digiudo.c9users.io/buscarUsuario/1 -H 'Content-Type:application/json'<br>


Produtos:<br>
Buscar produtos por nome:<br>
curl -v -X GET https://webservice-digiudo.c9users.io/buscaProdutoMenor/40 -H 'Content-Type:application/json'<br>
