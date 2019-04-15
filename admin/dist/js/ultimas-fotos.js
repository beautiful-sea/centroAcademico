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