<?php

session_start();

require_once('../../auto_load.php');

$estoque = new Estoque($_POST);

if($estoque->cadastrar() === true){
	header("Location: ../../view/loja/estoque.php?r=1");
}else{
	header("Location: ../../view/loja/estoque.php?r=$cadastro");
}

