function add_carrinho(id_produto){
	event.preventDefault();
	$.ajax({
		url:'../admin/controller/loja/carrinho.php',
		method:"POST",
		data:{id:id_produto},
		success:function(data){
			carrinho = JSON.parse(data);
			$("#itens_carrinho").html('');
			total_compra_socios = 0;
			total_compra_nao_socios = 0;

			$.each(carrinho, function(chave,valor){
				total_compra_socios += parseInt(valor.valor_socios);
				total_compra_nao_socios += parseInt(valor.valor);

				console.log(valor);
				$("#itens_carrinho").append('\
					<div class="card container col-md-12">\
					<a href="#" class="color-bordo ">'+valor.nome+'</a>\
					<!-- <div class="col-md-5">\
					<img src="../admin/dist/img/loja/produtos/'+valor.foto+'" width="100%" alt="">\
					</div> -->\
					<div class="" style="margin-top: 0px!important">\
					<label>Quantidade:</label>\
					<input type="number" min="0" max="10" style="margin-top: 0px!important" class=" form-control-number pull-right" pattern="[0-9]*" value="'+valor.qntd+'">\
					</div>\
					<p class="color-bordo text-right">Valor Sócio: R$ '+valor.valor_socios+',00</p>\
					<p class="color-bordo text-right">Valor não Sócio: R$ '+valor.valor+',00</p>\
					</div>\
					');

			});

			$(".total_compra").html('\
				<h4 class="d-inline">Total para sócios: R$</h4> <h3 class="d-inline">'+total_compra_socios+',00</h3><br>\
				<h4 class="d-inline">Total para não sócios: R$</h4> <h3 class="d-inline">'+total_compra_nao_socios+',00</h3>\
				');
			// console.log(sessionStorage.getItem('carrinho'));
		}
	})
}

function setTipoCliente(){
	
}