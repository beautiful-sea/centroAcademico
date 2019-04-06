<?php

require_once("../../auto_load.php");


$produto = new Produto;

if(isset($_POST['todos']) && $_POST['todos'] == 1){
	echo json_encode($produto->buscarTodos());
}else{
	$consulta = $_POST['consulta'];
	if($consulta != ''){
		echo json_encode($produto->buscarProduto($consulta));	
	}else{
		return false;
	}	
}
