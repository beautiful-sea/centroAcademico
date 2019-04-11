tipo_cliente = null;
comprador = [];
function add_carrinho(id_produto){//Adiciona os itens na sessao 
	event.preventDefault();
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method:"POST",
		data:{id:id_produto},
		success:function(data){
			atualiza_carrinho_html(data);
		}
	});
}
function remover_carrinho(id_produto){//Adiciona os itens na sessao 
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method:"POST",
		data:{id_p:id_produto,remover:1},
		success:function(data){
			atualiza_carrinho_html(data);
		}
	});
}
function getComprador(){
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method:"POST",
		data:{getComprador:1},
		success:function(data){
			data = JSON.parse(data);
		}
	})
}

function setTipoCliente(value){//Atualiza o carrinho de acordo com o tipo de cliente
	this.tipo_cliente = value;
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method:"POST",
		data:{tipo_cliente:tipo_cliente},
		success:function(data){
			atualiza_carrinho_html(data);
		}
	});

}


function atualiza_carrinho_html(itens){//Atualiza os itens no html
	carrinho = JSON.parse(itens);
	$("#itens_carrinho").html('');
	total_compra_socios = 0;
	total_compra_nao_socios = 0;

	$.each(carrinho, function(chave,valor){
		valor_unitario 	= (tipo_cliente == 1)?valor.valor_socios:valor.valor;
		valor_unitario 	= valor_unitario * valor.qntd;

		total_compra_socios += parseInt((valor.valor_socios*valor.qntd));
		total_compra_nao_socios += parseInt((valor.valor*valor.qntd));
		
		$("#itens_carrinho").append('\
			<div class="card container col-md-12">\
			<a href="#" class="color-bordo ">'+valor.nome+'</a>\
			<!-- <div class="col-md-5">\
			<img src="../admin/dist/img/loja/produtos/'+valor.foto+'" width="100%" alt="">\
			</div> -->\
			<div class="" style="margin-top: 0px!important">\
			<label>Quantidade:</label>\
			<input type="number" id="input_qntd_produto" min="0" max="10" style="margin-top: 0px!important" class=" form-control-number pull-right" onchange="atualiza_quantidade_produto('+(valor.id)+',this.value)" pattern="[0-9]*"  value="'+valor.qntd+'">\
			</div>\
			<div class="row d-inline"><span onclick="remover_carrinho('+valor.id+')" class="color-bordo" style="cursor:pointer;padding-left:10px">Remover</span>\
			<span class="color-bordo" style="float:right;padding-right:10px">Valor: R$ '+valor_unitario+',00</span></div>\
			</div>\
			');
	});

	valor_total 	= (tipo_cliente == 1)?total_compra_socios:total_compra_nao_socios;

	$(".total_compra").html('\
		<h4 class="d-inline">Total da compra: R$</h4> <h3 class="d-inline">'+valor_total+',00</h3><br>\
		');	
	atualiza_resumo_pedido(carrinho,valor_total);

}

function atualiza_quantidade_produto(id_produto,qntd){
	if(qntd > 50){//Quantidade maxima de produto por carrinho
		qntd = 50;
	}
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method:"POST",
		data:{qntd_produto:qntd,id:id_produto},
		success:function(data){
			atualiza_carrinho_html(data);
		}
	});
}

function atualiza_resumo_pedido(carrinho,valor_total){
	$("#body-resumo-produtos").html('');
	$.each(carrinho, function(chave,valor){
		$("#body-resumo-produtos").append('<p class="color-bordo">'+valor.qntd+' '+valor.nome+'</p>');
	});
	$("#resumo-total-pedido").html(valor_total+",00");
}

//Atualizar dados do comprador no resumo ao preenche-los
$("#input_nome_comprador").blur(function(){//Ao preencher nome do comprador
	nome_comprador = this.value;
	$("#resumo_nome_comprador").html(nome_comprador);
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method: "POST",
		data:{nome:nome_comprador}
	});
});
$("#input_email_comprador").blur(function(){//Ao preencher email do comprador
	email_comprador = this.value;
	$("#resumo_email_comprador").html(this.value);
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method: "POST",
		data:{email:email_comprador}
	});
});

//Confirmação do pedido
$("#btn-finalizar-pedido").click(function(){//Mostra modal de confirmação de pedido
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method:"POST",
		data:{getComprador:1},
		success:function(data){
			data = JSON.parse(data);
		}
	});
	$("#modal-confirmar-pedido").modal('show');
});

