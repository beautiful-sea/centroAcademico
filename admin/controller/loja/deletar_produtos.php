<?php
session_start();
require_once('../../auto_load.php');

$id_produto = $_POST['id'];

$produto = new Produto;

$dados = $produto->buscarPorID($id_produto);

unlink('../../dist/img/loja/produtos/'.$dados['foto']);

if($produto->deletar($id_produto)){
	header("Location: ../../view/loja/produtos.php?d=1");	
}

