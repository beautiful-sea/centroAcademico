<?php

require_once("../../auto_load.php");
$consulta = $_POST['consulta'];

$produto = new Produto;

if($consulta != ''){
	echo json_encode($produto->buscarProduto($consulta));	
}else{
	return false;
}