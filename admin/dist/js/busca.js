//Aumentar e diminuir imagens da galeria
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

//Ao clicar no botão de mostrar todos resultados
	$(".todos_resultados").on("click",function(){

		$("#resultado_consulta").toggleClass("mostra_resultado");
		$('#div_paginacao').toggleClass("mostra_resultado");
		
		tipo = $("#tipo_consulta").val();

		if($(this).html() == 'Todos'){
			$(this).html('Ocultar');
		}else if($(this).html() == 'Ocultar'){
			$(this).html('Todos');
		}
		buscar();
	});

//Retorna os dados necessarios para realizar cada tipo de consulta
	function tipo_consulta(tipo){

		switch(tipo){
			case 'usuario':
				return {
					tipo:'usuario',
					url:'../../controller/usuarios/buscar.php',
					query:' ORDER BY nome LIMIT ',
					table_head:['ID','Nome','Email','Tipo de Usuário']  
				}
			break;
			case 'produto':
				return {
					tipo:'produto',
					url:'../../controller/loja/buscar_produtos.php',
					query:' ORDER BY nome LIMIT ',
					table_head:['ID','Nome','Descrição','Valor','Valor para Sócios','Foto'] 
				}
			break;
			case 'ultimas_fotos':
				return {
					tipo:'ultimas_fotos',
					url:'../../../controller/atletica/buscar_ultimas_fotos.php',
					query:' ORDER BY titulo LIMIT ',
					table_head:['ID','Titulo','Descrição','Data do Evento','Foto'] 
				}
			break;
		}
	}
//Realiza a consulta via AJAX
	function buscar(inicio = 0,quantidade_de_resultados = 4){
		tipo = tipo_consulta($("#tipo_consulta").val());
		opcoes = (tipo.query)+inicio+','+quantidade_de_resultados;
		$.ajax({
			url:tipo.url,
			method:'POST',
			data:{todos:opcoes},
			success: function(data){
				data = JSON.parse(data);
				preenche_tabela(data,tipo);
				
					$(".btn-detalhes").on("click",function(){//Ao clicar no botão de detalhes
						botao = this;
						id = botao.getAttribute("data-detalhes");//Pegando id pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){

								switch(tipo.tipo){
									case 'usuario':
										$("#body-modal-detalhes").html('<dt>'+tipo.table_head[0]+':</dt><dd>'+valor.id+'</dd>\
										<dt>'+tipo.table_head[1]+':</dt><dd>'+valor.nome+'</dd>\
										<dt>'+tipo.table_head[2]+':</dt><dd>'+valor.email+'</dd>');
									break;

									case 'produto':
										$("#body-modal-detalhes").html('<dt>'+tipo.table_head[0]+':</dt><dd>'+valor.id+'</dd>\
										<dt>'+tipo.table_head[1]+':</dt><dd>'+valor.nome+'</dd>\
										<dt>'+tipo.table_head[2]+':</dt><dd>'+valor.descricao+'</dd>\
										<dt>'+tipo.table_head[3]+':</dt><dd>'+valor.valor+'</dd>\
										<dt>'+tipo.table_head[3]+':</dt><dd>'+valor.valor_socios+'</dd>\
										<dt>'+tipo.table_head[4]+':</dt><dd><img width="100px" src="../../dist/img/loja/produtos/'+valor.foto+'"</dd>');
									break;

									case 'ultimas_fotos':
										$("#body-modal-detalhes").html('<dt>'+tipo.table_head[0]+':</dt><dd>'+valor.id+'</dd>\
										<dt>'+tipo.table_head[1]+':</dt><dd>'+valor.titulo+'</dd>\
										<dt>'+tipo.table_head[2]+':</dt><dd>'+valor.descricao+'</dd>\
										<dt>'+tipo.table_head[3]+':</dt><dd>'+valor.data_evento+'</dd>\
										<dt>'+tipo.table_head[4]+':</dt><dd><img width="100px" src="../../../dist/img/atletica/ultimas_fotos/'+valor.foto+'"</dd>');
									break;
								}

							}
						})
					});

					$(".btn-editar").on("click",function(){//Ao clicar no botão de edição
						botao = this;
						id = botao.getAttribute("data-editar");//Pegando id pelo atributo do botao

						$.each(data, function(chave,valor){
							if(valor.id == id){
								switch(tipo.tipo){
									case 'usuario':
										$("#editar_email").val(valor.email);
										$("#editar_nome").val(valor.nome);
										$("#editar_id").val(valor.id);
										if(valor.admin == 1){
											$("#tipo_de_usuario").html('<input type="radio" name="admin" checked id="tipo_1" value="1">\
												<span>Administrador</span><br>\
												<input type="radio" name="admin" id="tipo_0" value="0">\
												<span>Cliente</span>');
										}else{
											$("#tipo_de_usuario").html('<input type="radio" name="admin" id="tipo_1" value="1">\
												<span>Administrador</span><br>\
												<input type="radio" name="admin" id="tipo_0" checked value="0">\
												<span>Cliente</span>');
										}
									break;

									case 'produto':
										$("#editar_valor").val(valor.valor);
										$("#editar_nome").val(valor.nome);
										$("#editar_valor_socios").val(valor.valor_socios);
										$("#editar_id").val(valor.id);
										$("#editar_descricao").val(valor.descricao);
									break;

									case 'ultimas_fotos':
										$("#editar_titulo").val(valor.titulo);
										$("#editar_descricao").val(valor.descricao);
										$("#editar_data").val(valor.data_evento);
										$("#editar_id").val(valor.id);
									break;
								}
								
							}
						})
					});

					$(".btn-remover").on("click",function(){//Ao clicar no botão de remover usuário
						botao = this;
						id = botao.getAttribute("data-remover");//Pegando pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#remover_id").val(valor.id);
							}
						})
					});
				}
			});

	}
