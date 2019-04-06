<?php

session_start();

require_once('../../auto_load.php');

$produto = new Produto;

$produto->setNome($_POST['nome']);
$produto->setDescricao($_POST['descricao']);
$produto->setValor($_POST['valor']);
$produto->setValor_socios($_POST['valor_socios']);
$produto->setFoto($_FILES['foto']);

if($produto->cadastrar()){
	header("Location: ../../view/loja/produtos.php?r=1");
}else{
	header("Location: ../../view/loja/produtos.php?r=$cadastro");
}

