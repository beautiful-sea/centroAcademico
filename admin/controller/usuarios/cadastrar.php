<?php

session_start();

require_once('../../auto_load.php');

$_POST['senha'] 	= md5($_POST['senha']);
$_POST['senha2']	= md5($_POST['senha2']);

$usuario = new Usuario($_POST);

if($_POST['senha'] != $_POST['senha2']){
	header("Location: ../../view/usuarios/gerenciar.php?r=2");
}

if(!$usuario->checarEmail()){
	header("Location: ../../view/usuarios/gerenciar.php?r=3");
}elseif($usuario->cadastrar()){
	header("Location: ../../view/usuarios/gerenciar.php?r=1");
}


