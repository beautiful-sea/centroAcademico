$(document).ready(function(){

	$("#expandir-imagens").click(function(){
		$(this).hide();
		$(".div-img-alterar").width("40%");
		$("#diminuir-imagens").show();
	})

	$("#diminuir-imagens").click(function(){
		$(this).hide();
		$(".div-img-alterar").width("130px");
		$("#expandir-imagens").show();
	})
	$(".todas_imagens").on("click",function(){//Ao clicar no botão de mostrar todos produtos
		tipo = this.getAttribute("data-tipo");//Define se é uma alteração de posicao da imagem ou edicao de uma existente
		$.ajax({
			url:'../../../controller/atletica/buscar_ultimas_fotos.php',
			method:'POST',
			data:{buscarTodas:'ORDER BY data_evento DESC limit 9'},
			success: function(data){

				data = JSON.parse(data);
				preenche_tabela(data,tipo);

					// $(".btn-detalhes").on("click",function(){//Ao clicar no botão de detalhes
					// 	botao = this;
					// 	id = botao.getAttribute("data-detalhes");//Pegando id do usuario pelo atributo do botao
					// 	$.each(data, function(chave,valor){
					// 		if(valor.id == id){
					// 			$("#body-modal-detalhes").html('<dt>ID:</dt><dd>'+valor.id+'</dd>\
					// 				<dt>Nome:</dt><dd>'+valor.nome+'</dd>\
					// 				<dt>Valor:</dt><dd>R$ '+valor.valor+'</dd>\
					// 				<dt>Valor para Sócios:</dt><dd> '+valor.data_evento+'</dd>\
					// 				<dt>Imagem:</dt><dd><img class="img-detalhes-busca" alt='+valor.nome+' src="../../dist/img/loja/produtos/'+valor.foto+'"></dd>');
					// 		}
					// 	})
					// });

					$(".btn-editar").on("click",function(){//Ao clicar no botão de edição do usuário
						botao = this;
						id = botao.getAttribute("data-editar");//Pegando id do usuario pelo atributo do botao

						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#id").val(valor.id);
								$("#editar_titulo").val(valor.titulo);
								$("#editar_descricao").val(valor.descricao);
								$("#editar_data").val(valor.data_evento);
							}
						})
					});

					// $(".btn-remover").on("click",function(){//Ao clicar no botão de remover usuário
					// 	botao = this;
					// 	id = botao.getAttribute("data-remover");//Pegando id do usuario pelo atributo do botao
					// 	$.each(data, function(chave,valor){
					// 		if(valor.id == id){
					// 			$("#remover_id").val(valor.id);
					// 		}
					// 	})
					// });
				}
			});
	});

	function preenche_tabela(dados,tipo){
		// tabela_de_resultado = '<tr><th>ID</th><th>Foto</th><th>Título</th><th>Data</th><th></th>';
		tabela_de_resultado = '';

		$.each(dados, function(chave,valor){
						//Formatar Data do Evento
						data_evento = valor.data_evento.split('-');
						data_evento = data_evento[2]+'/'+data_evento[1]+'/'+data_evento[0];

						if(tipo == 'editar'){
							tabela_de_resultado = tabela_de_resultado + 
							'</tr><tr><td>'+valor.id+'</td><td><img class="img-detalhes-busca" alt='+valor.titulo+' src="../../../dist/img/atletica/ultimas_fotos/'+valor.foto+'"></td><td>'+valor.titulo+'</td><td>'+data_evento+'</td>\
							<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
							<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
							<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>';
						}else if(tipo == 'alterar'){
							tabela_de_resultado = tabela_de_resultado + 
							'\
							<div class="col-xl-4 col-md-4 mb-4 div-img-alterar" style="height:150px">\
							<div class="ms-thumbnail-container wow fadeInUp">\
							<figure class="ms-thumbnail"><input type="radio" name="imagem_nova" value="'+valor.id+'" id="'+valor.id+'">\
							<label for="'+valor.id+'"><img style="height:100px" src="../../../dist/img/atletica/ultimas_fotos/'+valor.foto+'" alt="" class="img-fluid">\
							</labe>\
							</figure>\
							</div>\
							</div>';
						}
					});

		$("#resultado_consulta_"+tipo).html(tabela_de_resultado);//Concatena o tipo de consulta para definir o lugar de exibicao(alteracao/edição)

	}






























































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