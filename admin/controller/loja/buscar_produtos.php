<?php

require_once("../../auto_load.php");


$produto = new Produto;

if(isset($_POST['todos'])){
	echo json_encode($produto->buscarTodos($_POST['todos']));
}
elseif(isset($_POST['buscaPorID'])){
	echo json_encode($produto->buscarPorID($_POST['buscaPorID']));
}else{
	$consulta = $_POST['consulta'];
	if($consulta != ''){
		echo json_encode($produto->buscarProduto($consulta));	
	}else{
		return false;
	}	
}
