function editar(id_foto){
	$.ajax({
		url: "../../../controller/atletica/buscar_ultimas_fotos.php",
		method:"POST",
		data:{buscarPorID:id_foto},
		success: function(data){
			data = JSON.parse(data);

			$("#id").val(data.id);
			$("#editar_titulo").val(data.titulo);
			$("#editar_descricao").val(data.descricao);
			$("#editar_data").val(data.data_evento);
		}
	})
	$("#modal-editar").modal('show');
}