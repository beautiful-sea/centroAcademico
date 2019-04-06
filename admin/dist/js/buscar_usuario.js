$(document).ready(function(){


	$("#todos_usuarios").on("click",function(){//Ao clicar no botão de mostrar todos usuários
		$.ajax({
				url:'../../controller/usuarios/buscar.php',
				method:'POST',
				data:{todos:1},
				success: function(data){

					data = JSON.parse(data);
					tabela_de_resultado = '<tr><th>ID</th><th>Nome</th><th>Email</th><th>Tipo de Usuário</th><th></th>';

					$.each(data, function(chave,valor){
						if(valor.admin == 1){
							tipo_usuario = "Administrador"
						}else{
							tipo_usuario = "Cliente";
						}
						tabela_de_resultado = tabela_de_resultado + 
						'</tr><tr><td>'+valor.id+'</td><td>'+valor.nome+'</td><td>'+valor.email+'</td><td>'+tipo_usuario+'</td>\
						<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
						<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
						<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
						<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
						';
					});

					$("#resultado_consulta").html(tabela_de_resultado);
					$(".btn-detalhes").on("click",function(){//Ao clicar no botão de detalhes
						botao = this;
						id = botao.getAttribute("data-detalhes");//Pegando id do usuario pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#body-modal-detalhes").html('<dt>ID:</dt><dd>'+valor.id+'</dd>\
									<dt>Nome:</dt><dd>'+valor.nome+'</dd>\
									<dt>Email:</dt><dd>'+valor.email+'</dd>');
							}
						})
					});

					$(".btn-editar").on("click",function(){//Ao clicar no botão de edição do usuário
						botao = this;
						id = botao.getAttribute("data-editar");//Pegando id do usuario pelo atributo do botao

						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#editar_email").val(valor.email);
								$("#editar_nome").val(valor.nome);
								$("#editar_id").val(valor.id);
								if(valor.admin == 1){
									console.log('admin');
									$("#tipo_de_usuario").html('<input type="radio" name="admin" checked id="tipo_1" value="1">\
										<span>Administrador</span><br>\
										<input type="radio" name="admin" id="tipo_0" value="0">\
										<span>Cliente</span>');
								}else{
									console.log('cliente');

									$("#tipo_de_usuario").html('<input type="radio" name="admin" id="tipo_1" value="1">\
										<span>Administrador</span><br>\
										<input type="radio" name="admin" id="tipo_0" checked value="0">\
										<span>Cliente</span>');
								}
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

	$("#form_buscar_usuario").submit(function(){

		event.preventDefault();//cancela envio do formulario

		var consulta = $("#consulta").val();

		if(consulta.length != 0){
			$.ajax({
				url:'../../controller/usuarios/buscar.php',
				method:'POST',
				data:{consulta:consulta},
				success: function(data){
					data = JSON.parse(data);
					tabela_de_resultado = '<tr><th>ID</th><th>Nome</th><th>Email</th><th>Tipo de Usuário</th><th></th>';

					$.each(data, function(chave,valor){
						if(valor.admin == 1){
							tipo_usuario = "Administrador"
						}else{
							tipo_usuario = "Cliente";
						}
						tabela_de_resultado = tabela_de_resultado + 
						'</tr><tr><td>'+valor.id+'</td><td>'+valor.nome+'</td><td>'+valor.email+'</td><td>'+tipo_usuario+'</td>\
						<td><button class="btn btn-warning btn-editar" title="Editar" data-editar="'+valor.id+'" data-toggle="modal" data-target="#modal-editar"><i class="fa fa-edit"></i></button>\
						<button class="btn btn-primary btn-detalhes"  title="Detalhes" popover="Detalhes" data-detalhes="'+valor.id+'" data-toggle="modal" data-target="#modal-detalhes"><i class="fa fa-file"></i></button>\
						<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
						<button class="btn btn-danger btn-remover"  title="Remover" data-remover="'+valor.id+'" data-toggle="modal" data-target="#modal-remover"><i class="fa fa-trash"></i></button></td></tr>\
						';
					})

					$("#resultado_consulta").html(tabela_de_resultado);

					$(".btn-detalhes").on("click",function(){//Ao clicar no botão de detalhes
						botao = this;
						id = botao.getAttribute("data-detalhes");//Pegando id do usuario pelo atributo do botao
						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#body-modal-detalhes").html('<dt>ID:</dt><dd>'+valor.id+'</dd>\
									<dt>Nome:</dt><dd>'+valor.nome+'</dd>\
									<dt>Email:</dt><dd>'+valor.email+'</dd>');
							}
						})
					});

					$(".btn-editar").on("click",function(){//Ao clicar no botão de edição do usuário
						botao = this;
						id = botao.getAttribute("data-editar");//Pegando id do usuario pelo atributo do botao

						$.each(data, function(chave,valor){
							if(valor.id == id){
								$("#editar_email").val(valor.email);
								$("#editar_nome").val(valor.nome);
								$("#editar_id").val(valor.id);
							}
							if(valor.admin == 1){
									console.log('admin');
									$("#tipo_de_usuario").html('<input type="radio" name="admin" checked id="tipo_1" value="1">\
										<span>Administrador</span><br>\
										<input type="radio" name="admin" id="tipo_0" value="0">\
										<span>Cliente</span>');
								}else{
									console.log('cliente');

									$("#tipo_de_usuario").html('<input type="radio" name="admin" id="tipo_1" value="1">\
										<span>Administrador</span><br>\
										<input type="radio" name="admin" id="tipo_0" checked value="0">\
										<span>Cliente</span>');
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