//Prenche a tabela de acordo com cada tipo(usuario, produto)
	function preenche_tabela(data,tipo){
		if(tipo.tipo == "ultimas_fotos"){
			tabela_de_resultado = '<tr><th>'+tipo.table_head[0]+'</th><th>'+tipo.table_head[4]+'</th><th>'+tipo.table_head[1]+'</th><th>'+tipo.table_head[3]+'</th><th></th>';
		}else{
			tabela_de_resultado = '<tr><th>'+tipo.table_head[0]+'</th><th>'+tipo.table_head[1]+'</th><th>'+tipo.table_head[2]+'</th><th>'+tipo.table_head[3]+'</th><th></th>';
		}
		$.each(data, function(chave,valor){

			switch(tipo.tipo){
				case 'usuario':
					if(valor.admin == 1){
						tipo_usuario = "Administrador"
					}else{
						tipo_usuario = "Cliente";
					}
					tabela_de_resultado = tabela_de_resultado + 
					'</tr><tr><td>'+valor.id+'</td><td>'+valor.nome+'</td><td>'+valor.email+'</td><td>'+tipo_usuario+'</td>';
				break;
				case 'produto':
					if(valor.valor.indexOf(".") == -1){//Adicona o .00 em valores sem decimal. Ex: 90 -> 90.00
						valor.valor += ".00";
					}
					if(valor.valor_socios.indexOf(".") == -1){//Adicona o .00 em valores sem decimal. Ex: 90 -> 90.00
						valor.valor_socios += ".00";
					}
					tabela_de_resultado = tabela_de_resultado + 
					'</tr><tr><td>'+valor.id+'</td><td>'+valor.nome+'</td><td>'+valor.valor+'</td><td>'+valor.valor_socios+'</td>';
				break;
			}
			data_evento = valor.data_evento;
			if(data_evento != null){
				//Formatar Data do Evento
				data_evento = valor.data_evento.split('-');
				data_evento = data_evento[2]+'/'+data_evento[1]+'/'+data_evento[0];
			}


			if(tipo.tipo == 'ultimas_fotos'){
				tabela_de_resultado = tabela_de_resultado + 
							'</tr><tr><td>'+valor.id+'</td><td><img class="img-detalhes-busca" alt='+valor.titulo+' src="../../../dist/img/atletica/ultimas_fotos/'+valor.foto+'"></td><td>'+valor.titulo+'</td><td>'+data_evento+'</td>\
							<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
							<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
							<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>';
			
			}else{
				tabela_de_resultado = tabela_de_resultado + '<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
					<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
					<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
					<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
					';
			}
			
			
		});
		$("#resultado_consulta").html(tabela_de_resultado);
	}

