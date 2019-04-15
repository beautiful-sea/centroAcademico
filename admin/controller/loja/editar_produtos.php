<?php
session_start();
require_once('../../auto_load.php');


$produto = new Produto;

$produto->setNome($_POST['nome']);
$produto->setValor($_POST['valor']);
$produto->setValor_socios($_POST['valor_socios']);
$produto->setDescricao($_POST['descricao']);

if($_FILES['foto']['error'] != 4){
	$produto->setFoto($_FILES['foto']);
}

if($produto->editar($_POST['id'])){
	header("Location: ../../view/loja/produtos.php?e=1");
}else{
	header("Location: ../../view/loja/produtos.php?e=1");	
}



?>