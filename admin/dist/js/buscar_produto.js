$(document).ready(function(){

	$("#todos_produtos").on("click",function(){//Ao clicar no botão de mostrar todos produtos
		$.ajax({
				url:'../../controller/loja/buscar_produtos.php',
				method:'POST',
				data:{todos:1},
				success: function(data){

					data = JSON.parse(data);
					tabela_de_resultado = '<tr><th>ID</th><th>Nome</th><th>Email</th><th></th>';

					$.each(data, function(chave,valor){

						if(valor.valor.indexOf(".") == -1){//Adicona o .00 em valores sem decimal. Ex: 90 -> 90.00
							valor.valor += ".00";
						}
						if(valor.valor_socios.indexOf(".") == -1){//Adicona o .00 em valores sem decimal. Ex: 90 -> 90.00
							valor.valor_socios += ".00";
						}
						tabela_de_resultado = tabela_de_resultado + 
						'</tr><tr><td>'+valor.id+'</td><td>'+valor.nome+'</td><td>R$ '+valor.valor+'</td>\
						<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
						<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
						<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>';
					});

					$("#resultado_consulta").html(tabela_de_resultado);
					$(".btn-detalhes").on("click",function(){//Ao clicar no botão de detalhes
						botao = this;
						id = botao.getAttribute("data-detalhes");//Pegando id do usuario pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#body-modal-detalhes").html('<dt>ID:</dt><dd>'+valor.id+'</dd>\
									<dt>Nome:</dt><dd>'+valor.nome+'</dd>\
									<dt>Valor:</dt><dd>R$ '+valor.valor+'</dd>\
									<dt>Valor para Sócios:</dt><dd>R$  '+valor.valor_socios+'</dd>\
									<dt>Imagem:</dt><dd><img class="img-detalhes-busca" alt='+valor.nome+' src="../../dist/img/loja/produtos/'+valor.foto+'"></dd>');
							}
						})
					});

					$(".btn-editar").on("click",function(){//Ao clicar no botão de edição do usuário
						botao = this;
						id = botao.getAttribute("data-editar");//Pegando id do usuario pelo atributo do botao

						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#editar_id").val(valor.id);
								$("#editar_valor").val(valor.valor);
								$("#editar_nome").val(valor.nome);
								$("#editar_valor_socios").val(valor.valor_socios);
								$("#editar_descricao").val(valor.descricao);
							}
						})
					});

					$(".btn-remover").on("click",function(){//Ao clicar no botão de remover usuário
						botao = this;
						id = botao.getAttribute("data-remover");//Pegando id do usuario pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#remover_id").val(valor.id);
							}
						})
					});
				}
			});
	});

	$("#form_buscar_produto").submit(function(){

		event.preventDefault();//cancela envio do formulario

		var consulta = $("#consulta").val();

		if(consulta.length != 0){
			$.ajax({
				url:'../../controller/loja/buscar_produtos.php',
				method:'POST',
				data:{consulta:consulta},
				success: function(data){
					data = JSON.parse(data);
					tabela_de_resultado = '<tr><th>ID</th><th>Nome</th><th>Valor</th><th></th>';

					$.each(data, function(chave,valor){
						tabela_de_resultado = tabela_de_resultado + 
						'</tr><tr><td>'+valor.id+'</td><td>'+valor.nome+'</td><td>R$ '+valor.valor+'</td>\
						<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
						<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
						<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>';
					})

					$("#resultado_consulta").html(tabela_de_resultado);

					$(".btn-detalhes").on("click",function(){//Ao clicar no botão de detalhes
						botao = this;
						id = botao.getAttribute("data-detalhes");//Pegando id do usuario pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#body-modal-detalhes").html('<dt>ID:</dt><dd>'+valor.id+'</dd>\
									<dt>Nome:</dt><dd>'+valor.nome+'</dd>\
									<dt>Valor:</dt><dd>R$ '+valor.valor+'</dd>\
									<dt>Valor para Sócios:</dt><dd>R$  '+valor.valor_socios+'</dd>\
									<dt>Imagem:</dt><dd><img class="img-detalhes-busca" alt='+valor.nome+' src="../../dist/img/loja/produtos/'+valor.foto+'"></dd>');
							}
						})
					});

					$(".btn-editar").on("click",function(){//Ao clicar no botão de edição do usuário
						botao = this;
						id = botao.getAttribute("data-editar");//Pegando id do usuario pelo atributo do botao

						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#editar_id").val(valor.id);
								$("#editar_valor").val(valor.valor);
								$("#editar_nome").val(valor.nome);
								$("#editar_valor_socios").val(valor.valor_socios);
								$("#editar_descricao").val(valor.descricao);
							}
						})
					});

					$(".btn-remover").on("click",function(){//Ao clicar no botão de remover usuário
						botao = this;
						id = botao.getAttribute("data-remover");//Pegando id do usuario pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#remover_id").val(valor.id);
							}
						})
					});
				}
			})			
		}

	});

})