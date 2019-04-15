<?php 
session_start();
require_once("../../auto_load.php");

$carrinho = (isset($_SESSION['carrinho']))?$_SESSION['carrinho']:Array();//Se ja existir produto no carrinho, tras ele, caso contrario, tras um array vazio
$comprador = (isset($_SESSION['comprador']))?$_SESSION['comprador']:Array();//Se ja existir dados do comprador, tras ele, caso contrario, tras um array vazio
$p = new Produto;


if(isset($_POST['id']) && !isset($_POST['qntd_produto'])){
	$produto = $p->buscarPorID($_POST['id']);//busca o produto pelo id
	if(isset($_SESSION['carrinho'][$produto['id']])){//Se ja existir o produto no carrinho, em vez de adiciona-lo, aumentar a quantidade
		$_SESSION['carrinho'][$produto['id']]['qntd']++;//adicionar o produto na sessao (carrinho)
	}else{
		$_SESSION['carrinho'][$produto['id']] = $produto;//adicionar o produto na sessao (carrinho)
		$_SESSION['carrinho'][$produto['id']]['qntd'] = 1; //Inicia quantidade de produtos com 1;
	}
	echo json_encode($_SESSION['carrinho']);
}
elseif(isset($_POST['qntd_produto'])){
	$_SESSION['carrinho'][$_POST['id']]['qntd'] = $_POST['qntd_produto']; //Inicia quantidade de produtos com 1;
	echo json_encode($_SESSION['carrinho']);
}
elseif((isset($_POST['remover']) == 1)){
	unset($_SESSION['carrinho'][$_POST['id_p']]);
	echo json_encode($_SESSION['carrinho']);
}
elseif(!isset($_POST)){
	echo json_encode($_SESSION['carrinho']);
}
elseif(isset($_POST['nome'])){
	$_SESSION['comprador']['nome'] = $_POST['nome'];
	echo json_encode($_SESSION['comprador']);
}
elseif(isset($_POST['email'])){
	$_SESSION['comprador']['email'] = $_POST['email'];
	echo json_encode($_SESSION['comprador']);
}
elseif(isset($_POST['getComprador']) == 1){
	echo json_encode($_SESSION['comprador']);
}
elseif(isset($_POST['tipo_cliente'])){
	if($_POST['tipo_cliente'] == 1){
		$_SESSION['comprador']['tipo_cliente'] = 1;
	}else{
		$_SESSION['comprador']['tipo_cliente'] = 0;
	}
	echo json_encode($_SESSION['carrinho']);
}else{
	echo json_encode($_SESSION['carrinho']);
}