var modeledt = {};
function confirmar(){
    if($('input[name="nome"]').val()==""){
        $('input[name="nome"]').css("border-color","#F00");
        $('input[name="nome"]').css("background-color","#FA8072");
    }else{
        var model = {"nome" : $('input[name="nome"]').val(),"valor" : $('input[name="valor"]').val()};
        $.ajax({
            type: 'POST',
            dataType: "json",
            cache: false,
            contentType:"application/json",    
            url: 'https://webservice-digiudo.c9users.io/produto',
            data: JSON.stringify(model),  
        }).done(function(e){
            var itens = "";
            itens+="<tr><td>";
            itens+="<span id='cd'>"
            itens+=e.id;
            itens+="</span>"
            itens+="</td><td>";
            itens+="<span id='nm'>"
            itens+=e.nome;
            itens+="</span>"
            itens+="</td><td>";
            itens+="<span id='vl'>"
            itens+=e.valor;
            itens+="</span>"
            itens+="</td><td>";
            itens+="<button onclick='excluir("+e.id+")'>Excluir</button>";
            itens+="</td></tr>";
            $("#t1 tbody").append(itens);
            selecao();
        });
        ajuste();
        $('tbody tr').css('background-color','#fff');   
    }
}

function confedit(){
    modeledt.nome = $('input[name="nome"]').val();
    modeledt.valor =  $('input[name="valor"]').val();
    //alert(modeledt.id);
    if($('input[name="nome"]').val()==""){
        $('input[name="nome"]').css("border-color","#F00");
        $('input[name="nome"]').css("background-color","#FA8072");
    }else{
        $.ajax({
            type: "PUT",
            dataType: "json",
            cache: false,
            contentType:"application/json",    
            url: 'https://webservice-digiudo.c9users.io/alterarProduto/'+modeledt.id,
            data: JSON.stringify(modeledt),  
        }).done(function(e){
           $('tr[select="select"]').find('span[id="nm"]').html(e.nome);
           $('tr[select="select"]').find('span[id="vl"]').html(e.valor);
           selecao();
        });
        ajusteEdit();
    }
}

function novo(){
    $('tbody tr').off("click")
    $('input[name="nome"]').val("");
    $('input[name="valor"]').val("");
    $('#btn-alt').removeAttr("onclick");
    $('#btn-nv').removeAttr("onclick");
    $('input[name="nome"]').css("background-color","#fff");
    $('input[name="valor"]').css("background-color","#fff");
    $('input[name="nome"]').removeAttr("readonly","readonly");
    $('input[name="valor"]').removeAttr("readonly","readonly");
    $('#btn-conc').attr("onclick","confirmar()");
    $('#btn-canc').attr("onclick","cancelar()");
    $('#btn-canc').removeAttr("disabled",'disabled');
    $('#btn-conc').removeAttr("disabled",'disabled');
    $('#btn-alt').attr("disabled",'disabled');
}

function cancelar(){
    selecao();
    $('tbody tr').css('background-color','#fff');   
    ajuste();
}

function cancelarEdit(){
    selecao();
    $('input[name="nome"]').val($('tr[select="select"]').find('span[id="nm"]').html());
    $('input[name="valor"]').val($('tr[select="select"]').find('span[id="vl"]').html());
    ajusteEdit();
}

function alterar(){
    $('tbody tr').off("click");
    $('#btn-nv').removeAttr("onclick");
    $('#btn-nv').attr("disabled",'disabled');
    $('input[name="nome"]').css("background-color","#fff");
    $('input[name="valor"]').css("background-color","#fff");
    $('input[name="nome"]').removeAttr("readonly","readonly");
    $('input[name="valor"]').removeAttr("readonly","readonly");
    $('#btn-conc').attr("onclick","confedit()");
    $('#btn-canc').attr("onclick","cancelarEdit()");
    $('#btn-conc').removeAttr("disabled",'disabled');
    $('#btn-canc').removeAttr("disabled",'disabled');
}

