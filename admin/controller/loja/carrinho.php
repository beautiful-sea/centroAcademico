<?php 
session_start();
require_once("../../auto_load.php");

$carrinho = (isset($_SESSION['carrinho']))?$_SESSION['carrinho']:Array();//Se ja existir produto no carrinho, tras ele, caso contrario, tras um array vazio
$p = new Produto;
$produto = $p->buscarPorID($_POST['id']);//busca o produto pelo id

if(isset($_SESSION['carrinho'][$produto['id']])){//Se ja existir o produto no carrinho, em vez de adiciona-lo, aumentar a quantidade
	$_SESSION['carrinho'][$produto['id']]['qntd']++;//adicionar o produto na sessao (carrinho)
}else{
	$_SESSION['carrinho'][$produto['id']] = $produto;//adicionar o produto na sessao (carrinho)
	$_SESSION['carrinho'][$produto['id']]['qntd'] = 1; //Inicia quantidade de produtos com 1;
}

echo json_encode($_SESSION['carrinho']);