//Realiza a busca para a paginacao atual
	function paginacao(pagina_ativa){
		quantidade_de_resultados = 4;
		inicio = (quantidade_de_resultados * pagina_ativa) - quantidade_de_resultados;
		buscar(inicio,quantidade_de_resultados);

	}
//Alterar imagem
function alterar(id_foto){
	$.ajax({
		url: "../../../controller/atletica/buscar_ultimas_fotos.php",
		method:"POST",
		data:{buscarPorID:id_foto},
		success: function(data){
			data = JSON.parse(data);
			$("#imagem_antiga").val(data.id);
		}
	})
	$("#modal-alterar").modal('show');
}

	// $("#form_buscar_usuario").submit(function(){

	// 	event.preventDefault();//cancela envio do formulario

	// 	var consulta = $("#consulta").val();

	// 	if(consulta.length != 0){
	// 		$.ajax({
	// 			url:'../../controller/usuarios/buscar.php',
	// 			method:'POST',
	// 			data:{consulta:consulta},
	// 			success: function(data){
	// 				data = JSON.parse(data);
	// 				tabela_de_resultado = '<tr><th>ID</th><th>Nome</th><th>Email</th><th>Tipo de Usuário</th><th></th>';

	// 				$.each(data, function(chave,valor){
	// 					if(valor.admin == 1){
	// 						tipo_usuario = "Administrador"
	// 					}else{
	// 						tipo_usuario = "Cliente";
	// 					}
	// 					tabela_de_resultado = tabela_de_resultado + 
	// 					'</tr><tr><td>'+valor.id+'</td><td>'+valor.nome+'</td><td>'+valor.email+'</td><td>'+tipo_usuario+'</td>\
	// 					<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
	// 					<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
	// 					<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
	// 					<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
	// 					';
	// 				})

	// 				$("#resultado_consulta").html(tabela_de_resultado);

	// 				$(".btn-detalhes").on("click",function(){//Ao clicar no botão de detalhes
	// 					botao = this;
	// 					id = botao.getAttribute("data-detalhes");//Pegando id do usuario pelo atributo do botao
	// 					$.each(data, function(chave,valor){
	// 						if(valor.id == id){
	// 							$("#body-modal-detalhes").html('<dt>ID:</dt><dd>'+valor.id+'</dd>\
	// 								<dt>Nome:</dt><dd>'+valor.nome+'</dd>\
	// 								<dt>Email:</dt><dd>'+valor.email+'</dd>');
	// 						}
	// 					})
	// 				});

	// 				$(".btn-editar").on("click",function(){//Ao clicar no botão de edição do usuário
	// 					botao = this;
	// 					id = botao.getAttribute("data-editar");//Pegando id do usuario pelo atributo do botao

	// 					$.each(data, function(chave,valor){
	// 						if(valor.id == id){
	// 							$("#editar_email").val(valor.email);
	// 							$("#editar_nome").val(valor.nome);
	// 							$("#editar_id").val(valor.id);
	// 						}
	// 						if(valor.admin == 1){
	// 							console.log('admin');
	// 							$("#tipo_de_usuario").html('<input type="radio" name="admin" checked id="tipo_1" value="1">\
	// 								<span>Administrador</span><br>\
	// 								<input type="radio" name="admin" id="tipo_0" value="0">\
	// 								<span>Cliente</span>');
	// 						}else{
	// 							console.log('cliente');

	// 							$("#tipo_de_usuario").html('<input type="radio" name="admin" id="tipo_1" value="1">\
	// 								<span>Administrador</span><br>\
	// 								<input type="radio" name="admin" id="tipo_0" checked value="0">\
	// 								<span>Cliente</span>');
	// 						}
	// 					})
	// 				});

	// 				$(".btn-remover").on("click",function(){//Ao clicar no botão de remover usuário
	// 					botao = this;
	// 					id = botao.getAttribute("data-remover");//Pegando id do usuario pelo atributo do botao
	// 					$.each(data, function(chave,valor){
	// 						if(valor.id == id){
	// 							$("#remover_id").val(valor.id);
	// 						}
	// 					})
	// 				});
	// 			}
	// 		})			
	// 	}

	// });