function listar(){
    ajuste();
    var itens = "";
    $.ajax({
        type: 'GET',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: 'https://webservice-digiudo.c9users.io/listaProduto',
        beforeSend: function() {
            $("h2").html("Carregando....");
        },
        error: function() {
            $("h2").html("ERRO!");
        },
    }).done(function(e){
         for(var i = 0; i<e.length; i++){
            itens+="<tr><td>";
            itens+="<span id='cd'>"
            itens+=e[i].id;
            itens+="</span>"
            itens+="</td><td>";
            itens+="<span id='nm'>"
            itens+=e[i].nome;
            itens+="</span>"
            itens+="</td><td>";
            itens+="<span id='vl'>"
            itens+=e[i].valor;
            itens+="</span>"
            itens+="</td><td>";
            itens+="<button onclick='excluir("+e[i].id+")'>Excluir</button>";
            itens+="</td></tr>";
        }
    $("#t1 tbody").html(itens);
    $("h2").html("");
    selecao();
    });
}

function excluir(x){
    //var model = {"id" : x};
     if(confirm("Confirma a exclusão do usuário "+$('button[onclick="excluir('+x+')"').parent().parent().find('span[id="nm"]').html()+"?")){
        $.ajax({
        type: 'DELETE',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: 'https://webservice-digiudo.c9users.io/deletarProduto/'+x,
      //  data: JSON.stringify(model),
        });
        $("#t1 tbody").html("");
        listar();
    }
}

function selecao(){
    $('tbody tr').css('cursor','pointer');
        $('tbody tr').click(function(){
            $('#btn-alt').removeAttr("disabled",'disabled');
            $('#btn-alt').attr("onclick","alterar()");
            $('tbody tr').css('background-color','#fff');
            $('tbody tr').removeAttr('select','select');
            $(this).css('background-color','#76affd');
            $(this).attr('select','select');
            //alert($(this).html());
            $('input[name="nome"]').val($(this).find('span[id="nm"]').html());
            $('input[name="valor"]').val($(this).find('span[id="vl"]').html());
            modeledt = {"id":$(this).find('span[id="cd"]').html(), "nome" : $('input[name="nome"]').val($(this).find('span[id="nm"]').html()),"valor" : $('input[name="valor"]').val($(this).find('span[id="vl"]').html())};
    });
}
function ajuste(){
    $('tbody tr').on("click");
    $('input[name="nome"]').val("");
    $('input[name="valor"]').val("");
    $('#btn-nv').attr("onclick","novo()");
    $('input[name="nome"]').attr("readonly","readonly");
    $('input[name="valor"]').attr("readonly","readonly");
    $('input[name="nome"]').css("background-color","#ccc");
    $('input[name="valor"]').css("background-color","#ccc");
    $('#btn-alt').removeAttr("onclick");
    $('#btn-alt').attr("disabled",'disabled');
    $('#btn-conc').attr("disabled",'disabled');
    $('#btn-canc').attr("disabled",'disabled');
    $('#btn-conc').removeAttr("onclick");
    $('#btn-canc').removeAttr("onclick");
    $('input[name="nome"]').css("border-color","#fff");
}

function ajusteEdit(){
    $('tbody tr').on("click");
    $('#btn-nv').attr("onclick","novo()");
    $('#btn-nv').removeAttr("disabled",'disabled');
    $('input[name="nome"]').attr("readonly","readonly");
    $('input[name="valor"]').attr("readonly","readonly");
    $('input[name="nome"]').css("background-color","#ccc");
    $('input[name="valor"]').css("background-color","#ccc");
    $('#btn-conc').removeAttr("onclick");
    $('#btn-canc').removeAttr("onclick");
    $('#btn-conc').attr("disabled",'disabled');
    $('#btn-canc').attr("disabled",'disabled');
    $('input[name="nome"]').css("border-color","#fff");
}