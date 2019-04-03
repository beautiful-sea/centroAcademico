<?php

require_once('../../auto_load.php');

$email 	= $_POST['email'];
$nome 	= $_POST['nome'];
$senha	= md5($_POST['senha']);

$usuario = new Usuario;

$usuario->setNome($nome);
$usuario->setEmail($email);

if($senha == md5($_POST['senha2'])){
	$usuario->setSenha($senha);
}else{
	header("Location: ../../view/usuarios/cadastrar.php?r=2");
}

if(!$usuario->checarEmail()){
	header("Location: ../../view/usuarios/cadastrar.php?r=3");
}elseif($usuario->cadastrar()){
	header("Location: ../../view/usuarios/cadastrar.php?r=1");
}


