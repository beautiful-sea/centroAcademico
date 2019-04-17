<?php

session_start();

require_once('../../auto_load.php');

$_POST['foto'] = $_FILES['foto'];
$produto = new Produto($_POST);

if($produto->cadastrar() === true){
	header("Location: ../../view/loja/produtos.php?r=1");
}else{
	header("Location: ../../view/loja/produtos.php?r=$cadastro");
}

